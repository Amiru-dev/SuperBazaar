<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperBazaar</title>
    <link rel="icon" href="assets/img/logo.svg">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <!-- Navbar with Logo -->

    <div class="b1">
        <div class="b2 col-12">
            <nav class="navbar background">

                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/logo.svg" class="img-fluid" width="380" alt="Superbazaar Logo">

                    </a>
                </div>
            </nav>
        </div>
        <h1 class="h1">Welcome to SuperBazaar!</h1>
        <!-- Carousel -->
        <div class="b1">
            <div class="b3">
                <div class="col-12 d-none d-lg-block">
                    <div class="row">
                        <div id="carouselExampleIndicators" class="col-12 carousel slide" data-bs-ride="true">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/img/3.png" class="col-12 d-block poster-img-1" />
                                    <div class="carousel-caption d-none d-md-block poster-caption">
                                        <h5 class="poster-title"></h5>
                                        <p class="poster-txt"></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/2.png" class="col-12 d-block poster-img-1" />
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/1.png" class="col-12 d-block poster-img-1" />
                                    <div class="carousel-caption d-none d-md-block poster-caption-1">
                                        <h5 class="poster-title"></h5>
                                        <p class="poster-txt"></p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Carousel -->

                <!-- Main Content -->
                <div class="container mt-2 mb-1 col-8">
                    <div class="row mt-2 ms-auto text-center mb-1 d-flex justify-content-center col-12">
                        <div class="col-6 mb-3 mt-1">
                            <a href="signUp.php"><button class="btn btn-primary btn-lg">Sign Up</button></a>
                        </div>
                        <div class="col-6 ms-auto text-center d-flex justify-content-center mb-3 mt-1">
                            <a href="signIn.php"><button class="btn btn-outline-light btn-lg me-5">Already a User? &nbsp;Sign In</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="assets/js/main.js"></script>
            <script src="assets/js/bootstrap.js"></script>
        </div>

        <!-- footer -->

        <div class="col-12 d-none d-lg-block fixed-bottom">
            <p class="text-center">&copy;2024 superbazaar.lk || ALL Rights Reserved.</p>
        </div>

        <!--footer -->
</body>

</html>