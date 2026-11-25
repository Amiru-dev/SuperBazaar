<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand a1 mb-0 ms-5" href="index.php">
            <img src="assets/img/logo.svg" height="50" class="me-4">
            SuperBazaar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item me-5 custom-div1">
                    <a class="nav-link active" aria-current="page" href="profile.php">
                        <p class="text-center mt-2 mb-2">User Profile</p>
                    </a>
                </li>

                <li class="nav-item me-5 custom-div1">
                    <a class="nav-link active" aria-current="page" href="orderHistory.php">
                        <p class="text-center mt-2 mb-2">History</p>
                    </a>
                </li>

                <li class="nav-item me-5 custom-div1">
                    <a class="nav-link active" aria-current="page" href="cart.php">
                        <p class="text-center mt-2 mb-2">Cart</p>
                    </a>
                </li>


                <li class="nav-item me-5 custom-div1">
                    <a class="nav-link active" aria-current="page" href="wishlist.php">
                        <p class="text-center mt-2 mb-2">Wishlist</p>
                    </a>
                </li>

                <li class="nav-item me-5 custom-div1">
                    <a class="nav-link active" aria-current="page" href="#" onclick="signOut();">
                        <p class="text-center mt-2 mb-2">Sign Out</p>
                    </a>
                </li>

                <li class="nav-item ms-5 me-5 custom-div1">
                    <a class="nav-link active" aria-current="page" href="#">
                        <p class="text-center mt-2 mb-2" onclick="viewFilter();">Filters</p>
                    </a>
                </li>

            </ul>

            <div class="a16 ms-2">
                <form class="d-flex me-2" role="search">
                    <input class="form-control me-2" type="text" placeholder="Search Here" onkeyup="searchProduct(0)"
                        id="product" aria-label="Search" width="50vw" for="point">
                </form>
            </div>

            <div class="a17 me-4" id="point">
                <img src="assets/img/se.png" style="height: 8vh;" id="point">
            </div>

        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>