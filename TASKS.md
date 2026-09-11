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
| 1.3 | Self-host fonts (Cormorant Garamond, Inter, Source Serif Pro `.woff2`) + `@font-face` in `blocks.css` | completed |
| 1.4 | Define custom block style variations (seneca-filled, wooded-outline, eagle-feather separator, wooded-section, wampum-strip) | completed |
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
| 3.1 | Create WXR at `content/khf-content.xml` (core blocks, no Elementor) | completed |
| 3.2 | Preserve media assets (logo, hero images, PDF) into `assets/images/` | completed |
| 3.3 | Finalize `blueprint.json` (install theme + import WXR, networking on, includes `runWpInstallationWizard`) | completed |
| 3.4 | Test in WordPress Playground (theme loads, content imports, <60s) | completed |
| 3.5 | Verify footer reads "Made with ♡ by Creadev.org" (link to creadev.org) | completed |
| 3.6 | Verify mobile-responsiveness + self-hosted font loading | completed |
| 3.7 | **Add actual curated content to WXR pages** (currently placeholder text: "Content managed via page-X block template") | pending |

## Phase 4 — Static Inner Pages
| ID | Task | Status |
|---|---|---|
| 4.1 | `templates/page-*.html` + parts for Workshops, Events, Venue, Contact, Privacy, Terms | completed |
| 4.2 | `parts/workshop-cta.html`, `events-grid.html`, `venue-cta.html`, `vendor-signup-form.html`, `contact-form.html` | completed |
| 4.3 | Create curated content for inner pages in WXR | pending |
| 4.4 | `page-contact.html` uses `contact-form.html` template part (PHP handler in `functions.php`) | completed |
| 4.5 | `page-vendor-signup.html` uses `vendor-signup-form.html` template part (PHP handler in `functions.php`) | completed |

## Phase 5 — Dynamic Features (Plugin-assisted)
| ID | Task | Status |
|---|---|---|
| 5.1 | Register CPTs (`workshop`, `event`) + taxonomies (`workshop_category`, `event_type`) in `functions.php` | completed |
| 5.2 | Create `templates/single-workshop.html` + `taxonomy-event-type.html` + `archive-workshop.html` + `single-event.html` | completed |
| 5.3 | **Workshop $45 registration form** — current: PayPal form in `single-workshop.html` (static HTML). Missing: slot-limited class selection, WP Simple Pay / WPForms integration, server-side slot enforcement per PRD §10.1 | in_progress |
| 5.4 | **Vendor signup + payment form** — current: basic email form in `vendor-signup-form.html`. Missing: payment integration (WP Simple Pay / Stripe), per PRD §9 | pending |
| 5.5 | **Consolidated events listing** — current: static content in `events-grid.html`. Missing: dynamic query of `event` CPT with `schema.org/Event` JSON-LD output per PRD §10.2 | pending |
| 5.6 | Venue rental page with photo gallery + inquiry form | completed (template exists, needs WXR content) |

## Phase 6 — SEO, Schema & Legal
| ID | Task | Status |
|---|---|---|
| 6.1 | Add OpenGraph / Twitter Card meta via `wp_head` | completed |
| 6.2 | Verify schema.org structured data (Organization, Event, WebSite, Breadcrumbs) | completed (Organization + Event on front page) |
| 6.3 | Generate sitemap + robots.txt | completed |
| 6.4 | Publish Privacy Policy + Terms pages | completed (templates + WXR content exist) |
| 6.5 | **Draft SEO brief** (tactical keyword targeting for heritage festival, Seneca events, PA venue rental) | pending |
| 6.6 | Verify schema.org/Event JSON-LD on single-event and events listing pages | pending |

## Phase 7 — Admin Management (from PRD §10)
| ID | Task | Status |
|---|---|---|
| 7.1 | **Workshop CPT admin columns**: Title, Category, Date, Time, Slots, Price, Instructor, Status | pending |
| 7.2 | **Workshop CPT meta box**: Date, Start Time, Duration, Max Slots, Filled Slots, Price, Instructor, Description | pending |
| 7.3 | **Workshop slot enforcement logic**: check `_khf_workshop_slots` vs `_khf_workshop_slots_filled` on registration | pending |
| 7.4 | **Event CPT admin columns**: Title, Event Type, Start Date, End Date, Venue, Featured | pending |
| 7.5 | **Event CPT meta box**: Start/End DateTime, All Day, Venue, Location, Featured Image, Registration URL | pending |
| 7.6 | **Venue/Spot CPT** (Phase 2 — not in scope for Phase 1) | pending |

