<?php

include_once __DIR__ . "/../includes/connection.php";

$pageno = isset($_POST["pg"]) ? (int) $_POST["pg"] : 0;
$color = isset($_POST["co"]) ? (int) $_POST["co"] : 0;
$cat = isset($_POST["cat"]) ? (int) $_POST["cat"] : 0;
$brand = isset($_POST["b"]) ? (int) $_POST["b"] : 0;
$series = isset($_POST["s"]) ? (int) $_POST["s"] : 0;
$minPrice = isset($_POST["min"]) ? (int) $_POST["min"] : 0;
$maxPrice = isset($_POST["max"]) ? (int) $_POST["max"] : 0;

$status = 0; // no condition

if ($pageno == 0) {
    $pageno = 1;
}

$q = "SELECT * FROM `stock`
    INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
    INNER JOIN `brand` ON `product`.`brand_brand_id` = `brand`.`brand_id`
    INNER JOIN `color` ON `product`.`color_color_id` = `color`.`color_id`
    INNER JOIN `category` ON `product`.`category_cat_id` = `category`.`cat_id`
    INNER JOIN `series` ON `product`.`series_series_id` = `series`.`series_id`";

// Debug the received values
error_log("Page: $pageno, Color: $color, Category: $cat, Brand: $brand, Series: $series, MinPrice: $minPrice, MaxPrice: $maxPrice");

$conditions = [];

// search by color
if ($color != 0) {
    $conditions[] = "`color`.`color_id` = $color";
}

// search by category
if ($cat != 0) {
    $conditions[] = "`category`.`cat_id` = $cat";
}

// search by brand
if ($brand != 0) {
    $conditions[] = "`brand`.`brand_id` = $brand";
}

// search by series
if ($series != 0) {
    $conditions[] = "`series`.`series_id` = $series";
}

// search by min price
if ($minPrice != 0) {
    $conditions[] = "`stock`.`price` >= $minPrice";
}

// search by max price
if ($maxPrice != 0) {
    $conditions[] = "`stock`.`price` <= $maxPrice";
}

// Build the WHERE clause
if (count($conditions) > 0) {
    $q .= " WHERE " . implode(" AND ", $conditions);
}

$q .= " ORDER BY `stock`.`price` ASC";

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 6;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    // No result
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
    // Load result
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
        ?>
        <!-- card -->
        <div class="card" style="width: 360px">
            <div class="a13">
                <a href="singleProductView.php?s=<?php echo e($d["stock_id"]) ?>"><img src="<?php echo e($d["path"]); ?>"
                        class="card-img-top mt-3"></a>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo e($d["name"]); ?></h5>
                    <p class="card-text text-center mt-4"><?php
                    switch ($d["category_cat_id"]) {
                        case 1:
                            echo "- LAPTOP -";
                            break;
                        case 2:
                            echo "- ASUS ROG -";
                            break;
                        case 3:
                            echo "- APPLE PRODUCTS -";
                            break;
                        case 4:
                            echo "- CONSOLE & HANDHELD GAMING -";
                            break;
                        case 5:
                            echo "- DESKTOP WORKSTATIONS -";
                            break;
                        case 6:
                            echo "- GAMING DESKTOPS -";
                            break;
                        case 7:
                            echo "- BUDGET DESKTOP COMPUTERS -";
                            break;
                        case 8:
                            echo "- PROCESSORS -";
                            break;
                        case 9:
                            echo "- MOTHERBOARDS -";
                            break;
                        case 10:
                            echo "- MEMORY (RAM) -";
                            break;
                        case 11:
                            echo "- GRAPHIC CARDS -";
                            break;
                        case 12:
                            echo "- POWER SUPPLY -";
                            break;
                        case 13:
                            echo "- COOLING & LIGHTING -";
                            break;
                        case 14:
                            echo "- STORAGE -";
                            break;
                        case 15:
                            echo "- CASINGS -";
                            break;
                        case 16:
                            echo "- MONITORS -";
                            break;
                        case 17:
                            echo "- SPEAKERS & HEADPHONES -";
                            break;
                        case 18:
                            echo "- KEYBOARDS, MICE & GAMEPADS -";
                            break;
                        case 19:
                            echo "- GAMING CHAIRS -";
                            break;
                        default:
                            echo "";
                            break;
                    }
                    ?></p>
                    <h3 class="card-text text-center mt-4 mb-2"><?php echo e($d["price"]); ?> LKR</h3>
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
                    <a class="page-link" <?php if ($pageno <= 1) {
                        echo "#";
                    } else { ?>
                            onclick="advSearchProduct(<?php echo ($pageno - 1) ?>);" <?php } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                        ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="advSearchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advSearchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                        <?php
                    }
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $num_of_pages) {
                        echo "#";
                    } else { ?>
                            onclick="advSearchProduct(<?php echo ($pageno + 1) ?>);" <?php } ?> aria-label="Next">
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