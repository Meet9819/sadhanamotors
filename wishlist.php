<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["userSession"])){
header("Location: login.php");
exit(); }
?>
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
					
                    
                              <h1>My Wishlist</h1>
                        
                      
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">Wishlist </li>
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
					<div class="row">
						<div class="col-xs-12  col-sm-12  col-md-12">
							<div class="shop-options">
								<div class="product-options2 pull-left pull-none-xs">
									
								</div>
								<!-- .product-options end -->
								<div class="product-view-mode text-right pull-none-xs">
									<span>view as:</span>
									<a class="active" href="#"><i class="fa fa-th-large"></i></a>
									<a href="#"><i class="fa fa-th-list"></i></a>
								</div>
								<!-- .product-num end -->
							</div>
							<!-- .shop-options end -->
						</div>
						<!-- .col-md-12 end -->
					</div>
					<!-- .row end -->
					<div class="row">
						<!-- Product #1 -->




						<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script language="JavaScript" type="text/javascript">
            $(document).ready(function() {
                $("a.delete").click(function(e) {
                    if (!confirm('Are you sure?')) {
                        e.preventDefault();
                        return false;
                    }
                    return true;
                });
            });
        </script>



 <?php 
                                include('db.php');
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM wishlist WHERE id=".$_GET['del']);

 ?>
                <script>
                alert('Your Product has been Removed From Wishlist');
                window.location.href='wishlist.php';
                </script>
                <?php

}
?>



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

$pr_id=$_GET['q'];

$result = mysqli_query($con,"SELECT * FROM wishlist WHERE useremailid=$custid");


while($row = mysqli_fetch_array($result))
{

echo '
       

						<div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="images/products/'.$row['img'].'" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
									


									
                                                    
  <a class="delete btn btn-primary" title="Remove From Wishlist" href="?del='.$row['id'].'"> Remove </a>

										<a class="btn btn-primary" href="detailpage.php?q='.$row['pid'].'">Item Details</a>
									</div>
								</div>
								
							</div>
						
							<div class="product-bio">
								
							
								<div class="prodcut-title">
									<h3>
										<a href="detailpage.php?q='.$row['pid'].'" style="
    text-transform: capitalize;font-size:16px
"> '; echo substr($row['name'],0,40)."..";echo  '</a> 



									</h3>
								</div>
								
								<div class="product-price">
									<span class="symbole">₹ </span><span>'.$row['price'].'.00</span>
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
	</section>
	<!-- #blog end -->
	

	<?php include "footer.php"; ?>
	
</div>	

<?php include "allscript.php"; ?>
	