<?php

session_start();

if (isset($_SESSION["a"])) {

    ?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Management | SuperBazaar</title>
        <link rel="icon" href="../assets/img/logo.svg">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body onload="loadUser();" style="padding-top: 95px; padding-bottom: 60px;">

        <!-- NavBar -->
        <?php include __DIR__ . "/../includes/adminNavBar.php"; ?>
        <!-- NavBar -->

        <div class="col-10 mx-auto">
            <p class="a4">User Management</p>

            <div class="row d-flex justify-content-end mb-5 mt-2">
                <div class="col-2">
                    <input class="form-control me-3" placeholder="Enter User Name" id="uname">
                </div>
                <div class="col-2">
                    <button class="btn btn-outline-warning" onclick="searchUser();">Search</button>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <button class="btn btn-outline-info" onclick="reload();">Reload</button>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" placeholder="Enter User Id" id="uid" />
                </div>
                <div class="col-2">
                    <button class="btn btn-outline-light" onclick="updateUserStatus();">Change Status</button>
                </div>
            </div>

            <div class="mt-3 foot">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">User Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tb">
                        <!-- Table Row -->

                        <!-- Table Row -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-dark text-light text-center py-2 mt-2 fixed-bottom">
            &copy; 2024 SuperBazaar || All rights reserved.
        </footer>
        <!-- Footer -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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