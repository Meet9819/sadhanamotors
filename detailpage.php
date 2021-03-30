<!-- AMAY -->
<?php
error_reporting(0);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?> 
<!-- AMAY -->



 <?php include "allcssdetailpage.php"; ?>


  <?php
  include('db.php');

  $var=$_GET['q'];   

  $result = mysqli_query($con,"SELECT * FROM products WHERE id=$var ");
  while($row = mysqli_fetch_array($result))


  {


echo '
 	<title>'.$row['name'].' - www.sadhanamotors.com</title>
    <meta name="description" content="'.$row['metadescription'].'" />
    <meta name="keywords" content="'.$row['metatag'].'" />

    <meta name="robots" content="index, follow" />
    <meta https-equiv="Content-type" content="text/html;charset=UTF-8" />

    <meta property="og:title" content="'.$row['metatitle'].'" />
    <meta property="og:type" content="'.$row['metatitle'].'" />
    <meta property="og:url" content="https://www.sadhanamotors.com" />
    <meta property="og:image" content="https://www.sadhanamotors.com/img/fb-en.png" />
    <meta property="og:site_name" content="sadhanamotors" />
    <meta property="og:description" content="'.$row['metadescription'].'" />


    <meta name="generator" content="nopCommerce" />
    <meta https-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
    <meta https-equiv="cache-control" content="max-age=0" />
    <meta https-equiv="Expires" content="Mon, 26 Jul 2020 05:00:00 GMT">
    <meta https-equiv="Pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="msapplication-tap-highlight" content="no" />


    
<link rel="canonical" href=https://www.sadhanamotors.com/'.$row['metatitle'].'>
<meta property="og:type" content="product" />
<meta property="og:title" content="'.$row['metatitle'].'" />
<meta property="og:description" content="'.$row['metadescription'].'" />
<meta property="og:image" content="https://www.sadhanamotors.com/content/images/thumbs/0120893_5d-plus-car-mats-for-hyundai-venue-2019-black-red_560.jpeg" />
<meta property="og:url" content="https://www.sadhanamotors.com/'.$row['metatitle'].'" />
<meta property="og:site_name" content="sadhanamotors" />
<meta property="twitter:card" content="summary" />
<meta property="twitter:site" content="sadhanamotors" />
<meta property="twitter:title" content="'.$row['metatitle'].'" />
<meta property="twitter:description" content="'.$row['metadescription'].'" />
<meta property="twitter:image" content="https://www.sadhanamotors.com/content/images/thumbs/0120893_5d-plus-car-mats-for-hyundai-venue-2019-black-red_560.jpeg" />
<meta property="twitter:url" content="https://www.sadhanamotors.com/5d-plus-car-mats-for-hyundai-venue-2019-black-red" />
'; 
} ?>

 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
<body>

<div id="wrapper" class="wrapper clearfix">

	<?php include "header.php"; ?>
	
	
	<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-9">
					
                        <?php
                        include('db.php');

                        $var=$_GET['q'];   

                        $result = mysqli_query($con,"SELECT * FROM products WHERE id=$var ");
                        while($row = mysqli_fetch_array($result))
                        {

                        echo ' <h1>'.$row['name'].'</h1>

                        '; } 
						?> 
 

				</div>
			
				<div class="col-xs-12 col-sm-12 col-md-3">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">shop</li>
					</ol>
				</div>
			
			</div>
			
		</div>
	
	</section>
	
	<section id="shopgrid" class="shop shop-single">
		<div class="container shop-content">
		
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-5">
					<div class="prodcut-images">
						<div class="product-img-slider"> 



                              <?php
                        include('db.php');

                        $var=$_GET['q'];   

                        $result = mysqli_query($con,"SELECT * FROM products WHERE id=$var ");
                        while($row = mysqli_fetch_array($result))
                        {

                        echo '
							'; ?> 

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

							'; } 
							?> 
    <?php

include"db.php";

$var=$_GET['q'];

$result = mysqli_query($con,"SELECT * FROM productimages where idd=$var");

while($row = mysqli_fetch_array($result))
{
echo '

   <img style="width:60px" src="images/products/' . $row['file_name'] . '">

'; 
} 
?>
						</div>
						<div class="product-img-nav"> 





                                                                                        <?php

include"db.php";

$var=$_GET['q'];

$result = mysqli_query($con,"SELECT * FROM productimages where idd=$var limit 1");

while($row = mysqli_fetch_array($result))
{
echo '
<img style="width:60px;display:none;" src="images/products/' . $row['file_name'] . '" alt="tp">


'; 
} 
?>


                                                                                        <?php

include"db.php";

$var=$_GET['q'];

$result = mysqli_query($con,"SELECT * FROM productimages where idd=$var");

while($row = mysqli_fetch_array($result))
{
echo '

   <img style="width:60px" src="images/products/' . $row['file_name'] . '" alt="post_11">

'; 
} 
?>

				
						</div>
					</div>
				</div> 

  <?php 

  error_reporting(0);
  session_start(); 

  $stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));

