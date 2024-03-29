<?php
	include("function/session.php");
	include("db/dbconn.php");
	

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Duns-hub</title>
	<link rel="icon" href="images/hubicon2.png" />
	<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/button.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/tab.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/popover.js"></script>
	<script src="js/collapse.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/scrollspy.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/transition.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div id="header">
	<img src="images/duns-hubicon.png">
		<label>Duns-hub</label>
			
			<?php
				$id = (int) $_SESSION['customerid'];
			
					$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
					$fetch = mysqli_fetch_array ($query);
			?>
	
			<ul>
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>logout</a></li>
				<li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile"  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['firstname']; ?>&nbsp;<?php echo $fetch['lastname'];?></a></li>
			</ul>
	</div>
	
	<div id="profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">My Account</h3>
				</div>
					<div class="modal-body">
						<?php
							$id = (int) $_SESSION['customerid'];
			
								$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
								$fetch = mysqli_fetch_array ($query);
						?>
						<center>
					<form method="post">
						<center>
							<table>
								<tr>
									<td class="profile">Name:</td><td class="profile"><?php echo $fetch['firstname'];?>&nbsp;<?php echo $fetch['mi'];?>&nbsp;<?php echo $fetch['lastname'];?></td>
								</tr>
								<tr>
									<td class="profile">Address:</td><td class="profile"><?php echo $fetch['address'];?></td>
								</tr>
								<tr>
									<td class="profile">Country:</td><td class="profile"><?php echo $fetch['country'];?></td>
								</tr>
								
								<tr>
									<td class="profile">Mobile Number:</td><td class="profile"><?php echo $fetch['mobile'];?></td>
								</tr>
								
								<tr>
									<td class="profile">Email:</td><td class="profile"><?php echo $fetch['email'];?></td>
								</tr>
							</table>
						</center>
					</div>
				<div class="modal-footer">
					<a href="account.php?id=<?php echo $fetch['customerid']; ?>"><input type="button" class="btn btn-success" name="edit" value="Edit Account"></a>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
					</form>
			</div>
	
	
	
	<br>
<div id="container">
	<div class="nav">	
			 <ul>
				<li><a href="home.php">   <i class="icon-home"></i>Home</a></li>
				<li><a href="product1.php"> 			 <i class="icon-th-list"></i>Product</a></li>
				<li><a href="aboutus1.php">   <i class="icon-bookmark"></i>About Us</a></li>
				<li><a href="contactus1.php"><i class="icon-inbox"></i>Contact Us</a></li>
				
				
			</ul>
	</div>
	
	

	<form method="post" action="function/place_order.php" class="well" style="background-color:#fff;">
		<table class="table">
		<label style="font-size:25px;">My Cart</label>
		<tr>
			<th><h3>Image</h3></td>
			<th><h3>Product Name</h3></th>
			<th><h3>Size</h3></th>
			<th><h3>Quantity</h3></th>
			<th><h3>Price</h3></th>
			<th><h3>Add</h3></th>
			<th><h3>Remove</h3></th>
			<th><h3>Subtotal</h3></th>
		</tr>

		<?php

		$id = isset($_GET['id']) ? $_GET['id'] : 1;
		$action = isset($_GET['action']) ? $_GET['action'] : 'empty';

		switch ($action) {
			case 'view':
				$_SESSION['cart'][$id];
				break;
			case 'add':
				$_SESSION['cart'][$id] = isset($_SESSION['cart'][$id]) ? $_SESSION['cart'][$id] + 1 : 1;
				break;
			case 'remove':
				if (isset($_SESSION['cart'][$id])) {
					$_SESSION['cart'][$id]--;
					if ($_SESSION['cart'][$id] == 0) {
						unset($_SESSION['cart'][$id]);
					}
				}
				break;
			case 'empty':
				unset($_SESSION['cart']);
				break;
		}



		
		if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
			$total = 0;
			foreach($_SESSION['cart'] as $product_id => $quantity) {
				// code to retrieve product details from database
				$query = "SELECT * FROM product WHERE product_id = '$id'";
				$result = mysqli_query($conn, $query);

				if ($result && mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
		
					$name = substr($row['product_name'], 0, 40);
					$price = $row['product_price'];
					$image = $row['product_image'];
					$product_size = $row['product_size'];

					// calculate line cost
					$line_cost = $price * $quantity;
			
					// add line cost to total
					$total += $line_cost;

			
					// Output the product information in a table row
					echo "<tr>";
					echo "<td><img height='70px' width='70px' src='photo/".$image."'></td>";
					echo "<td>".$name."</td>";
					echo "<td><input type='hidden' required value='".$id."' name='pid[]'></td>";
					echo "<td>".$product_size."</td>";
					echo "<td><input type='hidden' required value='".$quantity."' name='qty[]'>".$quantity."</td>";
					echo "<td>".$price."</td>";
					echo "<td><a href='cart.php?id=".$id."&action=add'><i class='icon-plus-sign'></i></a></td>";
					echo "<td><a href='cart.php?id=".$id."&action=remove'><i class='icon-minus-sign'></i></a></td>";
					echo "<td><strong>P ".$line_cost."</strong></td>";
					echo "</tr>";
				}
			}
			// Output the total cost of the order
			echo "<tr>";
			echo "<td colspan='7' align='right'><strong>Total:</strong></td>";
			if(isset($total)) {
				echo "<td><strong>P ".$total."</strong></td>";
			} else {
				echo "<td><strong>P 0.00</strong></td>";
			}
			echo "<td><a class='btn btn-danger btn-sm pull-right' href='cart.php?id=".$id."&action=empty'><i class='fa fa-trash-o'></i> Empty cart</a></td>";		
			echo "</tr>";
			
		}else {
			// Output a message if the cart is empty
			echo "<tr>";
			echo "<td colspan='8' style='text-align:center'>Cart is empty</td>";
			echo "</tr>";
		}
		
		
		?>
		</table>


				
		<div class='pull-right'>
		<a href='home.php' class='btn btn-inverse btn-lg'>Continue Shopping</a>
		
		<a href='payment.php?id=<?php echo $id ?>&action=place_order' class='btn btn-inverse btn-lg'>Proceed & Checkout</a>
		<button name="place_order" type="submit" class="btn btn-inverse btn-lg">Purchase</button>

		<!--<?php echo '<button name="total" type="submit" class="btn btn-inverse btn-lg" >Purchase</button>'; 
		
		
		//include ("function/paypal.php"); 
		//include ("function/mpesa.php"); 
		?>-->
		</form>
    
    
    


	
</div>
<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyright &copy; </label>
			<p style="font-size:25px;">Duns-hub Inc. 2023</p>
		</div>
			
			<div id="foot">
				<h4>Links</h4>
					<ul>
						<a href="http://www.facebook.com/duns-hub"><li>Facebook</li></a>
						<a href="http://www.twitter.com/duns-hub"><li>Twitter</li></a> 
					</ul>
			</div>
	</div>
</body>
</html>