## Phase 8 — Theme Cleanup, Modernization, Polish
| ID | Task | Status |
|---|---|---|
| 8.1 | Accessibility audit for older users (min 16px body text, WCAG AA contrast, focus indicators, reduced-motion) | pending |
| 8.2 | Typography hierarchy review (H1–H3 distinction, line-height, max-width consistency across templates) | pending |
| 8.3 | Color contrast validation across all templates, blocks, and pattern backgrounds | pending |
| 8.4 | Spacing consistency enforcement (`theme.json` padding/margin scales) | pending |
| 8.5 | Button/link sizing consistency (min 44×44px touch targets) | pending |
| 8.6 | Review and consolidate duplicate or unused CSS rules (`blocks.css`, template parts) | pending |
| 8.7 | Ensure consistent heading structure across all template parts and inner page templates | pending |
| 8.8 | Keyboard navigation and screen-reader form testing for all interactive forms | pending |
| 8.9 | Validate ARIA labels on navigation, forms, and interactive elements | pending |
| 8.10 | Final visual polish pass (alignment, overflow, responsive breakpoints, image aspect ratios) | pending |
| 8.11 | Cross-browser compatibility check (Chrome, Firefox, Safari, Edge) | pending |
| 8.12 | Performance audit (font loading strategy, unused assets, lazy-loading images) | pending |
| 8.13 | Code hygiene pass (remove debug code, clean up template parts) | pending |

## Phase 9 — Content Curation, SEO, Media Strategy, and Glossary
| ID | Task | Status |
|---|---|---|
| 9.1 | **Content audit & expansion** — Replace placeholder content in WXR with curated copy for all 8 pages; create 6–8 workshop CPT posts (blacksmithing, basket making, bead work, etc.) with dates, slots, instructors; populate `event` CPT with festival days, workshop days, venue blocks | pending |
| 9.2 | **Dynamic content migration** — Convert `artisans.html`, `schedule.html`, `vendor-cta.html` static content to dynamic CPT queries where appropriate; keep design intact | pending |
| 9.3 | **SEO meta implementation** — Add per-page `title`, `description`, `canonical` via `wp_head` in `functions.php`; verify all pages output correct tags | pending |
| 9.4 | **Schema.org structured data** — Implement Organization (site-wide), Event (festival/workshop/event pages), BreadcrumbList (inner pages), WebSite (homepage) JSON-LD; validate with Rich Results Test | pending |
| 9.5 | **OpenGraph / Twitter Card tags** — Add `og:`, `twitter:` meta for all page types (website, event, article); include `og:image` fallback to hero gradient | pending |
| 9.6 | **SEO brief & keyword map** — Document tactical keyword targeting (heritage festival PA, Seneca native events, crafts festival Russell PA, venue rental PA, workshop keywords) with page assignments | pending |
| 9.7 | **Media optimization & asset creation** — Generate WebP hero images + fallbacks; create favicon set (ICO, PNG, WebP, manifest); add `longhouse-silhouette.svg` pattern; optimize all SVGs; verify alt text conventions (informative vs decorative) | pending |
| 9.8 | **Glossary page & cultural context** — Create `page-glossary.html` template + WXR content with all defined terms (wampum, Seneca, Haudenosaunee, Tree of Peace, Longhouse, eagle feather, basketry, woodworking); add footer widget "About This Festival" with 3–4 key terms linking to glossary; implement CSS-only tooltips on first-use terms | pending |
| 9.9 | **Content prioritization & fallback verification** — Verify critical CSS inlining, hero gradient fallback, system font stack fallback, SVG inline patterns, forms work without JS; test low-bandwidth simulation | pending |
| 9.10 | **Full content QA pass** — Tone consistency check (rustic, welcoming, bazaar-like); cultural sensitivity review (respectful framing, no stereotypes, attribution links to sni.org/senecamuseum.org); verify all CTAs flow correctly (hero → about → artisans → schedule → visit → CTAs) | pending |

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
- [x] Fonts (Cormorant Garamond, Inter, Source Serif Pro) load in Playground
- [x] Footer reads "Made with ♡ by Creadev.org"
- [x] Site logo set (inline SVG in header template part, no attachment dependency)
- [ ] Workshop $45 registration flow with slot-limited class selection
- [ ] Events listing with `schema.org/Event` JSON-LD (dynamic from CPT)
- [x] Venue rental page + inquiry form
- [x] Privacy Policy + Terms pages
- [x] OpenGraph + Twitter Card meta present
- [ ] Workshop CPT with slot-limited class selection (admin meta boxes + enforcement)
- [x] Sitemap + robots.txt generated

(End of file)