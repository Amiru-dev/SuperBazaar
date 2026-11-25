<?php

session_start();

if (isset($_SESSION["a"])) {

    ?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard | SuperBazaar</title>
        <link rel="icon" href="../assets/img/logo.svg">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body class="a2">

        <!-- NavBar -->
        <?php include __DIR__ . "/../includes/adminNavBar.php"; ?>
        <!-- NavBar -->

        <div class="container1">

            <a href="userManagement.php" class="a3">
                <div class="box">
                    <img src="../assets/img/profile.png">
                    <p class="mt-2">User Management</p>
                </div>
            </a>

            <a href="productManagement.php" class="a3">
                <div class="box">
                    <img src="../assets/img/product.png">
                    <p class="mt-2">Product Management</p>
                </div>
            </a>
        </div>

        <div class="container1 mt-4">

            <a href="stockManagement.php" class="a3">
                <div class="box">
                    <img src="../assets/img/stock.png">
                    <p class="mt-2">Stock Management</p>
                </div>
            </a>

            <a href="reports.php" class="a3">
                <div class="box">
                    <img src="../assets/img/reports.png">
                    <p class="mt-2">Reports</p>
                </div>
            </a>
        </div>


        <!-- Footer -->
        <footer class="bg-dark text-light text-center py-2 mt-2 fixed-bottom">
            &copy; 2024 SuperBazaar || All rights reserved.
        </footer>
        <!-- Footer -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/admin.js"></script>
        <script src="../assets/js/bootstrap.js"></script>
    </body>

    </html>

    <?php

} else {
    header("Location: adminSignIn.php");
    exit();
}

?>