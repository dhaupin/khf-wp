# Product Requirements Document (PRD)
# Kinzua Heritage Festival — WordPress Theme Redesign

## 1. Executive Summary

The Kinzua Heritage Festival is a family-oriented, non-profit event in Russell, PA, dedicated to "keeping the past alive" through the crafts, arts, and music of days gone by. The festival takes place in a wooded glen and features artisans (weavers, blacksmiths, potters, leather workers, jewelers, bow makers), live music (Country Gospel, Bluegrass, Native music, classic covers), storytelling, and a charity auction.

The current site (`kinzuaheritage.org`) runs on a premium "alone" WordPress theme with an `alone-child` child theme, built with **Elementor** as a single-page scroll design. The site is now being transitioned to **Creadev.org** (NW PA web development agency). The goal of this project is to replace that with a modern, native **WordPress block theme** that can be deployed into **WordPress Playground**, pulling in the existing content via a Blueprint, and adding new functionality: workshop registration, event listings, venue rental, and form-based sign-ups with online payments.

The new theme must visually express:
- **Rustic heritage & artisan craft** — wooded atmosphere, earth tones, handcrafted textures
- **Native American (Seneca Nation) design** — Seneca purple highlights, wampum-inspired patterns, Haudenosaunee glyphs/symbols (Tree of Peace, Eagle, Longhouse, Circle), respectfully and authentically integrated

---

## 2. Background & Research

### 2.1 What Is the Kinzua Heritage Festival?

| Attribute | Detail |
|---|---|
| **Location** | 4047 Fox Hill Road, Russell, PA — set in a "wooded glen" |
| **Organizer type** | Family-oriented non-profit |
| **Mission** | "Striving to keep the past alive" through crafts, arts, and music of days gone by |
| **Next event** | August 21st–23rd, 2026 (22nd Annual) |
| **Hours** | Fri/Sat: 11am–7pm, Sun: 11am–5pm |
| **Admission** | $5.00 adults; children 10 & under free |
| **Contact** | (814) 688-2345 / (814) 688-2348 / (814) 790-8974; kinzuaheritage@gmail.com |
| **Charitable impact** | 100% of last year's auction proceeds went to DAV Post 175 and Faith Keepers School |
| **Social** | Facebook: `KinzuaHeritageFestival` |
| **Vendor app** | `KHF-App-2026-2.pdf` (application PDF) |

**Core content buckets observed on the live site:**
1. Hero / event date & call-to-action (Get Involved, Visit Kinzua)
2. "What Is The Kinzua Heritage Festival" — mission statement
3. "ARTS, MUSIC & MORE" — artisan/vendor descriptions (weavers, blacksmiths, potters, leather workers, jewelers, bow makers)
4. Music — bands like Spirit Wing, Wind River, Earth Angel, Blue Mule (Country Gospel to Bluegrass to Native music)
5. "The Festival" — schedule overview (two stages, hourly performances/storytelling, 2pm daily charity auction)
6. "Come Experience Kinzua" — location map, contact info, admission
7. Vendor call-to-action — download vendor application + new **vendor signup form** with online payment
8. Charity auction beneficiary statement
9. Footer — social links, copyright ("Made with ♥ by [Creadev.org](https://creadev.org)")

#### New Content Sections to Add

| New Section | Purpose | WordPress Approach |
|---|---|---|
| **Workshops** | One-day skill classes ($45, pick 2, free lunch, materials provided) — blacksmithing, wire weaving/wrapping, traditional basket making, bead work, gardening, plants/herbs | Page + custom registration form (WPForms/Formidable) with slot-limited payment flow (WP Simple Pay / Stripe) |
| **Events** | Listing of festival dates + workshop dates + venue rentals | Posts with Event CPT or Events calendar plugin; `schema.org/Event` markup |
| **Venue Rental** | The grounds (4047 Fox Hill Road, Russell PA) rentable for weddings, reunions, other events | Dedicated page with photo gallery + inquiry form |
| **Vendor Registration Form** | Online vendor signup with ability to pay the fee and eventually reserve a mapped site spot | Form + payment gateway; reservation system (Phase 2) |
| **Contact Form** | General inquiries | Page with form block or shortcode |
| **Privacy Policy & Terms** | Legal compliance | Static pages (WP-generated / standalone) |

### 2.2 Current Site Technology Stack

Extracted from live site source analysis:

| Component | Value |
|---|---|
| **CMS** | WordPress |
| **Theme** | `alone` (premium multi-purpose theme) |
| **Child theme** | `alone-child` |
| **Page builder** | Elementor (Frontend Editor v4.2.3) |
| **Layout** | Single-page scroll, full-width Elementor template |
| **Plugins** | Elementor, photo-gallery, alone-addons, bearsthemes-addons, Yoast SEO |
| **Generator** | Previously "Made with ♥ by Xplicit Tech Solutions" — now maintained by **Creadev.org** ([https://creadev.org](https://creadev.org)) |
| **Key assets** | Logo (`kinzuaheritage-1v2.png`), two hero images (`kinzuaheritage-2.png`, `kinzuaheritage-3.png`), Facebook feed embed, vendor application PDF |

The current build is entirely Elementor-driven with custom CSS/JS from the `alone` theme framework. Moving to a **native block theme** eliminates the Elementor dependency, reduces bloat, and is the recommended path for WordPress Playground compatibility.

### 2.3 Seneca Nation Design Language

The Kinzua Heritage Festival is in **Russell, PA**, which is in the traditional territory of the **Seneca Nation** (one of the original Six Nations of the Haudenosaunee/Iroquois Confederacy). In 2023, the festival added a dedicated Seneca/Native focus, and the 2026 event includes Native music (e.g., Spirit Wing) and Native cultural elements. The design must honor this connection.

#### Cultural Research Sources
- Seneca Nation of Indians official (`sni.org`)
- Seneca-Iroquois National Museum (`senecamuseum.org`) — "Follow the 7 colors" cultural guide
- Haudenosaunee Confederacy materials

#### Key Design Elements & Symbolism

**Colors (Primary Heritage Palette):**

| Color | Hex | Meaning |
|---|---|---|
| Seneca Purple (Wampum) | `#7a3b9e` | "The color of the Iroquois" — derived from quahog clam shells used in sacred wampum belts |
| Wampum White | `#ffffff` | Whelk shell beads — peace, purity, the positive path |
| Bark Brown | `#4a3a2a` | Wooded glen, tree bark, handcrafted earth |
| Forest Green | `#2d5a33` | Pennsylvania woods, growth, the land itself |
| Sunset Gold | `#d4af37` | Craftsmanship (metalwork, harvest), dawn over the glen |
| Sky Blue | `#8ed1fc` | Morning sky over the festival grounds |

> **Cultural note:** Purple and white are the two colors of wampum, the sacred shell bead currency and record-keeping medium of the Haudenosaunee. The purple lines on wampum belts represent the canoe (Haudenosaunee) and the ship (European) traveling side by side — "Two Row Wampum" — a foundational treaty principle of peaceful coexistence. Using purple as an accent color is culturally meaningful here, not merely decorative.

**Symbols & Glyphs (to be represented as SVG patterns):**

| Symbol | Cultural Meaning |
|---|---|
| Tree of Peace (Eastern White Pine) | Uniting the nations; the Great Law of Peace; roots spread in 4 directions |
| Eagle | Messenger to the Creator; protector; sits atop the Tree of Peace |
| Longhouse | Traditional dwelling; symbol of the territory where all families live as one |
| Circle / Medicine Wheel | Unity, the cycles of life, strength in togetherness |
| Arrows (cluster) | Strength through unity — "if the nations joined together they could not be broken" |
| Sky World (semi-dome / arches) | Origin story — Sky Woman fell onto Turtle's back |
| Wampum belt patterns | Geometric purple-on-white designs recording stories and laws |

**Patterns:** The Haudenosaunee wampum belt tradition uses geometric, repeating patterns of interlocked purple and white "beads." These translate into **repeating border patterns** and **background motifs** for the theme — used subtly in section dividers, button backgrounds, or decorative accents. Traditional Seneca beadwork also features flowing floral/geometric patterns.

**Typography Considerations:**
- **Headings / Display:** A serif font with hand-crafted warmth (e.g., *Cormorant Garamond* or *Playfair Display*) evokes heritage printing and old-world craft
- **Body:** A clean, highly readable sans-serif (e.g., *Inter* or *Source Sans 3*) for accessibility and modern clarity
- **Accent / Glyph labels:** Seneca language characters or Latin serif for cultural authenticity

**Cultural Appropriation Safeguard:** All Seneca/Haudenosaunee visual elements are to be used as **respectful references** inspired by publicly documented cultural symbols — not as direct reproductions of sacred or protected wampum belt designs (which are living legal/ethical documents). SVG patterns should be original compositions inspired by the geometric styles, not copies of specific existing belts.

---

## 3. Goals & Objectives

### Primary Goals
1. **Build a native WordPress block theme** (no page-builder dependency) that replaces the Elementor/`alone` setup.
2. **Enable one-click loading in WordPress Playground** via a Blueprint that imports existing content.
3. **Visually express the festival's rustic heritage + Seneca artistic heritage** through an authentic, respectful design system.
4. **Maintain all critical content and messaging** from the current site (hero, mission, artisans, music, schedule, location, vendor CTA).
5. **Add workshop registration** — a sign-up flow where users pay $45, choose 2 of N classes, and get a free lunch; with limited-slot enforcement and admin-managed class roster.
6. **Add vendor registration** — online vendor signup form with payment; Phase 2 adds a site-reservation/map system.
7. **Add an Events system** — consolidated listing of festival dates, workshop days, and venue rentals, with `schema.org/Event` structured data for SEO.
8. **Add a Venue Rental page** — grounds available for weddings/reunions, with inquiry form.
9. **Implement SEO throughout** — schema.org structured data, OpenGraph/Twitter Card meta tags, and tactical keyword targeting for heritage festivals, Seneca/Native events, and PA venue rentals.
10. **Add Privacy Policy and Terms of Use pages.**

### Measurable Success Criteria
- Theme activates cleanly in WordPress Playground with no PHP errors
- Blueprint loads and renders a styled homepage in <60 seconds
- All content sections from the current site (hero, mission, artisans, music, schedule, location, vendor CTA) are represented
- Seneca purple accents appear consistently across interactive elements (links, buttons, decorative borders)
- Seneca-inspired patterns/glyphs appear as SVGs in at least 3 theme locations (e.g., hero divider, footer pattern, section accent)
- Mobile-responsive: site passes basic viewport/layou checks on simulated mobile
- Theme uses modern WordPress standards: `theme.json`, block templates, supports `alignments`, `custom-spacing`, etc.
- No Elementor dependency at runtime
- Workshop registration flow works: form → slot check → $45 payment → confirmation
- Vendor registration form with online payment is functional
- Events are listed in a consolidated page with `schema.org/Event` JSON-LD output
- SEO: `og:` and `schema.org` markup present; `robots.txt`/`sitemap` generated (Yoast/standalone)
- Privacy Policy and Terms pages render

### Non-Goals (Phase 1)
- Converting/retaining the Elementor `page_id=20645` raw shortcode content — this will be manually re-created as clean core blocks
- Replacing the live `kinzuaheritage.org` server deployment (this repo's deliverable is the theme; live migration is a separate ops task)
- Native app or offline capabilities
- Multi-language / translation (though Seneca language labels could be a stretch goal)
- **Vendor site-reservation map system** — this is the advanced Phase 2 feature (paying to reserve a numbered/vendor-mapped site on the grounds). Phase 1 delivers the basic signup+payment form; Phase 2 adds the interactive campsite-style reservation grid tied to a map layout.

---

## 4. User Personas & Stories

### Personas
| Persona | Description | Primary Need |
|---|---|---|
| **Festival Visitor** (Sarah, 35) | Family parent, wants to know dates, location, cost, and what to expect | Clear event info + directions |
| **Potential Vendor** (Mike, 48) | Artisan interested in applying | Easy access to vendor application + festival mission |
| **Community Member** (Elder, Seneca) | Local Indigenous person | Respectful, authentic representation of Seneca culture |
| **Site Maintainer** (Nonprofit staff) | Updates dates/applications yearly | Easy content management in WordPress |
| **Developer / Collaborator** | Wants to run locally via Playground | Instant preview + content import |

### User Stories
1. As a **visitor**, I can read the festival dates, hours, and admission price from the homepage hero.
2. As a **vendor**, I can download the vendor application PDF in one click.
3. As a **visitor**, I understand what types of artisans and music to expect.
4. As a **visitor**, I can find the location, map link, phone number, and email contact.
5. As a **community member**, I see Seneca artistic elements (purple, patterns, symbols) respectfully integrated — not stereotyped.
11. As a **maintainer**, I can update text, images, and dates via the WordPress block editor without Elementor.
6. As a **maintainer**, I can update text, images, and dates via the WordPress block editor without Elementor.
7. As a **developer**, I can launch a fully-styled site with content in WordPress Playground in under one minute.
8. As a **vendor**, I can sign up online and pay the registration fee (with future ability to reserve a mapped site).
9. As a **workshop attendee**, I can register for a workshop day, select 2 classes from limited slots, pay $45, and receive a free lunch.
10. As an **event-goer**, I can browse all upcoming events (festival dates, workshop days) in one place, with search-engine-friendly markup.
11. As a **venue seeker**, I can learn the grounds are available for rent (weddings, reunions) and inquire via a form.
12. As a **site owner**, I have schema.org structured data and OpenGraph tags so content is picked up by events crawlers and shared correctly on social.

---

## 5. Content Inventory & Mapping

The current site is a **single-page Elementor build** (page ID 20645). The following content must be preserved and mapped to block templates:

| Current Section | WordPress Content Type | New Block Theme Template/Page |
|---|---|---|
| Hero with event dates, "Get Involved" / "Visit Kinzua" buttons | Custom HTML block in Elementor | Front page hero section (`front-page.html`) |
| Festival logo + "Striving to keep the past alive" tagline | Elementor image + heading widgets | Site header / site-branding |
| "What Is The Kinzua Heritage Festival" (mission) | Elementor text widget | Page block (About section) |
| "ARTS, MUSIC & MORE" (artisan list) | Elementor text widget | Page block (Vendors section) |
| "The Festival" (schedule, stages, auction) | Elementor text widget | Page block (Schedule section) |
| "Come Experience Kinzua" (map, contact) | Elementor Google Maps + text widgets | Page block (Visit section) |
| Admission pricing ($5 adults) | Elementor text | Page block (Visit section) |
| Vendor CTA + download PDF | Elementor button linking to PDF | Page block (Vendor section) |
| Charity auction beneficiary statement | Elementor text | Page block (Mission/Support section) |
| Facebook link | Elementor social icon | Site footer / social nav |
| Copyright "Made with ♥ by Xplicit Tech Solutions" | Elementor text | Site footer |

### Media Assets (to be fetched/preserved)
- Logo: `kinzuaheritage-1v2.png`
- Hero image 1: `kinzuaheritage-3.png`
- Hero image 2: `kinzuaheritage-2.png`
- Facebook feed image: `327280911_667172738530830_5433546620463167177_n.png`
- Vendor application PDF: `KHF-App-2026-2.pdf`

### Content Import Approach
Since the current site is an Elementor single-page build (not a standard post/page hierarchy), a direct WXR export will capture the single page with Elementor-encoded content. The new theme **does not use Elementor**, so the plan is:

1. **Export existing content** from the live site as a WXR file (via Tools → Export, or `wp export`).
2. **Manually restructure** the single-page content into native WordPress blocks/pages during the redesign — the WXR is a fallback/reference.
3. **Provide a curated WXR** in the repo that contains pre-structured content using core WordPress blocks, ready for the new theme. This ensures the Playground import works cleanly without Elementor.
4. **Use a Blueprint** (`blueprint.json`) with `importWxr` that points to the curated WXR, with `fetchAttachments: true` and `rewriteUrls: true`.

---

## 6. Design System Specification

### 6.1 theme.json Tokens

The theme will define all design tokens in `theme.json` under `settings.color.palette`, `settings.typography.fontSizes`, and `settings.spacing.customPadding`.

**Color Palette (Custom):**
```json
{
  "slug": "seneca-purple",
  "color": "#7a3b9e",
  "name": "Seneca Purple (Wampum)"
}
```
Palette entries:
| Slug | Name | Hex |
|---|---|---|
| `seneca-purple` | Seneca Purple (Wampum) | `#7a3b9e` |
| `wampum-white` | Wampum White | `#ffffff` |
| `bark-brown` | Bark Brown | `#4a3a2a` |
| `forest-green` | Forest Green | `#2d5a33` |
| `sunset-gold` | Sunset Gold | `#d4af37` |
| `sky-blue` | Sky Blue | `#8ed1fc` |

**Gradients (for hero/section backgrounds):**
- `wooded-glen`: `linear-gradient(160deg, #2d5a33 0%, #4a3a2a 100%)`
- `wampum-sunset`: `linear-gradient(135deg, #7a3b9e 0%, #d4af37 50%, #4a3a2a 100%)`

**Font Sizes:**
| Name | Size |
|---|---|
| `huge` | 4rem (hero headline) |
| `large` | 2.5rem (section headings) |
| `medium` | 1.5rem (subheadings) |
| `regular` | 1.125rem (body large) |
| `small` | 0.875rem (body) |
| `tiny` | 0.75rem (fine print / captions) |

**Font Families:**
- **`display`**: `'Cormorant Garamond', serif` — heritage warmth
- **`body`**: `'Inter', sans-serif` — modern readability
- **`glyph` / `mono`**: `'Source Serif Pro', serif` — for symbol labels

**Background Patterns:**
- `wampum-border`: A repeating SVG strip — interlocking purple/white geometric "bead" pattern (top/bottom borders for sections)
- `tree-of-peace-divider`: A subtle repeating divider element featuring a simplified Tree of Peace / longhouse silhouette
- `eagle-feather-accent`: Small SVG used as bullet/list-style markers and button decorations

### 6.2 Layout Grid
- 12-column standard layout
- Max content width: 1200px
- Mobile breakpoint: 782px (WordPress default)
- Generous vertical rhythm: 4–6rem section padding on desktop, 2.5rem on mobile

### 6.3 Core Block Styling Targets
- **Buttons**: `is-style-seneca-filled` (purple bg, white text, gold hover border), `is-style-wooded-outline` (brown border, transparent fill)
- **Headings**: `.wp-block-heading` — display font for h1/h2, serif for h3+
- **Cover / Group**: Full-bleed sections with gradient overlays
- **Navigation**: Sticky header with Seneca purple accent bar

---

## 7. Theme Architecture

### 7.1 Technology Decisions

| Decision | Choice | Rationale |
|---|---|---|
| Theme type | **Block theme** (Full Site Editing) | Modern, lightweight, Playground-native, no page-builder dependency |
| Minimum WP | 7.0+ | `theme.json` v3 (fontFace, element presets, name/title/area templateParts), style variations |
| CSS | `style.css` (theme headers only) + `theme.json` + `assets/css/editor.css` | Block theme best practices |
| JS | Minimal — vanilla, for any interactive (mobile menu) | Keep Playground loading fast |
| Fonts | Load via `@font-face` from `assets/fonts/` (self-hosted) | No external Google Fonts dependency in Playground |

### 7.2 File Structure

```
khf-wp/
├── blueprint.json              # WP Playground launch blueprint (repo root)
├── content/
│   └── khf-content.xml         # Curated WXR for Playground import
├── themes/
│   └── khf/                    # The WordPress block theme
│       ├── style.css           # Theme headers only
│       ├── functions.php       # Theme setup, enqueues, pattern/style registration
│       ├── theme.json          # Design tokens, block defaults, custom spacing
│       ├── screenshot.png      # 580x460 theme preview
│       ├── templates/          # Block templates
│       │   ├── index.html      # Fallback
│       │       ├── front-page.html   # Hero + homepage sections
│       │       ├── page.html         # Standard page (About, Venue, Privacy, Terms)
│       │       ├── single.html
│       │       ├── archive.html
│       │       ├── single-workshop.html   # Workshop registration page
│       │       └── taxonomy-event-type.html
│       ├── parts/              # Template parts
│       │       ├── header.html          # Logo + nav (with Seneca purple accent)
│       │       ├── footer.html          # Contact, social, copyright (Creadev.org)
│       │       ├── hero.html            # Festival dates + CTA
│       │       ├── about.html           # Mission
│       │       ├── artisans.html        # ARTS, MUSIC & MORE
│       │       ├── schedule.html        # Stages, hourly shows, auction
│       │       ├── visit.html           # Location, map, contact, admission
│       │       ├── vendor-cta.html      # Vendor app PDF + signup form
│       │       ├── workshop-cta.html    # Workshop signup + $45 payment
│       │       ├── donate-auction.html  # Charity auction beneficiary
│       │       ├── events-grid.html     # Events listing
│       │       └── venue-cta.html       # Grounds rental inquiry
│       └── assets/
│           ├── fonts/            # Cormorant Garamond, Inter (.woff2, self-hosted)
│           ├── css/
│           │   ├── editor.css    # Editor-only styles
│           │   └── blocks.css    # Custom block styles + pattern CSS + @font-face
│           ├── images/
│           │   ├── logo.svg
│           │   └── patterns/     # Seneca SVG patterns/glyphs
│           │       ├── wampum-border.svg
│           │       ├── tree-of-peace-divider.svg
│           │       ├── eagle-feather.svg
│           │       └── sky-world-arch.svg
│           └── js/
│               └── mobile-menu.js
└── ...
```

### 7.3 Template Parts Strategy

The current site is single-page. The redesigned theme will use **one front-page template** composed of modular template parts (`parts/*.html`). Each content section ("About," "Vendors," "Schedule," "Visit," etc.) is a separate template part so content editors can reorder/disable them. This mirrors the page-builder section approach but uses native WordPress.

### 7.4 Patterns & Block Styles

Register custom block patterns in `functions.php`:
- `"khf/wampum-divider"` — a horizontal band with the interlocking bead pattern
- `"khf/seneca-hero"` — hero with Tree-of-Peace SVG watermark overlay
- `"khf/vendor-grid"` — card grid for artisan categories

Register block style variations:
- Buttons: `seneca-filled`, `wooded-outline`
- Groups: `wooded-section`, `wampum-strip`
- Separators: `eagle-feather`

---

## 8. Content Import Strategy (WordPress Playground)

### 8.1 Overview
WordPress Playground allows bundling a **Blueprint** (`blueprint.json`) alongside a theme. When loaded, the Blueprint can install the theme and import content from a WXR file, producing a fully-rendered site instantly in the browser.

### 8.2 Blueprint Configuration

**File:** `blueprint.json`

```json
{
  "$schema": "https://playground.wordpress.net/blueprint-schema.json",
  "description": "Kinzua Heritage Festival — block theme for the Kinzua Heritage Festival (Russell, PA). Rustic heritage + Seneca Nation design.",
  "landingPage": "/",
  "preferredVersions": {
    "php": "8.3",
    "wp": "latest"
  },
  "login": true,
  "features": {
    "networking": true
  },
  "siteOptions": {
    "blogname": "Kinzua Heritage Festival",
    "blogdescription": "Striving to keep the past alive!",
    "timezone_string": "America/New_York",
    "gmt_offset": "-5"
  },
  "steps": [
    {
      "step": "runWpInstallationWizard",
      "options": {
        "adminUsername": "admin",
        "adminPassword": "password"
      }
    },
    {
      "step": "installTheme",
      "themeData": {
        "resource": "bundled",
        "path": "khf-theme.zip"
      },
      "options": {
        "activate": true,
        "targetFolderName": "khf"
      }
    },
    {
      "step": "importWxr",
      "file": {
        "resource": "bundled",
        "path": "content/khf-content.xml"
      },
      "fetchAttachments": false,
      "rewriteUrls": true,
      "importComments": false,
      "authorsMode": "default-author",
      "defaultAuthorUsername": "admin"
    },
    {
      "step": "runPHP",
      "code": "<?php require_once '/wordpress/wp-load.php'; flush_rewrite_rules();"
    },
    {
      "step": "setSiteOptions",
      "options": {
        "show_on_front": "page",
        "page_on_front": "7",
        "posts_page": "0"
      }
    }
  ]
}
```

> **Note:** The `runWpInstallationWizard` step is critical — it initializes the WordPress database tables before the WXR import runs. Without it, the import silently fails because `wp_options` table does not exist yet. The `runPHP` step must include `require_once '/wordpress/wp-load.php'` to load the WordPress environment before calling `flush_rewrite_rules()`.

### 8.3 Content Preparation Steps
1. **Draft curated WXR** (`content/khf-content.xml`) containing:
   - The front-page post rendered with **core blocks** (not Elementor shortcodes)
   - All media attachments referenced (logos, images, PDF)
   - Site options (title, tagline)
2. **Option A — Self-contained bundle:** Place `blueprint.json` + WXR in the theme repo. Build a zip (`khf-theme.zip`) that includes everything.
3. **Option B — Live WXR import:** Export a fresh WXR from the live site (post-Elementor-removal) and commit to repo. Set `fetchAttachments: true` + `networking: true` so media downloads from `kinzuaheritage.org`.
4. **Run the WordPress Importer** — Blueprint auto-installs the `wordpress-importer` dependency.

### 8.4 Hosting the Playground Demo
Once ready, the theme+blueprint can be loaded via:
- **Playground web UI:** drag `khf-theme.zip` + `blueprint.json` into a new Playground
- **URL params:** `https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/dhaupin/khf-wp/main/blueprint.json`
- A static landing page with a "Launch in Playground" button

---

## 9. Scope & Constraints

### In Scope
- Block theme with Full Site Editing (header, footer, front page, inner pages)
- `theme.json` design system with Seneca heritage palette
- Seneca-inspired SVG patterns/glyphs (original compositions, not copies of sacred belts)
- Self-hosted fonts (no Google Fonts runtime dependency)
- Template parts for the homepage sections + dedicated inner pages (Workshops, Events, Venue, Contact, Privacy, Terms)
- Custom block patterns and block style variations
- `blueprint.json` for Playground deployment
- Curated WXR content bundle
- Mobile-responsive layout
- `screenshot.png` for theme directory
- **Workshop registration** — form + $45 payment (Stripe/WP Simple Pay), 2-class selection, limited-slot enforcement, email confirmation
- **Vendor registration** — form + payment (Phase 1: basic signup; Phase 2: site reservation on map)
- **Events system** — listing CPT or calendar with `schema.org/Event` JSON-LD
- **Contact form** — general inquiry
- **Venue rental page** — grounds-for-rent with photo gallery + inquiry form
- **SEO** — schema.org structured data, OpenGraph/Twitter meta, sitemap, robots.txt
- **Privacy Policy + Terms pages**
- **Footer attribution** updated to "Made with ♥ by Creadev.org" (link to https://creadev.org)

### Out of Scope (Phase 1)
- Converting/retaining the Elementor `page_id=20645` raw shortcode content — this will be manually re-created as clean core blocks
- Replacing the live `kinzuaheritage.org` server deployment (this repo's deliverable is the theme; live migration is a separate ops task)
- Native app or offline capabilities
- Multi-language / translation (though Seneca language labels could be a stretch goal)
- **Festival gate-admission ticketing** — the festival uses physical attendance ($5 at the gate, children free). A full event-ticketing platform is out of scope. *(This is distinct from the in-scope workshop/class payment flow and vendor signup payment, which use a lightweight checkout — Stripe/WP Simple Pay — not a full ticket inventory system.)*
- **Vendor site-reservation map system** — the advanced feature of letting vendors pay to reserve a numbered site on an interactive grounds map is **Phase 2**. Phase 1 delivers the basic signup + payment form; Phase 2 adds the interactive reservation grid tied to a map layout.

#### Venue Reservation Map System (Phase 2 — Detailed Specification)

The venue reservation system is a **campground-style interactive map** where individual festival grounds spots are overlaid as clickable markers. Each spot can be selected to reveal an info panel with a photo, description, and a reserve option. The system supports two distinct spot types that share the same underlying reservation infrastructure:

**Spot Types:**

| Type | Location | Purpose |
|---|---|---|
| **Camper Spots** | Outside the festival grounds | For attendees camping at the festival |
| **Vendor Spots** | Within the festival grounds | For artisans, vendors, and performers |

Both spot types use the **same reservation system** (interactive map + spot selection + reservation flow), differentiated by a `spot_type` field (camper / vendor). The reservation flow handles availability checks, pricing, and payment processing uniformly regardless of spot type.

**Map Interface:**
- Spots are rendered as overlaid markers on an interactive map of the festival grounds.
- Clicking a spot opens a popup/info panel showing:
  - Spot photo/illustration
  - Spot number/identifier
  - Description (size, amenities, location notes)
  - Availability status
  - "Reserve" button (or "Unavailable" if already booked)
- The map supports pan, zoom, and filtering by spot type (camper / vendor / all).

**Reservation Flow:**
1. User selects a spot on the map.
2. Info panel displays spot details.
3. User clicks "Reserve" → prompted for dates and attendee count.
4. System checks availability and calculates pricing.
5. User proceeds to payment (Stripe / WP Simple Pay).
6. Confirmation + email receipt.

**Integration with Vendor Registration (Phase 1):**
- The Phase 1 vendor registration form (basic signup + payment) collects vendor contact details and initial payment.
- On successful Phase 1 registration, the vendor is flagged as "eligible for site reservation" and can proceed to the map-based reservation system in Phase 2 to select a specific vendor spot.
- The Phase 1 signup thus acts as a prerequisite/queue for the Phase 2 site reservation, with payment status carried forward.

**Technical Notes:**
- The map can be implemented using an open-source mapping library (e.g., Leaflet.js with OpenStreetMap tiles) to avoid external API dependencies in Playground.
- Spots are stored as a custom post type (`spot`) with `spot_type` taxonomy (camper, vendor), location coordinates, photo, description, price, and availability metadata.
- The interactive map frontend is vanilla JS, enqueued via `functions.php`.

## 10. Admin Management Specification

### 10.1 Workshop Classes Management

**CPT:** `workshop` (registered in `functions.php`)

**Taxonomy:** `workshop_category` — hierarchical, e.g. "Woodworking", "Textiles", "Blacksmithing"

**Admin List Columns** (`functions.php` → `manage_workshop_posts_columns`):
- Title
- Category (taxonomy)
- Date (`_khf_workshop_date`)
- Time (`_khf_workshop_time`)
- Slots (`_khf_workshop_slots` / `_khf_workshop_slots_filled`)
- Price (`_khf_workshop_price`)
- Instructor (`_khf_workshop_instructor`)
- Status (Open / Full / Completed)

**Meta Box Fields** (rendered on edit screen):
| Field | Meta Key | Type | Notes |
|---|---|---|---|
| Date | `_khf_workshop_date` | Date picker | YYYY-MM-DD |
| Start Time | `_khf_workshop_time` | Time picker | HH:MM |
| Duration | `_khf_workshop_duration` | Text | e.g. "2 hours" |
| Max Slots | `_khf_workshop_slots` | Number | Integer |
| Filled Slots | `_khf_workshop_slots_filled` | Number | Computed/auto |
| Price | `_khf_workshop_price` | Number | USD |
| Instructor | `_khf_workshop_instructor` | Text | Instructor name |
| Description | `_khf_workshop_description` | Textarea | Short blurb |

**Admin Workflow:**
1. Create new Workshop post
2. Fill meta box fields (date, time, slots, price, instructor)
3. Assign to `workshop_category`
4. Publish
5. View slot counter in list view; manually adjust `_khf_workshop_slots_filled` if needed

**Slot Enforcement Logic** (Phase 1 — theme-bundled form handler):
- When processing workshop registration: check `_khf_workshop_slots` vs `_khf_workshop_slots_filled`
- If filled >= max, disable registration button and show "Class Full"
- Increment `_khf_workshop_slots_filled` on successful payment
- This is a simple counter approach suitable for Playground (no Stripe integration needed for basic testing)

### 10.2 Events Management

**CPT:** `event` (registered in `functions.php`)

**Taxonomy:** `event_type` — non-hierarchical, e.g. "Festival Days" (Aug 21–23), "Workshop Days" (other dates), "Venue Rental", "Special"

**Admin List Columns:**
- Title
- Event Type (taxonomy)
- Start Date (`_khf_event_start`)
- End Date (`_khf_event_end`)
- Venue (`_khf_event_venue`)
- Featured (checkbox)

**Meta Box Fields:**
| Field | Meta Key | Type | Notes |
|---|---|---|---|
| Start Date/Time | `_khf_event_start` | Datetime | WordPress format YYYY-MM-DD HH:MM |
| End Date/Time | `_khf_event_end` | Datetime | |
| All Day? | `_khf_event_all_day` | Checkbox | Boolean |
| Venue | `_khf_event_venue` | Text | e.g. "Main Stage", "Wooded Glen" |
| Location | `_khf_event_location` | Text | e.g. "4047 Fox Hill Road, Russell, PA" |
| Featured Image | (post thumbnail) | Image | |
| Registration URL | `_khf_event_register_url` | URL | External link if applicable |

**Schema Output:** `schema.org/Event` JSON-LD emitted via `wp_head` on single-event and events listing pages (see §5 acceptance criteria).

### 10.3 Venue / Reservation Spots Management

**CPT:** `spot` (Phase 2; not yet registered in Phase 1)

**Taxonomy:** `spot_type` — non-hierarchical: "camper" (outside festival), "vendor" (inside festival)

**Admin List Columns:**
- Title (spot identifier, e.g. "A-01")
- Type (spot_type taxonomy)
- Coordinates (lat/lng)
- Price (`_khf_spot_price`)
- Available (`_khf_spot_available`)
- Reservations (count link)

**Meta Box Fields:**
| Field | Meta Key | Type | Notes |
|---|---|---|---|
| Latitude | `_khf_spot_lat` | Number | Map coordinate |
| Longitude | `_khf_spot_lng` | Number | Map coordinate |
| Spot Type | (taxonomy) | Term | Camper / Vendor |
| Price | `_khf_spot_price` | Number | USD |
| Size | `_khf_spot_size` | Text | e.g. "12x12 ft" |
| Amenities | `_khf_spot_amenities` | Text | e.g. "Electric, water" |
| Description | `_khf_spot_description` | Textarea | Full description |
| Photo | `_khf_spot_photo` | Image | Featured image |
| Availability Start | `_khf_spot_avail_start` | Date | YYYY-MM-DD |
| Availability End | `_khf_spot_avail_end` | Date | YYYY-MM-DD |
| Available | `_khf_spot_available` | Checkbox | Toggle for reservation |

**Admin Map Interface (Phase 2):**
- Custom meta box with Leaflet.js map
- Shows all spots as draggable markers
- Clicking a marker opens spot info popup
- Map used for visual spot placement on festival grounds

### 10.4 Admin Capabilities & Roles

| Capability Group | Roles | Permissions |
|---|---|---|
| Manage Festival Content (workshops, events) | Administrator, Editor | Edit/publish/delete workshops & events, manage categories/taxonomies |
| Manage Vendor Spots | Administrator | Create/edit spots, set prices, toggle availability |
| View Registrations | Administrator | See workshop/event/spot registrations and payment status |
| Submit Vendor Signup (frontend) | Anonymous/Public | Access vendor signup form |
| Register for Workshops (frontend) | Anonymous/Public | Access workshop registration form + payment |

Roles are managed by default WordPress capabilities. No custom roles needed for Phase 1.

### Constraints
- Must work in **browser-based WordPress Playground** (no `exec`, limited server access)
- Self-hosted fonts required (Playground may have no external network without `features.networking`)
- No PHP execution of arbitrary server logic — logic must be vanilla JS or PHP-safe theme functions
- Cultural sensitivity: Seneca elements must be respectful, not stereotypical; original compositions only
- Must not depend on the premium `alone` theme or Elementor plugin at runtime

---

## 11. Implementation Phases

### Phase 0 — Foundation (docs)
- [x] Create repo file structure (`themes/khf/`, `content/`, repo root)
- [x] Write `PRD.md`, `README.md`, `AGENTS.md`, `TASKS.md`
- [ ] Create `style.css`, `functions.php`, `theme.json` skeleton
- [ ] Set up `blueprint.json` at repo root

### Phase 1 — Heritage Design System
- [ ] Finalize `theme.json` color palette, typography, spacing, gradients
- [ ] Create Seneca SVG patterns (`wampum-border`, `tree-of-peace-divider`, `eagle-feather`, `sky-world-arch`) in `assets/images/patterns/`
- [ ] Self-host Cormorant Garamond + Inter fonts (`.woff2` in `assets/fonts/`, `@font-face` in `blocks.css`)
- [ ] Define custom block style variations (`seneca-filled`, `wooded-outline`, `eagle-feather` separator) in `functions.php` + `blocks.css`
- [ ] Register custom block patterns (`khf/wampum-divider`, `khf/seneca-hero`, `khf/vendor-grid`) in `functions.php`

### Phase 2 — Core Templates & Homepage
- [ ] `parts/header.html`, `parts/footer.html` (footer updated to Creadev.org attribution)
- [ ] All homepage `parts/*.html`: `hero`, `about`, `artisans`, `schedule`, `visit`, `vendor-cta`, `donate-auction`
- [ ] `templates/front-page.html` — compose all template parts
- [ ] `templates/page.html`, `single.html`, `index.html`, `archive.html` (fallbacks)
- [ ] `screenshot.png` (580×460)

### Phase 3 — Content & Playground Blueprint
- [ ] Create curated WXR (`content/khf-content.xml`) with restructured core-block content
- [ ] Test `blueprint.json`: theme loads, content imports, styling applies in <60s
- [ ] Verify mobile-responsiveness and self-hosted font loading
- [ ] Verify footer credit reads "Made with ♥ by Creadev.org"

### Phase 4 — Static Inner Pages
- [ ] `templates/page-workshop.html` / `page-events.html` / `page-venue.html` / `page-contact.html` / `page-privacy.html` / `page-terms.html`
- [ ] `parts/workshop-cta.html`, `parts/events-grid.html`, `parts/venue-cta.html`
- [ ] Create curated content for these pages in the WXR
- [ ] Verify all pages render with Seneca styling

### Phase 5 — Dynamic Features (Plugin-assisted)
- [ ] Register CPTs in `functions.php`: `workshop` (classes with slot limits), `event` (dates/times)
- [ ] Register `workshop_category` / `event_type` taxonomies for admin management
- [ ] Create `templates/single-workshop.html` + `taxonomy-*.html`
- [ ] Integrate lightweight form + payment plugins OR a theme-bundled form handler for: workshop $45 checkout (2-class selection + slot enforcement), vendor signup + payment
- [ ] Events listing page with `schema.org/Event` JSON-LD output (register via `wp_head` or a dedicated template tag)
- [ ] Venue rental page with photo gallery + inquiry form

### Phase 6 — SEO, Schema & Legal
- [ ] Add OpenGraph / Twitter Card meta tags (via `wp_head` or Yoast compatibility)
- [ ] Confirm/verify schema.org structured data (Organization, Event, WebSite, Breadcrumbs)
- [ ] Generate `robots.txt` + XML sitemap (Yoast or standalone)
- [ ] Tactical keyword targeting (heritage festival, Seneca Native events, PA venue rental) — documented in an SEO brief
- [ ] Publish / Privacy Policy and Terms of Use pages

### Phase 7 — Polish & Launch
- [ ] Final acceptance check against PRD §11 criteria
- [ ] Full Playground end-to-end test (theme + all content + forms)
- [ ] Documentation in `README.md` for loading in Playground + feature list
- [ ] Tag release; prep live deployment handoff to Creadev.org

> **Note on dynamic features & Playground:** Form/payment functionality that requires external gateways (Stripe) will require `features.networking: true` in the Blueprint for live testing; locally-only tests will use sandbox/dry-run mode. The core theme + content + static pages work fully offline.

---

## 12. Acceptance Criteria

| # | Criterion | How Verified |
|---|---|---|
| 1 | Theme activates in WordPress without error | Activate in Playground, no PHP warnings |
| 2 | Theme renders a styled homepage | Visual check in Playground browser |
| 3 | Seneca purple (`#7a3b9e`) appears on links/buttons/borders | Inspect element / grep CSS output |
| 4 | ≥3 Seneca-inspired SVG patterns present | `ls assets/images/patterns/` → count ≥3 |
| 5 | Front page contains all content sections | Manual content checklist (hero, mission, artisans, music, schedule, location, vendor CTA) |
| 6 | Vendor application PDF link works + vendor signup form present | Click link → PDF loads; form renders |
| 7 | Mobile-responsive (≤782px) | DevTools device toggle check |
| 8 | No Elementor runtime dependency | `grep -r elementor` in theme → 0 matches |
| 9 | Self-hosted fonts (no Google Fonts fetch) | `grep -r googleapis` in theme → 0 matches |
| 10 | Blueprint imports content into Playground | Launch via `blueprint.json`, content appears |
| 11 | Fonts load in Playground | Text renders in Cormorant Garamond / Inter |
| 12 | Footer reads "Made with ♥ by Creadev.org" with link | Visually inspect footer / source |
| 13 | Workshops page exists with $45 registration flow | Page renders; payment form present |
| 14 | Events listing with `schema.org/Event` JSON-LD | View page source; grep `application/ld+json` |
| 15 | Venue rental page + inquiry form | Page renders; form present |
| 16 | Privacy Policy & Terms pages | Pages accessible via footer links |
| 17 | OpenGraph + Twitter Card meta tags present | View page source; grep `og:` / `twitter:` |
| 18 | Workshop CPT + slot-limited class selection | Admin can create classes; frontend enforces limit |
| 19 | Sitemap + robots.txt generated | Visit `/sitemap.xml` and `/robots.txt` |

---

## 13. References

- Live site: https://kinzuaheritage.org/
- Creadev.org (maintaining agency): https://creadev.org/
- Seneca Nation: https://sni.org/
- Seneca-Iroquois National Museum: https://senecamuseum.org/
- WordPress Playground Blueprints: https://wordpress.github.io/wordpress-playground/guides/import-content-with-blueprints
- WordPress Playground Quick Start: https://developer.wordpress.org/playground/handbook/quick-start-guide
- Wampum & Haudenosaunee symbolism: Smithsonian National Museum of the American Indian educator guide
- WP-CLI import command: https://developer.wordpress.org/cli/commands/import
- schema.org Event type: https://schema.org/Event
- OpenGraph protocol: https://ogp.me/

---

*Document status: Approved for implementation. Last updated: 2026-09-09. Next review: upon Phase 3 completion.*
