<?php
session_start();

if (!function_exists('logged_in')) {
    function logged_in() {
        return isset($_SESSION['customerid']);
    }
}

if(!function_exists('confirm_logged_in')){
    function confirm_logged_in() {
    if(isset($_SESSION['customerid']) && !empty($_SESSION['customerid'])) {
        // User is logged in
        return true;
    } else {
        // User is not logged in
        header('Location: login.php'); // Redirect to login page
        exit();
    }
}

}



?>




