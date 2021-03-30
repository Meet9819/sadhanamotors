
    <?php include "allcss.php"; ?>
<link href="bootstrap-slider.min.css" rel="stylesheet" />

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

                                <!-- LEFT MENU -->

                                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
<!-- PRODUCT FILTER CODE  --> 
                                    <?php
	include 'class/Product.php';
	$product = new Product();	
	?>

                                    

                                        <div class="widget widget-recent-products">
                                            <div class="widget-title">
                                                <h5>Filter By Price</h5>
                                            </div>
                                            <div class="">
                                                <input id="priceSlider" data-slider-id='ex1Slider' type="text" data-slider-min="1000" data-slider-max="65000" data-slider-step="1" data-slider-value="14" />
                                                <div class="priceRange">1000 - 65000</div>
                                                <input type="hidden" id="minPrice" value="0" />
                                                <input type="hidden" id="maxPrice" value="65000" />
                                            </div>
                                        </div>




       <div class="widget widget-tags">
                                            <div class="widget-title">
                                                <h5>Brands</h5>
                                            </div>
                                            <div class="brandSection">
                                                <?php
                $brand = $product->getBrand();
                foreach($brand as $brandDetails){   
                ?>
                                                    <div class="list-group-item checkbox">
                                                        <label>
                                                            <input type="checkbox" class="productDetail brand" value="<?php echo $brandDetails["brand"]; ?>">
                                                            <?php echo $brandDetails["brand"]; ?>
                                                        </label>
                                                    </div>
                                                    <?php } ?>
                                            </div>
                                        </div> 








                                   <!--     <div class="list-group">
            <h3>New/Old</h3>
            <?php           
            $newold = $product->getnewold();
            foreach($newold as $newolddetails){ 
            ?>
            <div class="list-group-item checkbox">
            <label><input type="checkbox" class="productDetail newold" value="<?php echo $newolddetails['newold']; ?>" > <?php echo $newolddetails['newold']; ?> GB</label>
            </div>
            <?php    
            }
            ?>
        </div> 



    <div class="widget widget-categories">
                                            <div class="widget-title">
                                                <h5>Main categories</h5>
                                            </div>
                                            <div class="widget-content">
                                                <ul class="list-unstyled">

 <?php
include('db.php');

$result = mysqli_query($con,"SELECT * FROM menu where parent_id = 0");
while($row = mysqli_fetch_array($result))
{
echo ' 
<li><a href="mainshop.php?q='.$row['menu_id'].'"><i class="fa fa-angle-double-right"></i>'.$row['menu_name'].'</a></li> 
'; } ?>

                                                </ul>
                                            </div>
                                        </div>
  -->
                                        <div class="widget widget-recent-products">
                                            <div class="widget-title">
                                                <h5>Recent Items</h5>
                                            </div>
                                            <div class="widget-content">

                                                <?php
include('db.php');

$result = mysqli_query($con,"SELECT * FROM products order by id desc limit 3");
while($row = mysqli_fetch_array($result))
{

echo '					<div class="product">
								<img width="61px" src="images/products/'.$row['img'].'" alt="product"/>
								<div class="product-desc">
									<div class="product-title">
											<a href="detailpage.php?q='.$row['id'].'" style="
    text-transform: capitalize;font-size:16px
"> '; echo substr($row['name'],0,20)."..";echo  '</a> 
									</div>
									<div class="product-meta">
										<span class="color-theme">₹ '.$row['price'].'</span>
									</div>
								</div>
							</div>

							'; } ?>
                                            </div>
                                        </div>

                                 


<!-- PRODUCT FILTER CODE  --> 

                                </div>

                                <!-- LEFT MENU -->

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
<!-- PRODUCT FILTER CODE  PRODUCTS.PHP   

the code is linked to 
class->Product.php   and 
js->search.js
 --> 
                                                <div class="searchResult">
                                                </div>
<!-- PRODUCT FILTER CODE  --> 
                                            </ul>
                                        </div>

                                    </div>

                                </div>

                            </div>
                           
                    </section>

                    <?php include "footer.php"; ?>

            </div> 

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
                        <script src="js/search.js"></script>


<script src="assets/js/functions.js"></script>
</body>
</html>
	