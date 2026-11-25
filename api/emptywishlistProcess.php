<?php

include_once __DIR__ . "/../includes/connection.php";

$user = $_POST['id'];

Database::iud("DELETE FROM `wishlist` WHERE `user_id` = '" . $user . "'");

echo ("Item Deleted Successfully");

?>