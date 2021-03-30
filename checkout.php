<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["userSession"])){
header("Location: login2.php");
exit(); }
?>

<?php
include 'logindb.php';

$query = $db->query("SELECT * FROM tbl_users WHERE userID = ".$_SESSION['userSession']);

$custRow = $query->fetch_assoc();
?>

        <?php include "allcss.php"; ?>

            <body>

                <div id="wrapper" class="wrapper clearfix">

                    <?php include "header.php"; ?>

                    
                        <section id="page-title" class="page-title">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <h1>Order Details </h1>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <ol class="breadcrumb text-right">
                                            <li>
                                                <a href="index.php">Home</a>
                                            </li>
                                            <li class="active">Order Details</li>
                                        </ol>
                                    </div>                 
                                </div>                 
                            </div>            
                        </section>
                       

                        <section id="shopcart" class="shop shop-cart">
                            <div class="container">
                                <div class="row"> 








                                         <div id="center_column" class="center_column col-xs-12 col-sm-12">
                           
                          <!--  <ul class="step clearfix" id="order_step">
                                <li class="step_todo first"> <span><em>01.</em> Summary</span></li>
                                <li class="step_todo second"> <span><em>02.</em> Sign in</span></li>
                                <li class="step_current third"> <span><em>03.</em> Shipping & Payment </span></li>
                            
                                <li id="step_end" class="step_todo last"> <span><em>04.</em> Order Summary</span></li>
                            </ul> -->

                            <h1 id="cart_title" class="page-heading"><b>Your Details</b></h1>

                            <table class="table table-bordered  table-striped">

                                <tbody>
                                    <thead>
                                        <tr>
                                            <th style="background-color: black;color:white">Product Code</th>

                                            <th style="background-color: black;color:white">Product Name</th> 
                                             <th style="background-color: black;color:white">HSN Code</th>
                                            <th style="background-color: black;color:white">Quantity</th>
                                            <th style="background-color: black;color:white">Unit Price</th>
                                            <th style="background-color: black;color:white">Total</th>
                                        </tr>
                                    </thead>

                                    <?php
$con = mysqli_connect("localhost","root","","sadhaye5_motor");

$result = mysqli_query($con,"SELECT * FROM o ORDER BY id DESC LIMIT 1");

while($row = mysqli_fetch_array($result))

