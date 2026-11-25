<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | SuperBazaar</title>
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
            padding: 28px 32px 24px;
            border-radius: 14px;
            background-color: #1e1e1e;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.6);
            color: #fff;
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

        .signIn_Box h1 {
            font-family: HACKED, sans-serif;
            font-size: 2rem;
            color: orange;
            margin-bottom: 4px;
            text-align: center;
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

        .btn-update {
            background-color: orange;
            border-color: orange;
            color: #000;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .btn-update:hover {
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
        <!-- Reset Password Box -->
        <div class="signIn_Box" id="signInBox">

            <div class="brand-title">Super<span>Bazaar</span></div>
            <h1>Reset Password</h1>

            <div class="d-none">
                <input type="hidden" id="vcode" value="<?php echo htmlspecialchars($_GET["vcode"] ?? "", ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8"); ?>">
            </div>

            <div class="mt-3">
                <label class="form-label text-light">New Password</label>
                <input type="password" class="form-control" required placeholder="Enter your new password" id="np" />
            </div>
            <div class="mt-3">
                <label class="form-label text-light">Re-enter Password</label>
                <input type="password" class="form-control" required placeholder="Re-enter your new password" id="np2" />
            </div>

            <div class="mt-3">
                <button class="btn btn-update col-12" onclick="resetPassword();">Update</button>
            </div>

            <div class="mt-2 mb-1">
                <a href="signIn.php" class="btn btn-outline-secondary col-12 btn-sm">Back to Sign In</a>
            </div>

        </div>
        <!-- Reset Password Box -->
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-2">
        &copy; 2024 SuperBazaar || All rights reserved.
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
