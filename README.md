# khf-wp — Kinzua Heritage Festival WordPress Theme

A native WordPress block theme for the Kinzua Heritage Festival (Russell, PA), designed to be loaded directly into **WordPress Playground**. The theme reflects the festival's rustic heritage & artisan craft, with respectful Seneca Nation (Haudenosaunee) design elements.

> See [PRD.md](./PRD.md) for the full product requirements and design specification.

## What the Site Includes
- **Festival homepage** — hero (dates/hours/admission), mission, artisans, music, schedule, location/contact, vendor CTA (PDF + signup form), charity auction beneficiary
- **Workshop Days** — $45 registration, pick 2 classes, free lunch; limited-slot enforcement with online payment
- **Events listing** — consolidated with `schema.org/Event` JSON-LD for SEO
- **Venue Rental** — grounds for weddings/reunions, with inquiry form
- **Vendor Registration** — online signup form ($25/day or $75/weekend) with admin notification email; Phase 2 adds site-reservation map
- **Contact, Privacy Policy, Terms** pages
- **SEO** — schema.org, OpenGraph/Twitter meta tags, sitemap, robots.txt

## About the Festival
The Kinzua Heritage Festival is a family-oriented, non-profit event in Russell, PA, "striving to keep the past alive" through the crafts, arts, and music of days gone by. Set in a wooded glen, it features artisans (weavers, blacksmiths, potters, leather workers, jewelers, bow makers), live music (Country Gospel, Bluegrass, Native music, classic covers), storytelling, and a charity auction.

## Quick Start: Launch in WordPress Playground

### Option A — GitHub URL (one-click)
```
https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/dhaupin/khf-wp/main/blueprint.json
```
> Uses the Blueprint URL method for full theme + content import. Requires the repo to be **public**.

### Option B — GitHub URL Import (Web UI)
1. Open [WordPress Playground](https://playground.wordpress.net/).
2. Click **"New"** → **"From GitHub"**.
3. Enter `dhaupin/khf-wp` and import as **wp-content directory** with path `/`.

### Option C — Local Development
```bash
git clone https://github.com/dhaupin/khf-wp.git
cd khf-wp

# Run acceptance tests (27/27 checks)
SKIP_DEPS=1 ./scripts/wordpress-test.sh
```

## Theme Structure
```
khf-wp/
├── PRD.md                  # Product requirements document (the plan)
├── README.md               # This file
├── AGENTS.md               # Agent / contributor guidelines
├── TASKS.md                # Development task checklist
├── blueprint.json          # WordPress Playground launch blueprint
├── content/
│   └── khf-content.xml     # Curated WXR content for import
├── khf-theme.zip           # Theme package for Playground zip import
├── themes/
│   └── khf/                # The WordPress block theme
│       ├── style.css
│       ├── functions.php
│       ├── theme.json
│       ├── screenshot.png
│       ├── templates/      # Block templates
│       ├── parts/           # Template parts
│       └── assets/
│           ├── fonts/       # Self-hosted .woff2 fonts
│           ├── css/
│           ├── js/
│           └── images/
└── scripts/
    └── wordpress-test.sh   # Acceptance test suite
└── sitemap.xml             # Static sitemap
└── robots.txt              # Static robots.txt
```

## Design System

### Colors
| Variable | Hex | Meaning |
|---|---|---|
| Seneca Purple (Wampum) | `#7a3b9e` | Sacred wampum shell color; "color of the Iroquois" |
| Wampum White | `#ffffff` | Peace, purity |
| Bark Brown | `#4a3a2a` | Wooded glen, bark |
| Forest Green | `#2d5a33` | Pennsylvania woods |
| Sunset Gold | `#d4af37` | Craftsmanship, harvest |
| Sky Blue | `#8ed1fc` | Festival grounds sky |

All tokens are defined in `themes/khf/theme.json`.

## Development Commands

### Acceptance Tests
```bash
SKIP_DEPS=1 ./scripts/wordpress-test.sh
```
Validates: PHP lint, JSON/XML schema, WordPress live rendering (HTTP 200), CPT/taxonomy registration, self-hosted fonts, Seneca color usage, footer credit, layout classes, no PHP errors.

### Manual Checks
```bash
php -l themes/khf/functions.php          # PHP syntax
node -c themes/khf/assets/js/mobile-menu.js  # JS syntax
python3 -c 'import json; json.load(open("themes/khf/theme.json"))'  # JSON valid
```

### Future Tooling
- `npm run build` — package theme zip for Playground
- `npm test` — lint / validate
- Lint: `ruff` (Python), CSS/JS linting (if configured)

## Credits
- Maintained by [Creadev.org](https://creadev.org) — NW Pennsylvania web development & IT services
- Design inspiration: Seneca Nation of Indians (`sni.org`), Seneca-Iroquois National Museum
- Built with ♡ for the Kinzua Heritage Festival community.
