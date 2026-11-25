<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top mb-5">
    <div class="container-fluid">
        <a class="navbar-brand a1 mb-0 ms-5" href="adminDashboard.php">
            <img src="../assets/img/logo.svg" height="50" class="me-4">
            SuperBazaar Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item me-5 custom-div1">
                    <a class="nav-link active" aria-current="page" href="userManagement.php">
                        <p class="mt-2 mb-2">User Management</p>
                    </a>
                </li>

                <li class="nav-item me-5 custom-div1">
                    <a class="nav-link active" aria-current="page" href="productManagement.php">
                        <p class="mt-2 mb-2">Product Management</p>
                    </a>
                </li>

                <li class="nav-item me-5 custom-div1">
                    <a class="nav-link active" aria-current="page" href="stockManagement.php">
                        <p class="mt-2 mb-2">Stock Management</p>
                    </a>
                </li>

                <li class="nav-item me-5 custom-div1">
                    <a class="nav-link active" aria-current="page" href="reports.php">
                        <p class="mt-2 mb-2">Reports</p>
                    </a>
                </li>

                <li class="nav-item me-5 custom-div1">
                    <a class="nav-link active" aria-current="page" href="#" onclick="adminSignOut();">
                        <p class="mt-2 mb-2">Sign Out</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>