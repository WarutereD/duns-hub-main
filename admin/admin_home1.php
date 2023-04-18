<?php
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

<script src="../chart/highcharts.js"></script>
<script src="../chart/exporting.js"></script>

		<script type="text/javascript">
$(function () {

    // Make monochrome colors and set them as default for all pies
    Highcharts.getOptions().plotOptions.pie.colors = (function () {
        var colors = [],
            base = Highcharts.getOptions().colors[0],
            i;

        for (i = 0; i < 10; i += 1) {
            // Start out with a darkened base color (negative brighten), and end
            // up with a much brighter color
            colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
        }
        return colors;
    }());

    // Build the chart
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Products sold as of year <?php echo $date = date("Y"); ?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Share',
            data: [
				<?php 
				$result = mysqli_query($conn, "SELECT brand FROM product Group by brand");
				while($row = mysqli_fetch_array($result)){
				
				$brnd = $row['brand'];
				
				$result1 = mysqli_query($conn, "SELECT * FROM product WHERE brand = '$brnd'");
				$row1 = mysqli_num_rows($result1);
				
				echo "['".$brnd."',   ".$row1."],";
				
				}
				?>
				
            ]
        }]
    });
});
		</script>

</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Duns-hub</a>

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
        <div id="container" class="chart-container"></div>
    

    </main>

  </div>
</div>


	
	
	
		
</body>
</html>
