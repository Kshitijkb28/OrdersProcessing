<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <img src="https://img.shields.io/badge/Laravel-10.x-red" alt="Laravel Version">
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

## Project Setup (Laravel 10)

### 1. Clone the repository
```bash
git clone <your-repo-url>
cd order_processing
```

### 2. Install dependencies
```bash
composer install
```

### 3. Copy and configure environment file
```bash
cp .env.example .env
# Edit .env as needed (DB, etc.)
```

### 4. Generate application key
```bash
php artisan key:generate
```

### 5. Run migrations and seeders
```bash
php artisan migrate --seed
```

### 6. Start the development server
```bash
php artisan serve
```

---

## Example: Run the Orders API

To create a new order via the API, use the following `curl` command:

```bash
curl --location 'http://localhost:8000/api/orders' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json' \
--data '{
  "user_id": 9,
  "product_id": 149,
  "quantity": 2
}'
```

---
