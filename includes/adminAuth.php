<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["a"])) {
    http_response_code(401);
    echo "Unauthorized";
    exit();
}
?>
