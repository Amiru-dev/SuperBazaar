<?php

require_once __DIR__ . "/../includes/adminAuth.php";

include_once __DIR__ . "/../includes/connection.php";

$pname = $_POST["pname"];
$brand = $_POST["brand"];
$cat = $_POST["cat"];
$color = $_POST["color"];
$series = $_POST["series"];
$desc = $_POST["desc"];

if (empty($pname)) {
    echo ("Please Enter Your Product Name");
} else if (strlen($pname) > 50) {
    echo ("Your Product Name Should be less than 50 Characters");
} else if (empty($desc)) {
    echo ("Please Enter Your Product Description");
} else if (strlen($desc) > 500) {
    echo ("Your Product Description Should be less than 500 Characters");
} else if (empty($_FILES["image"])) {
    echo ("Please Upload Your Product Image");
} else {

    $rs = Database::search("SELECT * FROM `product` WHERE `name` = '" . $pname . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Product has been already registered");
    } else {

        $path = "assets/img/productImg/" . uniqid() . ".png";
        move_uploaded_file($_FILES["image"]["tmp_name"], __DIR__ . "/../" . $path);

        Database::iud("INSERT INTO `product` (`name`, `description`, `path`, `brand_brand_id`, `category_cat_id`, `color_color_id`, `series_series_id`)
        VALUES ('" . $pname . "', '" . $desc . "', '" . $path . "', '" . $brand . "', '" . $cat . "', '" . $color . "', '" . $series . "')");

        echo ("Success");
    }
}

?>