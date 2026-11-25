<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | SuperBazaar</title>
    <link rel="icon" href="assets/img/logo.svg">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="b3">
        <nav class="navbar navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo.svg" alt="Superbazaar Logo" class="img-fluid" width="70">
                    <span class="t1 ms-3">SuperBazaar</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Sign-Up Form -->
    <div class="container mt-2 pb-4 flex-grow-1">
        <h1 class="text-center">Sign Up</h1>
        <p class="text-center mt-3">Already have an account? <a href="signIn.php" class="a3">Sign In</a></p>
        <form>
            <div class="row">
                <div class="col-6 mt-2">
                    <label for="" class="form-label mb-0">First Name :</label>
                    <input type="text" class="form-control mt-1 border-dark" placeholder="Enter your first name" required
                        id="fname">
                </div>
                <div class="col-6 mt-2">
                    <label for="" class="form-label mb-0">Last Name :</label>
                    <input type="text" class="form-control mt-1 border-dark" placeholder="Enter your last name" required
                        id="lname">
                </div>
            </div>
            <div class="mt-3">
                <label for="" class="form-label mb-0">Email :</label>
                <input type="email" class="form-control mt-1 border-dark" placeholder="Enter your email" required id="email">
            </div>
            <div class="mt-2">
                <label for="" class="form-label mb-0">Mobile Number :</label>
                <input type="text" class="form-control mt-1 border-dark" placeholder="Enter your mobile" required
                    id="mobile">
            </div>
            <div class="mt-2">
                <label for="" class="form-label mb-0">Username :</label>
                <input class="form-control border-dark mt-1" type="text" placeholder="Username" required id="username">
            </div>
            <div class="mt-2">
                <label for="" class="form-label mb-0">Password :</label>
                <input type="password" class="form-control mt-1 mb-2 border-dark" placeholder="Password" required id="password">
            </div>
            <div class="d-none" id="msgDiv3" onclick="reload();">
                <div class="alert alert-danger" id="msg3"></div>
            </div>
            <div class="centered-button">
                <button type="button" class="btn btn-primary btn-block mt-0 col-12" onclick="signUp();">Sign Up</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-2 mt-auto">
        &copy; 2024 SuperBazaar || All rights reserved.
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>

</html>