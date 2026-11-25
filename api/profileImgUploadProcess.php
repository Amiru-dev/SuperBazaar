<?php

include_once __DIR__ . "/../includes/connection.php";

session_start();
$user = $_SESSION["u"];

if (empty($_FILES["i"])) {
    echo ("empty");

} else {
    // upload image

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();

    if (!empty($d["img_path"]) && file_exists(__DIR__ . "/../" . $d["img_path"])) {
        unlink(__DIR__ . "/../" . $d["img_path"]);
    }

    $path = "assets/img/profileImg/" . uniqid() . ".png";
    move_uploaded_file($_FILES["i"]["tmp_name"], __DIR__ . "/../" . $path);

    Database::iud("UPDATE `user` SET `img_path` = '" . $path . "' WHERE `id` = '" . $user["id"] . "'");
    echo ($path);

}

?>