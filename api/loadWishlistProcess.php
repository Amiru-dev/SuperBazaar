<?php

include_once __DIR__ . "/../includes/connection.php";
session_start();
$user = $_SESSION['u'];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `wishlist` 
INNER JOIN `stock` ON `wishlist`.stock_stock_id = `stock`.stock_id
INNER JOIN `product` ON `stock`.product_id = `product`.id 
INNER JOIN `color` ON `product`.color_color_id = `color`.color_id
INNER JOIN `series` ON `product`.series_series_id = `series`.series_id
WHERE `wishlist`.user_id = '" . $user['id'] . "'");

$num = $rs->num_rows;

if ($num > 0) {
    // load wishlist

    ?>

    <div class="mb-4">
        <h1 class="a18">Wishlist</h1>
    </div>

    <?php

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();

        $total = $d['price'] * $d['wishlist_qty'];
        $netTotal += $total;

        ?>

        <!-- wishlist itmes start -->
        <div class="col border border-3 rounded-5 p-3 mb-2 d-flex justify-content-between">
            <div class="d-flex align-items-center col-5">
                <img src="<?php echo $d['path']; ?>" alt="" class="rounded-4" width="200px">
                <div class="ms-5">
                    <h4 class="text-info"> <?php echo $d['name']; ?> </h4>
                    <p class="text-muted mt-0 mt-3">Color : <?php echo $d['color_name']; ?> </p>
                    <p class="text-muted">Size : <?php echo $d['series_name']; ?></p>
                    <h4 class="text-warning">Price : <?php echo $d['price']; ?> LKR</h4>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">

                <input type="number" id="qty2" class="form-control form-control-sm text-center" style="max-width: 100px;"
                    value="<?php echo $d['wishlist_qty']; ?>" disabled>

            </div>
            <div class="d-flex align-items-center">
                <h3>Total : <span class="text-warning"> <?php echo $total; ?> LKR</span></h3>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-sm btn-danger" onclick="removeWishlist(<?php echo $d['wishlist_id']; ?>);">X</button>
            </div>
        </div>
        <!-- wishlist items end -->

        <div class="col-12 mt-4">
            <hr>
        </div>

        <?php

    }

    ?>

    <!-- add to cart start -->
    <div class="d-flex flex-column align-items-end mb-2">
        <h5 class="mt-1">Number of Items : <span class="text-info"> <?php echo $num; ?></span> </h5>
        <h2 class="mt-1">Net Total : <span class="text-warning"><?php echo $netTotal; ?> LKR</span> </h2>
        <button class="btn btn-success col-3 mt-2 mb-2" onclick="addtoCart2('<?php echo $d['stock_id'] ?>');">Add to
            Cart</button>
        <button class="btn btn-outline-danger col-3 mt-0 mb-0" onclick="emptyWishlist(<?php echo $user['id'] ?>);">Empty
            Wishlist</button>
    </div>
    <!-- add to cart end -->

    <?php

} else {
    // wishlist is empty

    ?>

    <div class="col-12 text-center mb-5">
        <h2 class="a8">Your wishlist is empty !</h2>
        <img src="assets/img/note.jpg" class="b8 d-flex justify-content-center">
        <a href="index.php" class="btn btn-outline-light mt-4 col-4">Start Shopping</a>
    </div>

    <?php

}

?>