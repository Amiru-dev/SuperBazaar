<?php

session_start();
include_once __DIR__ . "/../includes/connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `product` INNER JOIN `brand` ON `product`.`brand_brand_id` = `brand`.`brand_id`          
    INNER JOIN `color` ON `product`.`color_color_id` = `color`.`color_id`                                 
    INNER JOIN `category` ON `product`.`category_cat_id` = `category`.`cat_id`                          
    INNER JOIN `series` ON `product`.`series_series_id` = `series`.`series_id` ORDER BY `product`.`id` ASC");

    $num = $rs->num_rows;

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Report | SuperBazaar</title>
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
            <h1 class="text-center">Product Report</h1>
            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Brand Name</th>
                        <th>Category</th>
                        <th>Color</th>
                        <th>Series</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                        ?>

                        <tr>
                            <td><?php echo e($d["id"]) ?></td>
                            <td><?php echo e($d["name"]) ?></td>
                            <td><?php echo e($d["brand_name"]) ?></td>
                            <td><?php echo e($d["cat_name"]) ?></td>
                            <td><?php echo e($d["color_name"]) ?></td>
                            <td><?php echo e($d["series_name"]) ?></td>
                            <td><?php echo e($d["description"]) ?></td>
                            <td><img src="../<?php echo e($d["path"]) ?>" height="50" /></td>
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