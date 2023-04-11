<?php

		include ("../db/dbconn.php");
		include ("session.php");

		include("session.php");
		include("db/dbconn.php");

// Check if user has submitted the form
if(isset($_POST['edit'])){
	
	// Fetch user's password hash from the database
	$id = (int) $_SESSION['customerid'];
	$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
	$fetch = mysqli_fetch_array ($query);
	$password_hash = $fetch['password'];
	
	// Check if entered password matches the user's password
	if(password_verify($_POST['confirm_password'], $password_hash)){
		
		// If passwords match, update user's account information
		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$mi = mysqli_real_escape_string($conn, $_POST['mi']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$country = mysqli_real_escape_string($conn, $_POST['country']);
		$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$query = mysqli_query ($conn, "UPDATE customer SET firstname='$firstname', mi='$mi', lastname='$lastname', address='$address', country='$country', mobile='$mobile', email='$email' WHERE customerid='$id' ") or die (mysqli_error());
		
		// Display success message
		echo '<script>alert("Account information updated successfully.");window.location.href="home.php";</script>';
		header("Location: /duns-hub-main/home.php");
		exit;
	}else{
		
		// If passwords do not match, display error message
		echo '<script>alert("Incorrect password.");</script>';
	}
}

?>