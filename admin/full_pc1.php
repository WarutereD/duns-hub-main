<?php
  ob_start();
	include("../function/session.php");
	include("../db/dbconn.php");

   
  // Check if the user is logged in
  if (!isset($_SESSION['id'])) {
    header('Location: admin_index.php');
    exit();
  }

  // If the user is logged in, retrieve the admin information
  $id = (int) $_SESSION['id'];
  $query = mysqli_query ($conn, "SELECT * FROM admin WHERE adminid = '$id' ") or die (mysqli_error());
  $fetch = mysqli_fetch_array ($query);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Duns-hub</title>
	<link rel="icon" href="../images/hubicon2.png" />
	<link rel = "stylesheet" type = "text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/carousel.js"></script>
    <link rel="stylesheet" type="text/css" href="navbar.css">

	<script src="../js/button.js"></script>
	<script src="../js/dropdown.js"></script>
	<script src="../js/tab.js"></script>
	<script src="../js/tooltip.js"></script>
	<script src="../js/popover.js"></script>
	<script src="../js/collapse.js"></script>
	<script src="../js/modal.js"></script>
	<script src="../js/scrollspy.js"></script>
	<script src="../js/alert.js"></script>
	<script src="../js/transition.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../javascripts/filter.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../chart/chart.js"></script>
	
	
		<script type="text/javascript" src="../chart/chart.js"></script>

    <!--Le Facebox-->
    <link href="../facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="../facefiles/jquery-1.9.js" type="text/javascript"></script>
        <script src="../facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
        <script src="../facefiles/facebox.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function($) {
        $('a[rel*=facebox]').facebox() 
        })
        </script>

		

</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="admin_home1.php">Duns-hub</a>

  <!-- Navigation items -->
  <div style="position: absolute; right: 0;"> 
     <ul >
        <li class="welcome" style="color: white;">Welcome:&nbsp;&nbsp;&nbsp;<a><i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
        <li class="logout" style="color: white;"><a href="../function/admin_logout.php"><i class="icon-off icon-white"></i>logout</a></li>

    </ul>

  </div>
</nav>


