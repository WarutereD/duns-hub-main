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

        <script type="text/javascript">
		jQuery(document).ready(function($) {
		$('a[rel*=facebox]').facebox() 
		})
		</script>
		
		<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
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
        <li class="nav-item">
          <a class="nav-link" href="message1.php">Messages</a>
        </li>
       
      </ul>
    </nav>
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    
    <div id="container" style="position:absolute; top:10%;">
			<div class="alert alert-info"><center><h2>Customers</h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Customers here..." id="filter"></label>
			<br />
		
		<div class="alert alert-info">
		<div id="printablediv">
        <table class="table table-hover" style="background-color:;">
    <thead>
        <tr style="font-size:20px;">
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Total Amount Spent</th>
            <th>Number of Transactions</th>
        </tr>
    </thead>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM `customer`") or die(mysqli_error());
    $total_customers = mysqli_num_rows($query);
    $total_spent = 0;
    while($fetch = mysqli_fetch_array($query)) {
        $customer_id = $fetch['customerid'];
        $name = $fetch['firstname'] . ' ' . $fetch['mi'] . ' ' . $fetch['lastname'];
        $address = $fetch['address'];
        $mobile = $fetch['mobile'];
        $email = $fetch['email'];
        
        // Get total amount spent by customer
        $transactions_query = mysqli_query($conn, "SELECT SUM(amount) as total_spent, COUNT(*) as num_transactions FROM transaction WHERE customerid = $customer_id") or die(mysqli_error($conn));

        $transactions_fetch = mysqli_fetch_array($transactions_query);
        $total_spent += $transactions_fetch['total_spent'];
        $num_transactions = $transactions_fetch['num_transactions'];
    ?>
    <tr>
        <td><?php echo $customer_id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $address; ?></td>
        <td><?php echo $mobile; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $total_spent; ?></td>
        <td><?php echo $num_transactions; ?></td>
    </tr>
    <?php } ?>
</table>
<p>Total number of customers: <?php echo $total_customers; ?></p>
<p>Total amount spent by all customers: <?php echo $total_spent; ?></p>

		</div>
		</div>
		<div class="add"><a onclick="javascript:printDiv('printablediv')" name="print" style="cursor:pointer;" class="btn btn-info"><i class="icon-white icon-print"></i> Print customer list</a></div>

	</div>

    </main>

  </div>
</div>
	
</body>
</html>

