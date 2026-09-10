# TASKS.md — Development Task Checklist

Status legend: `pending` | `in_progress` | `completed` | `blocked`

Task IDs map to phases in `PRD.md`. Phase 0 = Foundation (docs) — completed.

## Phase 0 — Foundation (docs)
| ID | Task | Status |
|---|---|---|
| 0.1 | Create repo file structure + commit docs | completed |
| 0.2 | Write `PRD.md` — requirements & design spec | completed |
| 0.3 | Write `README.md` — quick-start & overview | completed |
| 0.4 | Write `AGENTS.md` — contributor & AI agent guidelines | completed |
| 0.5 | Write `TASKS.md` — this checklist | completed |
| 0.6 | Create `themes/khf/style.css` (theme headers only) | completed |
| 0.7 | Create `themes/khf/functions.php` (skeleton) | completed |
| 0.8 | Create `themes/khf/theme.json` (skeleton) + `blueprint.json` at repo root | completed |

## Phase 1 — Heritage Design System
| ID | Task | Status |
|---|---|---|
| 1.1 | Finalize `theme.json` color palette (seneca-purple, wampum-white, bark-brown, forest-green, sunset-gold, sky-blue), typography, spacing, gradients | completed |
| 1.2 | Create Seneca SVG patterns (wampum-border, tree-of-peace-divider, eagle-feather, sky-world-arch) in `assets/images/patterns/` | completed |
| 1.3 | Self-host fonts (Cormorant Garamond, Inter `.woff2`) + `@font-face` in `blocks.css` | completed |
| 1.4 | Define custom block style variations (seneca-filled, wooded-outline, eagle-feather separator) | completed |
| 1.5 | Register custom block patterns (wampum-divider, seneca-hero, vendor-grid) in `functions.php` | completed |
| 1.6 | Create `assets/css/blocks.css` + `editor.css` for pattern/layout CSS | completed |

## Phase 2 — Core Templates & Homepage
| ID | Task | Status |
|---|---|---|
| 2.1 | `parts/header.html` — logo + Seneca purple accent nav | completed |
| 2.2 | `parts/footer.html` — contact, social, admission, Creadev.org credit, pattern border | completed |
| 2.3 | `parts/hero.html` — dates, tagline, CTA buttons | completed |
| 2.4 | `parts/about.html` — mission + "ARTS, MUSIC & MORE" | completed |
| 2.5 | `parts/artisans.html` — artisan categories | completed |
| 2.6 | `parts/schedule.html` — stages, hourly shows, charity auction | completed |
| 2.7 | `parts/visit.html` — location map, contact, admission pricing | completed |
| 2.8 | `parts/vendor-cta.html` — PDF download + signup form CTA | completed |
| 2.9 | `parts/donate-auction.html` — beneficiary statement (DAV, Faith Keepers) | completed |
| 2.10 | `templates/front-page.html` — compose all parts | completed |
| 2.11 | `templates/page.html`, `single.html`, `index.html`, `archive.html` (fallbacks) | completed |
| 2.12 | `screenshot.png` (580×460) | completed |

## Phase 3 — Content & Playground Blueprint
| ID | Task | Status |
|---|---|---|
| 3.1 | Create curated WXR at `content/khf-content.xml` (core blocks, no Elementor) | completed |
| 3.2 | Preserve media assets (logo, hero images, PDF) into `assets/images/` | completed |
| 3.3 | Finalize `blueprint.json` (install theme + import WXR, networking on) | completed |
| 3.4 | Test in WordPress Playground (theme loads, content imports, <60s) | completed |
| 3.5 | Verify footer reads "Made with ♡ by Creadev.org" (link to creadev.org) | completed |
| 3.6 | Verify mobile-responsiveness + self-hosted font loading | completed |

## Phase 4 — Static Inner Pages
| ID | Task | Status |
|---|---|---|
| 4.1 | `templates/page-*.html` + parts for Workshops, Events, Venue, Contact, Privacy, Terms | completed |
| 4.2 | `parts/workshop-cta.html`, `events-grid.html`, `venue-cta.html` | completed |
| 4.3 | Create curated content for inner pages in WXR | completed |

## Phase 5 — Dynamic Features (Plugin-assisted)
| ID | Task | Status |
|---|---|---|
| 5.1 | Register CPTs (`workshop`, `event`) + taxonomies in `functions.php` | completed |
| 5.2 | Create `templates/single-workshop.html` + `taxonomy-event-type.html` | completed |
| 5.3 | Integrate form + payment (WP Simple Pay / WPForms) for workshop $45 checkout (2-class pick, slot limit) | completed |
| 5.4 | Integrate vendor signup + payment form (Phase 1 basic) | completed |
| 5.5 | Consolidated events listing with `schema.org/Event` JSON-LD output | completed |

## Phase 6 — SEO, Schema & Legal
| ID | Task | Status |
|---|---|---|
| 6.1 | Add OpenGraph / Twitter Card meta via `wp_head` | completed |
| 6.2 | Verify schema.org structured data (Organization, Event, WebSite, Breadcrumbs) | completed |
| 6.3 | Generate sitemap + robots.txt | completed |
| 6.4 | Publish Privacy Policy + Terms pages | completed |
| 6.5 | Draft SEO brief (tactical keyword targeting) | completed |

## Phase 7 — Polish & Launch
| ID | Task | Status |
|---|---|---|
| 7.1 | Full acceptance check vs PRD §11 criteria | completed |
| 7.2 | End-to-end Playground test (theme + all content + forms) | completed |
| 7.3 | Finalize README build/test commands | completed |
| 7.4 | Tag release; prep handoff to Creadev.org | pending |

## Validation / Acceptance Criteria
- [x] Theme activates in WP with no PHP errors (verified live WP 7.1, HTTP 200)
- [x] Seneca purple (`#7a3b9e`) appears on links/buttons/borders
- [x] ≥4 Seneca-inspired SVGs in `assets/images/patterns/`
- [x] Front page contains all content sections (hero, mission, artisans, schedule, visit, vendor CTA, auction)
- [x] Vendor PDF link + signup form CTA present
- [x] Mobile-responsive (≤782px)
- [x] No Elementor runtime dependency
- [x] No Google Fonts runtime dependency (self-hosted only)
- [x] Blueprint imports content into Playground (WXR + importWxr step, networking on)
- [x] Fonts (Cormorant Garamond, Inter) load in Playground
- [x] Footer reads "Made with ♡ by Creadev.org"
- [x] Site logo set (inline SVG in header template part, no attachment dependency)
- [x] Workshop $45 registration flow present (form + payment)
- [x] Events listing with `schema.org/Event` JSON-LD
- [x] Venue rental page + inquiry form
- [x] Privacy Policy + Terms pages
- [x] OpenGraph + Twitter Card meta present
- [x] Workshop CPT with slot-limited class selection
- [x] Sitemap + robots.txt generated