<div class="container-fluid">
  <div class="row">
    <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="admin_home.php">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="productsDropdown">
          <a class="dropdown-item" href="full_pc1.php">Full PC</a>
          <a class="dropdown-item" href="parts_pieces1.php">Parts &amp; Pieces</a>
          <a class="dropdown-item" href="accessories.php">Accessories</a>
        </div>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="transaction1.php">Transaction</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="customer1.php">Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="message1.php">Messages</a>
        </li>
       
      </ul>
    </nav>
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <a href="#add" role="button" class="btn btn-info" data-toggle="modal" style="position: absolute; margin-left: 10px; margin-top: 100px; z-index: 9999;"><i class="icon-plus-sign icon-white"></i>Add Product</a>

		<div id="add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px; position:relative; margin-left:200px; margin-top:50px;">
			<div class="modal-header">
      <h3 id="myModalLabel">Add Product...</h3>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				
			</div>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
					<center>
						<table>
							<tr>
								<td><input type="file" name="product_image" required></td>
							</tr>
							<?php include("random_id.php"); 
							echo '<tr>
								<td><input type="hidden" name="product_code" value="'.$code.'" required></td>
							<tr/>';
							?>
							<tr>
								<td><input type="text" name="product_name" placeholder="Product Name" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="text" name="product_price" placeholder="Price" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="text" name="product_size" placeholder="Size" style="width:250px;" maxLength="2" required></td>
							</tr>
							<tr>
								<td><input type="text" name="brand" placeholder="Brand Name	" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="number" name="qty" placeholder="No. of Stock" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="hidden" name="category" value="full_pc"></td>
							</tr>
						</table>
					</center>
				</div>
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="add" value="Add">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
					</form>
			</div>
		</div>
		
		<?php
			if (isset($_POST['add']))
				{
					$product_code = $_POST['product_code'];
					$product_name = $_POST['product_name'];
					$product_price = $_POST['product_price'];
					$product_size = $_POST['product_size'];
					$brand = $_POST['brand'];
					$category = $_POST['category'];
					$qty = $_POST['qty'];
					$code = rand(0,98987787866533499);
						
								$name = $code.$_FILES["product_image"] ["name"];
								$type = $_FILES["product_image"] ["type"];
								$size = $_FILES["product_image"] ["size"];
								$temp = $_FILES["product_image"] ["tmp_name"];
								$error = $_FILES["product_image"] ["error"];
										
								if ($error > 0){
									die("Error uploading file! Code $error.");}
								else
								{
									if($size > 30000000000) //conditions for the file
									{
										die("Format is not allowed or file size is too big!");
									}
									else
									{
										move_uploaded_file($temp,"../photo/".$name);
			

				$q1 = mysqli_query($conn, "INSERT INTO product ( product_id,product_name, product_price, product_size, product_image, brand, category)
				VALUES ('$product_code','$product_name','$product_price','$product_size','$name', '$brand', '$category')");
				
				$q2 = mysqli_query($conn, "INSERT INTO stock ( product_id, qty) VALUES ('$product_code','$qty')");
				
				exit(header ("location: full_pc1.php"));
				
			}}
		}

				?>
			<div id="container" style="position:absolute; top:10%;">
			<div class="alert alert-info"><center><h2>Pc Builds & Consoles</h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Product here..." id="filter"></label>
			<br />
			
			<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
					<th>Product Image</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Product Sizes</th>
					<th>No. of Stock</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
					
					$query = mysqli_query($conn, "SELECT * FROM `product` WHERE category='full_pc' ORDER BY product_id DESC") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query))
						{
						$id = $fetch['product_id'];
				?>
				<tr class="del<?php echo $id?>">
					<td><img class="img-polaroid" src = "../photo/<?php echo $fetch['product_image']?>" height = "70px" width = "80px"></td>
					<td><?php echo $fetch['product_name']?></td>
					<td><?php echo $fetch['product_price']?></td>
					<td><?php echo $fetch['product_size']?></td>
					
					<?php
					$query1 = mysqli_query($conn, "SELECT * FROM `stock` WHERE product_id='$id'") or die(mysqli_error());
					$fetch1 = mysqli_fetch_array($query1);
					
						$qty = $fetch1['qty'];
					?>
					
					<td><?php echo $fetch1['qty']?></td>
					<td>
					<?php
					echo "<a href='stockin.php?id=".$id."' class='btn btn-success' rel='facebox'><i class='icon-plus-sign icon-white'></i> Stock In</a> ";
					echo "<a href='stockout.php?id=".$id."' class='btn btn-danger' rel='facebox'><i class='icon-minus-sign icon-white'></i> Stock Out</a>";
					?>
					</td>
				</tr>		
				<?php
					}
				?>
				</tbody>
			</table>
			</div>
			</div>
			
  <?php
  /* stock in */
  if(isset($_POST['stockin'])){
  
  $pid = $_POST['pid'];
  
 $result = mysqli_query($conn, "SELECT * FROM `stock` WHERE product_id='$pid'") or die(mysqli_error());
 $row = mysqli_fetch_array($result);
 
  $old_stck = $row['qty'];
  $new_stck = $_POST['new_stck'];
  $total = $old_stck + $new_stck;
 
  $que = mysqli_query($conn, "UPDATE `stock` SET `qty` = '$total' WHERE `product_id`='$pid'") or die(mysqli_error());
  
  header("Location:full_pc1.php");

 }
 
  /* stock out */
 if(isset($_POST['stockout'])){
  
  $pid = $_POST['pid'];
  
 $result = mysqli_query($conn, "SELECT * FROM `stock` WHERE product_id='$pid'") or die(mysqli_error());
 $row = mysqli_fetch_array($result);
 
  $old_stck = $row['qty'];
  $new_stck = $_POST['new_stck'];
  $total = $old_stck - $new_stck;
 
  $que = mysqli_query($conn, "UPDATE `stock` SET `qty` = '$total' WHERE `product_id`='$pid'") or die(mysqli_error());
  
  header("Location:full_pc1.php");

 }
  ?>				


    </main>

  </div>
</div>
	
</body>
</html>

<script type="text/javascript">
	$(document).ready( function() {
		
		$('.remove').click( function() {
		
		var id = $(this).attr("id");

		
		if(confirm("Are you sure you want to delete this product?")){
			
		
			$.ajax({
			type: "POST",
			url: "../function/remove.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$(".del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			}
			}); 
			}else{
			return false;}
		});				
	});

</script>
