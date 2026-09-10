#!/usr/bin/env bash
# =============================================================================
# scripts/wordpress-test.sh — reproducible acceptance test for the khf theme.
# Self-bootstraps deps (PHP + extensions, MariaDB, WP-CLI, WordPress), activates
# the theme in a local WordPress install, and asserts Phase 0/1 acceptance.
#
# Usage:  ./scripts/wordpress-test.sh                       (full bootstrap+test)
#         SKIP_DEPS=1 ./scripts/wordpress-test.sh            (deps already installed)
#         WP_ROOT=/tmp/x WP_PORT=8089 ./scripts/wordpress-test.sh
# Env:    WP_ROOT, WP_PORT, DBNAME, DBUSER, DBPASS, MYSQL_SOCK, WPC, SKIP_DEPS
# =============================================================================
set -u

REPO_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
THEME_DIR="$REPO_ROOT/themes/khf"
WP_ROOT="${WP_ROOT:-$(pwd)/khf-wp-test}"
DBNAME="${DBNAME:-khf_test}"
DBUSER="${DBUSER:-khf}"
DBPASS="${DBPASS:-khftest}"
MYSQL_SOCK="${MYSQL_SOCK:-/run/mysqld/mysqld.sock}"
DB_DATA="${DB_DATA:-/tmp/khf-mariadb}"
WP_PORT="${WP_PORT:-8088}"
WP_URL="http://127.0.0.1:${WP_PORT}"
SKIP_DEPS="${SKIP_DEPS:-0}"
WPC="${WPC:-/usr/local/bin/wp}"

PASS=0; FAIL=0
ok()   { printf '  \033[32mPASS\033[0m  %s\n' "$1"; PASS=$((PASS+1)); }
bad()  { printf '  \033[31mFAIL\033[0m  %s\n' "$1"; FAIL=$((FAIL+1)); }
note() { printf '  \033[36m....\033[0m  %s\n' "$1"; }
# mysql client (mariadb or mysql)
MYSQL() { { command -v mariadb >/dev/null 2>&1 && mariadb "$@"; } || mysql "$@"; }
WP()  { php "$WPC" --allow-root --path="$WP_ROOT" "$@"; }

echo "============================================================================"
echo " Kinzua Heritage Festival — WordPress acceptance test"
echo " theme: $THEME_DIR   wp: $WP_ROOT"
echo "============================================================================"

# 0. preflight
for t in php python3 curl; do
  if command -v "$t" >/dev/null 2>&1; then note "found: $t"; else bad "missing tool: $t"; exit 1; fi
done

# 1. OS deps
if [ "$SKIP_DEPS" != "1" ]; then
  if command -v apt-get >/dev/null 2>&1; then
    echo ">> installing deps (apt)…"
      SUDO=""; [ "$(id -u)" != "0" ] && command -v sudo >/dev/null 2>&1 && SUDO=sudo
      $SUDO apt-get update -qq 2>/dev/null
      $SUDO DEBIAN_FRONTEND=noninteractive apt-get install -y -qq \
        php-cli php-xml php-mbstring php-gd php-mysql php-curl \
        mariadb-server python3-jsonschema zip unzip rsync >/dev/null 2>&1
  else
    note "no apt-get — assuming deps preinstalled"
  fi
fi
for ext in gd mysqli xml mbstring json; do php -m | grep -qi "^$ext$" && ok "php ext: $ext" || bad "php ext missing: $ext"; done
python3 -c 'import jsonschema' 2>/dev/null && ok "python jsonschema" || bad "python jsonschema missing"

# 2. MariaDB
echo ">> starting MariaDB…"
mkdir -p /var/run/mysqld 2>/dev/null && chown mysql:mysql /var/run/mysqld 2>/dev/null || true
service mariadb start >/dev/null 2>&1 || service mysql start >/dev/null 2>&1 || true
for s in /run/mysqld/mysqld.sock /var/run/mysqld/mysqld.sock; do
  if mariadb-admin ping --socket="$s" --user=root >/dev/null 2>&1; then
    MYSQL_SOCK="$s"; break
  fi
