<?php

require_once __DIR__ . "/../includes/adminAuth.php";

include_once __DIR__ . "/../includes/connection.php";

$cat = $_POST["c"];

if (empty($cat)) {
    echo ("Please Enter Your Category");
} else if (strlen($cat) > 30) {
    echo ("Your Category Should be less than 20 Letters");
} else {

    $rs = Database::search("SELECT * FROM `category` WHERE `cat_name` ='" . $cat . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Category Already Exists");
    } else {
        Database::iud("INSERT INTO `category` (`cat_name`) VALUES ('" . $cat . "')");
        echo ("Success");
    }
}

?>