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
</head>

<?php
$catId = isset($_GET["id"]) ? intval($_GET["id"]) : 1;
if ($catId < 1 || $catId > 19) { $catId = 1; }
?>
<body onload="loadCategory(<?php echo $catId; ?>, 0);">
    <!-- NavBar -->
    <?php include __DIR__ . "/includes/navBar.php" ?>
    <!-- NavBar -->

    <?php include_once __DIR__ . "/includes/connection.php" ?>


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
        <!-- Advanced Search -->
        <div class="a15 d-none" id="filterId">
            <div class="border border-light mt-4 p-3 p-lg-4 mx-auto a14 custom-div">

                <h1 class="text-center a8 mb-3">Filters</h1>
                <div class="row g-3">

                    <div class="col-12 col-xl-6">
                        <label for="color" class="form-label mb-1">Color</label>
                        <select class="form-select bg-dark text-light" id="color">
                            <option value="" disabled selected>Select Color</option>

                            <?php
                            $rs = Database::search("SELECT * FROM `color`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                                ?>

                                <option value="<?php echo $d["color_id"]; ?>"><?php echo $d["color_name"]; ?></option>

                                <?php
                            }
                            ?>

                        </select>
                    </div>

                    <div class="col-12 col-xl-6">
                        <label for="cat" class="form-label mb-1">Category</label>
                        <select class="form-select bg-dark text-light" id="cat">
                            <option value="" disabled selected>Select Category</option>

                            <?php
                            $rs = Database::search("SELECT * FROM `category`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                                ?>

                                <option value="<?php echo $d["cat_id"]; ?>"><?php echo $d["cat_name"]; ?></option>

                                <?php
                            }
                            ?>

                        </select>
                    </div>

                    <div class="col-12 col-xl-6">
                        <label for="brand" class="form-label mb-1">Brand</label>
                        <select class="form-select bg-dark text-light" id="brand">
                            <option value="" disabled selected>Select Brand</option>

                            <?php
                            $rs = Database::search("SELECT * FROM `brand`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                                ?>

                                <option value="<?php echo $d["brand_id"]; ?>"><?php echo $d["brand_name"]; ?></option>

                                <?php
                            }
                            ?>

                        </select>
                    </div>

                    <div class="col-12 col-xl-6">
                        <label for="series" class="form-label mb-1">Series</label>
                        <select class="form-select bg-dark text-light" id="series">
                            <option value="" disabled selected>Select Series</option>

                            <?php
                            $rs = Database::search("SELECT * FROM `series`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                                ?>

                                <option value="<?php echo $d["series_id"]; ?>"><?php echo $d["series_name"]; ?></option>

                                <?php
                            }
                            ?>

                        </select>
                    </div>

                </div>

                <div class="row g-2 mt-3">
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control" placeholder="Min Price" id="min">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control" placeholder="Max Price" id="max">
                    </div>
                    <div class="col-12 mt-2">
                        <button class="btn btn-light w-100" onclick="advSearchProduct(0);">Filter</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Advanced Search -->


        <!-- main content -->
        <div class="main-content">


            <div class="container4">

                <div class="row" id="pid">


                </div>

            </div>


        </div>
        <!-- main content -->

    </div>


    <div class="d-flex justify-content-center">
        <div class="box">
            <img src="assets/img/guard.png">
            <p class="mt-2">Warranty Assured</p>
        </div>

        <div class="box">
            <img src="assets/img/setting2.png" height="25">
            <p class="mt-2">Custom Orders</p>
        </div>

        <div class="box">
            <img src="assets/img/deli.png">
            <p class="mt-2">Home Delivery</p>
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