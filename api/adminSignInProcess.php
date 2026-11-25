<?php

session_start();
include_once __DIR__ . "/../includes/connection.php";

$username = $_POST["u"];
$password = $_POST["p"];

if (empty($username)) {
    echo ("Please Enter admin username");
} else if (empty($password)) {
    echo ("Please Enter admin password");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'");
    $num = $rs->num_rows;

    if ($num == 1) {
        $d = $rs->fetch_assoc();

        if ($d["user_type_id"] == 1) {
            echo ("Success");

            $_SESSION["a"] = $d;

        } else {
            echo ("You don't have an Admin Account");
        }

    } else {
        echo ("Invalid Username or Password");
    }
}

?>