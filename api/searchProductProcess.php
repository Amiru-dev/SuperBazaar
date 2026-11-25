<?php

include_once __DIR__ . "/../includes/connection.php";

$pageno = 0;
$page = $_POST["pg"];
$product = $_POST["p"];

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;

}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` WHERE `product`.`name` LIKE '%$product%'";
$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 6;
$num_of_pages = ceil($num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    //No result
    ?>

    <style>
        .no-results {
            text-align: center;
            margin-top: 100px;
        }

        .no-results img {
            width: 200px;
            margin-bottom: 20px;
        }

        .no-results h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            padding-bottom: 5px;
            padding-top: 5px;
            color: white;
            background-color: #212529;

        }

        .no-results h1:hover {
            color: black;
            background-color: orange;

        }

        .no-results h2 {
            font-size: 1.5rem;
            margin-bottom: 30px;
            color: white;
            background-color: black;
            padding-bottom: 5px;
            padding-top: 5px;
        }

        .no-results h2:hover {
            color: black;
            background-color: orange;

        }

        .no-results .btn {
            font-size: 1.2rem;
            padding: 10px 20px;
        }

        .error {
            background-color: white;
            padding: 10px;
        }
    </style>

    <div class="no-results">
        <img src="assets/img/error.png" height="200px" width="200px" class="error custom-div" alt="No results found"
            class="mt-4">
        <h1 class="custom-div">No results found.</h1>
        <h2 class="mt-4 custom-div">We couldn't find any matches. Would you like to browse our categories instead?</h2>
        <a href="index.php" class="btn btn-light">Browse Categories</a>
    </div>


    <?php
} else {
    //load result
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
        ?>

        <!-- card -->
        <div class="card" style="width: 360px">
            <div class="a13">
                <a href="singleProductView.php?s=<?php echo $d["stock_id"] ?>"><img src="<?php echo $d["path"]; ?>"
                        class="card-img-top mt-3"></a>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $d["name"]; ?></h5>
                    <p class="card-text text-center mt-4"><?php
                    if ($d["category_cat_id"] == 1) {
                        echo ("- LAPTOP -");
                    } else if ($d["category_cat_id"] == 2) {
                        echo ("- ASUS ROG -");
                    } else if ($d["category_cat_id"] == 3) {
                        echo ("- APPLE PRODUCTS -");
                    } else if ($d["category_cat_id"] == 4) {
                        echo ("- CONSOLE & HANDHELD GAMING -");
                    } else if ($d["category_cat_id"] == 5) {
                        echo ("- DESKTOP WORKSTATIONS -");
                    } else if ($d["category_cat_id"] == 6) {
                        echo ("- GAMING DESKTOPS -");
                    } else if ($d["category_cat_id"] == 7) {
                        echo ("- BUDGET DESKTOP COMPUTERS -");
                    } else if ($d["category_cat_id"] == 8) {
                        echo ("- PROCESSORS -");
                    } else if ($d["category_cat_id"] == 9) {
                        echo ("- MOTHERBOARDS -");
                    } else if ($d["category_cat_id"] == 10) {
                        echo ("- MEMORY (RAM) -");
                    } else if ($d["category_cat_id"] == 11) {
                        echo ("- GRAPHIC CARDS -");
                    } else if ($d["category_cat_id"] == 12) {
                        echo ("- POWER SUPPLY -");
                    } else if ($d["category_cat_id"] == 13) {
                        echo ("- COOLING & LIGHTING -");
                    } else if ($d["category_cat_id"] == 14) {
                        echo ("- STORAGE -");
                    } else if ($d["category_cat_id"] == 15) {
                        echo ("- CASINGS -");
                    } else if ($d["category_cat_id"] == 16) {
                        echo ("- MONITORS -");
                    } else if ($d["category_cat_id"] == 17) {
                        echo ("- SPEAKERS & HEADPHONES -");
                    } else if ($d["category_cat_id"] == 18) {
                        echo ("- KEYBOARDS, MICE & GAMEPADS -");
                    } else if ($d["category_cat_id"] == 19) {
                        echo ("- GAMING CHAIRS -");
                    }
                    ?></p>
                    <h3 class="card-text text-center mt-4 mb-2"><?php echo $d["price"]; ?> LKR</h3>
                </div>
            </div>

            <div class="justify-content-center mt-2">
                <button class="btn btn-outline-info col-12 mb-2">Add to Wishlist</button>
                <button class="btn btn-outline-light col-12 mb-2">Add to Cart</button>
                <button class="btn btn-outline-warning col-12 mb-2">Buy Now</button>
            </div>

        </div>
        <!-- card -->


        <?php
    }

    ?>

    <!-- pagination -->
    <div class="d-flex justify-content-center mt-5 mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" <?php
                    if ($pageno <= 1) {
                        echo ("#");
                    } else {
                        ?> onclick="searchProduct(<?php echo ($pageno - 1) ?>);" <?php
                    }
                    ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                        ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="searchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>

                        <?php
                    } else {
                        ?>

                        <li class="page-item">
                            <a class="page-link" onclick="searchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>

                        <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" <?php
                    if ($pageno >= $num_of_pages) {
                        echo ("#");
                    } else {
                        ?>   onclick="searchProduct(<?php echo ($pageno + 1) ?>);" <?php
                    }
                    ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- pagination -->


    <?php
}

?>