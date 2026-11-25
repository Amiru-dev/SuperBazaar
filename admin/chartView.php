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

    $allowedTypes = ["pie", "bar", "doughnut", "line"];
    $type = isset($_GET["type"]) && in_array($_GET["type"], $allowedTypes, true) ? $_GET["type"] : "pie";
    $reportTitle = $titles[$report];

    ?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="light">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $reportTitle; ?> | SuperBazaar</title>
        <link rel="icon" href="../assets/img/logo.svg">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">

        <style>
            @media print {
                body * {
                    visibility: hidden;
                }
                #printArea, #printArea * {
                    visibility: visible;
                }
                #printArea {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                }
            }
        </style>
    </head>

    <body class="adminBody" onload="loadChart(<?php echo $report; ?>, '<?php echo $type; ?>');">

        <div class="row">
            <!-- chart-->
            <div style="width: 400px;" id="printArea" class="mb-4">
                <h1 class="text-center mb-5 mt-0"><?php echo $reportTitle; ?></h1>
                <canvas id="myChart"></canvas>
            </div>
            <!-- chart -->

            <div class="d-flex justify-content-center container mt-5">
                <a href="chartMenu.php?report=<?php echo $report; ?>" class="btn btn-warning col-4">Back</a>
                <button class="btn btn-dark col-4 ms-3" onclick="printDiv();">Print</button>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-dark text-light text-center py-2 mt-2 fixed-bottom">
            &copy; 2024 SuperBazaar || All rights reserved.
        </footer>
        <!-- Footer -->

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/admin.js"></script>
        <script src="../assets/js/bootstrap.js"></script>

        <script>
            function printDiv() {
                window.print();
            }
        </script>
    </body>

    </html>

    <?php

} else {
    header("Location: adminSignIn.php");
    exit();
}

?>
