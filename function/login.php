<?php

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "wamagas") or die(mysqli_error($conn));

    // Prepare query and bind parameters
    $stmt = $conn->prepare("SELECT * FROM customer WHERE email=?");
    $stmt->bind_param("s", $email);

    // Execute query
    $stmt->execute();

    // Fetch results
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Verify password
    if ($row && password_verify($password, $row['password'])) {
		echo "<script>alert('Successful')</script>";
        // Password is correct, set session variable and redirect to home.php
        $_SESSION['id'] = $row['customerid'];
        header("location: home.php");
		exit();
    } else {
        // Password is incorrect or email doesn't exist
        echo "<script>alert('Invalid Email or Password')</script>";
        header("location: index.php");
    }
}
?>
