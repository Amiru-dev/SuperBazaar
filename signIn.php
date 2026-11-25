<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | SuperBazaar</title>
    <link rel="icon" href="assets/img/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a2e 50%, #16213e 100%);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .main-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 12px 20px;
            overflow-y: auto;
        }

        .signIn_Box {
            width: 100%;
            max-width: 460px;
            padding: 24px 32px 20px;
            border-radius: 14px;
            background-color: #1e1e1e;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.6);
            color: #fff;
        }

        .signIn_Box h1 {
            font-family: HACKED, sans-serif;
            font-size: 2rem;
            color: orange;
            margin-bottom: 4px;
        }

        .brand-title {
            text-align: center;
            font-family: HACKED, sans-serif;
            font-size: 2.4rem;
            color: #fff;
            margin-bottom: 8px;
            letter-spacing: 2px;
        }

        .brand-title span {
            color: orange;
        }

        .form-control {
            background-color: #2a2a2a;
            border-color: #444;
            color: #fff;
        }

        .form-control:focus {
            background-color: #2a2a2a;
            border-color: orange;
            color: #fff;
            box-shadow: 0 0 0 0.2rem rgba(255, 166, 0, 0.25);
        }

        .form-control::placeholder {
            color: #888;
        }

        .btn-signin {
            background-color: orange;
            border-color: orange;
            color: #000;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .btn-signin:hover {
            background-color: #e69500;
            border-color: #e69500;
            color: #000;
        }

        footer {
            width: 100%;
            flex-shrink: 0;
        }
    </style>
</head>

<body>

    <div class="main-wrapper">
    <!-- Sign In Box -->
    <div class="signIn_Box" id="signInBox">

        <div class="brand-title">Super<span>Bazaar</span></div>
        <h1 class="text-center">Sign In</h1>

        <?php

        $username = "";
        $password = "";

        if (isset($_COOKIE["username"])) {
            $username = $_COOKIE["username"];
        }

        if (isset($_COOKIE["password"])) {
            $password = $_COOKIE["password"];
        }

        ?>

        <div class="mt-3">
            <label class="form-label text-light">Username</label>
            <input type="text" class="form-control" required placeholder="Enter your username" id="un"
                value="<?php echo htmlspecialchars($username, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8") ?>" />
        </div>
        <div class="mt-3">
            <label class="form-label text-light">Password</label>
            <input type="password" class="form-control" required placeholder="Enter your password"
                id="pw" value="<?php echo htmlspecialchars($password, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8") ?>" />
        </div>
        <div class="mt-2 mb-2 d-flex align-items-center gap-2">
            <input type="checkbox" class="form-check-input" id="rm" />
            <label class="form-check-label text-light">Remember me</label>
        </div>
        <div class="d-none" id="msgDiv2" onclick="reload();">
            <div class="alert alert-danger" id="msg2"></div>
        </div>
        <div class="mt-2">
            <button class="btn btn-signin col-12" onclick="signIn();">Sign In</button>
        </div>
        <div class="mt-2">
            <a href="forgetPassword.php" class="btn btn-outline-secondary col-12 btn-sm">Forgot Password?</a>
        </div>
        <div class="mt-2 mb-1">
            <a href="signUp.php" class="btn btn-outline-light col-12">New to SuperBazaar? Please Sign Up.</a>
        </div>
    </div>
    <!--sign in box-->
    </div><!-- /.main-wrapper -->

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-2">
        &copy; 2024 SuperBazaar || All rights reserved.
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>