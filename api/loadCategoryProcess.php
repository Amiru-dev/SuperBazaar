<?php

include_once __DIR__ . "/../includes/connection.php";

$catId = isset($_POST["cat"]) ? intval($_POST["cat"]) : 1;
$page = isset($_POST["p"]) ? intval($_POST["p"]) : 0;

$pageno = ($page > 0) ? $page : 1;

$q = "SELECT * FROM `stock` 
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` 
INNER JOIN `category` ON `product`.`category_cat_id` = `category`.`cat_id`
WHERE `category`.`cat_id` = '$catId' ORDER BY `stock`.`stock_id` ASC";

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 6;
$num_of_pages = ceil($num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    // Not available stock
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
        <img src="assets/img/error.png" height="200px" width="200px" class="error custom-div mt-4" alt="No results found">
        <h1 class="custom-div">No Products found.</h1>
        <h2 class="mt-4 custom-div">Something went wrong. We couldn't load any products.</h2>
    </div>

    <?php

} else {
    // Load stock
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
                    <p class="card-text text-center mt-4">- <?php echo strtoupper($d["cat_name"]); ?> -</p>
                    <h3 class="card-text text-center mt-4 mb-2"><?php echo e($d["price"]); ?> LKR</h3>
                </div>
            </div>
            <div class="justify-content-center mt-2">
                <button class="btn btn-outline-info col-12 mb-2" onclick="addtoWishlist('<?php echo e($d['stock_id']) ?>');">Add to
                    Wishlist</button>

                <a href="singleProductView.php?s=<?php echo e($d["stock_id"]) ?>">
                    <button class="btn btn-outline-light col-12 mb-2">Add to Cart</button>
                </a>

                <a href="singleProductView.php?s=<?php echo e($d["stock_id"]) ?>">
                    <button class="btn btn-outline-warning col-12 mb-2">Buy Now</button>
                </a>
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
                        ?> onclick="loadCategory(<?php echo $catId; ?>, <?php echo ($pageno - 1); ?>);" <?php
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
                            <a class="page-link" onclick="loadCategory(<?php echo $catId; ?>, <?php echo $y; ?>);"><?php echo $y; ?></a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="page-item">
                            <a class="page-link" onclick="loadCategory(<?php echo $catId; ?>, <?php echo $y; ?>);"><?php echo $y; ?></a>
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
                        ?> onclick="loadCategory(<?php echo $catId; ?>, <?php echo ($pageno + 1); ?>);" <?php
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
