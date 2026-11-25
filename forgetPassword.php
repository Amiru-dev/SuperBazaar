<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | SuperBazaar</title>
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
        }

        .signIn_Box {
            width: 100%;
            max-width: 460px;
            padding: 36px 32px 28px;
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

        .btn-send {
            background-color: orange;
            border-color: orange;
            color: #000;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .btn-send:hover {
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
        <!-- Forgot Password Box -->
        <div class="signIn_Box" id="signInBox">

            <div class="brand-title">Super<span>Bazaar</span></div>
            <h1>Forgot Password</h1>

            <div class="mt-4">
                <label class="form-label text-light">Email</label>
                <input type="email" class="form-control" required placeholder="Enter your email" id="e" />
            </div>

            <div class="mt-3">
                <button class="btn btn-send col-12" onclick="forgetPassword();">Send Email</button>
            </div>

            <div class="mt-2 mb-1">
                <a href="signIn.php" class="btn btn-outline-secondary col-12 btn-sm">Back to Sign In</a>
            </div>

        </div>
        <!-- Forgot Password Box -->
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
