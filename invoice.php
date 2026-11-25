<?php

include_once __DIR__ . "/includes/connection.php";
session_start();
$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice | SuperBazaar</title>
        <link rel="icon" href="assets/img/logo.svg">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>
        <div class="container mt-5">
            <div class="invoice-box p-5 border border-3 rounded-3 border-black" id="printArea">
                <div class="row">
                    <div class="col-6">
                        <img src="assets/img/logo.svg" class="img-fluid" style="max-width: 100px;">
                    </div>

                    <div class="col-6 d-flex justify-content-end">
                        <p>
                            <strong style="font-size: 30px;">Invoice #: <?php echo $d["order_id"] ?></strong><br>
                            Date : <?php echo $d["order_date"] ?>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row mb-4">
                    <div class="col-6">
                        <h5>From:</h5>
                        <p>
                            SuperBazaar, Inc.<br>
                            No.45, 1st lane,<br>
                            Colombo 00700
                        </p>
                    </div>
                    <div class="col-6 text-end pe-4">
                        <h5 class="pe-4">To:</h5>
                        <p class="d-flex justify-content-end">
                            <?php echo $user["fname"] ?>     <?php echo $user["lname"] ?><br>
                            <?php echo $user["mobile"] ?><br>
                        </p>

                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <table class="table table-bordered border border-5">
                            <thead class="thead-light">
                                <tr>
                                    <th>Payment Method</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Online</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <table class="table table-bordered border border-5">
                            <thead class="thead-light">
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $rs2 = Database::search("SELECT * FROM `order_item` 
                                INNER JOIN `stock` ON `order_item`.stock_stock_id = `stock`.stock_id
                                INNER JOIN `product` ON `stock`.product_id = `product`.id
                                WHERE `order_item`.order_history_ohid = '" . $orderHistoryId . "'");

                                $num2 = $rs2->num_rows;

                                for ($i = 0; $i < $num2; $i++) {
                                    $d2 = $rs2->fetch_assoc();
                                    ?>

                                    <tr>
                                        <td><?php echo $d2["name"] ?></td>
                                        <td><?php echo $d2["oi_qty"] ?></td>
                                        <td><?php echo ($d2["price"] * $d2["oi_qty"]) ?> LKR</td>
                                    </tr>

                                    <?php
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="text-end mt-5 pe-5">
                        <h6>Number of Items : <span class="text-muted"><?php echo $num2 ?></span></h6>
                        <h5 class="mt-3">Delivery Fee : <span class="text-muted">1000 LKR</span></h5>
                        <h3 class="mt-4">Net Total : <span class="text-black"><?php echo $d["amount"] ?> LKR </span></h3>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end container mt-5 mb-5">
                <button class="btn btn-secondary col-2" onclick="back5();">Back</button>
                <button class="btn btn-dark col-2 ms-5" onclick="printDiv();">Print</button>
            </div>

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </body>

    </html>

    <?php
} else {
    header("Location: index.php");
    exit();
}
?>