$row = $stmt->fetch(PDO::FETCH_ASSOC);

 if(isset($_SESSION['userSession']))
 {
  $custid = $row['userID'];
}
?>


                              <?php
                        include('db.php');

                        $var=$_GET['q'];   

                        $result = mysqli_query($con,"SELECT * FROM products WHERE id=$var ");



                        while($row = mysqli_fetch_array($result))
                        {

 $maincat = $row['maincat'];
                        echo '
                     



				<div class="col-xs-12 col-sm-12 col-md-7">
					<div class="product-title text-center-xs">
						<h3>'.$row['name'].'</h3>
					</div>
					
					<div class="product-meta mb-30">
						<div class="product-price pull-left pull-none-xs">
							<p><span class="discount">₹ '.$row['oldprice'].'.00</span>₹ '.$row['price'].'</p>
						</div>
					
						<div class="product-review text-right text-center-xs">
							<span class="product-rating"> 

						 ';

for ($i=0; $i <$row['star'] ; $i++) { 
        echo "<i class='fa fa-star'></i>";
    }"";


    echo '
                                                   

		
							</span>
						
						</div>
						
					</div>
					
					    '; ?>   

                                   <?php


$stock = $row['stock']; 

if ($stock >= 1) { 
    echo ' <p id="product_condition">'.$row['stock'].' Items <span class="label label-success"  style="
    font-size: 13px;
"> In stock</span> </p> '; 
} 
else { 
    echo ' <p id="product_condition"> '.$row['stock'].' Items <span class="label label-warning" style="
    font-size: 13px;
"> Out of stock</span> </p> '; 
} 
?>
 
        <?php echo '
					<div class="product-desc text-center-xs">
						<p class="mb-0">'.$row['description'].'</p>
					</div>
				
					
					<hr class="mt-30 mb-30"> 
					<div class="product-details text-center-xs">
						<h5>Other Details :</h5>
						<ul class="list-unstyled">
							<li>Product : <span>'.$row['name'].'</span></li>
							<li>Code : <span>'.$row['productcode'].'</span></li>
						
							<li>Car : <span>'.$row['brand'].'</span></li>
							<li>Shipping Within: <span>4-7 Days</span></li>
						</ul>
					</div>
				
					<hr class="mt-30 mb-30">
					<div class="product-action">
						

	

	<div class="product-cta text-left text-center-xs">
					
			
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

  

	  


 <a class="btn btn-primary" href="javascript:void(0)" data-wishlist="8" title="Add to Wishlist" onclick="addToWishlist(\'' . $row['img'] . '\', \'' . $row['name'] . '\', \'' . $row['price'] . '\', \'' . $_SESSION['userSession'] . '\', \'' . $row['id'] . '\')" > <span>Wishlist</span> </a>

   ';?>
   
   <?php 
$sale = $row['sale']; 
  if ($sale == 0 || $sale == '') {
       echo '   ';
   } 
else {
         echo ' <a type="button"  class="btn btn-primary" >On Sale</a> ';
}
?>
<?php echo '
						</div>
					</div>


					
					<hr class="mt-30 mb-30">
					<div class="product-share  text-center-xs">
						<h5 class="share-title">share product: </h5>
						<a class="share-facebook" href="http://www.facebook.com/sharer.php?u=https://sadhanamotors.com/detailpage.php?q='.$row['id'].'"  target="_blank" ><i class="fa fa-facebook"></i></a>
					
						<a class="share-twitter" href="http://twitter.com/share?text='.$row['name'].'&url=https://sadhanamotors.com/detailpage.phpq='.$row['id'].'" target="_blank"><i class="fa fa-twitter"></i></a>
					
						<a style="background-color:#25D366" href="whatsapp://send?text=http://sadhanamotors.com/detailpage.php?q='.$row['id'].'" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></i></a>
							</div>
					
				</div> 




			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="product-tabs">
						
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#description" aria-controls="description" role="tab" data-toggle="tab">description</a>
							</li>
							
							
						</ul>
					
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="description">
								<p>'.$row['descr'].'</p>
								
							</div>
						
						
						</div>
					
					</div>
					
				</div>
			</div>
	
		
		'; } ?> 

		</div> 

<br><Br>

		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<p class="subheading">we get</p>
					<h2>Recent Products</h2>
				</div>
				
			</div>
		
			
		</div>
	
		<div class="container">
			<div class="row product-carousel text-center">
				 



 <?php
include('db.php');


$result = mysqli_query($con,"SELECT * FROM products where maincat = $maincat");
while($row = mysqli_fetch_array($result))
{

echo '
       

						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img" style="height:250px;"> 
							
							
							
							
';	?>						
							
<?php
$img = $row['img'];

if ($img == '') { 
    echo '<img class="img-responsive" src="images/noimage.jpg">';
} 

else{ 
        echo '  <img style="width: 200px;
    height: 200px;" class="img-responsive" src="images/products/'.$row['img'].'" alt="'.$row['name'].'">'; 
} 
?> 

<?php echo '
							
								<div class="product-hover">
									<div class="product-action">
									    <a type="button" name="Submit" class="btn btn-primary aajax_add_to_cart_button" href="javascript:void(0)" onclick="addToCart(\'' . $row['id'] . '\')">Add to cart</a>

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
								
								<div class="product-price">
									<span class="symbole">₹ </span><span>'.$row['price'].'</span>
								</div>
								
								
							</div>
						
						</div> 

						'; }
						?>


			</div>
		
		</div>
	


<!-- AMAY -->
 <?php include "alerts.php"?>
<!-- AMAY -->

	</section> 




<script>
$(document).ready(function() {
  $('#butsave').on('click', function() {
    $("#butsave").attr("disabled", "disabled");

    var img = $('#img').val();
    var name = $('#name').val();
    var price = $('#price').val();
    var useremailid = $('#useremailid').val();
    var pid = $('#pid').val();
   


    if(img!="" && name!="" && price!="" && useremailid!="" && pid!=""){
      $.ajax({
        url: "ajax/save.php",
        type: "POST",
        data: {
          img: img,
          name: name,
          price: price,
          useremailid: useremailid,
          pid: pid    
        },
        cache: false,
        success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            $("#butsave").removeAttr("disabled");
            $('#fupForm').find('input:text').val('');
            $("#success").show();
            $('#success').html('Product added to wishlist successfully !');            
          }
          else if(dataResult.statusCode==201){
             alert("Error occured !");
          }
          
        }
      });
    }
    else{
    //  alert('Please fill all the field !');
        window.location.href='login.php';
    }
  });
});
</script>

	
<?php include "footer.php"; ?>


</div>
<?php include "allscript.php"; ?>