<?php
	include('../db/dbconn.php');
	include("session.php");
	include ("random_code.php");

	if (isset($_POST['place_order'])) {
		$cid = $_SESSION['customerid'];

		if (isset($_POST['total'])) {
			$total = $_POST['total'];
		} else {
			$total = 0;
		}

		$t_id = $r_id;
		$date = date("M d, Y");

		// insert transaction details
		$p_id = $_POST['pid'];
		$oqty = $_POST['qty'];
		
					

		

		foreach($p_id as $i => $pro_id) {
			// check if product exists
			$check_product = mysqli_query($conn, "SELECT * FROM `product` WHERE `product_id`='$pro_id'");
			if(mysqli_num_rows($check_product) > 0) {
				// insert transaction record
				
				// Check if payment method is M-Pesa
				if (isset($_POST['mpesa']) && $_POST['mpesa'] == "true") {
					// Get the reference number
					$reference = $_POST['reference'];
					// Insert the transaction with the reference number
					$query = mysqli_query($conn, "INSERT INTO `transaction` (transaction_id, customerid, amount, payment, order_status, order_date) VALUES ('$t_id', '$cid', '$total', '$reference', 'ON HOLD', '$date')") or die(mysqli_error($conn));
				} else {
					// Insert the transaction with cash on delivery payment method
					$query = mysqli_query($conn, "INSERT INTO `transaction` (transaction_id, customerid, amount, payment, order_status, order_date) VALUES ('$t_id', '$cid', '$total', 'cash on delivery', 'ON HOLD', '$date')") or die(mysqli_error($conn));
				}

			//	$query = mysqli_query($conn, "INSERT INTO `transaction` (transaction_id, customerid, product_id, amount, order_status, order_date) VALUES ('$t_id', '$cid','$pro_id', '$total', 'ON HOLD', '$date')") or die(mysqli_error($conn));	
				// product exists, insert transaction detail
				mysqli_query($conn, "INSERT INTO `transaction_detail` (`product_id`, `order_qty`, `transaction_id`) VALUES ('$pro_id', '$oqty[$i]', '$t_id')") or die("Error: Unable to insert transaction detail - ".mysqli_error($conn));
			} else {
				// product doesn't exist, show error message
				echo "Error: Product with ID '$pro_id' does not exist.";
				exit;
			}
		}

		// redirect to order summary page
		echo "<script>window.location='../product1.php'</script>";
	}
?>
