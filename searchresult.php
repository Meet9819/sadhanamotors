<!-- AMAY -->
<?php
error_reporting(0);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?> 
<!-- AMAY -->
   

   <?php include "allcss.php"; ?>

<body>

<div id="wrapper" class="wrapper clearfix">

	<?php include "header.php"; ?>
	

	<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<h1>All Products</h1>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">All Products</li>
					</ol>
				</div>	
			</div>			
		</div>		
	</section>
	
	<section id="shopgrid" class="shop shop-grid">
		<div class="container">
			<div class="row">	

				<?php include "leftmenunosubcategory.php" ?>

				<div class="col-xs-12 col-sm-12 col-md-9">
					<div class="row">
						<div class="col-xs-12  col-sm-12  col-md-12">
							<div class="shop-options">
								<div class="product-options2 pull-left pull-none-xs">
									
								</div>
							
								<div class="product-view-mode text-right pull-none-xs">
									<span>view as:</span>
									<a class="active" href="#"><i class="fa fa-th-large"></i></a>
									<a href="#"><i class="fa fa-th-list"></i></a>
								</div>
							
							</div>
							
						</div>
						
					</div>
					
					<div class="row">
					  
                    <div id="center_column" class="center_column col-xs-12 col-sm-12">
                      
                        <ul class="product_list row grid">


<?php
 
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "sadhaye5_motor";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
  
  

//if (($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) > 0) {

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
 <?php echo'  <div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img" style="width:100%;padding:10px;height:300px">
								
							'; ?> 

<?php
$img = $result['img'];

if ($img == '') { 
    echo '<img class="img-responsive" src="images/noimage.jpg">';
} 

else{ 
        echo '  <img class="img-responsive" src="images/products/'.$result['img'].'" alt="'.$result['name'].'">'; 
} 
?>

<?php echo '

								<div class="product-hover">
									<div class="product-action">
									



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

       




										<a class="btn btn-primary" href="detailpage.php?q='.$result['id'].'">Item Details</a>
									</div>
								</div>
								
							</div>
						
							<div class="product-bio">
								<div class="prodcut-cat">
									
								  ';?>
   
   <?php 
$productcode = $row['productcode']; 
  if ($productcode == '') {
       echo ' <a href="javascript:void(0)">&nbsp;&nbsp;&nbsp;&nbsp;</a> ';
   } 
else {
         echo ' 	<a href="javascript:void(0)">'.$row['productcode'].'</a> ';
}
?>
<?php echo '
								</div>
							
								<div class="prodcut-title">
									<h3>
										<a href="detailpage.php?q='.$result['id'].'" style="
    text-transform: capitalize;font-size:16px
"> '; echo substr($result['name'],0,40)."..";echo  '</a> 

									</h3>
								</div>
								
								<div class="product-price">
									<span class="symbole">₹ </span><span>'.$result['price'].'</span>
								</div>
							</div>
						</div>  


'; }


 mysqli_close($conn);
?> 


                             

						
					</div>
					<!-- .row end -->
				
				</div>
				<!-- .col-md-9 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->


<!-- AMAY -->
 <?php include "alerts.php"?>
<!-- AMAY -->


	</section>
	<!-- #blog end -->
	

	<?php include "footer.php"; ?>
	
</div>	

<?php include "allscript.php"; ?>
	