<?php

session_start();
include_once __DIR__ . "/../includes/connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` ORDER BY `stock`.`stock_id` ASC");
    $num = $rs->num_rows;

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock Report | SuperBazaar</title>
        <link rel="icon" href="../assets/img/logo.svg">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body>

        <div class="container mt-3">
            <a href="reports.php"><img src="../assets/img/backicon.png" height="60"></a>
        </div>

        <div class="container mt-3" id="printArea">
            <h1 class="text-center">Stock Report</h1>
            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th>Stock Id</th>
                        <th>Product Name</th>
                        <th>Stock Quantity</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                        ?>

                        <tr>
                            <td><?php echo e($d["stock_id"]) ?></td>
                            <td><?php echo e($d["name"]) ?></td>
                            <td><?php echo e($d["qty"]) ?></td>
                            <td><?php echo e($d["price"]) ?></td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end container mt-5 mb-5">
            <button class="btn btn-dark col-2" onclick="printDiv();">Print</button>
        </div>

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