<?php
session_start();

function logged_in() {
    return isset($_SESSION['customerid']);
}

function confirm_logged_in() {
    if (!logged_in()) {
        header("Location: login.php");
        exit;
    }
}
?>




