<div class="col-xs-12 col-sm-12 col-md-3 sidebar">

    <!-- Main Categories  -->
    <div class="widget widget-categories">
        <div class="widget-title">
            <h5>Main categories</h5>
        </div>
        <div class="widget-content">
            <ul class="list-unstyled">

                <?php
include('db.php');

$result = mysqli_query($con,"SELECT * FROM menu  where parent_id = 0 ");
while($row = mysqli_fetch_array($result))
{

echo ' 

<li><a href="mainshop.php?q='.$row['menu_id'].'"><i class="fa fa-angle-double-right"></i>'.$row['menu_name'].'</a></li> 
'; } ?>

            </ul>
        </div>
    </div>
    <!-- Main categories end -->

    <!-- Recent Products -->
    <div class="widget widget-recent-products">
        <div class="widget-title">
            <h5>Recent Items</h5>
        </div>
        <div class="widget-content">

            <?php
include('db.php');

$result = mysqli_query($con,"SELECT * FROM products order by id desc limit 3 " );
while($row = mysqli_fetch_array($result))
{

echo '

							<div class="product">
								<img width="61px" src="images/products/'.$row['img'].'" alt="product"/>
								<div class="product-desc">
									<div class="product-title">
											<a href="detailpage.php?q='.$row['id'].'" style="
  											  text-transform: capitalize;font-size:16px"> 
  											  '; echo substr($row['name'],0,20)."..";echo  '</a> 
									</div>
									<div class="product-meta">
										<span class="color-theme">₹ '.$row['price'].'</span>
									</div>
								</div>
							</div>
	'; } ?>

        </div>

    </div>
    <!-- recent-product end -->

    <!-- Brands -->
    <div class="widget widget-tags">
        <div class="widget-title">
            <h5>Brands</h5>
        </div>
        <div class="widget-content">

            <?php
include('db.php');

$result = mysqli_query($con,"SELECT * FROM client order by id desc");
while($row = mysqli_fetch_array($result))
{

echo '

       <a href="">'.$row['name'].'</a> 
       '; } ?>

        </div>
    </div>
    <!-- Brands end -->

</div>

<!-- .col-md-3 end -->