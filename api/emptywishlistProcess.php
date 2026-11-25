<?php

require_once __DIR__ . "/../includes/userAuth.php";
include_once __DIR__ . "/../includes/connection.php";

$userId = intval($_SESSION["u"]["id"]);

Database::iud("DELETE FROM `wishlist` WHERE `user_id` = '" . $userId . "'");

echo ("Item Deleted Successfully");

?>