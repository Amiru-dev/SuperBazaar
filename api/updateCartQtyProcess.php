<?php

require_once __DIR__ . "/../includes/userAuth.php";
include_once __DIR__ . "/../includes/connection.php";

$userId = intval($_SESSION["u"]["id"]);
$cartId = isset($_POST["c"]) ? intval($_POST["c"]) : 0;
$newQty = isset($_POST["q"]) ? intval($_POST["q"]) : 0;

if ($newQty <= 0) {
    echo ("Invalid Quantity");
    exit();
}

$rs = Database::search("SELECT * FROM `cart` 
INNER JOIN `stock` ON `cart`.`stock_stock_id` = `stock`.`stock_id` WHERE `cart`.`cart_id` = '" . $cartId . "' AND `cart`.`user_id` = '" . $userId . "'");

$num = $rs->num_rows;

if ($num > 0) {
    // cart item found
    $d = $rs->fetch_assoc();

    if ($d["qty"] >= $newQty) {
        // update query
        Database::iud("UPDATE `cart` SET `cart_qty` = '" . $newQty . "' WHERE `cart_id` = '" . $cartId . "' AND `user_id` = '" . $userId . "'");
        echo ("Success");

    } else {
        echo ("Product Quantity exceeded!");
    }

} else {
    echo ("Cart Item not Found");
}

?>