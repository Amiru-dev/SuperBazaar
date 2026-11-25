<?php

include_once __DIR__ . "/includes/connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();

    ?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile | SuperBazaar</title>
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

        <div class="adminBody">

            <div class="row container">
                <div class="col-4 d-flex justify-content-center flex-column custom-div">
                    <div class="d-flex justify-content-center mb-4">
                        <img src="<?php

                        if (!empty($d["img_path"])) {
                            echo e($d["img_path"]);

                        } else {
                            echo ("assets/img/profile.png");
                        }

                        ?>" height="200px" id="i">
                    </div>

                    <div class="mb-3 mt-1">
                        <label for="" class="form-label">Profile Image :</label>
                        <input type="file" class="form-control" id="imgUploader">
                    </div>
                    <div class="d-none" id="msgDiv" onclick="reload();">
                        <div class="alert alert-danger" id="msg"></div>
                    </div>
                    <div>
                        <button class="btn btn-outline-light col-12" onclick="uploadImg();">Upload</button>
                    </div>
                </div>

                <div class="col-1">

                </div>
                <div class="col-7 custom-div">
                    <h1 class="text-center mt-4">Profile Details</h1>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="" class="form-label">First Name :</label>
                            <input type="text" class="form-control" value="<?php echo e($d["fname"]) ?>" id="fname">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Last Name :</label>
                            <input type="text" class="form-control" value="<?php echo e($d["lname"]) ?>" id="lname">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="" class="form-label">Email :</label>
                        <input type="text" class="form-control" value="<?php echo e($d["email"]) ?>" disabled>
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Mobile :</label>
                        <input type="text" class="form-control" value="<?php echo e($d["mobile"]) ?>" id="mobile">
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="" class="form-label">Username :</label>
                            <input type="text" class="form-control" value="<?php echo e($d["username"]) ?>" disabled>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Password :</label>
                            <input type="password" class="form-control" value="<?php echo e($d["password"]) ?>" id="pw">
                        </div>
                    </div>

                    <h2 class="mt-4">Shipping Address</h2>
                    <div class="row mt-4">
                        <div class="col-3">
                            <label for="" class="form-label">No :</label>
                            <input type="text" class="form-control" value="<?php echo e($d["no"]) ?>" id="no">
                        </div>
                        <div class="col-9">
                            <label for="" class="form-label">Line 01 :</label>
                            <input type="text" class="form-control" value="<?php echo e($d["line_1"]) ?>" id="line1">
                        </div>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="" class="form-label">Line 02 :</label>
                        <input type="text" class="form-control" value="<?php echo e($d["line_2"]) ?>" id="line2">
                    </div>
                    <div class="d-none" id="msgDiv2" onclick="reload();">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>
                    <div class="mt-3 mb-3">
                        <button class="btn btn-outline-light col-12" onclick="updateData();">Update</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-dark text-light text-center py-2 mt-0">
            &copy; 2024 SuperBazaar || All rights reserved.
        </footer>
        <!-- Footer -->

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