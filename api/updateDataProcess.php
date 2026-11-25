<?php

include_once __DIR__ . "/../includes/connection.php";

session_start();
$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$mobile = $_POST["m"];
$pw = $_POST["p"];
$no = $_POST["n"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];


if (empty($fname)) {
    echo ("Please Enter Your First Name");
} else if (strlen($fname) > 20) {
    echo ("Your First Name Should Be Less Than 20 Characters");
} else if (empty($lname)) {
    echo ("Please Enter Your Last Name");
} else if (strlen($lname) > 20) {
    echo ("Your Last Name Should Be Less Than 20 Characters");
} else if (empty($mobile)) {
    echo ("Please Enter Your Mobile");
} else if (strlen($mobile) != 10) {
    echo ("Your Mobile Number must contain 10 Characters");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Your Mobile Number is Invalid");
} else if (empty($pw)) {
    echo ("Please Enter Your Password");
} else if (strlen($pw) < 5 || strlen($pw) > 30) {
    echo ("Your Password must contain 5 - 30 characters");
} else if (empty($no)) {
    echo ("Please Enter Your Address No");
} else if (strlen($no) > 10) {
    echo ("Your Address No should be less than 10 Characters");
} else if (empty($line1)) {
    echo ("Please Enter Your Address Line 01");
} else if (strlen($line1) > 50) {
    echo ("Your Address Line 01 should be less than 50 Characters");
} else if (empty($line2)) {
    echo ("Please Enter Your Address Line 02");
} else if (strlen($line2) > 50) {
    echo ("Your Address Line 02 should be less than 50 Characters");
} else {
    // update query

    Database::iud("UPDATE `user` SET `fname` = '" . $fname . "', `lname` = '" . $lname . "', `mobile` = '" . $mobile . "', `password` = '" . $pw . "', `no` = '" . $no . "', `line_1` = '" . $line1 . "', `line_2` = '" . $line2 . "' WHERE `id` = '" . $user["id"] . "'");

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo ("Success");
}

?>