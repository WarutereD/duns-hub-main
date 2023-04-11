<?php 
	
	include("function/customer_signup.php");
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
	<script>
function validateForm() {
  var email = document.forms["signupForm"]["email"].value;
  var password = document.forms["signupForm"]["password"].value;

  if (email == "") {
    alert("Email must be filled out");
    return false;
  }
  
  if (password == "") {
    alert("Password must be filled out");
    return false;
  }

  // validate email format using regular expression
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    alert("Invalid email address");
    return false;
  }

  // validate password length
  if (password.length < 8) {
    alert("Password must be at least 8 characters long");
    return false;
  }
}
</script>

</head>
<body>
	<div id="header">
		<img src="images/duns-hubicon.png">
		<label>Duns-hub</label>

		<div class="nav">
			<nav>
				<ul>
					<li><a href="#signup"   data-toggle="modal">Sign Up</a></li>
					<li><a href="login.php" >Login</a></li>
				</ul>
			</nav>
			<style>
				nav {
			background-color: #000;
			padding: 10px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
			margin-bottom: 20px;
			text-align: right;
		}
		nav a {
			color: #666;
			text-decoration: none;
			font-size: 1.2em;
			margin: 0 10px;
		}
		nav a:hover {
			color: #9b59b6;
		}
			</style>
		</div>
	</div>
	<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Login...</h3>
			</div>
				<div class="modal-body">
					<form method="post">
					<center>
						<label>Email</label>
						<input type="email" name="email" placeholder="Email" style="width:250px;">
						<label>Password</label>
						<input type="password" name="password" placeholder="Password" style="width:250px;">
					</center>
				</div>
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="login" value="Login">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
					</form>
			</div>
		</div>
	
		<div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
  			<div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    			<h3 id="myModalLabel">Sign Up Here...</h3>
  			</div>
  			<div class="modal-body">
    			<form method="post" action="function/customer_signup.php" onsubmit="return validateForm()" name="signupForm">
      			<div class="form-group">
        			<label for="firstname">First Name</label>
        			<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name" required>
      			</div>
      			<div class="form-group">
        			<label for="mi">Middle Initial</label>
        			<input type="text" class="form-control" id="mi" name="mi" placeholder="Enter your middle initial" maxlength="1" required>
      			</div>
      			<div class="form-group">
        			<label for="lastname">Last Name</label>
        			<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name" required>
      			</div>
      			<div class="form-group">
        			<label for="address">Address</label>
        			<input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
      			</div>
				  <div class="form-group">
        			<label for="country">Country</label>
        			<input type="text" class="form-control" id="country" name="country" placeholder="Enter your country" required>
      			</div>
      			<div class="form-group">
        			<label for="mobile">Mobile Number</label>
        			<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" maxlength="11">
      			</div>
      			<div class="form-group">
        			<label for="email">Email address</label>
        			<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
      			</div>
      			<div class="form-group">
        			<label for="password">Password</label>
        			<input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
      			</div>
      			<button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
      			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    			</form>
  			</div>
			</div>

	<br>
<div id="container">
	<div class="nav">
	
			 <ul>
				<li><a href="index.php"><i class="icon-home"></i>Home</a></li>
				<li><a href="product1.php"><i class="icon-th-list"></i>Product</a>
				<li><a href="aboutus.php"><i class="icon-bookmark"></i>About Us</a></li>
				<li><a href="contactus.php"><i class="icon-inbox"></i>Contact Us</a></li>
				
	</div>
	
	   </br>
	   </br>
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
	   </br>
	</br>
			
			<form method="post">
			
			<?php 
				include ('function/addcart.php');
				
				$query = mysqli_query($conn, "SELECT * FROM product WHERE category= 'gas cylinder' ORDER BY product_id DESC") or die (mysqli_error());
				
					while($fetch = mysqli_fetch_array($query))
						{
						
						$pid = $fetch['product_id'];
						
						$query1 = mysqli_query($conn, "SELECT * FROM stock WHERE product_id = '$pid'") or die (mysqli_error());
						$rows = mysqli_fetch_array($query1);
						
						$qty = $rows['qty'];
						if($qty <= 1){
						
						}else{
							echo "<div class='float'>";
							echo "<center>";
							echo "<a href='details.php?id=".$fetch['product_id']."'><img class='img-polaroid' src='photo/".$fetch['product_image']."' height = '300px' width = '300px'></a>";
							echo "<b>".$fetch['product_name']."</b>";
							//echo "<br />";
							//echo "<b>KSH: ".$fetch['product_price']."/-</b>";
							//echo "<br />";
							//echo "<b> ".$fetch['product_weight']." KGS</b>";
							echo "<br />";							
							echo "</div>";

						}
						}
			?>
			
			</form>

</div>
</div>
</br>
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyright &copy; </label>
			<p style="font-size:25px;">Duns-hub Inc. 2023</p></div></div>				
	</br>
</body>
</html>