{
$billno = $row['billno']+1;
}
?>

                                        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){

        ?>

                                            <tr>

                                                <input type="hidden" name="billno[]" value="<?php echo $itemcode = $billno; ?>">

                                                <input type="hidden" name="useremailid[]" value="<?php echo $itemcode = $custRow['userEmail']; ?>">

                                                <input type="hidden" name="datee[]" value="<?php echo  $itemcode = date(" Y-m-d h:i ");?>">

                                                <?php  $charge =  $_SESSION["shipping_charges"]; ?>



                                                    <input type="hidden" name="shippingcharge[]" value="<?php echo $itemcode = $charge; ?>">
                                                    

                                                    <?php if($cart->total_items() > 0){ ?>
                                                        <strong> <?php echo  '  <input type="hidden" name="finalamount[]" value="'.$finalpayment = $cart->total() + $charge.'">  '  ; ?></strong>
                                                        <?php } ?>

                                                            <td>
                 <input type="hidden" name="productcode[]" value="<?php echo $itemcode = $item["productcode"]; ?>">

                                                                <?php echo $itemcode = $item["productcode"]; ?>
                                                               
                                                            </td>
                                                            <td>

                                                                <input type="hidden" name="name[]" value="<?php echo $itemcode = $item["name"]; ?>">
                                                                <?php echo $itemname = $item["name"]; ?>
                                                            </td> 
                                                            
                                                            
                                                              <td>

                                                            
                                                                <?php echo $itemname = $item["hsncode"]; ?>
                                                            </td>
                                                            
                                                            <td>

                                                                <input type="hidden" name="qty[]" value="<?php echo $itemcode = $item["qty"]; ?>">
                                                                <?php echo $item["qty"]; ?>
                                                                    <br>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="price[]" value="<?php echo $itemcode = $item["price"]; ?>">
                                                                <?php echo '₹'.$item["price"]; ?>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="subtotal[]" value="<?php echo $itemcode = $item["subtotal"]; ?>">
                                                                <?php echo '₹'.$item["subtotal"]; ?>
                                                            </td>
                                            </tr>

                                            <?php
           $useremailid= $custRow['userEmail'];
           $datee=date("Y-m-d h:i");
           $productcode= $item['productcode'];
           $name=$item['name'];
           $qty=$item['qty'];
           $price=$item['price'];
           $subtotal=$item['subtotal'];
           $finalamount=$finalpayment;
           $shippingcharge = $charge;
$billno=$billno;
            $total = $subtotal+$shippingcharge;
            $save=mysqli_query($con,"INSERT INTO o (productcode,name,qty,price,useremailid,datee,shippingcharge,subtotal,total,finalamount,billno) VALUES ('$productcode','$name','$qty','$price','$useremailid','$datee','$shippingcharge','$subtotal','$total','$finalamount','$billno')");

                                         } }else{ ?>

                                                <p class="alert alert-warning">Your shopping cart is empty.</p>

                                                <?php } ?>

                                                    <tr>
                                                        <th></th>
                                                        <th></th>  <th></th>
                                                        <th></th>
                                                        <th style="background-color: #a9030f;color:white;text-align:center">SHIPPING CHARGES</th>
                                                        <th style="background-color: #a9030f;color:white">

                                                            <?php echo '₹'.$charge =  $_SESSION["shipping_charges"]; ?>

                                                        </th>

                                                    </tr>

                                                    <tr>
                                                        <th style="background-color: black;color:white"></th>
                                                         <th style="background-color: black;color:white"></th> <th style="background-color: black;color:white"></th>
                                                        <th style="background-color: black;color:white"></th>
                                                        <th style="background-color: black;color:white;text-align:center">TOTAL</th>
                                                        <th style="background-color: black;color:white">
                                                            <?php if($cart->total_items() > 0){ ?>
                                                                <strong> <?php echo  '₹'.$finalpayment = $cart->total() + $charge ; ?></strong>
                                                                <?php } ?>
                                                        </th>

                                                    </tr>

                                </tbody>
                            </table>

                        </div>









                                    <div class="col-xs-12  col-sm-12  col-md-12">
                                      




                                        <!-- SHIPPING FORM -->

                                        <div class="col-xs-12  col-sm-12  col-md-9 mb-30-xs mb-30-sm">
                                            <div class="cart-shiping">
                                                <h6>Your Details :</h6>
                                                <div class="row"> 









                                                   <form name="registration" id="registration-form" >
 


<?php
$datee = date("l jS \of F Y h:i:s A");
 
 
?>

<textarea style="display:none" name="product_name" rows="2" cols="50"><?php echo $name; ?></textarea>
<input type="hidden" value="<?php echo $productcode; ?>" name="productcode">
<input type="hidden" value="<?php echo $finalpayment; ?>" name="product_price">   
<input type="hidden" value="<?php echo $billno; ?>" name="billno">    
<input type="hidden" value="<?php echo $datee; ?>" name="created">     
                   

                            <?php 

                            error_reporting(0);

