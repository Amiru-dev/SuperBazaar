<?php

session_start();

if (isset($_SESSION["a"])) {

    ?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Manage | SuperBazaar</title>
        <link rel="icon" href="../assets/img/logo.svg">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body class="adminBody1">

        <!-- NavBar -->
        <?php include __DIR__ . "/../includes/adminNavBar.php"; ?>
        <!-- NavBar -->

        <div class="col-10">
            <p class="a5">Product Management</p>

            <div class="row">

                <!-- Brand Register -->
                <div class="col-4 offset-1 mt-1 custom-div">
                    <label for="form-label" class="mb-1 a6">Brand Name</label>
                    <input type="text" class="form-control mb-3" id="brand" />

                    <div class="d-none" id="msgDiv1" onclick="reload();">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-outline-light col-12 mb-2" onclick="brandReg();">Brand Register</button>
                    </div>
                </div>
                <!-- Brand Register -->

                <!-- Category Register -->
                <div class="col-4 offset-2 mt-1 custom-div">

                    <label for="form-label" class="mb-1 a6">Category</label>
                    <input type="text" class="form-control mb-3" id="cat" />

                    <div class="d-none" id="msgDiv2" onclick="reload();">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-outline-light col-12 mb-2" onclick="categoryReg();">Category Register</button>
                    </div>
                </div>
                <!-- Category Register -->
            </div>

            <div class="row mt-5">

                <!-- Color Register -->
                <div class="col-4 offset-1 mt-4 custom-div">
                    <label for="form-label" class="mb-1 a6">Color</label>
                    <input type="text" class="form-control mb-3" id="color" />

                    <div class="d-none" id="msgDiv3" onclick="reload();">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-outline-light col-12 mb-2" onclick="colorReg();">Color Register</button>
                    </div>
                </div>
                <!-- Color Register -->

                <!-- Series Register -->
                <div class="col-4 offset-2 mt-4 custom-div">

                    <label for="form-label" class="mb-1 a6">Series Name</label>
                    <input type="text" class="form-control mb-3" id="series" />

                    <div class="d-none" id="msgDiv4" onclick="reload();">
                        <div class="alert alert-danger" id="msg4"></div>
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-outline-light col-12 mb-2" onclick="seriesReg();">Series Register</button>
                    </div>
                </div>
                <!-- Series Register -->

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