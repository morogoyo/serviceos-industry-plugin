# Industry Plugin — Client Questionnaire

Use this questionnaire to gather what the client needs before customizing this skeleton plugin for their industry.

---

## 1. Industry Basics

- **Industry name:** _(e.g., "Plumbing")_
- **Industry slug:** _(e.g., "plumbing" — lowercase, no spaces)_
- **Primary icon:** _(Material Symbols name, e.g., "plumbing")_
- **Brief description:** _(one sentence about what this module does)_

---

## 2. Service Categories

List the categories of services for this industry. Each category gets its own tab/filter in the CRM.

| # | Category Name | Singular Label (e.g., "Repair Job") | Icon (Material Symbols) | Color (hex) |
|---|---------------|--------------------------------------|--------------------------|-------------|
| 1 | General       | Service                              | folder                   | #0073aa     |
| 2 |               |                                      |                          |             |
| 3 |               |                                      |                          |             |
| 4 |               |                                      |                          |             |
| 5 |               |                                      |                          |             |

---

## 3. Pipeline Stages

Ordered list of deal stages. Deals move through these stages left-to-right.

| Order | Stage Name |
|-------|-----------|
| 0     | Lead      |
| 1     | Qualified |
| 2     | Proposal  |
| 3     | Won       |
| 4     | Lost      |

---

## 4. Deal Milestones (optional)

Percentage milestones with custom labels. Defaults: 25% = "Kickoff", 50% = "Midpoint", 75% = "Final Review", 100% = "Complete".

| %  | Label |
|----|-------|
| 25 |       |
| 50 |       |
| 75 |       |
| 100|       |

---

## 5. Seed Services

Example services that get created when the plugin is first activated.

| Category | Service Title | Default Value ($) |
|----------|--------------|-------------------|
|          |              |                   |
|          |              |                   |
|          |              |                   |

---

## 6. Custom Requirements

- **Need custom database tables?** [ ] Yes [ ] No
  - If yes, describe the data you need to store and its structure:
  - Each table needs: name, columns (name + type), and an upgrade method

- **Need custom REST API endpoints?** [ ] Yes [ ] No
  - If yes, describe the endpoints:
  - Each endpoint needs: method (GET/POST/PUT/DELETE), route, what data it returns/accepts

- **Need custom page sections beyond the standard schema?** [ ] Yes [ ] No
  - Standard sections are: info_table, unit_overview, expandable_units, signoffs, data_table, form_calculator
  - If yes, describe the custom sections needed:

---

## 7. Standalone Plugin Redirect (optional)

If this plugin has standalone WordPress admin pages that should redirect to the CRM:

- **Standalone page slug:** _(e.g., "plumbing-submissions")_

---

## 8. Additional Notes

Anything else the developer should know:
