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
									<ul class="list-inline">
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
										<li>
											<div class="product-sort">
												<span>Show:</span>
												<i class="fa fa-angle-down"></i>
												<select>
													<option selected="" value="10">10 items / page</option>
													<option value="25">25 items / page</option>
													<option value="50">50 items / page</option>
													<option value="100">100 items / page</option>
												</select>
											</div>
										</li>
									</ul>
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
 
include('db.php');


$perpage = 6;
if(isset($_GET['page']) & !empty($_GET['page'])){
  $curpage = $_GET['page'];
}else{
  $curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;


$PageSql = "SELECT * FROM `products`";

$pageres = mysqli_query($con, $PageSql);
$totalres = mysqli_num_rows($pageres);

$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;

$ReadSql = "SELECT * FROM `products` LIMIT $start, $perpage ";

$res = mysqli_query($con, $ReadSql);

                                 
while($result=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
?>
 <?php echo'  <div class="col-xs-12 col-sm-6 col-md-4 product">
							<div class="product-img">
								<img  src="images/products/'.$result['img'].'" alt="Product"/>
								<div class="product-hover">
									<div class="product-action">
										<a class="btn btn-primary" href="cartAction.php?action=addToCart&id='.$result['id'].'">Add To Cart</a>
										<a class="btn btn-primary" href="detailpage.php?q='.$result['id'].'">Item Details</a>
									</div>
								</div>
								
							</div>
						
							<div class="product-bio">
								<div class="prodcut-cat">
									<a href="detailpage.php?q='.$result['id'].'">'.$result['productcode'].'</a>
								</div>
							
								<div class="prodcut-title">
									<h3>
										<a href="detailpage.php?q='.$result['id'].'" style="
    text-transform: capitalize;font-size:16px
"> '; echo substr($result['name'],0,40)."..";echo  '</a> 

									</h3>
								</div>
								
								<div class="product-price">
									<span class="symbole">₹ </span><span>'.$result['price'].'.00</span>
								</div>
							</div>
						</div>  


'; } mysqli_close($conn);
?> 


                             

						
					</div>
					<!-- .row end -->
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
						




 <ul class="pagination">
   <?php if($curpage != $startpage){ ?>
       <li>
       <a href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
           <span aria-hidden="true">&laquo;</span>
           <span class="sr-only">First</span>
       </a>
       </li>
    <?php } ?>
     <?php if($curpage >= 2){ ?>

	 <li> <a href="?page=<?php echo $previouspage ?>"> <?php echo $previouspage ?></a></li>
     <?php } ?>
	<li class="active">
           <a href="?page=<?php echo $curpage ?>">
          <?php echo $curpage ?>
            </a>
       </li>
       <?php if($curpage != $endpage){ ?>
       <li>
        <a style="margin-left: 0;" href="?page=<?php echo $nextpage ?>">
          <?php echo $nextpage ?>
         </a>
       </li>
        <li >
         <a href="?page=<?php echo $endpage ?>" aria-label="Next">
             <span aria-hidden="true">&raquo;</span>
             <span class="sr-only">Last</span>
         </a>
       </li>
      <?php } ?>
</ul>
         


						</div>
						<!-- .col-md-12 end -->
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
	