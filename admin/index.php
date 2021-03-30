<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>


<?php include "allcss.php" ?>


<body>

<?php include "header.php" ?>




<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">


		
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Products</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="productsview.php">View Products</a></li>
							<li><a href="productsadd.php">Add Products</a></li>
							
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<div class="content widget-stat">
						<div class="percent bg-warning"><i class="fa fa-line-chart"></i>53%</div>
						<!-- /.percent -->
						<div class="right-content"> 


                              <?php
include"db.php";

$result = mysqli_query($con,"select count(1) FROM products");
$row = mysqli_fetch_array($result);

$total = $row[0];

       echo'  
	<h2 class="counter"> '. $total.'</h2>
                            
      '
?>
	
						
							<!-- /.counter -->
							<p class="text">No of Products</p>
							<!-- /.text -->
						</div>
						<!-- /.right-content -->
						<div class="clear"></div>
						<!-- /.clear -->
						<div class="process-bar">
							<div class="bar-bg bg-warning"></div>
							<div class="bar js__width bg-warning" data-width="70%"></div>
							<!-- /.bar js__width bg-success -->
						</div>
						<!-- /.process-bar -->
					</div>
					<!-- /.content widget-stat -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Registered User </h4>
					
					<!-- /.dropdown js__dropdown -->
					<div class="content widget-stat-chart">
						<div class="c100 p76 small blue js__circle">
							<span>76%</span>
							<div class="slice">
								<div class="bar"></div>
								<div class="fill"></div>
							</div>
						</div>
						<!-- /.c100 p58 -->
						<div class="right-content">

							   <?php
include"db.php";

$result = mysqli_query($con,"select count(1) FROM tbl_users");
$row = mysqli_fetch_array($result);

$total = $row[0];

       echo'  
	<h2 class="counter"> '. $total.'</h2>
                            
      '
?>
	
				
							
							<!-- /.counter -->
							<p class="text">No of User</p>
							<!-- /.text -->
						</div>
						<!-- /.right-content -->
					</div>
					<!-- /.content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">	Wishlist</h4>
				
					<!-- /.dropdown js__dropdown -->
					<div class="content widget-stat">
						<div class="percent bg-danger"><i class="fa fa-line-chart"></i>+40%</div>
						<!-- /.percent -->
						<div class="right-content"> 
							   <?php
include"db.php";

$result = mysqli_query($con,"select count(1) FROM wishlist");
$row = mysqli_fetch_array($result);

$total = $row[0];

       echo'  
	<h2 class="counter"> '. $total.'</h2>
                            
      '
?>
							<!-- /.counter -->
							<p class="text">Wishlisted Products</p>
							<!-- /.text -->
						</div>
						<!-- /.right-content -->
						<div class="clear"></div>
						<!-- /.clear -->
						<div class="process-bar">
							<div class="bar-bg bg-danger"></div>
							<div class="bar js__width bg-danger" data-width="70%"></div>
							<!-- /.bar js__width bg-success -->
						</div>
						<!-- /.process-bar -->
					</div>
					<!-- /.content widget-stat -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Monthly Sales</h4>
					
					<div class="content widget-stat-chart">
						<div class="c100 p94 small green js__circle">
							<span>94%</span>
							<div class="slice">
								<div class="bar"></div>
								<div class="fill"></div>
							</div>
						</div>
						<!-- /.c100 p58 -->
						<div class="right-content">
							   <?php
include"db.php";

$result = mysqli_query($con,"select count(1) FROM o");
$row = mysqli_fetch_array($result);

$total = $row[0];

       echo'  
	<h2 class="counter"> '. $total.'</h2>
                            
      '
?>
							<!-- /.counter -->
							<p class="text">Sales</p>
							<!-- /.text -->
						</div>
						<!-- /.right-content -->
					</div>
					<!-- /.content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			



 
							<?php
include('db.php');
$result = mysqli_query($con,"SELECT * FROM adminlogin"); 
 $tmpCount = 1;
while($row = mysqli_fetch_array($result))
{

echo '

			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content user-info">
					<div class="avatar"><img src="https://placehold.it/128x128" alt=""></div>
					<!-- /.avatar -->
					<div class="right-content">
						<h4 class="name">'.$row['username'].'</h4>
						<!-- /.name -->
						<p><a href="mailto:'.$row['email'].'">'.$row['email'].'</a></p>
						<div class="text-warning small">'.$row['password'].'</div>
						<!-- /.text-warning -->
					</div>
					<!-- /.right-content -->
				</div>
				<!-- /.user-info -->
			</div> 

			'; 
		}
		?>



			<!-- /.col-lg-6 col-xs-12 -->
		</div>
		
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->



<?php include "allscripts.php" ?>