<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sarab

Sarab is a dynamic restaurant management platform built with Laravel. It transforms a static restaurant website into a fully customizable application where administrators can manage all website content and users can manage their profiles, preferences, and reservations.

## Features

### Admin Panel
- Manage menus and food categories
- Add, edit, and delete website content
- Manage reservations and customer information
- Control homepage sections, gallery images, and testimonials
- Manage user accounts and roles

### User Features
- User registration and authentication
- Profile management
- Save personal preferences and favorite dishes
- Make table reservations
- View reservation history

## Tech Stack

- Laravel
- PHP
- MySQL
- Blade / Bootstrap
- Laravel Authentication

## Installation

```bash
git clone https://github.com/KrishSharma4406/Sarab.git
cd Sarab

composer install
cp .env.example .env

php artisan key:generate

# Configure database credentials in .env

php artisan migrate

npm install
npm run build

php artisan serve
```

## Project Structure

```text
app/
├── Http/
├── Models/
├── Services/

database/
├── migrations/
├── seeders/

resources/
├── views/
├── js/
├── css/

routes/
├── web.php
├── api.php
```

## Roadmap

- Online food ordering
- Payment gateway integration
- Email notifications
- Admin analytics dashboard
- Multi-restaurant support

## License

This project is open-source and available under the MIT License.
```