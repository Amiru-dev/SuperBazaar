# SuperBazaar Database

This directory contains the MySQL database scripts for the SuperBazaar e-commerce project.

## Files

| File | Description |
|------|-------------|
| `superbazaar_full_setup.sql` | Full setup — drops & recreates the database, all tables, and seeds all data |
| `README.md` | This documentation |

## Quick Setup

### Option 1: MySQL Command Line
```bash
mysql -u root -p < "c:\Users\ASUS\Documents\SuperBazaar\database\superbazaar_full_setup.sql"
```

### Option 2: MySQL Workbench
1. Open MySQL Workbench
2. Connect to `localhost:3306` with user `root`
3. Open `superbazaar_full_setup.sql` → Execute (⚡)

## Database Schema

```
superbazaar
├── user_type        (Admin / Customer)
├── user             (registered users with address fields)
├── category         (19 product categories)
├── brand            (19 brands: Intel, AMD, ASUS, MSI, Corsair, etc.)
├── color            (10 colors)
├── series           (10 product series)
├── product          (28 products with images from nanotek.lk)
├── stock            (28 stock entries with LKR prices)
├── cart             (shopping cart items)
├── wishlist         (wishlist items)
├── order_history    (completed orders)
└── order_item       (individual items in orders)
```

## Seed Data Summary

- **5 users** (1 admin + 4 customers)
- **19 categories** matching the website's sidebar
- **19 brands** (Intel, AMD, ASUS, MSI, Corsair, Samsung, etc.)
- **28 products** across all categories with real product images from [nanotek.lk](https://www.nanotek.lk)
- **28 stock entries** with realistic LKR prices
- **3 sample orders** with 6 order items

## Login Credentials

| Role | Username | Password |
|------|----------|----------|
| Admin | `admin` | `admin123` |
| Customer | `kasun` | `kasun123` |
| Customer | `nimali` | `nimali123` |
| Customer | `ruwan` | `ruwan123` |
| Customer | `sachini` | `sachini12` |

## Connection Settings

Configured in `connection.php`:
- **Host:** localhost
- **User:** root
- **Password:** YOUR_MYSQL_PASSWORD
- **Database:** superbazaar
- **Port:** 3306
