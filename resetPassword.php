<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | SuperBazaar</title>
    <link rel="icon" href="assets/img/logo.svg">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="a22">

    <!-- reset password Box -->
    <div class="container mt-0">
        <div class="signIn_Box b10 b11 b12" id="signInBox">
            <h1 class="text-center">Reset Password</h1>

            <div class="d-none">
                <input type="hidden" id="vcode" value="<?php echo ($_GET["vcode"]) ?>">
            </div>

            <div class="mt-4">
                <label for="form-label" class="">Password</label>
                <input type="password" class="form-control border-dark" required placeholder="Enter your new password"
                    id="np" />
            </div>
            <div class="mt-4 mb-4">
                <label for="form-label" class="">Re-enter Password</label>
                <input type="password" class="form-control border-dark" required
                    placeholder="Re-enter your new password" id="np2" />
            </div>

            <div class="mt-4">
                <button class="btn btn-dark col-12" onclick="resetPassword();">Update</button>
            </div>

        </div>
    </div>
    <!-- reset password Box -->

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-2 mt-2 fixed-bottom">
        &copy; 2024 SuperBazaar || All rights reserved.
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/bootstrap.js"></script>

</body>

</html>