<?php

include_once __DIR__ . "/includes/connection.php";
$stockId = $_GET["s"];

if (isset($stockId)) {

    $q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
    INNER JOIN `brand` ON `product`.`brand_brand_id` = `brand`.`brand_id` 
    INNER JOIN `color` ON `product`.`color_color_id` = `color`.`color_id`
    INNER JOIN `category` ON `product`.`category_cat_id` = `category`.`cat_id`
    INNER JOIN `series` ON `product`.`series_series_id` = `series`.`series_id`
    WHERE `stock`.`stock_id` = '" . $stockId . "'";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();

    ?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home | SuperBazaar</title>
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

        <!-- Categories -->
        <div class="container3">
            <div class="category-list">
                <a href="category.php?id=1" class="a12">
                    <div class="category-item">
                        <img src="assets/img/6.png" height="30">
                        <span class="category-text ms-4">LAPTOP</span>
                    </div>
                </a>
                <a href="category.php?id=2" class="a12">
                    <div class="category-item">
                        <img src="assets/img/ASUS ROG.png" height="30">
                        <span class="category-text ms-3">ASUS ROG</span>
                    </div>
                </a>
                <a href="category.php?id=3" class="a12">
                    <div class="category-item">
                        <img src="assets/img/apple.png" height="30" class="me-1">
                        <span class="category-text ms-3">APPLE PRODUCTS</span>
                    </div>
                </a>
                <a href="category.php?id=4" class="a12">
                    <div class="category-item">
                        <img src="assets/img/7.png" height="30">
                        <span class="category-text ms-3">CONSOLE GAMING</span>
                    </div>
                </a>
                <a href="category.php?id=5" class="a12">
                    <div class="category-item">
                        <img src="assets/img/8.png" height="30">
                        <span class="category-text ms-3">DESKTOP WORKSTATIONS</span>
                    </div>
                </a>
                <a href="category.php?id=6" class="a12">
                    <div class="category-item">
                        <img src="assets/img/9.png" height="30">
                        <span class="category-text ms-3">GAMING DESKTOPS</span>
                    </div>
                </a>
                <a href="category.php?id=7" class="a12">
                    <div class="category-item">
                        <img src="assets/img/10.png" height="30">
                        <span class="category-text ms-3">BUDGET DESKTOP COMPUTERS</span>
                    </div>
                </a>
                <a href="category.php?id=8" class="a12">
                    <div class="category-item">
                        <img src="assets/img/11.png" height="30">
                        <span class="category-text ms-3">PROCESSORS</span>
                    </div>
                </a>
                <a href="category.php?id=9" class="a12">
                    <div class="category-item">
                        <img src="assets/img/12.png" height="30">
                        <span class="category-text ms-3">MOTHERBOARDS</span>
                    </div>
                </a>
                <a href="category.php?id=10" class="a12">
                    <div class="category-item">
                        <img src="assets/img/13.png" height="30">
                        <span class="category-text ms-3">MEMORY (RAM)</span>
                    </div>
                </a>
                <a href="category.php?id=11" class="a12">
                    <div class="category-item">
                        <img src="assets/img/14.png" height="30">
                        <span class="category-text ms-3">GRAPHIC CARDS</span>
                    </div>
                </a>
                <a href="category.php?id=12" class="a12">
                    <div class="category-item">
                        <img src="assets/img/15.png" height="30">
                        <span class="category-text ms-3">POWER SUPPLY</span>
                    </div>
                </a>
                <a href="category.php?id=13" class="a12">
                    <div class="category-item">
                        <img src="assets/img/16.png" height="30">
                        <span class="category-text ms-3">COOLING AND LIGHTING</span>
                    </div>
                </a>
                <a href="category.php?id=14" class="a12">
                    <div class="category-item">
                        <img src="assets/img/17.png" height="30">
                        <span class="category-text ms-3">STORAGE</span>
                    </div>
                </a>
                <a href="category.php?id=15" class="a12">
                    <div class="category-item">
                        <img src="assets/img/18.png" height="30">
                        <span class="category-text ms-3">CASINGS</span>
                    </div>
                </a>
                <a href="category.php?id=16" class="a12">
                    <div class="category-item">
                        <img src="assets/img/19.png" height="30">
                        <span class="category-text ms-3">MONITORS</span>
                    </div>
                </a>
                <a href="category.php?id=17" class="a12">
                    <div class="category-item">
                        <img src="assets/img/20.png" height="30">
                        <span class="category-text ms-3">SPEAKERS & HEADPHONES</span>
                    </div>
                </a>
                <a href="category.php?id=18" class="a12">
                    <div class="category-item">
                        <img src="assets/img/21.png" height="30">
                        <span class="category-text ms-3">KEYBOARDS, MICE & GAMEPADS</span>
                    </div>
                </a>
                <a href="category.php?id=19" class="a12">
                    <div class="category-item">
                        <img src="assets/img/22.png" height="30">
                        <span class="category-text ms-3">GAMING CHAIRS</span>
                    </div>
                </a>
            </div>
            <!-- Categories -->

            <!-- filters -->
            <div class="a15 d-none" id="filterId">
                <div class="border border-light mt-4 p-5 col-10 offset-1 a14 custom-div">
                    <h1 class="text-center a8 mb-4">Filters</h1>
                </div>
            </div>
            <!-- filters -->

            <!-- main content -->
            <div class="main-content">
                <div class="container7">
                    <div class="col-12 shadow-lg p-5">
                        <div class="col-10 ms-2 mt-0">
                            <h1><?php echo e($d["name"]) ?></h1>
                            <h4 class="mt-3">- <?php echo e($d["cat_name"]) ?> -</h4>
                        </div>
                        <div class="col-10 row">
                            <div class="col-5 mt-3">
                                <div class="product-image">
                                    <img src="<?php echo e($d["path"]) ?>" alt="Product Image">
                                </div>
                            </div>
                            <div class="col-7 yi shadow-lg bg-gradient rounded-4 p-5 mb-2">
                                <h4 class="mt-3 text-warning">Brand : &nbsp;<?php echo e($d["brand_name"]) ?></h4>
                                <h4 class="mt-3">Color : &nbsp;<?php echo e($d["color_name"]) ?></h4>
                                <h4 class="mt-3">Series : &nbsp;<?php echo e($d["series_name"]) ?></h4>
                                <h4 class="mt-4 mb-4"><?php echo e($d["description"]) ?></h4>

                                <div class="row mt-5">
                                    <div class="col-3">
                                        <input type="text" placeholder="Quantity" class="form-control mb-4" id="qty">
                                    </div>
                                    <div class="col-6 mt-2 ms-0">
                                        <h6 class="text-warning">Available Quantity : <?php echo e($d["qty"]) ?></h6>
                                    </div>
                                </div>

                                <h1 class="mb-2"><?php echo e($d["price"]) ?> LKR</h1>
                                <div class="d-flex justify-content-center mt-4">
                                    <button class="btn btn-outline-light col-6"
                                        onclick="addtoCart('<?php echo e($d['stock_id']) ?>');">Add to Cart</button>
                                    <button class="btn btn-outline-warning col-6 ms-2"
                                        onclick="buyNow('<?php echo e($d['stock_id']) ?>');">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main content -->

        </div>

        <!-- Footer -->
        <footer class="bg-dark text-light text-center py-2 mt-0">
            &copy; 2024 SuperBazaar || All rights reserved.
        </footer>
        <!-- Footer -->


        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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