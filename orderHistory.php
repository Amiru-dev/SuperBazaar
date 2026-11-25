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
        <title>Order History | SuperBazaar</title>
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

    <body>
        <!-- NavBar -->
        <?php include __DIR__ . "/includes/navBar.php" ?>
        <!-- NavBar -->

        <div class="container mt-5">
            <div class="row">

                <?php
                $rs = Database::search("SELECT * FROM `order_history` WHERE `user_id` = '" . $user["id"] . "'");
                $num = $rs->num_rows;

                if ($num > 0) {
                    // not empty
                    ?>

                    <!-- row start -->
                    <div class="mt-4 mb-3">
                        <h2>Order History</h2>
                    </div>

                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                        ?>

                        <!-- order history card -->
                        <div class="p-3 border border-3 rounded-3 bg-body-tertiary mb-5">
                            <div>
                                <h5>Order ID : <span class="text-info">#<?php echo $d["order_id"] ?></span> </h5>
                                <p><?php echo $d["order_date"] ?></p>
                            </div>

                            <div class="ps-5 pe-5 mt-4">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $rs2 = Database::search("SELECT * FROM `order_item` 
                                        INNER JOIN `stock` ON `order_item`.stock_stock_id = `stock`.stock_id
                                        INNER JOIN `product` ON `stock`.product_id = `product`.id 
                                        WHERE `order_item`.order_history_ohid = '" . $d["ohid"] . "'");

                                        $num2 = $rs2->num_rows;

                                        for ($j = 0; $j < $num2; $j++) {
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

                            <div class="d-flex flex-column align-items-end pe-5 mt-2">
                                <h5>Delivery Fee : <span class="text-muted">1000 LKR</span></h5>
                                <h3>Net Total : <span class="text-warning"><?php echo $d["amount"] ?> LKR</span></h3>
                            </div>

                        </div>
                        <!-- order history card -->

                        <?php
                    }
                    ?>

                    <div class="col-12 text-center mt-1 mb-5">
                        <a href="index.php" class="btn btn-outline-light mt-2 col-4">Start Shopping Again</a>
                    </div>

                    <?php
                } else {
                    // empty
                    ?>
                    <div class="col-12 text-center mb-5">
                        <h2 class="a8">You have not placed any order!</h2>
                        <img src="assets/img/32.png" class="b8 d-flex justify-content-center">
                        <a href="index.php" class="btn btn-outline-light mt-4 col-4">Start Shopping</a>
                    </div>

                    <?php
                }
                ?>

            </div>
        </div>


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