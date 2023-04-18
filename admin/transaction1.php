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
          <a class="nav-link active" href="admin_home1.php">Dashboard</a>
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
       
        
      </ul>
    </nav>
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
  
    <div id="container" style="position:absolute; top:10%;">
			<div class="alert alert-info"><center><h2>Transactions	</h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Transactions here..." id="filter"></label>
			<br />
			
			<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:16px;">
					<th>ID</th>
					<th>DATE</th>
					<th>Customer Name</th>
					<th>Total Amount</th>
					<th>Order Status</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM transaction LEFT JOIN customer ON customer.customerid = transaction.customerid") or die(mysqli_error($conn));

					
					while($fetch = mysqli_fetch_array($query))
						{
						$id = $fetch['transaction_id'];
						$amnt = $fetch['amount'];
						$o_stat = $fetch['order_status'];
						$o_date = $fetch['order_date'];
						
						$name = $fetch['firstname'].' '.$fetch['lastname'];
				?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $o_date; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $amnt; ?></td>
					<td><?php echo $o_stat; ?></td>
					<td><a href="receipt1.php?tid=<?php echo $id; ?>">View</a>
					<?php 
					if($o_stat == 'Confirmed'){
					
					}elseif($o_stat == 'Cancelled'){
					
					}else{
					echo '| <a class="btn btn-mini btn-info" href="confirm.php?id='.$id.'">Confirm</a> ';
					echo '| <a class="btn btn-mini btn-danger" href="cancel.php?id='.$id.'">Cancel</a></td>';
					}					
					?>
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
  
  header("Location:admin_home1.php");
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
  
  header("Location:admin_home1.php");
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
			$(".del"+id).fadeOut(2000, function(){ $(this).remove();}); 
			}
			}); 
			}else{
			return false;}
		});				
	});

</script>

