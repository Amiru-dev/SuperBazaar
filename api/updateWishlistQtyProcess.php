<?php

require_once __DIR__ . "/../includes/userAuth.php";
include_once __DIR__ . "/../includes/connection.php";

$userId = intval($_SESSION["u"]["id"]);
$wishlistId = isset($_POST["c"]) ? intval($_POST["c"]) : 0;
$newQty = isset($_POST["q"]) ? intval($_POST["q"]) : 0;

if ($newQty <= 0) {
    echo ("Invalid Quantity");
    exit();
}

$rs = Database::search("SELECT * FROM `wishlist` 
INNER JOIN `stock` ON `wishlist`.`stock_stock_id` = `stock`.`stock_id` WHERE `wishlist`.`wishlist_id` = '" . $wishlistId . "' AND `wishlist`.`user_id` = '" . $userId . "'");

$num = $rs->num_rows;

if ($num > 0) {
    // wishlist item found
    $d = $rs->fetch_assoc();

    if ($d["qty"] >= $newQty) {
        // update query
        Database::iud("UPDATE `wishlist` SET `wishlist_qty` = '" . $newQty . "' WHERE `wishlist_id` = '" . $wishlistId . "' AND `user_id` = '" . $userId . "'");
        echo ("Success");

    } else {
        echo ("Product Quantity exceeded!");
    }

} else {
    echo ("Wishlist Item not Found");
}

?>