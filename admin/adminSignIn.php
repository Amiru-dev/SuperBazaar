<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In | SuperBazaar</title>
    <link rel="icon" href="../assets/img/logo.svg">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="b6">

    <!-- Admin Sign In Box -->
    <div class="container">
        <div class="adminSignInBox" id="signInBox">
            <h1 class="text-center">Admin Login</h1>

            <div class="mt-4">
                <label for="form-label" class="l1">Username</label>
                <input type="text" class="form-control border-dark" required placeholder="Enter admin username"
                    id="un" />
            </div>

            <div class="mt-3 mb-3">
                <label for="form-label" class="l1">Password</label>
                <input type="password" class="form-control border-dark" required placeholder="Enter admin password"
                    id="pw" />
            </div>

            <div class="d-none" id="msgDiv" onclick="reload();">
                <div class="alert alert-warning" id="msg"></div>
            </div>

            <div class="mt-4">
                <button class="btn btn-dark col-12" onclick="adminSignIn();">Sign In</button>
            </div>
        </div>
    </div>
    <!-- Admin Sign In Box --->

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-2 mt-2 fixed-bottom">
        &copy; 2024 SuperBazaar || All rights reserved.
    </footer>
    <!-- Footer -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/admin.js"></script>
    <script src="../assets/js/bootstrap.js"></script>

</body>

</html>