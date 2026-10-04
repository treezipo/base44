# Spaciaz FA - WordPress Theme

## Overview
A professional real estate & construction WordPress theme (RTL Persian, Elementor-compatible), recreated from the Spaciaz ThemeForest reference.

## Architecture
- **Theme location**: `wp-content/themes/spaciaz-fa/`
- **Docker**: `docker-compose.base44.yml` runs MySQL 8.0 + WordPress (PHP 8.2/Apache) + WP-CLI setup service
- **Port**: 3000 (mapped to WordPress Apache port 80)
- **Elementor**: installed automatically via WP-CLI during setup

## Setup
```bash
docker compose -f docker-compose.base44.yml up -d --build
```
The `setup` service runs automatically after WordPress is healthy:
1. Installs WordPress core (admin/admin123)
2. Installs Persian (fa_IR) language
3. Sets permalink structure to `/%postname%/`
4. Installs and activates Elementor
5. Activates the Spaciaz FA theme
6. Seeds demo content (pages, services, projects, team, blog posts, nav menu)

## Custom Post Types
- `service` - Services (archive at `/services/`)
- `project` - Projects (archive at `/projects/`)
- `team` - Team members (archive at `/our-team/`)

## Custom Taxonomies
- `project_location` - Project locations
- `project_status` - Project statuses
- `service_category` - Service categories

## Custom Elementor Widgets
Located in `inc/widgets.php`:
- Hero, Features, Services, Projects, Team, Testimonials, Stats, CTA/Contact Form, Blog Posts

## Theme Settings
WordPress Customizer → "تنظیمات سپاسیاز" for:
- Primary color, phone, email, address, social links

## Pages
- Home (front-page.php)
- About (page-templates/about.php)
- Services (page-templates/services.php)
- Projects (page-templates/projects.php)
- Contact (page-templates/contact.php)
- Blog (uses index.php/archive.php)

## Admin Access
- URL: http://localhost:3000/wp-admin
- Username: admin
- Password: admin123

## Key Files
- `functions.php` - Main functions, enqueue, theme support, seed content
- `inc/cpt.php` - Custom post types and taxonomies
- `inc/customizer.php` - WordPress Customizer settings
- `inc/widgets.php` - Custom Elementor widgets
- `assets/css/style.css` - Main stylesheet
- `assets/css/rtl.css` - RTL overrides
- `assets/js/main.js` - Header scroll, mobile menu, reveal animations, counter, testimonials slider, form handling
