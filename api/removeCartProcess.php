<?php

include_once __DIR__ . "/../includes/connection.php";

$cartId = $_POST['c'];

Database::iud("DELETE FROM `cart` WHERE `cart_id` = '" . $cartId . "'");
echo ("Item Deleted Successfully");

?>