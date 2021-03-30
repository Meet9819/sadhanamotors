<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["userSession"])){
header("Location: login.php");
exit(); }
?>

    <?php include "allcss.php" ?>



<body>

<div id="wrapper" class="wrapper clearfix">
        <?php include "header.php"; ?>

    <section id="page-title" class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <h1>Order History </h1>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">Order History</li>
                    </ol>
                </div>
                
            </div>
        
        </div>
    
    </section>
    

    <section id="featured1" class="featured featured-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">












<?php
require_once 'class.user.php';
$user_home = new USER();

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

                if(isset($_SESSION['userSession']))
                {
                 $email = $row['userEmail'];
                }
                else{

                }
?>    


 <?php 

  $stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));

$row = $stmt->fetch(PDO::FETCH_ASSOC);

 if(isset($_SESSION['userSession']))
 {
 $custid = $row['userID'];
}
?>


                  









                                 <div id="order-detail-content" class="table_block table-responsive">
                                 <table id="cart_summary" class="table table-bordered stock-management-on">
                                 <thead>
                                    <tr> <th class="cart_delete text-center">Bill No</th>
                                        <th class="cart_product text-center">Product Name</th>
                                      
                                        <th class="cart_unit item text-center">Unit price</th>
                                        <th class="cart_quantity item text-center">Qty</th>
                                        
                                        <th class="cart_total item text-center">Total</th>


                                            <th class="cart_total item text-center">Date of Order</th>
                                    </tr>
                                 </thead>
                              
                               
                                <tbody>







                                       <?php
include('db.php');

$result = mysqli_query($con,"SELECT * FROM `o`  where useremailid = '$email' ORDER BY `id` DESC");
while($row = mysqli_fetch_array($result))


{
  $billno = $row['billno'];
echo '      <tr id="product_65_477_0_0" class="cart_item address_0 even"> 

                                            <td class="cart_avail"> 



                                         <p id="product_condition"> '.$row['billno'].' 


                                         </p>
                                        </td> 

                                        <td class="cart_avail">
                                            <h5 class="product-name"><a href="detailpage2.php?q='.$row['productcode'].'">'.$row['name'].'</a></h5>
                                            <small class="cart_ref">Product Code : '.$row['productcode'].'</small>
                                         </td>
                                        <td class="cart_avail">
                                         <p id="product_condition"> ₹'.$row['price'].'
                                         </p>
                                        </td>

                                         <td class="cart_avail">
                                         <p id="product_condition"> '.$row['qty'].'
                                         </p>
                                        </td>

                                         <td class="cart_avail">
                                         <p id="product_condition"> ₹'.$row['subtotal'].'
                                         </p>
                                        </td>


                                         <td class="cart_avail">
                                         <p id="product_condition"> '.$row['datee'].'
                                         </p>
                                        </td>



                                          </tr>
                  


';  } 
?> 
   
                                          


                                       <!-- <td class="cart_product">
                                            <a href="#"><img src="images/products/1.jpg" width="80" height="80" /></a>
                                        </td>
                                        <td class="cart_description">
                                            <h5 class="product-name"><a href="#">asd</a></h5>
                                            <small class="cart_ref">Product Code : sad</small>
                                         </td>
                                        <td class="cart_avail">
                                         <p id="product_condition"> <span class="label label-success">In stock</span> 
                                         </p>
                                        </td>


                                        <td class="cart_unit" data-title="Unit price">
                                            <ul class="price text-right" id="product_price_65_477_0">
                                                <li class="price special-price">£332</li>
                                                <li class="price-percent-reduction small"> </li>
                                            </ul>   
                                        </td>

                                    

                                        <td class="cart_delete text-center" data-title="Delete">
                                            <div> <a  class="btn btn-danger" ><i class="glyphicon glyphicon-trash"></i></a>
                                             </div>
                                        </td>

                                     -->

                                  

      
        
                                   
                                </tbody>



                            </table>
                        </div>




                </div>
            </div>
        </div>
    </section>  
    <?php include "footer.php"; ?>
</div>
<?php include "allscript.php"; ?>










