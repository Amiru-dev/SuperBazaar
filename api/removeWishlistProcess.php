<?php

include_once __DIR__ . "/../includes/connection.php";

$wishlistId = $_POST['c'];

Database::iud("DELETE FROM `wishlist` WHERE `wishlist_id` = '" . $wishlistId . "'");
echo ("Item Deleted Successfully");

?>