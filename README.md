# SuperBazaar — PC Components E-Commerce Platform

A full-stack PHP & MySQL e-commerce web application for browsing and purchasing PC components, peripherals, and gaming gear, complete with an admin management dashboard, analytics charts, PayHere payment integration, and password reset via email.

---

## Features

### Customer Storefront
- **Product Catalog & Filtering:** Browse 19 hardware categories (`category.php?id=...`), live search, and multi-criteria filtering (color, category, brand, series, min/max price).
- **Cart & Wishlist:** Add, update quantities, remove items, and manage your wishlist.
- **Checkout & Payments:** Integrated with **PayHere Sandbox** (`api/paymentProcess.php`) with automatic order history and printable invoices (`invoice.php`).
- **User Account:** Sign up, sign in with "Remember me", profile editing with validated image upload, order history (`orderHistory.php`), and email password reset via **PHPMailer** (`forgetPassword.php` / `resetPassword.php`).
- **Custom 404 Page:** Animated 404 error page (`404.php`) routed via `.htaccess`.

### Admin Dashboard (`/admin/`)
- **User Management:** Search users and toggle active/inactive status.
- **Product & Stock Management:** Register brands, categories, colors, series, products (with image upload validation), and update stock quantities/prices.
- **Reports & Analytics:** Printable User, Product, and Stock reports, plus interactive **Chart.js** visualizations (`chartMenu.php` / `chartView.php`) across Pie, Bar, Doughnut, and Line charts.

---

## Tech Stack

- **Backend:** PHP 8.2 (`mysqli`), PHPMailer
- **Database:** MySQL 8.0
- **Frontend:** HTML5, CSS3, Bootstrap 5.3, Bootstrap Icons, SweetAlert2, Chart.js
- **Payments:** PayHere JS SDK (Sandbox)

---

## Project Structure

```text
SuperBazaar/
├── admin/                  # Admin dashboard, reports, and Chart.js views
├── api/                    # Backend endpoints (*Process.php)
├── assets/
│   ├── css/                # Stylesheets (style.css, bootstrap.css)
│   ├── fonts/              # Custom fonts (HACKED.ttf)
│   ├── img/                # Logos, icons, productImg/, profileImg/
│   └── js/                 # main.js (storefront), admin.js (admin panel), bootstrap
├── database/
│   ├── README.md
│   └── superbazaar_full_setup.sql
├── includes/               # connection.php, auth guards, uploadHelper.php, navbars
├── vendor/phpmailer/       # PHPMailer library
├── config.example.php      # Configuration template (copy to config.php)
├── .htaccess               # Custom 404 routing
├── .gitignore              # Excludes config.php, .env, logs, OS files
└── *.php                   # Customer-facing pages (index.php, category.php, cart.php, ...)
```

---

## Local Setup

### 1. Prerequisites
- **XAMPP / WAMP / Laragon** (Apache with `mod_rewrite` enabled + PHP 8+ + MySQL 8.0)

### 2. Clone the Repository
```bash
git clone https://github.com/Amiru-dev/SuperBazaar.git
cd SuperBazaar
```
Place (or symlink) the project inside your web server root (e.g., `htdocs/SuperBazaar`).

### 3. Import the Database
```bash
mysql -u root -p < database/superbazaar_full_setup.sql
```
Or open `database/superbazaar_full_setup.sql` in **MySQL Workbench** or **phpMyAdmin** and execute it.

### 4. Configure Environment Credentials
Copy `config.example.php` to `config.php` and fill in your credentials (`config.php` is gitignored):

```bash
cp config.example.php config.php
```

Update `config.php` with your:
- **MySQL** host, user, password, database (`superbazaar`), and port (`3306`)
- **Gmail SMTP** email & App Password (for Forgot Password emails)
- **PayHere Sandbox** Merchant ID & Merchant Secret

### 5. Run Locally
- **Storefront:** `http://localhost/SuperBazaar/index.php`
- **Admin Panel:** `http://localhost/SuperBazaar/admin/adminSignIn.php`

---

## Demo Accounts (Seeded Data)

| Role | Username | Password |
|---|---|---|
| Admin | `admin` | `admin123` |
| Customer | `kasun` | `kasun123` |
| Customer | `nimali` | `nimali123` |
| Customer | `ruwan` | `ruwan123` |
| Customer | `sachini` | `sachini12` |

*(See [database/README.md](database/README.md) for full schema details.)*

---

## License

This project is open-source for educational and portfolio use.
