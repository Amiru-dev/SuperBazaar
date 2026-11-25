<?php

include_once __DIR__ . "/../includes/connection.php";


$productId = $_POST["p"];
$qty = $_POST["q"];
$price = $_POST["up"];

if ($productId != "") {

    if (empty($qty)) {
        echo ("Please Enter Quantity");
    } else if (strlen($qty) > 10) {
        echo ("Your Quantity should be less than 10 Characters");
    } else if (empty($price)) {
        echo ("Please Enter Unit Price");
    } else if (strlen($price) > 10) {
        echo ("Your Price should be less than 10 Characters");
    } else {

        $rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $productId . "' AND `price` = '" . $price . "'");
        $num = $rs->num_rows;
        $d = $rs->fetch_assoc();

        if ($num == 1) {
            // update query
            $newQty = $d["qty"] + $qty;

            Database::iud("UPDATE `stock` SET `qty` = '" . $newQty . "' WHERE `stock_id` = '" . $d["stock_id"] . "'");
            echo ("Stock Updated Successfully");

        } else {
            // insert query
            Database::iud("INSERT INTO `stock` (`price`, `qty`, `product_id`) VALUES ('" . $price . "','" . $qty . "','" . $productId . "')");

            echo ("New Stock Added Successfully");
        }
    }

} else {
    echo ("Please select a product");
}
?>