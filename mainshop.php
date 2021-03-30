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
				
			</div>
		
		</div>
		
	</section>

	<section id="shopgrid" class="shop shop-grid">
		<div class="container">
			<div class="row">
				
<?php include "leftmenu.php" ?>

				<div class="col-xs-12 col-sm-12 col-md-9">
					<div class="row">
						<div class="col-xs-12  col-sm-12  col-md-12">
							<div class="shop-options">
								<div class="product-options2 pull-left pull-none-xs">
									<!--<ul class="list-inline">
										<li>
											<div class="product-sort mb-15-xs">
												<span>sort by:</span>
												<i class="fa fa-angle-down"></i>
												<select>
													<option selected="" value="Default">Product Name</option>
													<option value="Larger">Newest Items</option>
													<option value="Larger">oldest Items</option>
													<option value="Larger">Hot Items</option>
													<option value="Small">Highest Price</option>
													<option value="Medium">Lowest Price</option>
												</select>
											</div>
										</li>
									
									</ul> -->
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

 <?php
include('db.php');

$pr_id=$_GET['q'];

$result = mysqli_query($con,"SELECT * FROM products WHERE maincat=$pr_id");
while($row = mysqli_fetch_array($result))
{

echo '
       

						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img" style="width:100%; height:300px; padding:10px;">
							
							
							
							
							
							';?>


<?php
$img = $row['img'];

if ($img == '') { 
    echo '<img class="img-responsive" src="images/noimage.jpg">';
} 

else{ 
        echo '  <img  class="img-responsive" src="images/products/'.$row['img'].'" alt="'.$row['name'].'">'; 
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
										<a class="btn btn-primary" href="detailpage.php?q='.$row['id'].'">Product Details</a>
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
										<a href="#" style="
    text-transform: capitalize;font-size:16px
"> '; echo substr($row['name'],0,40)."..";echo  '</a> 



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
			
			</div>
		
		</div>
			<!-- AMAY -->
 <?php include "alerts.php"?>
<!-- AMAY -->

	</section>
	<?php include "footer.php"; ?>
</div>	
<?php include "allscript.php"; ?>
	