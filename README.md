# 👥 User Management System

A comprehensive user management system built with Laravel 12, featuring role-based access control, full CRUD operations, and a beautiful modern UI.

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/TailwindCSS-3.1-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Alpine.js-3.4-8BC0D0?style=for-the-badge&logo=alpinedotjs&logoColor=white" alt="Alpine.js">
  <img src="https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge" alt="License MIT">
</p>

---

## 📋 Table of Contents

- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Prerequisites](#-prerequisites)
- [Installation](#-installation)
- [Usage](#-usage)
- [Project Structure](#-project-structure)
- [Database Schema](#-database-schema)
- [Testing](#-testing)
- [Deployment](#-deployment)
- [Security](#-security)
- [Contributing](#-contributing)
- [License](#-license)

---

## ✨ Features

### 🔐 Authentication System
- **User Registration** - Secure signup with email verification
- **Login/Logout** - Session-based authentication
- **Password Reset** - Email-based password recovery
- **Remember Me** - Persistent login functionality
- **Email Verification** - Verify user email addresses
- **Password Confirmation** - Additional security for sensitive operations

### 👨‍💼 Role-Based Access Control
- **Two User Roles**: Admin and User (default)
- **Admin Middleware** - Protects admin routes from unauthorized access
- **Role Helpers** - `isAdmin()` and `isUser()` methods in User model
- **Permission-Based UI** - Dynamic interface based on user role

### 🛠️ Admin Panel Features
- **User Management Dashboard** - View all users in a responsive table
- **Create Users** - Add new users with name, email, password, and role
- **View User Details** - See comprehensive user information
- **Edit Users** - Update user information (optional password change)
- **Delete Users** - Remove users with confirmation (prevents self-deletion)
- **Role Assignment** - Assign admin or user roles
- **Success/Error Messages** - User feedback for all operations

### 👤 User Profile Management
- **Edit Profile** - Update name and email
- **Change Password** - Secure password update
- **Delete Account** - Self-service account deletion

### 🎨 UI/UX Features
- **Beautiful Landing Page** - Gradient design with feature showcase
- **Responsive Design** - Mobile-first approach
- **Modern Components** - Clean, professional interface
- **Role Badges** - Visual indicators for user roles
- **Form Validation** - Real-time client and server-side validation
- **Loading States** - User feedback during operations

---

## 🚀 Tech Stack

| Category | Technology |
|----------|-----------|
| **Framework** | Laravel 12.0 |
| **Language** | PHP 8.2+ |
| **Authentication** | Laravel Breeze |
| **Frontend** | Tailwind CSS 3.1, Alpine.js 3.4 |
| **Build Tool** | Vite 7.0 |
| **Database** | SQLite (default), MySQL/PostgreSQL supported |
| **HTTP Client** | Axios 1.11 |
| **Testing** | PHPUnit 11.5 |
| **Code Style** | Laravel Pint 1.24 |

---

## 📦 Prerequisites

Before you begin, ensure you have the following installed:

- **PHP >= 8.2** with required extensions:
  - OpenSSL
  - PDO
  - Mbstring
  - Tokenizer
  - XML
  - Ctype
  - JSON
  - BCMath
- **Composer** (latest version)
- **Node.js >= 18** and npm
- **SQLite** (or MySQL/PostgreSQL if preferred)

### Quick Check
```bash
php -v
composer --version
node -v
npm -v
```

---

## 🔧 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/Flopchamp/user-management.git
cd user-management
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install Node Dependencies
```bash
npm install
```

### 4. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 5. Configure Database
Edit `.env` file and configure your database connection:

**For SQLite (Default):**
```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

**For MySQL:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=user_management
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 6. Create Database
**For SQLite:**
```bash
touch database/database.sqlite
```

**For MySQL:**
```bash
mysql -u root -p
CREATE DATABASE user_management;
EXIT;
```

### 7. Run Migrations
```bash
php artisan migrate
```

### 8. Build Frontend Assets
```bash
npm run build
```

### 9. Start Development Server
```bash
# Option 1: Simple server
php artisan serve

# Option 2: Full development environment (recommended)
composer run dev
```

The application will be available at: **http://localhost:8000**

---

## 📖 Usage

### First Time Setup

1. **Register a New Account**
   - Navigate to `http://localhost:8000/register`
   - Fill in your details and create an account

2. **Become an Admin**
   - After registration, login at `http://localhost:8000/login`
   - Visit `http://localhost:8000/make-admin` (development only)
   - You'll be promoted to admin role

3. **Access Admin Panel**
   - Navigate to `http://localhost:8000/admin/users`
   - Manage all users from the dashboard

### Admin Features

#### View All Users
- Go to `/admin/users`
- See list of all users with their roles
- Search and filter capabilities

#### Create New User
- Click "Add New User" button
- Fill in user details:
  - Name
  - Email
  - Password
  - Role (User/Admin)
- Submit to create

#### Edit User
- Click "Edit" next to any user
- Update user information
- Change role assignment
- Optionally update password

#### Delete User
- Click "Delete" next to any user
- Confirm deletion
- Note: Admins cannot delete themselves

### User Features

#### Profile Management
- Access profile via navigation menu
- Update name and email
- Change password
- Delete account

---

## 📁 Project Structure

```
user-management/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   └── UserController.php      # Admin user CRUD
│   │   │   ├── Auth/                        # Authentication controllers
│   │   │   └── ProfileController.php        # User profile management
│   │   ├── Middleware/
│   │   │   └── AdminMiddleware.php          # Admin access control
│   │   └── Requests/
│   │       └── ProfileUpdateRequest.php     # Form validation
│   ├── Models/
│   │   └── User.php                         # User model with roles
│   └── Providers/
│       └── AppServiceProvider.php
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   └── 2026_01_04_093550_add_role_to_users_table.php
│   ├── factories/
│   │   └── UserFactory.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   ├── views/
│   │   ├── admin/
│   │   │   └── users/                       # Admin user views
│   │   ├── auth/                            # Authentication views
│   │   ├── profile/                         # Profile views
│   │   ├── layouts/                         # Layout templates
│   │   ├── dashboard.blade.php
│   │   └── welcome.blade.php                # Landing page
│   ├── css/
│   │   └── app.css                          # Tailwind CSS
│   └── js/
│       ├── app.js
│       └── bootstrap.js
├── routes/
│   ├── web.php                              # Web routes
│   ├── auth.php                             # Authentication routes
│   └── console.php
├── tests/
│   ├── Feature/
│   │   ├── Auth/                            # Authentication tests
│   │   └── ProfileTest.php
│   └── Unit/
├── .env.example                             # Environment template
├── composer.json                            # PHP dependencies
├── package.json                             # Node dependencies
├── phpunit.xml                              # PHPUnit configuration
├── tailwind.config.js                       # Tailwind configuration
├── vite.config.js                           # Vite configuration
└── Procfile                                 # Heroku deployment
```

---

## 🗄️ Database Schema

### Users Table
| Column | Type | Description |
|--------|------|-------------|
| `id` | bigint | Primary key |
| `name` | string | User's full name |
| `email` | string | Unique email address |
| `role` | string | User role (user/admin) - default: 'user' |
| `email_verified_at` | timestamp | Email verification date |
| `password` | string | Hashed password |
| `remember_token` | string | Remember me token |
| `created_at` | timestamp | Creation timestamp |
| `updated_at` | timestamp | Last update timestamp |

### Other Tables
- `password_reset_tokens` - Password reset functionality
- `sessions` - Session management
- `cache` - Application caching
- `jobs` - Queue management

---

## 🧪 Testing

### Run All Tests
```bash
php artisan test
```

### Run Specific Test Suite
```bash
# Feature tests
php artisan test --testsuite=Feature

# Unit tests
php artisan test --testsuite=Unit

# Specific test file
php artisan test tests/Feature/ProfileTest.php
```

### Code Coverage
```bash
php artisan test --coverage
```

### Code Style
```bash
# Check code style
./vendor/bin/pint --test

# Fix code style
./vendor/bin/pint
```

---

## 🚢 Deployment

### Heroku Deployment

This project includes a `Procfile` for Heroku deployment.

```bash
# Login to Heroku
heroku login

# Create new app
heroku create your-app-name

# Set buildpacks
heroku buildpacks:add heroku/php
heroku buildpacks:add heroku/nodejs

# Set environment variables
heroku config:set APP_KEY=$(php artisan key:generate --show)
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false

# Deploy
git push heroku main

# Run migrations
heroku run php artisan migrate --force
```

### Production Checklist

- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Set strong `APP_KEY`
- [ ] Configure production database
- [ ] Set up email service (Mailtrap, SendGrid, etc.)
- [ ] Enable HTTPS
- [ ] Remove `/make-admin` route
- [ ] Set up backups
- [ ] Configure logging
- [ ] Enable caching
- [ ] Optimize application (`php artisan optimize`)

---

## 🔒 Security

### Security Features
- ✅ **Password Hashing** - Bcrypt with 12 rounds
- ✅ **CSRF Protection** - Laravel's built-in CSRF tokens
- ✅ **SQL Injection Prevention** - Eloquent ORM with prepared statements
- ✅ **XSS Protection** - Blade template escaping
- ✅ **Route Protection** - Middleware-based authorization
- ✅ **Email Verification** - Optional email confirmation
- ✅ **Password Validation** - Strong password requirements
- ✅ **Self-Deletion Prevention** - Admins can't delete themselves

### Security Best Practices
1. **Never commit `.env` file** - Contains sensitive credentials
2. **Use strong passwords** - Enforce password complexity
3. **Keep dependencies updated** - Run `composer update` regularly
4. **Enable two-factor authentication** - Consider adding 2FA
5. **Regular security audits** - Review code and dependencies
6. **Remove development routes** - Delete `/make-admin` in production

### Reporting Vulnerabilities
If you discover a security vulnerability, please email the maintainer directly instead of using the issue tracker.

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. **Fork the repository**
2. **Create a feature branch**
   ```bash
   git checkout -b feature/amazing-feature
   ```
3. **Commit your changes**
   ```bash
   git commit -m 'Add some amazing feature'
   ```
4. **Push to the branch**
   ```bash
   git push origin feature/amazing-feature
   ```
5. **Open a Pull Request**

### Development Guidelines
- Follow PSR-12 coding standards
- Write tests for new features
- Update documentation as needed
- Run code style checks (`./vendor/bin/pint`)
- Ensure all tests pass

---

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 👨‍💻 Author

**Flopchamp**
- GitHub: [@Flopchamp](https://github.com/Flopchamp)

---

## 🙏 Acknowledgments

- Built with [Laravel](https://laravel.com)
- Authentication by [Laravel Breeze](https://laravel.com/docs/breeze)
- UI components by [Tailwind CSS](https://tailwindcss.com)
- Icons and inspiration from the Laravel community

---

## 📞 Support

For support, please open an issue in the GitHub repository or contact the maintainer.

---

<p align="center">Made with ❤️ using Laravel</p>
