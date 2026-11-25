<?php

include_once __DIR__ . "/../includes/connection.php";
session_start();
$user = $_SESSION['u'];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart` 
INNER JOIN `stock` ON `cart`.stock_stock_id = `stock`.stock_id
INNER JOIN `product` ON `stock`.product_id = `product`.id 
INNER JOIN `color` ON `product`.color_color_id = `color`.color_id
INNER JOIN `series` ON `product`.series_series_id = `series`.series_id
WHERE `cart`.user_id = '" . $user['id'] . "'");

$num = $rs->num_rows;

if ($num > 0) {
    // load cart

    ?>

    <div class="mb-4">
        <h1 class="a18">Shopping Cart</h1>
    </div>

    <?php

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();

        $total = $d['price'] * $d['cart_qty'];
        $netTotal += $total;

        ?>

        <!-- Cart itmes start -->
        <div class="col border border-3 rounded-5 p-3 mb-2 d-flex justify-content-between">
            <div class="d-flex align-items-center col-5">
                <img src="<?php echo e($d['path']); ?>" alt="" class="rounded-4" width="200px">
                <div class="ms-5">
                    <h4 class="text-info"> <?php echo e($d['name']); ?> </h4>
                    <p class="text-muted mt-0 mt-3">Color : <?php echo e($d['color_name']); ?> </p>
                    <p class="text-muted">Size : <?php echo e($d['series_name']); ?></p>
                    <h4 class="text-warning">Price : <?php echo e($d['price']); ?>  LKR</h4>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-light btn-sm" onclick="decrementCartQty(<?php echo e($d['cart_id']); ?>);">-</button>
                <input type="number" id="qty<?php echo e($d['cart_id']); ?>"
                    class="form-control form-control-sm text-center" style="max-width: 100px;"
                    value="<?php echo e($d['cart_qty']); ?>" disabled>
                <button class="btn btn-light btn-sm" onclick="incrementCartQty(<?php echo e($d['cart_id']); ?>);">+</button>
            </div>
            <div class="d-flex align-items-center">
                <h3>Total : <span class="text-warning"> <?php echo $total; ?> LKR</span></h3>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-sm btn-danger" onclick="removeCart(<?php echo e($d['cart_id']); ?>);">X</button>
            </div>
        </div>
        <!-- Cart items end -->

        <div class="col-12 mt-4">
            <hr>
        </div>

        <?php

    }

    ?>

    <!-- Checout start -->
    <div class="d-flex flex-column align-items-end">
        <h5 class="mt-1">Number of Items : <span class="text-info"> <?php echo $num; ?></span> </h5>
        <h4 class="mt-1">Delivery Fee : <span class="text-muted">1000 LKR</span> </h4>
        <h2 class="mt-1">Net Total : <span class="text-warning"><?php echo $netTotal + 1000; ?> LKR</span> </h2>
        <button class="btn btn-success col-3 mt-3 mb-4" onclick="checkOut();">Checkout</button>
    </div>
    <!-- Checout end -->

    <?php

} else {
    // cart is empty

    ?>

    <div class="col-12 text-center mb-5">
        <h2 class="a8">Your cart is empty !</h2>
        <img src="assets/img/32.png" class="b8 d-flex justify-content-center">
        <a href="index.php" class="btn btn-outline-light mt-4 col-4">Start Shopping</a>
    </div>

    <?php

}

?>