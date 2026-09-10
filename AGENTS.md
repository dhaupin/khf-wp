# AGENTS.md — Contributor & AI Agent Guidelines

Guide for humans and AI agents contributing to the `khf-wp` repository.

## Project Purpose
Build a native WordPress **block theme** (Full Site Editing) for the **Kinzua Heritage Festival** (Russell, PA) that:
1. Runs in **WordPress Playground** via a Blueprint (`blueprint.json`).
2. Visually expresses **rustic heritage / artisan craft** + **Seneca Nation (Haudenosaunee) design** (purple wampum accents, original geometric patterns, symbols).
3. Replaces the legacy Elementor + "alone" theme site at `kinzuaheritage.org`.

## Workspace Context
- Working directory: repo root (`khf-wp`).
- Git branch: typically `kilo/*` feature branches; main is `main`.
- Use `/tmp/agent_ea6e3297-089f-4aa9-bde5-10d4895e8ab0/` for scratch files.
- This is a **sandboxed cloud environment** (ephemeral filesystem).

## Key Documentation
- **`PRD.md`** — Product Requirements Document. The source of truth for scope, design system, content mapping, and acceptance criteria. **READ THIS FIRST.**
- **`TASKS.md`** — Development task checklist. Pick up "pending" → "in_progress".
- **`README.md`** — Quick-start / user-facing docs.

## Coding Standards & Conventions

### WordPress Theme Standards
- **Block theme (FSE)**: Use `theme.json`, block templates (`templates/*.html`), template parts (`parts/*.html`).
- **`style.css`**: Theme headers only (no global CSS). Use `theme.json` and `assets/css/blocks.css` for styles.
- **`functions.php`**: Enqueue scripts/styles, register block patterns/styles, add theme supports. Register CPTs (`workshop`, `event`) and taxonomies (`workshop_category`, `event_type`) here. Output schema.org / OpenGraph meta via `wp_head`.
- **Forms & payments** (workshop $45 checkout, vendor signup+payment): prefer lightweight, well-supported plugins (e.g., WP Simple Pay, Form block, WPForms free tier) over bespoke code. The theme must not hard-depend on any paid plugin for base functionality.
- **No PHP `echo`/`print`** in template parts — use block markup / HTML comments.
- Block templates must have valid `<!-- wp:...` block comments.
- **Footer credit** must read "Made with ♥ by Creadev.org" with a link to https://creadev.org.

### File Organization
```
themes/khf/
├── style.css            # Theme headers ONLY
├── functions.php        # Theme setup, enqueues, registrations
├── theme.json           # Design tokens (colors, fonts, spacing, block defaults)
├── screenshot.png       # 580x460px theme screenshot
├── blueprint.json       # WP Playground blueprint (lives at repo root)
├── templates/           # Block templates: index, front-page, page, single
│                         # Also: single-workshop, taxonomy-event-type, page-venue, etc.
├── parts/               # Template parts: header, footer, hero, about, vendors,
│                       # workshop-cta, events-grid, venue-cta, vendor-cta, donate-auction, etc.
└── assets/
    ├── fonts/           # SELF-HOSTED fonts only (Cormorant Garamond, Inter)
    ├── css/
    │   ├── editor.css   # Editor-only styles
    │   └── blocks.css   # Custom block style CSS
    ├── images/
    │   ├── logo.svg
    │   └── patterns/    # Seneca-inspired SVG patterns / glyphs
    └── js/
        └── mobile-menu.js
```

### CSS
- Use `theme.json` for design tokens and block element styles (preferred method).
- Use `assets/css/blocks.css` for pattern/layout CSS and custom selector overrides.
- Follow mobile-first ordering.
- Use CSS custom properties defined via `theme.json` `--wp--preset--*` classes.

### JavaScript
- **Vanilla JS only** (no jQuery dependency).
- Keep logic minimal (e.g., mobile menu toggle, smooth scroll).
- ES6 syntax OK; must run in browser (no Node-only APIs).
- Place in `assets/js/` and enqueue via `functions.php`.

### Font & Asset Loading
- **Self-host all fonts.** Do NOT depend on Google Fonts at runtime (Playground may block external requests without `features.networking`).
- Include `.woff2` font files in `assets/fonts/`.
- Use `@font-face` in `assets/css/blocks.css` or `style.css`.

### Seneca Design Elements — Cultural Sensitivity Rules
- Use **purple (`#7a3b9e`) and white** as the primary heritage accent colors (wampum).
- Create **original SVG compositions** inspired by Haudenosaunee geometric styles — do NOT copy existing sacred wampum belt designs.
- Symbols to reference (authentically, as inspiration): Tree of Peace (white pine), Eagle, Longhouse, Circle, Arrows, Sky World (semi-dome).
- Do not use Native imagery in stereotypical or trivializing ways.
- If unsure whether a symbol is culturally protected, **skip it** and use abstract geometric patterns instead.

## Development Workflow
1. **Pick a task** from `TASKS.md` (set it to `in_progress`).
2. **Read context:** Check `PRD.md` relevant sections and existing code before writing.
3. **Make focused changes:** One task/feature per edit cycle.
4. **Update tasks:** Mark completed tasks in `TASKS.md` using `todowrite`.
5. **Verify:** Check file structure, test in Playground if possible.

## When Using Subagents
The user explicitly suggested using subagents to preserve context. When delegating:
- Provide **detailed, self-contained prompts**.
- Instruct agents to return a **single concise summary message** with results.
- Specify the exact files to create/modify and the verification steps.
- Scope agents to ONE phase (e.g., "create the theme.json design tokens" not "build the whole theme").

## Commit Hygiene
- Write concise commit messages matching the repo style.
- Stage only intended files (`git add themes/khf/style.css`, etc.).
- **Do NOT commit** secrets, large binaries, or generated caches unless approved.
- Do NOT commit unless explicitly asked by the user.

---

*If you encounter issues or ambiguity, consult `PRD.md` first, then ask the user for a decision via the `question` tool.*
