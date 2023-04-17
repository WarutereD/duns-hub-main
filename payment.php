<?php
	include("function/session.php");
	include("db/dbconn.php");
	include("function/place_order.php");
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
		<li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile" href="" data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['firstname']; ?>&nbsp;<?php echo $fetch['lastname'];?></a></li>
	</ul>	
</div>

<div id="profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
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
				<li><a href="product1.php"> <i class="icon-th-list"></i>Product</a></li>
				<li><a href="aboutus1.php">   <i class="icon-bookmark"></i>About Us</a></li>
				<li><a href="contactus1.php"><i class="icon-inbox"></i>Contact Us</a></li>
				
			</ul>
	</div>
	<br>
</div>
<div>
<h1>Payment Details</h1>
	<table>
		<tr>
			<th>Transaction ID</th>
			<th>Customer ID</th>
			<th>Total Amount</th>
			<th>Order Status</th>
			<th>Order Date</th>
		</tr>
		<?php
			
			$prodid = $_GET['id'];
			$query = mysqli_query($conn, "SELECT * FROM transaction WHERE transaction_id='$tid'");
			$fetch = mysqli_fetch_array($query);
			$t_id = $fetch['transaction_id'];
			$c_id = $fetch['customerid'];
			$amount = $fetch['amount'];
			$status = $fetch['order_stat'];
			$date = $fetch['order_date'];
		?>
		<tr>
			<td><?php echo $t_id; ?></td>
			<td><?php echo $c_id; ?></td>
			<td><?php echo $amount; ?></td>
			<td><?php echo $status; ?></td>
			<td><?php echo $date; ?></td>
		</tr>
	</table>
	<br>
	<h2>Ordered Items</h2>
	<table>
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Order Quantity</th>
		</tr>
		<?php
			$queryo = mysqli_query($conn, "SELECT * FROM transaction_detail INNER JOIN product ON transaction_detail.product_id = product.productid WHERE transaction_id='$tid'");
			while($fetcho = mysqli_fetch_array($queryo))
			{
				$p_id = $fetcho['product_id'];
				$p_name = $fetcho['product_name'];
				$o_qty = $fetcho['order_qty'];
		?>
		<tr>
			<td><?php echo $p_id; ?></td>
			<td><?php echo $p_name; ?></td>
			<td><?php echo $o_qty; ?></td>
		</tr>
		<?php
			}
		?>
	</table>
</div>
</body>
</html>