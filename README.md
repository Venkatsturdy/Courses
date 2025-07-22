# 🎓 Laravel Mini LMS - Course Management Module

This is a mini LMS (Learning Management System) Course Management module built using **Laravel 12** and **PHP 8.2**. It enables admin users to manage courses, including listing, creating, editing, and deleting. Course categories are loaded via a mock external API. Bootstrap is used for a responsive user interface.

---

## 📚 Features

- ✅ Built with Laravel 12 and PHP 8.2
- ✅ MVC architecture
- ✅ Course CRUD operations (Create, Read, Update, Delete)
- ✅ Category selection using external API (`/api/categories`)
- ✅ Bootstrap 5 UI for form and table layouts
- ✅ Pagination and filtering (bonus)
- ✅ Form validation using FormRequest
- ✅ Seeder for dummy categories

---

## 🚀 Installation Instructions

### Prerequisites
- PHP ^8.2
- Composer
- MySQL
- Laravel CLI

### Setup

```bash
# Clone the repo or unzip the folder
cd lms-course-app

# Install PHP dependencies
composer install

# Copy environment config
cp .env.example .env

# Generate app key
php artisan key:generate

# Configure your .env database section
DB_DATABASE=lms
DB_USERNAME=root
DB_PASSWORD=

# Run migrations and seeders
php artisan migrate --seed

# Serve the app
php artisan serve
