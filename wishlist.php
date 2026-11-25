<?php

include_once __DIR__ . "/includes/connection.php";
session_start();

if (isset($_SESSION["u"])) {
    $user = $_SESSION["u"];

    ?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wishlist | SuperBazaar</title>
        <link rel="icon" href="assets/img/logo.svg">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <style>
            footer {
                flex-shrink: 0;
            }
        </style>
    </head>

    <body onload="loadWishlist();">
        <!-- NavBar -->
        <?php include __DIR__ . "/includes/navBar.php" ?>
        <!-- NavBar -->

        <div class="container mt-5">
            <div class="row" id="wishlistBody">

                <!-- wishlist load -->




            </div>

        </div>

        <!-- Footer -->
        <footer class="bg-dark text-light text-center py-2 mt-0">
            &copy; 2024 SuperBazaar || All rights reserved.
        </footer>
        <!-- Footer -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </body>

    </html>


    <?php

} else {
    header("Location: homepage.php");
    exit();
}

?>