<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Multi-Tenancy with Vue.js

This is a multi-tenant Laravel application with Vue.js frontend using the Stancl Tenancy package.

## What's Configured

- Laravel 11 with Breeze (Inertia + Vue)
- Stancl Tenancy for multi-tenant functionality
- SQLite for database (can be changed to MySQL/PostgreSQL)
- Tenant-specific routes and Vue components
- Domain-based tenant identification
- Tailwind CSS 4 with PostCSS
- Vite 7 for asset bundling

## Installation

1. Install dependencies:
```bash
composer install
yarn install
```

2. Copy `.env.example` to `.env` and configure:
```bash
cp .env.example .env
php artisan key:generate
```

3. Run migrations:
```bash
php artisan migrate:fresh
```

4. Build frontend assets:
```bash
yarn build
# Or for development:
yarn dev
```

## Creating Tenants

### Using the Custom Command

Create a tenant with a domain:
```bash
php artisan tenant:create-test {name} {domain}
```

Example:
```bash
php artisan tenant:create-test acme acme.localhost
```

### Manual Creation

Using Tinker:
```bash
php artisan tinker
```

Then:
```php
$tenant = \App\Models\Tenant::create(['id' => 'acme']);
$tenant->domains()->create(['domain' => 'acme.localhost']);
```

### Run Tenant Migrations

After creating tenants, run migrations for each tenant:
```bash
php artisan tenants:migrate
```

### Seed Admin Users

Create admin users for the central app and tenants:

**Central App Admin:**
```bash
php artisan db:seed --class=AdminUserSeeder
```
This creates:
- Email: `admin@example.com`
- Password: `password`

**Tenant Admins:**
```bash
php artisan tenants:seed
```
This creates admin users for each tenant:
- For tenant "demo": Email: `admin@demo.com`, Password: `password`
- For tenant "test": Email: `admin@test.com`, Password: `password`

## Testing the Setup

### 1. Configure Your Hosts File (for local development)

Add entries to your `/etc/hosts` file:
```
127.0.0.1 demo.localhost
127.0.0.1 test.localhost
```

### 2. Start the Development Server

```bash
php artisan serve
```

### 3. Access Different Tenants

- Central app: http://localhost:8000
- Demo tenant: http://demo.localhost:8000
- Test tenant: http://test.localhost:8000

Each tenant will have its own:
- Database (SQLite: `database/tenant{id}.sqlite`)
- Users and authentication
- File storage
- Cache scope

## Project Structure

### Routes

- `routes/web.php` - Central application routes (landlord)
- `routes/tenant.php` - Tenant-specific routes
- `routes/auth.php` - Authentication routes (shared)

### Vue Components

- `resources/js/Pages/` - Central app pages
- `resources/js/Pages/Tenant/` - Tenant-specific pages
  - `Home.vue` - Tenant homepage
  - `Dashboard.vue` - Tenant dashboard (authenticated)

### Configuration

- `config/tenancy.php` - Tenancy configuration
- `app/Models/Tenant.php` - Custom Tenant model

## Key Features

### Tenant Isolation

Each tenant has complete isolation:
- **Database**: Separate SQLite database per tenant
- **Cache**: Tenant-scoped cache keys
- **Sessions**: Tenant-specific sessions
- **Storage**: Separate file storage directories

### Domain Identification

The application automatically identifies tenants by domain:
- `demo.localhost` → demo tenant
- `test.localhost` → test tenant
- `localhost` → central app

### Tenant Context

Access tenant information in your code:
```php
// Get current tenant
$tenant = tenant();

// Get tenant ID
$tenantId = tenant('id');

// Check if in tenant context
if (tenancy()->initialized) {
    // Tenant-specific logic
}
```

In Vue components:
```vue
<script setup>
defineProps({
    tenantId: String,
});
</script>
```

## Available Commands

```bash
# Create a test tenant
php artisan tenant:create-test {name} {domain}

# Run migrations for all tenants
php artisan tenants:migrate

# Run tenant migrations with fresh
php artisan tenants:migrate --fresh

# Seed admin user for central app
php artisan db:seed --class=AdminUserSeeder

# Seed admin users for all tenants
php artisan tenants:seed

# List all tenants
php artisan tenants:list
```

## Development Workflow

1. **Central App Development**: Work on shared functionality in `routes/web.php` and `resources/js/Pages/`

2. **Tenant-Specific Features**: Add tenant features in `routes/tenant.php` and `resources/js/Pages/Tenant/`

3. **Database Changes**:
   - Central: Add migrations to `database/migrations/`
   - Tenants: Add migrations to `database/migrations/tenant/`

4. **Testing**: Test with multiple tenant domains to ensure isolation

## Next Steps

1. Customize tenant Vue components in `resources/js/Pages/Tenant/`
2. Add tenant-specific models and logic
3. Configure tenant-specific branding
4. Set up email notifications with tenant context
5. Implement tenant admin panel
6. Add subscription/billing logic if needed

## Troubleshooting

### Tenant not found error
- Make sure the domain is configured correctly
- Check that the tenant exists: `php artisan tenants:list`
- Verify `/etc/hosts` has the correct entries

### Cache issues
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Database issues
```bash
# Reset central database
php artisan migrate:fresh

# Reset tenant databases
php artisan tenants:migrate --fresh
```

## Resources

- [Tenancy for Laravel Documentation](https://tenancyforlaravel.com/docs/v3)
- [Laravel Documentation](https://laravel.com/docs)
- [Vue.js Documentation](https://vuejs.org)
- [Inertia.js Documentation](https://inertiajs.com)

---

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
