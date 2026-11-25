<?php

require_once __DIR__ . "/../includes/userAuth.php";
include_once __DIR__ . "/../includes/connection.php";

$userId = intval($_SESSION["u"]["id"]);
$wishlistId = isset($_POST['c']) ? intval($_POST['c']) : 0;

Database::iud("DELETE FROM `wishlist` WHERE `wishlist_id` = '" . $wishlistId . "' AND `user_id` = '" . $userId . "'");
echo ("Item Deleted Successfully");

?>