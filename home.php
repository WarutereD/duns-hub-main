<?php
	include("function/session.php");
	include("db/dbconn.php");
	
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
	
	
	

	<div id="content">
		<div class="nav">
	
			 <ul>
				<li><a href="home.php"><i class="icon-home"></i>Home</a></li>
				<li><a href="product1.php"><i class="icon-th-list"></i>Product</a>
				<li><a href="aboutus.php"><i class="icon-bookmark"></i>About Us</a></li>
				<li><a href="contactus.php"><i class="icon-inbox"></i>Contact Us</a></li>
			</ul>
		</div>
		
		<div class="item-container">
 		 <div class="item-wrapper">
  			<div class="item-description">
      			<h2>TheHub</h2>
				<h3>Welcome</h3>
      			<p>The Xbox Series X delivers sensationally smooth frame rates of up to 120FPS with the visual pop of HDR. Immerse yourself with sharper characters, brighter worlds and impossible details with true-to-life 4K.*</p>
      			<p>Price: KSH100.00</p>
    		</div>
    		<div class="item-image">
      			<img src="images/xbox.jpg" alt="Item Image">
    		</div>
  		 </div>
  	 	 <div class="item-wrapper">
			<div class="item-description">
      			<h2>Item Name 2</h2>
      			<p>Item Description 2 goes here...</p>
      			<p>Price: KSH20.00</p>
    		</div>
    		<div class="item-image">
      			<img src="images/mpesa.png" alt="Item Image">
    		</div>
  		 </div>
  		<div class="item-wrapper">
		  <div class="item-description">
      			<h2>Item Name 3</h2>
      			<p>Item Description 3 goes here...</p>
      			<p>Price: KSH30.00</p>
    		</div>
    		<div class="item-image">
      			<img src="images/mpesa.png" alt="Item Image">
    		</div>
  		</div>
		<div class="item-arrow item-prev"><i class="fa fa-chevron-left"></i></div>
    <div class="item-arrow item-next"><i class="fa fa-chevron-right"></i></div>
</div>

<style>
  .item-container {
    padding: 20px;
    width: 80%;
    margin: 0 auto;
  }

  .item-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin-top: 20px;
  }

  .item-image img {
    max-width: 100%;
    height: auto;
  }

  .item-description {
    margin-left: 20px;
    flex-grow: 1;
  }

  /* Hide all but the first item */
  .item-wrapper:not(:first-of-type) {
    display: none;
  }
</style>

<script>
  // Select all item wrappers
  const items = document.querySelectorAll('.item-wrapper');
  
  // Set initial index
  let currentItem = 0;
  
  // Set interval to switch items every 5 seconds
  setInterval(() => {
    // Hide current item
    items[currentItem].style.display = 'none';
    
    // Increment index or reset to 0 if at the end
    currentItem = currentItem === items.length - 1 ? 0 : currentItem + 1;
    
    // Show next item
    items[currentItem].style.display = 'flex';
  }, 10000);
</script>



		
	
		

		
		<div id="product" style="position:relative; margin-top:30%;">
			<center><h2><legend>Ensuring you get the best parts</legend></h2></center>
			
			
			<?php 
				
				$query = mysqli_query($conn, "SELECT *FROM product  ORDER BY product_id DESC") or die (mysqli_error());
				
					while($fetch = mysqli_fetch_array($query))
						{
							
						$pid = $fetch['product_id'];
						
						$query1 = mysqli_query($conn, "SELECT * FROM stock WHERE product_id = '$pid'") or die (mysqli_error());
						$rows = mysqli_fetch_array($query1);
						
						$qty = $rows['qty'];
						if($qty <= 5){
						
						}else{
							echo "<div class='float'>";
							echo "<center>";
							echo "<a href='details.php?id=".$fetch['product_id']."'><img class='img-polaroid' src='photo/".$fetch['product_image']."' height = '300px' width = '300px'></a>";
							echo "".$fetch['product_name']."";
							echo "<br />";
							echo "P ".$fetch['product_price']."";
							echo "<br />";
							echo "<h3 class='text-info' style='position:absolute; margin-top:-90px; text-indent:15px;'> Size: ".$fetch['product_size']."</h3>";
							echo "</center>";
							echo "</div>";
						}
							
						}
			?>
		</div>
		
		
	</div>

		</div>
</br>
</br>
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyright &copy; </label>
			<p style="font-size:25px;">Duns-hub Inc. 2023</p>	    		
			
	</div>
</body>
</html>