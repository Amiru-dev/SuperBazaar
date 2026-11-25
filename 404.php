<?php
http_response_code(404);
$base = rtrim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");
$baseHref = ($base === "" ? "" : $base) . "/";
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo htmlspecialchars($baseHref, ENT_QUOTES, "UTF-8"); ?>">
    <title>404 - Page Not Found | SuperBazaar</title>
    <link rel="icon" href="assets/img/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        @font-face {
            font-family: HACKED;
            src: url('assets/fonts/HACKED.ttf') format('truetype');
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #0b0b0f 0%, #1a1a2e 50%, #16213e 100%);
            color: #fff;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated background grid & glowing orbs */
        .bg-grid {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 165, 0, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 165, 0, 0.04) 1px, transparent 1px);
            background-size: 48px 48px;
            animation: gridMove 20s linear infinite;
            pointer-events: none;
            z-index: 0;
        }

        @keyframes gridMove {
            0% { transform: translateY(0); }
            100% { transform: translateY(48px); }
        }

        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.22;
            pointer-events: none;
            z-index: 0;
            animation: orbFloat 8s ease-in-out infinite alternate;
        }

        .orb-1 {
            width: 320px;
            height: 320px;
            background: orange;
            top: -80px;
            left: -80px;
        }

        .orb-2 {
            width: 360px;
            height: 360px;
            background: #ff5e00;
            bottom: -100px;
            right: -80px;
            animation-delay: -4s;
        }

        @keyframes orbFloat {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(35px, 25px) scale(1.12); }
        }

        .main-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
            position: relative;
            z-index: 1;
        }

        .error-card {
            width: 100%;
            max-width: 560px;
            padding: 40px 32px;
            border-radius: 18px;
            background: rgba(24, 24, 30, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 165, 0, 0.25);
            box-shadow: 0 16px 50px rgba(0, 0, 0, 0.65);
            text-align: center;
            animation: cardFadeIn 0.6s ease-out both;
        }

        @keyframes cardFadeIn {
            from {
                opacity: 0;
                transform: translateY(24px) scale(0.97);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .brand-title {
            font-family: HACKED, sans-serif;
            font-size: 1.8rem;
            letter-spacing: 2px;
            margin-bottom: 12px;
        }

        .brand-title span {
            color: orange;
        }

        .icon-ring {
            width: 84px;
            height: 84px;
            margin: 0 auto 14px;
            border-radius: 50%;
            background: rgba(255, 165, 0, 0.12);
            border: 2px solid rgba(255, 165, 0, 0.45);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            color: orange;
            animation: pulseFloat 3s ease-in-out infinite;
        }

        @keyframes pulseFloat {
            0%, 100% {
                transform: translateY(0);
                box-shadow: 0 0 0 0 rgba(255, 165, 0, 0.35);
            }
            50% {
                transform: translateY(-8px);
                box-shadow: 0 0 28px 6px rgba(255, 165, 0, 0.22);
            }
        }

        .code-404 {
            font-family: HACKED, sans-serif;
            font-size: clamp(4.5rem, 12vw, 7rem);
            line-height: 1;
            color: orange;
            margin: 6px 0 10px;
            position: relative;
            display: inline-block;
            text-shadow: 0 0 24px rgba(255, 165, 0, 0.35);
            animation: glitchSkew 4s infinite;
        }

        @keyframes glitchSkew {
            0%, 92%, 100% { transform: skew(0deg); text-shadow: 0 0 24px rgba(255, 165, 0, 0.35); }
            94% { transform: skew(-5deg); text-shadow: -3px 0 #ff3b3b, 3px 0 #00e5ff; }
            96% { transform: skew(4deg); text-shadow: 3px 0 #ff3b3b, -3px 0 #00e5ff; }
            98% { transform: skew(-2deg); }
        }

        .error-subtitle {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .error-desc {
            color: #adb5bd;
            font-size: 0.95rem;
            margin-bottom: 26px;
        }

        .btn-home {
            background-color: orange;
            border-color: orange;
            color: #000;
            font-weight: 600;
            padding: 10px 22px;
            transition: transform 0.2s, box-shadow 0.2s, background-color 0.2s;
        }

        .btn-home:hover {
            background-color: #ffae19;
            border-color: #ffae19;
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 165, 0, 0.35);
        }

        .btn-back {
            padding: 10px 22px;
            transition: transform 0.2s;
        }

        .btn-back:hover {
            transform: translateY(-2px);
        }

        .quick-links {
            margin-top: 24px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .quick-links a {
            display: inline-block;
            margin: 4px;
            padding: 5px 12px;
            border-radius: 999px;
            font-size: 0.82rem;
            text-decoration: none;
            color: #e2e6ea;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            transition: all 0.2s;
        }

        .quick-links a:hover {
            color: #000;
            background: orange;
            border-color: orange;
            transform: translateY(-2px);
        }

        footer {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>
    <div class="bg-grid"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="main-wrapper">
        <div class="error-card">
            <div class="brand-title">Super<span>Bazaar</span></div>

            <div class="icon-ring">
                <i class="bi bi-cpu"></i>
            </div>

            <div class="code-404">404</div>
            <div class="error-subtitle">Component Not Found</div>
            <p class="error-desc">
                The page you are looking for was moved, removed, or doesn't exist.
            </p>

            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="index.php" class="btn btn-home">
                    <i class="bi bi-house-door-fill me-1"></i> Back to Home
                </a>
                <button onclick="history.back();" class="btn btn-outline-light btn-back">
                    <i class="bi bi-arrow-left me-1"></i> Go Back
                </button>
            </div>

            <div class="quick-links">
                <div class="text-secondary small mb-2">Popular Categories</div>
                <a href="category.php?id=8">Processors</a>
                <a href="category.php?id=11">Graphics Cards</a>
                <a href="category.php?id=1">Laptops</a>
                <a href="category.php?id=16">Monitors</a>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light text-center py-2">
        &copy; 2024 SuperBazaar || All rights reserved.
    </footer>
</body>

</html>
