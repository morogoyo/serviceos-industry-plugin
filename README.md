# ServiceOS Industry Plugin

A skeleton WordPress plugin for creating industry-specific modules that integrate with the [ServiceOS CRM](https://github.com/morogoyo/wp_crm_general).

## Quick Start

1. **Clone this repo** into your WordPress `wp-content/plugins/` directory:
   ```bash
   git clone https://github.com/morogoyo/serviceos-industry-plugin.git my-industry-plugin
   ```

2. **Rename the directory** to match your industry:
   ```bash
   mv serviceos-industry-plugin my-industry-plugin
   ```

3. **Customize the plugin** by filling in the blanks:
   - `serviceos-industry-plugin.php` — update the Plugin Name header
   - `includes/class-harness.php` — set `$module_slug`, `$module_name`, `$module_icon`, `$industry`
   - `includes/class-seeder.php` — define your industry's categories, pipeline stages, and seed services
   - `assets/css/module.css` — add industry-specific styles
   - `assets/js/module.js` — add industry-specific JavaScript (CRUD, forms, etc.)

4. **Answer the questionnaire** in `QUESTIONNAIRE.md` to gather client requirements.

5. **Activate** the plugin from the WordPress admin panel.

6. **Visit the CRM** — your module's pages will appear in the sidebar.

## Requirements

- WordPress 6.0+
- [ServiceOS CRM](https://github.com/morogoyo/wp_crm_general) plugin installed and active

## File Structure

```
├── serviceos-industry-plugin.php    # Main plugin file
├── includes/
│   ├── class-harness.php            # CRM harness (pages, data schema)
│   ├── class-activator.php          # Activation/deactivation hooks
│   ├── class-seeder.php             # Default data seeding (categories, pipeline, services)
│   └── class-assets.php             # Custom CSS/JS enqueuing
├── assets/
│   ├── css/module.css               # Industry-specific styles (uses CRM CSS variables)
│   └── js/module.js                 # Industry-specific JS (uses ServiceOSAPI)
├── QUESTIONNAIRE.md                 # Client questionnaire for industry requirements
└── README.md                        # This file
```

## How It Works

This plugin extends `Service_OS_CRM_Harness` to provide:

1. **Sidebar navigation** — your module's pages appear in the CRM sidebar
2. **Page rendering** — pages are rendered using the CRM's standard page data schema (info tables, unit overviews, data tables, etc.)
3. **CSS inheritance** — all CRM styles (dashboard, cards, tables, modals) are automatically loaded
4. **API access** — `ServiceOSAPI` is available for all CRUD operations on clients, deals, services, tasks, etc.

## Customization Points

| What to change | Where |
|---------------|-------|
| Module name, slug, icon, industry | `includes/class-harness.php` → properties |
| Page titles and list | `includes/class-harness.php` → `get_pages()` |
| Page data (tables, cards, forms) | `includes/class-harness.php` → `get_list_data()` / `get_detail_data()` |
| Default categories | `includes/class-seeder.php` → `seed()` |
| Default pipeline stages | `includes/class-seeder.php` → `seed()` |
| Custom styles | `assets/css/module.css` |
| Custom JavaScript | `assets/js/module.js` |
| Plugin name and description | `serviceos-industry-plugin.php` → header comment |
