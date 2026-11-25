<?php

session_start();
include_once __DIR__ . "/../includes/connection.php";

if (isset($_SESSION["a"])) {

    ?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock Manage | SuperBazaar</title>
        <link rel="icon" href="../assets/img/logo.svg">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body>

        <!-- NavBar -->
        <?php include __DIR__ . "/../includes/adminNavBar.php"; ?>
        <!-- NavBar -->

        <div class="adminbody" id="stockMan">

            <div class="row col-12 a7" id="signUpBox">
                <div class="col-5 offset-1 custom-div">

                    <h1 class="text-center a8">Product Registration</h1>

                    <div class="mt-3">
                        <label for="pname" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="pname" required>
                    </div>

                    <div class="row">
                        <div class="mt-3 col-6">
                            <label for="brand" class="form-label">Brand</label>
                            <select class="form-select" id="brand" required>
                                <option value="" disabled selected>Select Brand</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `brand`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                    ?>

                                    <option value="<?php echo ($d["brand_id"]); ?>"><?php echo ($d["brand_name"]); ?></option>

                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mt-3 col-6">
                            <label for="cat" class="form-label">Category</label>
                            <select class="form-select" id="cat" required>
                                <option value="" disabled selected>Select Category</option>

                                <?php
                                $rs = Database::search("SELECT * FROM `category`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();

                                    ?>
                                    <option value="<?php echo ($d["cat_id"]); ?>"><?php echo ($d["cat_name"]); ?></option>

                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-3 col-6">
                            <label for="color" class="form-label">Color</label>
                            <select class="form-select" id="color" required>
                                <option value="" disabled selected>Select Color</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `color`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                    ?>

                                    <option value="<?php echo ($d["color_id"]); ?>"><?php echo ($d["color_name"]); ?></option>

                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mt-3 col-6">
                            <label for="series" class="form-label">Series</label>
                            <select class="form-select" id="series" required>
                                <option value="" disabled selected>Select Series</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `series`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                    ?>

                                    <option value="<?php echo ($d["series_id"]); ?>"><?php echo ($d["series_name"]); ?></option>

                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea id="desc" rows="3" class="form-control" required></textarea>
                    </div>

                    <div class="mt-3">
                        <label for="file" class="form-label">Product Image</label>
                        <input id="file" class="form-control" type="file" required>
                    </div>

                    <div class="d-flex justify-content-center mt-3 mb-5">
                        <button class="btn btn-outline-light col-12" onclick="regProduct();">Register Product</button>
                    </div>
                </div>

                <div class="col-1">
                </div>

                <!-- Stock Management -->
                <div class="row col-4 custom-div">
                    <h1 class="text-center a8">Stock Update</h1>

                    <div class="mt-3 col-10 offset-1">
                        <label for="selectProduct" class="form-label">Product Name</label>
                        <select class="form-select" id="selectProduct" required>
                            <option value="" disabled selected>Select Product</option>

                            <?php
                            $rs = Database::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                                ?>

                                <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>

                                <?php
                            }
                            ?>

                        </select>
                    </div>

                    <div class="mt-0 col-10 offset-1">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="qty" required>
                    </div>

                    <div class="mt-0 col-10 offset-1">
                        <label for="uprice" class="form-label">Unit Price</label>
                        <input type="number" class="form-control" id="uprice" required>
                    </div>

                    <div class="mt-0 col-10 offset-1">
                        <button class="btn btn-outline-light col-12" onclick="updateStock();">Update Stock</button>
                    </div>
                </div>
            </div>
            <!-- Stock Management -->

        </div>
        <!-- Footer -->
        <footer class="bg-dark text-light text-center py-2 mt-2 fixed-bottom">
            &copy; 2024 SuperBazaar || All rights reserved.
        </footer>
        <!-- Footer -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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