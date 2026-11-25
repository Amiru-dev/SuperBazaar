<?php

require_once __DIR__ . "/../includes/userAuth.php";
include_once __DIR__ . "/../includes/connection.php";

$userId = intval($_SESSION["u"]["id"]);
$cartId = isset($_POST['c']) ? intval($_POST['c']) : 0;

Database::iud("DELETE FROM `cart` WHERE `cart_id` = '" . $cartId . "' AND `user_id` = '" . $userId . "'");
echo ("Item Deleted Successfully");

?>