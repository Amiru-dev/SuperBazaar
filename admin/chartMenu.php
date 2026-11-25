<?php

session_start();

if (isset($_SESSION["a"])) {

    $report = isset($_GET["report"]) ? intval($_GET["report"]) : 1;
    $titles = [
        1 => "Most Sold Products",
        2 => "Top 5 Customers",
        3 => "Low Quantity Products",
        4 => "High Quantity Products",
    ];
    if (!isset($titles[$report])) {
        $report = 1;
    }
    $reportTitle = $titles[$report];

    ?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $reportTitle; ?> | SuperBazaar</title>
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
            <h1 class="text-center b13"><?php echo $reportTitle; ?></h1>

            <div class="container5 mt-5">

                <a href="chartView.php?report=<?php echo $report; ?>&type=pie" class="a3">
                    <div class="box mt-4">
                        <img src="../assets/img/pie.png">
                        <p class="mt-2">Pie Chart</p>
                    </div>
                </a>

                <a href="chartView.php?report=<?php echo $report; ?>&type=bar" class="a3">
                    <div class="box mt-4">
                        <img src="../assets/img/bar1.png">
                        <p class="mt-2">Bar Chart</p>
                    </div>
                </a>

                <a href="chartView.php?report=<?php echo $report; ?>&type=doughnut" class="a3">
                    <div class="box mt-4">
                        <img src="../assets/img/dou.png">
                        <p class="mt-2">Doughnut Chart</p>
                    </div>
                </a>

                <a href="chartView.php?report=<?php echo $report; ?>&type=line" class="a3">
                    <div class="box mt-4">
                        <img src="../assets/img/line.png">
                        <p class="mt-2">Line Chart</p>
                    </div>
                </a>
            </div>

            <div class="col-12 text-center mt-1 mb-4">
                <a href="charts.php" class="btn btn-light mt-2 col-1">Back</a>
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
