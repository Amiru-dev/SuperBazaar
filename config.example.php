<?php

// Copy this file to config.php and fill in your own credentials.
// config.php is gitignored so your secrets are never committed.

// Database Configuration
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "YOUR_MYSQL_PASSWORD");
define("DB_NAME", "superbazaar");
define("DB_PORT", "3306");

// SMTP (Gmail) Configuration
define("SMTP_HOST", "smtp.gmail.com");
define("SMTP_USER", "your-email@gmail.com");
define("SMTP_PASS", "YOUR_GMAIL_APP_PASSWORD");
define("SMTP_PORT", 465);

// PayHere Configuration
define("PAYHERE_MERCHANT_ID", "YOUR_PAYHERE_MERCHANT_ID");
define("PAYHERE_MERCHANT_SECRET", "YOUR_PAYHERE_MERCHANT_SECRET");
define("PAYHERE_SANDBOX", true);

?>
