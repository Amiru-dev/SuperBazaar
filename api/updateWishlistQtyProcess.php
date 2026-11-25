<?php

include_once __DIR__ . "/../includes/connection.php";
$wishlistId = $_POST["c"];
$newQty = $_POST["q"];

$rs = Database::search("SELECT * FROM `wishlist` 
INNER JOIN `stock` ON `wishlist`.`stock_stock_id` = `stock`.`stock_id` WHERE `wishlist`.`wishlist_id` = '" . $wishlistId . "'");

$num = $rs->num_rows;

if ($num > 0) {
    // wishlist item found
    $d = $rs->fetch_assoc();

    if ($d["qty"] >= $newQty) {
        // update query
        Database::iud("UPDATE `wishlist` SET `wishlist_qty` = '" . $newQty . "' WHERE `wishlist_id` = '" . $wishlistId . "'");
        echo ("Success");

    } else {
        echo ("Product Quantity exceeded!");
    }

} else {
    echo ("Wishlist Item not Found");
}

?>