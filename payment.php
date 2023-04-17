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
	<? php
	// Retrieve user details from session variables
$customer_id = $_SESSION['customer_id'];
$user_name = $_SESSION['firstname'];
$user_email = $_SESSION['email'];

/ Retrieve cart details from session variables
if (isset($_SESSION['cart'])) {
    $cart_items = $_SESSION['cart'];
} else {
    $cart_items = array();
}
?>

<!-- Display user and cart details in a table -->
<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Product Name</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Initialize total cost variable
        $total_cost = 0;

        // Loop through cart items and display them in a table row
        foreach ($cart_items as $product_id => $product_qty) {
            // Retrieve product details from database
            $query = "SELECT * FROM product WHERE product_id = '$product_id'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                $product_name = substr($row['product_name'], 0, 40);
                $product_size = $row['product_size'];
                $product_price = $row['product_price'];
                $line_cost = $product_price * $product_qty;
                $total_cost += $line_cost;

                // Display cart item in a table row
                echo "<tr>";
                echo "<td>$customer_id</td>";
                echo "<td>$user_name</td>";
                echo "<td>$user_email</td>";
                echo "<td>$product_name</td>";
                echo "<td>$product_size</td>";
                echo "<td>$product_qty</td>";
                echo "<td>$product_price</td>";
                echo "<td>$line_cost</td>";
                echo "</tr>";
            }
        }

        // Display total cost in a table row
        echo "<tr>";
        echo "<td colspan='7'>Total Cost</td>";
        echo "<td>$total_cost</td>";
        echo "</tr>";
        ?>
    </tbody>
</table>
	
</div>
</body>
</html>