session_start();

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$con = mysqli_connect("localhost","root","","sadhaye5_motor") or die ('Unable to connect');
if(isset($_SESSION['userSession'])) 
{ echo ' 
<input type="hidden" name="userID" value="'.$row['userID'].'" >  
'; } ?>
                              


                                                        <div class="form_content clearfix">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>First Name</label>
                                                                    <input class="form-control" placeholder="Enter your username" name="name" required="" type="text" value="<?php echo $custRow['userName']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6 ">
                                                                <div class="form-group">
                                                                    <label>Last Name</label>
                                                                    <input class="form-control" placeholder="Enter your username" name="lastname" required="" value="<?php echo $custRow['lastname']; ?>" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input class="form-control" placeholder="Enter your email address" name="email" required="" type="email" value="  <?php echo $custRow['userEmail']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Mobile </label>
                                                                    <input class="form-control" id="mobile" placeholder="Enter Your Mobile No" value="<?php echo $custRow['mobile']; ?> " name="phone" required="" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Street Address </label>
                                                                    <input class="form-control" id="address" name="address" placeholder="House Number and Street Name" value=" <?php echo $custRow['address']; ?> " required="" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Country </label>
                                                                    <input class="form-control" id="country" placeholder="Enter Your Country" value=" India " name="country" required="" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4">

                                                                <label>State </label>
                                                                <select name="state" class="form-control" required=""> 
                                                                    <option value="<?php echo $custRow['state']; ?>"><?php echo $custRow['state']; ?></option>
                                                                    <option value="">Select a state&hellip;</option>
                                                                    <option value="AP">Andhra Pradesh</option>
                                                                    <option value="AR">Arunachal Pradesh</option>
                                                                    <option value="AS">Assam</option>
                                                                    <option value="BR">Bihar</option>
                                                                    <option value="CT">Chhattisgarh</option>
                                                                    <option value="GA">Goa</option>
                                                                    <option value="GJ">Gujarat</option>
                                                                    <option value="HR">Haryana</option>
                                                                    <option value="HP">Himachal Pradesh</option>
                                                                    <option value="JK">Jammu and Kashmir</option>
                                                                    <option value="JH">Jharkhand</option>
                                                                    <option value="KA">Karnataka</option>
                                                                    <option value="KL">Kerala</option>
                                                                    <option value="MP">Madhya Pradesh</option>
                                                                    <option value="MH">Maharashtra</option>
                                                                    <option value="MN">Manipur</option>
                                                                    <option value="ML">Meghalaya</option>
                                                                    <option value="MZ">Mizoram</option>
                                                                    <option value="NL">Nagaland</option>
                                                                    <option value="OR">Orissa</option>
                                                                    <option value="PB">Punjab</option>
                                                                    <option value="RJ">Rajasthan</option>
                                                                    <option value="SK">Sikkim</option>
                                                                    <option value="TN">Tamil Nadu</option>
                                                                    <option value="TS">Telangana</option>
                                                                    <option value="TR">Tripura</option>
                                                                    <option value="UK">Uttarakhand</option>
                                                                    <option value="UP">Uttar Pradesh</option>
                                                                    <option value="WB">West Bengal</option>
                                                                    <option value="AN">Andaman and Nicobar Islands</option>
                                                                    <option value="CH">Chandigarh</option>
                                                                    <option value="DN">Dadra and Nagar Haveli</option>
                                                                    <option value="DD">Daman and Diu</option>
                                                                    <option value="DL">Delhi</option>
                                                                    <option value="LD">Lakshadeep</option>
                                                                    <option value="PY">Pondicherry (Puducherry)</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Postcode / ZIP </label>
                                                                    <input class="form-control" id="pincode" placeholder="Enter Your pincode" value="<?php echo $custRow['pincode']; ?>" name="pincode" required="" type="text">
                                                                </div>
                                                            </div>




                                                               <?php if ($finalamount < 20000) {?> 

                                                                                        
                                                                                      <div class="col-md-12">
                                                                                        <div class="checkout-form-list create-acc"> 
                                                                                            <input type="radio" name="payment-mode" id="payment-mode-COD" value="1" <?php echo ($finalamount <= 2000) ? "checked='checked'" : "" ?> />
                                                                                            <label style="    font-size: 20px;" for="payment-mode-COD">Cash On Delivery </label>
                                                                                        </div>
                                                                                    </div> 


                                                                                  
                                                                                     <div class="col-md-12">
                                                                                        <div class="checkout-form-list create-acc"> 
                                                                                        <input type="radio" name="payment-mode" id="payment-mode-online" value="2" <?php echo ($finalamount > 2000) ? "checked='checked'" : "" ?>  />
                                                                                        <label style="    font-size: 20px;" for="payment-mode-online">Online Payment</label>
                                                                                    </div></div>
                                                                                    <?php }?>



                                                            <div class="col-sm-12">
                                                                
                                                                <input  class="btn-primaryy pull-right pull-none-xs submit cr-btn btn-style" id="reg-form-submit" type="button" name="save" value="Place Order" />

                                                          
                                                               
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- .cart-shiping end -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>

            
 <?php include "footer.php"; ?>
</div>
<?php include "allscript.php"; ?><script>
    $('#reg-form-submit').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        let paymentMode = Number($('input[name="payment-mode"]:checked').val()) || ((Number($('input[name="product_price"]').val()) >= 10000) ? 2 : 0);

        if (!paymentMode)   {
            return;
        }

        $('#registration-form').attr('method', 'POST');

        if (paymentMode === 1)    {
            $('#registration-form').attr('action', 'offline-pay.php');
            $('#registration-form').submit();
        } else if (paymentMode === 2) {
            $('#registration-form').attr('action', 'instamojo/pay.php');
            $('#registration-form').submit();
        }
    });
</script>