<?php

include('db/dbconn.php');


if(isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM customer WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        echo $password;
        echo $row['password'];

        if (password_verify($password, $row['password'])) {
            // start a new session and store the user ID
            session_start();
            $_SESSION['customerid'] = $row['customerid'];

            header("Location: home.php");
            exit;
        }
        else {
           //wrong password
            echo "<script>alert('noooo')</script>";
            $error_msg = "Invalid login credentials. Please try again.";
            header("Location: login.php");
        }
    }
    else {
        echo "<script>alert('noooop')</script>";
        $error_msg = "invalid email.";
        header("Location: index.php");
    }
}
?> 