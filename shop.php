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
<!-- Document Wrapper
	============================================= -->
<div id="wrapper" class="wrapper clearfix">

	<?php include "header.php"; ?>
	
	<!-- Page Title
============================================= -->
	<section id="page-title" class="page-title">
		<div class="container">
			<div class="row"> 



 	

				<div class="col-xs-12 col-sm-12 col-md-6">
					
                      <?php
                        include('db.php');
                        
                        $var=$_GET['q'];   
                        
                        $result = mysqli_query($con,"SELECT * FROM menu  WHERE  menu_id=$var ");
                        while($row = mysqli_fetch_array($result))
                        {
                        
                        echo '
                              <h1>'.$row['menu_name'].'</h1>
                        
                        ';
                        }
                        ?>
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">All Products</li>
					</ol>
				</div>
				<!-- .col-md-6 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #page-title end -->
	
	<!-- Shop product grid right sidebar
============================================= -->
	<section id="shopgrid" class="shop shop-grid">
		<div class="container">
			<div class="row">
				

				<?php include "leftmenunosubcategory.php" ?>

				
				<div class="col-xs-12 col-sm-12 col-md-9">
				<!--	<div class="row">
						<div class="col-xs-12  col-sm-12  col-md-12">
							<div class="shop-options">
								<div class="product-options2 pull-left pull-none-xs">
									
								</div>
								
								<div class="product-view-mode text-right pull-none-xs">
								
								</div>
							
							</div>
							
						</div>
					
					</div>
					<!-- .row end -->
					<div class="row">
						<!-- Product #1 -->




 <?php
include('db.php');

$pr_idd=$_GET['q'];



$pr_id=$_GET['q'];

$result = mysqli_query($con,"SELECT * FROM products WHERE categoryid=$pr_id or maincat = $pr_id");
while($row = mysqli_fetch_array($result))
{

echo '
       

						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img"  style="width:100%;height:300px;padding:10px;">
							
							
							
										
							'; ?> <?php 
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
        echo '  <img class="img-responsive" src="images/products/'.$row['img'].'" alt="'.$row['name'].'">'; 
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

										<a class="btn btn-primary" href="detailpage.php?q='.$row['id'].'">Item Details</a>    ';?>
  
<?php echo '
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
							
								<div class="prodcut-title" >
									<h3>
										<a href="detailpage.php?q='.$row['id'].'" style="
    text-transform: capitalize;font-size:16px
"> '; echo substr($row['name'],0,35)."..";echo  '</a> 



									</h3>
								</div>
								
								<div class="product-price">
									<span class="symbole">₹ </span><span>'.$row['price'].'</span>
								</div>
								
								
							</div>
						
						</div> 

						'; }
						?>

					
						
					
						
					</div>
				
				
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
	