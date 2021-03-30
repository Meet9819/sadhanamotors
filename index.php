
<?php error_reporting(0);
define(SERVER_ROOT, __DIR__);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?> 




<?php include "allcss.php"; ?>
   <style type="text/css">
    .discount{
        color: #6c6c6c;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    text-decoration: line-through;
    margin-right: 8px;
    }
</style>
<body>
<div id="wrapper" class="wrapper clearfix">

	<?php include "header.php"; ?>

	<section id="hero" class="hero">
		<div id="hero-slider" class="hero-slider">
			 <?php
include('db.php');


$result = mysqli_query($con,"SELECT * FROM slider order by id desc");
while($row = mysqli_fetch_array($result))
{

echo '
			<div class="slide bg-overlay">
				<div class="bg-section">
					<img src="images/sliders/'.$row['img'].'" alt="'.$row['title'].'"/>
				</div>
				<div class="container vertical-center">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
							<div class="slide-content">
								
								<div class="slide-heading"> '.$row['title'].' </div>
								<div class="slide-title">
									<h2 class="color-theme">'.$row['heading'].'</span></h2>
								</div>
								<div class="slide-desc"> '.$row['subtitle'].'</div>
							
							</div>
						</div>
					
					</div>
				
				</div>
			
			</div> 

			'; } 
			?>

		
			
		</div>
	
	</section>

	
	
	<section style="padding-bottom: 0px" id="featuredItems" class="shop">
		




		<!-- .container end -->
		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<p class="subheading">we get</p>
					<h2>Our Latest Products</h2>
				</div>
				
			</div>
		
		</div>
		
		<div class="container">
			<div class="row product-carousel text-center">
		


 <?php
include('db.php');


$result = mysqli_query($con,"SELECT * FROM products order by id desc limit 15");
while($row = mysqli_fetch_array($result))
{

echo '
       
       

						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								

';?>
<?php 
$sale = $row['sale']; 
  if ($sale == 0 || $sale == '') {
       echo '   ';
   } 
else {
         echo ' <a type="button" style="
    width: 50px;
    margin-right: 0px;
    border-radius: 50%;
	height:50px;
	line-height:45px;
	font-size:16px;
	position:absolute;
	right:0;
	top:0;
" class="btn btn-primary" > SALE</a> ';
}
?>

<?php
$img = $row['img'];

if ($img == '') { 
    echo '<img class="img-responsive" src="images/noimage.jpg">';
} 

else{ 
        echo '  <img style="width: 100%;
    height: 250px;" class="img-responsive" src="images/products/'.$row['img'].'" alt="'.$row['name'].'">'; 
} 
?>


<?php echo '
                  


								

								<div class="product-hover">
									<div class="product-action">






<!-- AMAY -->
   ';?>
   
   <?php 
$stock = $row['stock']; 
  if ($stock == 0) {
       echo ' <a type="button" name="Submit" class="btn btn-primary aajax_add_to_cart_button" href="javascript:void(0)">Out of Stock</a>  ';
   } 
else {
         echo ' <a type="button" name="Submit" class="btn btn-primary aajax_add_to_cart_button" href="javascript:void(0)" onclick="addToCart(\'' . $row['id'] . '\')">Add to cart</a> ';
}
?>
<?php echo '

      

	
										<a class="btn btn-primary" href="detailpage.php?q='.$row['id'].'">Item Details</a>   ';?>
   
   
<?php echo '
									</div>
								</div>
								
							</div>
						
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="detailpage.php?q='.$row['id'].'">'.$row['productcode'].'</a>
								</div>
							
								<div class="prodcut-title">
									<h3>
										<a href="detailpage.php?q='.$row['id'].'" style="
    text-transform: capitalize;font-size:16px
"> '; echo substr($row['name'],0,35)."..";echo  '</a> 



									</h3>
								</div>
							
								<div class="product-price"> <span class="discount">₹ '.$row['oldprice'].'</span>
									<span class="symbole">₹ </span><span>'.$row['price'].'</span>
								</div>
								
								
							</div>
						
						</div> 

						'; }
						?>



			
				
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end --> 








		<div class="container-fluid" style="
    margin-top: 53px;
">
			<div class="row product-boxes">
			

<div class="col-xs-12 col-sm-4 col-md-4 product-box"> 


					 <?php
include('db.php');

$result = mysqli_query($con,"SELECT * FROM offers where id=1");
while($row = mysqli_fetch_array($result))
{

echo '  
  <a target="_blank" href="'.$row['link'].'">
  
<div class="product-img">
					 <img class="img-responsive" src="images/advertise/'.$row['img'].'" > 

						<div class="product-hover">
							<div class="product-link">
								<h3>'.$row['title'].'</h3>
							
							</div>
						</div>
					</div>	
   


     </a>

';  } 
?> 

				</div>

				
				
				<div class="col-xs-12 col-sm-4 col-md-4 product-box"> 


					 <?php
include('db.php');

$result = mysqli_query($con,"SELECT * FROM offers where id=2");
while($row = mysqli_fetch_array($result))
{

echo '  
  <a target="_blank" href="'.$row['link'].'">
  
<div class="product-img">
					 <img class="img-responsive" src="images/advertise/'.$row['img'].'" > 

						<div class="product-hover">
							<div class="product-link">
								<h3>'.$row['title'].'</h3>
							
							</div>
						</div>
					</div>	
   


     </a>

';  } 
?> 

				</div>


				<div class="col-xs-12 col-sm-4 col-md-4 product-box">
					




					 <?php
include('db.php');

$result = mysqli_query($con,"SELECT * FROM offers where id=3");
while($row = mysqli_fetch_array($result))
{

echo '  
  <a target="_blank" href="'.$row['link'].'">
  
<div class="product-img">
					 <img class="img-responsive" src="images/advertise/'.$row['img'].'" > 

						<div class="product-hover">
							<div class="product-link">
								<h3>'.$row['title'].'</h3>
							
							</div>
						</div>
					</div>	
   


     </a>

';  } 
?> 

				</div> 


				<div class="col-xs-12 col-sm-8 col-md-8 product-box"> <br>
				</div>


				<div class="col-xs-12 col-sm-8 col-md-8 product-box">
					 <?php
include('db.php');

$result = mysqli_query($con,"SELECT * FROM offers where id=4");
while($row = mysqli_fetch_array($result))
{

echo '  
  <a target="_blank" href="'.$row['link'].'">
  
<div class="product-img">
					 <img class="img-responsive" src="images/advertise/'.$row['img'].'" > 

						<div class="product-hover">
							<div class="product-link">
								<h3>'.$row['title'].'</h3>
							
							</div>
						</div>
					</div>	
   


     </a>

';  } 
?> 
 

				</div> 				
			</div> 
		</div>



	</section>
	<!-- #featuredItems end -->
	
	<!-- Clients
============================================= -->
	<section id="clients" class="clients bg-gray">
		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<p class="subheading">Awesome</p>
					<h2>Our Brands</h2>
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
			
			<div class="row heading-desc">
				<div class="col-xs-12 col-sm-12 col-md-10">
					<p>Car Shop is a business theme. Perfectly suited for Auto Mechanic, Car Repair Shops, Car Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres.</p>
				</div>
				<!-- .col-md-10 end -->
				<div class="col-xs-12 col-sm-12 col-md-2">
					<a class="btn btn-primary btn-block" href="https://sadhanamotors.com/shop.php?q=2">Shop Now</a>
				</div>
				<!-- .client end -->
			</div>
			<!-- .row end -->
			
		</div>
		<!-- .container end -->
		<div class="container">
			<div class="clients-bg">
				<div class="row">
					<div class="col-xs-12 colsm-12 col-md-12 client-carousel">
						<!-- Client #1 -->
						
 <?php
include('db.php');


$result = mysqli_query($con,"SELECT * FROM client order by id desc");
while($row = mysqli_fetch_array($result))
{

echo '
<div class="client">
							<img style="width:120px" src="images/clients/'.$row['img'].'" alt="'.$row['name'].'">
						</div>
					
						'; } 
						?> 
					
					</div>
				</div>
				<!-- .row end -->
			</div>
		</div>
		<!-- .container end -->
	</section>
	<!-- #clients end -->
	
	<!-- New Items
============================================= -->
	<section id="newItems" class="shop">
		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<p class="subheading">we get</p>
					<h2>New Arrival Products</h2>
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
			
		</div>
		<!-- .container end -->
		<div class="container">
			<div class="row product-carousel text-center">
				 



 <?php
include('db.php');


$result = mysqli_query($con,"SELECT * FROM products where newold= 'New' order by id desc limit 20");
while($row = mysqli_fetch_array($result))
{

echo '
       

						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img" style="height:250px;"> 





							'; ?> 

<?php
$img = $row['img'];

if ($img == '') { 
    echo '<img class="img-responsive" src="images/noimage.jpg">';
} 

else{ 
        echo '  <img class="img-responsive" width="100%" height="250px"  src="images/products/'.$row['img'].'" alt="'.$row['name'].'">'; 
} 
?>

<?php echo '
                  

								<div class="product-hover">
									<div class="product-action">
									




<!-- AMAY -->
   ';?>
   
   <?php 
$stock = $row['stock']; 
  if ($stock == 0) {
       echo ' <a type="button" name="Submit" class="btn btn-primary aajax_add_to_cart_button" href="javascript:void(0)">Out of Stock</a>  ';
   } 
else {
         echo ' <a type="button" name="Submit" class="btn btn-primary aajax_add_to_cart_button" href="javascript:void(0)" onclick="addToCart(\'' . $row['id'] . '\')">Add to cart</a> ';
}
?>
<?php echo '




										<a class="btn btn-primary" href="detailpage.php?q='.$row['id'].'">Item Details</a>
									</div>
								</div>
								
							</div>
						
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="detailpage.php?q='.$row['id'].'">'.$row['productcode'].'</a>
								</div>
							
								<div class="prodcut-title">
									<h3>
										<a href="detailpage.php?q='.$row['id'].'" style="
    text-transform: capitalize;font-size:16px
"> '; echo substr($row['name'],0,35)."..";echo  '</a> 



									</h3>
								</div>
								
								<div class="product-price"> <span class="discount">₹ '.$row['oldprice'].'</span>
									<span class="symbole">₹ </span><span>'.$row['price'].'</span>
								</div>
								
								
							</div>
						
						</div> 

						'; }
						?>


			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->


<!-- AMAY -->
 <?php include "alerts.php"?>
<!-- AMAY -->

	</section>

	<?php include "footer.php"; ?>
</div>
<?php include "allscript.php"; ?>