done
if ! mariadb-admin ping --socket="$MYSQL_SOCK" --user=root >/dev/null 2>&1; then
  # Preferred: package-initialized system datadir (policy-rc.d blocks `service start`)
  if [ -d /var/lib/mysql ]; then
    mariadbd --user=mysql --datadir=/var/lib/mysql --socket="$MYSQL_SOCK" >./khf-mariadb.log 2>&1 &
    for _ in $(seq 1 60); do
      mariadb-admin ping --socket="$MYSQL_SOCK" --user=root >/dev/null 2>&1 && break
      sleep 1
    done
  fi
  # Fallback: fresh custom datadir
  if ! mariadb-admin ping --socket="$MYSQL_SOCK" --user=root >/dev/null 2>&1; then
    mkdir -p "$DB_DATA"; chown -R mysql:mysql "$DB_DATA" 2>/dev/null || true
    rm -rf "${DB_DATA:?}/"* 2>/dev/null
    mariadb-install-db --user=mysql --datadir="$DB_DATA" >./khf-mariadb-init.log 2>&1
    mariadbd --user=mysql --datadir="$DB_DATA" --socket="$MYSQL_SOCK" >./khf-mariadb.log 2>&1 &
    for _ in $(seq 1 60); do
      mariadb-admin ping --socket="$MYSQL_SOCK" --user=root >/dev/null 2>&1 && break
      sleep 1
    done
  fi
fi
mariadb-admin ping --socket="$MYSQL_SOCK" --user=root >/dev/null 2>&1 \
  && ok "MariaDB running ($MYSQL_SOCK)" || bad "MariaDB not running"
MYSQL --socket="$MYSQL_SOCK" -uroot -e \
  "CREATE DATABASE IF NOT EXISTS \`$DBNAME\`; CREATE USER IF NOT EXISTS '$DBUSER'@localhost IDENTIFIED BY '$DBPASS'; GRANT ALL PRIVILEGES ON \`$DBNAME\`.* TO '$DBUSER'@localhost; FLUSH PRIVILEGES;" 2>/dev/null \
  && ok "database '$DBNAME' ready" || bad "database setup failed"

# 3. WP-CLI + core
if ! command -v wp >/dev/null 2>&1 && [ ! -x "$WPC" ]; then
  echo ">> downloading WP-CLI…"
  curl -sSL https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar -o "$WPC"
  chmod +x "$WPC"
fi
echo ">> WordPress core…"
if [ ! -f "$WP_ROOT/wp-load.php" ]; then
  rm -rf "$WP_ROOT"; mkdir -p "$WP_ROOT"
  WP core download --quiet 2>/dev/null
fi
[ -f "$WP_ROOT/wp-load.php" ] && ok "WordPress core present" || { bad "WP core download failed"; exit 1; }

# 4. wp-config + install
if [ ! -f "$WP_ROOT/wp-config.php" ]; then
  WP config create --dbname="$DBNAME" --dbuser="$DBUSER" --dbpass="$DBPASS" \
    --dbhost="localhost:${MYSQL_SOCK}" --dbprefix=wp_ --skip-check 2>/dev/null
fi
WP config set WP_DEBUG true --raw 2>/dev/null || true
WP config set WP_DEBUG_LOG true --raw 2>/dev/null || true
if ! WP core is-installed 2>/dev/null; then
  WP core install --url="$WP_URL" --title="Kinzua Heritage Festival" \
    --admin_user=admin --admin_password=khfpass --admin_email=dev@khf.test --skip-email 2>/dev/null
fi
WP core is-installed 2>/dev/null && ok "WordPress installed" || bad "WP install failed"

# 5. activate theme + CPTs/taxonomies
echo ">> activating theme…"
mkdir -p "$WP_ROOT/wp-content/themes"
rm -rf "$WP_ROOT/wp-content/themes/khf"
cp -R "$THEME_DIR" "$WP_ROOT/wp-content/themes/khf"
WP theme activate khf 2>/dev/null && ok "theme 'khf' activated" || bad "theme activation failed"
for pt in workshop event; do
  WP post-type get "$pt" --field=name 2>/dev/null | grep -q "^${pt}$" && ok "post type: $pt" || bad "post type missing: $pt"
