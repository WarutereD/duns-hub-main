<?php
session_start();

if (!function_exists('logged_in')) {
    function logged_in() {
        return isset($_SESSION['customerid']);
    }
}

if(!function_exists('confirm_logged_in')){
    function confirm_logged_in() {
    if (!logged_in()) {
        header("Location: login.php");
        exit;
     }
    }
}
?>




