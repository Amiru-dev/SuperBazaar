<?php

include_once __DIR__ . "/../includes/connection.php";

$series = $_POST["s"];

if (empty($series)) {
    echo ("Please Enter Your Series Name");
} else if (strlen($series) > 20) {
    echo ("Your Series Name Should be less than 20 Letters");
} else {

    $rs = Database::search("SELECT * FROM `series` WHERE `series_name` ='" . $series . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Series Name Already Exists");
    } else {
        Database::iud("INSERT INTO `series` (`series_name`) VALUES ('" . $series . "')");
        echo ("Success");
    }
}

?>