done
for tx in workshop_category event_type; do
  WP taxonomy get "$tx" --field=name 2>/dev/null | grep -q "^${tx}$" && ok "taxonomy: $tx" || bad "taxonomy missing: $tx"
done
for pt in workshop event; do
  v=$(WP eval "echo ( get_post_type_object('$pt')->show_in_rest ? '1' : '0' );" 2>/dev/null)
  [ "$v" = "1" ] && ok "$pt show_in_rest=true" || bad "$pt show_in_rest=$v (expected 1)";
done

# 6. static checks
echo ">> static checks…"
php -l "$THEME_DIR/functions.php" >/dev/null 2>&1 && ok "php -l functions.php" || bad "php -l functions.php"
if php -r 'json_decode(file_get_contents("themes/khf/theme.json")); exit(json_last_error()?1:0);' 2>/dev/null; then ok "theme.json is valid JSON"; else bad "theme.json invalid JSON"; fi
python3 - "$REPO_ROOT" <<'PY' && ok "theme.json + blueprint.json schema valid" || bad "schema validation failed"
import json, jsonschema, urllib.request, sys
root=sys.argv[1]
urllib.request.urlretrieve("https://cdn.jsdelivr.net/gh/WordPress/gutenberg@trunk/schemas/json/theme.json","/tmp/_kt.json")
urllib.request.urlretrieve("https://playground.wordpress.net/blueprint-schema.json","/tmp/_kb.json")
t=json.load(open(root+"/themes/khf/theme.json")); s=json.load(open("/tmp/_kt.json"))
bp=json.load(open(root+"/blueprint.json")); sb=json.load(open("/tmp/_kb.json"))
te=list(jsonschema.Draft7Validator(s).iter_errors(t))
be=list(jsonschema.Draft7Validator(sb).iter_errors(bp))
if te: print("theme.json errors:",len(te),te[0].message[:100])
if be: print("blueprint.json errors:",len(be),be[0].message[:100])
sys.exit(0 if not te and not be else 1)
PY

# 7. live render
echo ">> live render test…"
WP rewrite flush --hard 2>/dev/null || true
( cd "$WP_ROOT" && php -S "127.0.0.1:${WP_PORT}" -t "$WP_ROOT" >./khf-php-srv.log 2>&1 & echo $! >./khf-php-srv.pid )
sleep 3
CODE=$(curl -s -o ./khf-front.html -w "%{http_code}" "$WP_URL/" 2>/dev/null)
[ "$CODE" = "200" ] && ok "front page HTTP 200" || bad "front page HTTP $CODE"
BODY=$(cat ./khf-front.html 2>/dev/null)
grep -qi "Kinzua Heritage Festival" <<<"$BODY" && ok "site title rendered" || bad "site title missing"
grep -qi "Cormorant Garamond" <<<"$BODY" && ok "self-hosted font enqueued" || bad "font not enqueued"
grep -qiE "#7a3b9e|seneca-purple|wp--preset--color--seneca" <<<"$BODY" && ok "Seneca wampum color applied" || bad "Seneca color missing"
grep -qiE "Made with.*by.*Creadev\.org" <<<"$BODY" && ok "footer credit present" || bad "footer credit missing"
echo "$BODY" | grep -qi "wp-site-blocks\|khf-site-header" && ok "theme layout classes present" || bad "layout classes missing"
if grep -qiE "fatal error|Uncaught (Exception|Error)|TypeError|Call to undefined" ./khf-php-srv.log 2>/dev/null; then bad "PHP fatal/error in server log"; else ok "no PHP fatals/errors in server log"; fi
kill "$(cat ./khf-php-srv.pid 2>/dev/null)" 2>/dev/null || true

# 8. summary
echo "----------------------------------------------------------------------------"
printf " \033[1mRESULTS: %d passed, %d failed\033[0m\n" "$PASS" "$FAIL"
echo "----------------------------------------------------------------------------"
if [ "$FAIL" -eq 0 ]; then
  echo "  ✅ Phase 0/1 — all acceptance checks passed."
  exit 0
else
  echo "  ❌ $FAIL check(s) failed."
  exit 1
fi
