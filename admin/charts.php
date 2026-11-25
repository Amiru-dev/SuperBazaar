<?php

session_start();

if (isset($_SESSION["a"])) {

    ?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reports | SuperBazaar</title>
        <link rel="icon" href="../assets/img/logo.svg">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body class="adminBody2">

        <!-- NavBar -->
        <?php include __DIR__ . "/../includes/adminNavBar.php"; ?>
        <!-- NavBar -->

        <div class="col-12 mb-5">
            <h1 class="text-center b13">Charts</h1>

            <div class="container5 mt-5">

                <a href="chartMenu.php?report=1" class="a3">
                    <div class="box mt-4">
                        <img src="../assets/img/dou.png">
                        <p class="mt-2">Most Sold Products</p>
                    </div>
                </a>

                <a href="chartMenu.php?report=2" class="a3">
                    <div class="box mt-4">
                        <img src="../assets/img/bar1.png">
                        <p class="mt-2">Top 5 Customers</p>
                    </div>
                </a>

                <a href="chartMenu.php?report=3" class="a3">
                    <div class="box mt-4">
                        <img src="../assets/img/pie.png">
                        <p class="mt-2">Low Quantity Products</p>
                    </div>
                </a>
                
                <a href="chartMenu.php?report=4" class="a3">
                    <div class="box mt-4">
                        <img src="../assets/img/line.png">
                        <p class="mt-2">High Quantity Products</p>
                    </div>
                </a>
            </div>

            <div class="col-12 text-center mt-1 mb-4">
                <a href="reports.php" class="btn btn-light mt-2 col-1">Back</a>
            </div>

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