# ServiceOS Industry Plugin — Agent Guidelines

## What This Repo Is

A skeleton WordPress plugin template for creating industry-specific modules that integrate with the [ServiceOS CRM](https://github.com/morogoyo/wp_crm_general). The `main` branch is the pristine skeleton. Each industry gets its own fork.

## Fork-Based Workflow (MANDATORY)

**NEVER commit industry-specific code to `main` in this repo.** Industry work happens in forks.

### Repo Structure

```
serviceos-industry-plugin        ← THIS REPO — skeleton template (no industry code)
    │
    ├── serviceos-industry-hvac        ← fork for HVAC industry
    ├── serviceos-industry-plumbing    ← fork for Plumbing industry
    └── serviceos-industry-electrical  ← fork for Electrical industry
```

### Creating a New Industry Plugin

```bash
gh repo fork morogoyo/serviceos-industry-plugin --clone
cd serviceos-industry-plugin
gh repo rename serviceos-industry-{industry}
cd ..
mv serviceos-industry-plugin serviceos-industry-{industry}
cd serviceos-industry-{industry}
```

Then customize:
1. **`serviceos-industry-plugin.php`** — rename file, update Plugin Name header
2. **`includes/class-harness.php`** — set `$module_slug`, `$module_name`, `$module_icon`, `$industry`
3. **`includes/class-seeder.php`** — define categories, pipeline stages, seed services
4. **`assets/css/module.css`** — industry-specific styles
5. **`assets/js/module.js`** — industry-specific JavaScript

```bash
git add -A && git commit -m "Customize for {industry} industry"
git push -u origin main
```

### Branch Naming Per Fork

Each fork uses standard naming:
- `main` — production-ready industry plugin
- `dev` — integration/staging branch
- `feature/<name>` — new features
- `fix/<name>` — bug fixes

### Syncing Skeleton Updates

When this skeleton repo receives updates:

```bash
cd serviceos-industry-{industry}
git fetch upstream
git checkout dev
git merge upstream/main --no-ff
# Resolve conflicts, run tests, push
# PR dev → main when ready
```

## How the Harness Works

The plugin extends `Service_OS_CRM_Harness` to integrate with the CRM:

```php
class Harness extends Service_OS_CRM_Harness {
    protected $module_slug = 'my-industry';
    protected $module_name = 'My Industry';
    protected $module_icon = 'build';
    protected $industry = 'general';
}
```

### What the CRM Provides Automatically

| Feature | How |
|---------|-----|
| CSS (dashboard, cards, tables, modals) | Automatically loaded on `admin.php?page=service-os-crm-*` pages |
| JS (`ServiceOSAPI`, `ServiceOSModal`, `ServiceOSToast`, `ServiceOSTheme`) | Automatically loaded via `api.js` |
| Sidebar navigation | Module pages auto-appear between CRM nav and Settings |
| Page rendering | `page-renderer.php` converts schema arrays to HTML |
| Admin shell (full-screen) | WordPress chrome (toolbar, sidebar, footer) stripped automatically |

### What the Plugin Must Provide

| Requirement | Where |
|-------------|-------|
| Module metadata (slug, name, icon, industry) | `class-harness.php` → `get_module_info()` |
| Page definitions (list, detail, etc.) | `class-harness.php` → `get_pages()` |
| Page data (tables, cards, forms) | `class-harness.php` → `get_page_data()` |
| Default categories, stages, services | `class-seeder.php` → `seed()` |
| Custom CSS | `assets/css/module.css` (uses CRM CSS variables) |
| Custom JS | `assets/js/module.js` |

### Seeding Flow

```
Plugin activates
    → CRM syncs module via serviceos_crm_available_modules filter
    → CRM sees seed_applied = 0 in crm_modules
    → CRM fires serviceos_crm_module_seed filter
    → Plugin's Seeder::seed() returns categories, pipeline, stages, services
    → CRM creates them in DB
    → CRM sets seed_applied = 1
```

## No Hardcoded Data Rule

**All data displayed in module pages MUST come from internal REST API calls.** No hardcoded fallback data, mock arrays, or static placeholder content. This includes categories, services, deals, pipeline stages — everything must be fetched from the CRM REST API.

Use `ServiceOSAPI` for all data operations:

```javascript
ServiceOSAPI.deals.list(businessId).then(data => { /* populate table */ });
ServiceOSAPI.categories.list(businessId).then(data => { /* populate filters */ });
```

## CSS Variables Available

All CRM CSS custom properties are available in module stylesheets:

| Variable | Light Theme | Dark Theme |
|----------|-------------|------------|
| `--primary` | `#0058be` | `#6eb4ff` |
| `--surface` | `#f9f9ff` | `#0f1923` |
| `--on-surface` | `#111c2d` | `#e8edf4` |
| `--card-bg` | `#ffffff` | `#1a2535` |
| `--sidebar-bg` | `#263143` | — |
| `--border-light` | `#e7eeff` | `#2a3545` |
| `--error` | `#ba1a1a` | `#ffb4ab` |

Use variables — never hardcode hex values.

## Modal Standard

Any modal `<div>` MUST have `style="display: none;"` inline. Use `ServiceOSModal.open(id)` / `ServiceOSModal.close(id)`.

## Testing

Before pushing an industry fork:
1. Activate the plugin in the WordPress admin
2. Verify sidebar nav item appears
3. Verify list and detail pages render
4. Verify seeded categories appear in Category dropdown
5. Verify seeded pipeline stages appear in Pipeline view
