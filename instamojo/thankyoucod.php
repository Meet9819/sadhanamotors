<link href="../assets/images/favicon/favicon.ico" rel="icon">
<link href="../assets/css/external.css" rel="stylesheet">
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/style.css" rel="stylesheet">
<link href="../assets/css/custom.css" rel="stylesheet">

<body>
   <div id="wrapper" class="wrapper clearfix">
      <?php include "header.php";  ?>
     


        
    <section id="page-title" class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-9">
                    <h1>Thank You..!</h1>
                </div>
                <!-- .col-md-6 end -->
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="../index.php">Home</a>
                        </li>
                        <li class="active">Payment</li>
                    </ol>
                </div>
            
            </div>
        
        </div>
    
    </section>


      <div style="width:100%;text-align:center" class="container">
         <?php 
         error_reporting(0);

            require_once '../class.userr.php';
            $reg_user = new USERR();
            $var = $_GET["payment_request_id"]; 
            $billno = $_GET["payment_id"];                   
            $emailidofbuyer = $_GET["emailidofbuyer"]; 
        
            ?> 

              <?php
            include('../db.php');           
            $result = mysqli_query($con," SELECT * FROM `tbl_users` where userEmail = '$emailidofbuyer'");
            while($row = mysqli_fetch_array($result))
            {
                $name = $row['userName']; $mobile = $row['mobile'];
                $statee = $row['state']; $city = $row['city'];
                $addr = trim($row['address']);
                $pincode = trim($row['pincode']);
           
          } ?>   




              <?php  
            $message = " 
          
         
            
            
            
            <table width='640' cellspacing='0' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:12px;line-height:16px;color:rgb(51, 51, 51);background-color:rgb(255, 255, 255);margin:0px auto;' cellpadding='0'>
                <tbody>
                    <tr>
                        <td colspan='1' rowspan='1' valign='top' style='padding:14px 0px 10px 20px;width:100px;border-collapse:collapse;'>
                            <a rel='nofollow' shape='rect' target='_blank' href='' title='Visit Sadhanmotors.uk'>
                                <img width='181px' id='' alt='Sadhanmotors' border='0' src='http://sadhanamotors.com/assets/images/logo/logo.png''>
                            </a>
                        </td>
                        <td colspan='1' rowspan='1' style='text-align:right;padding:0px 20px;'>
                            <table cellspacing='0' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:12px;line-height:16px;color:rgb(51, 51, 51);margin:0px auto;border-collapse:collapse;' cellpadding='0'>
                                <tbody>
                                 
                                    <tr>
                                        <td colspan='1' rowspan='1' style='text-align:right;padding:7px 0px 0px 20px;width:490px;'>
                                            <span style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:20px;line-height:normal;'>Shipping Confirmation</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='1' rowspan='1' style='text-align:right;padding:0px 0px 5px 20px;width:490px;'>
                                            <span style='font-size:12px;'> Order #
                                                <a rel='nofollow' shape='rect' target='_blank' href='' style='text-decoration:none;color:#006699;'></a>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' rowspan='1' style='width:640px;'>
                            <p style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:18px;line-height:normal;color:rgb(204, 102, 0);margin:15px 20px 0px;'>Hello    ${userName} ,</p>
                            <p style='margin:4px 20px 18px 20px;width:640px;'>We thought you'd like to know that we've dispatched your item(s). Your order is on the way. If you need to return an item from this shipment or manage other orders, please visit
                                <a rel='nofollow' shape='rect' target='_blank' href='' style='color:#006699;text-decoration:none;'>My Orders</a> on https://sadhanamotors.com/history.php</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' rowspan='1' style='padding:0 20px;width:640px;'>
                            <table cellspacing='0' style='border-top:3px solid #2d3741;width:640px;' cellpadding='0'>
                                <tbody>
                                    <tr>
                                        <td colspan='1' rowspan='1' valign='top' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:14px;line-height:normal;padding:11px 0px 14px 18px;width:280px;background-color:rgb(239, 239, 239);'>
                                            <span style='color:#666;'></span>
                                            <br clear='none'>
                                            <p style='margin:2px 0 9px 0;'>
                                                <strong style='color:#009900;'></strong>
                                            </p>
                                            <br clear='none'>
                                        </td>
                                        <td colspan='1' rowspan='1' valign='top' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:14px;line-height:normal;padding:11px 18px 14px;width:280px;background-color:rgb(239, 239, 239);'>
                                            <span style='color:#666;'>Your package was sent to:</span>
                                            <br clear='none'>
                                            <p style='margin:2px 0;'> <strong>   ${name}<br clear='none'>   ${addr} , India </strong>.
                                                <br clear='none'> ${mobile}  <br clear='none'>${emailidofbuyer} <br clear='none'> Invoice No - ${billno}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2' rowspan='1' style='font-size:10px;color:#666;padding:0 10px 20px 10px;line-height:16px;width:640px;'>
                                            <p style='margin:10px 0px 0px;font-style:normal;font-weight:normal;font-stretch:normal;font-size:11px;line-height:16px;color:rgb(51, 51, 51);'>Your package is being shipped by Sadhana Motors Transportation Services and the tracking number is 221138500648. Please note that a signature may be required for the delivery of the package.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' rowspan='1' style='width:640px;'>
                            <p style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:18px;line-height:normal;color:rgb(204, 102, 0);border-bottom:1px solid rgb(204, 204, 204);margin:0px 20px 3px;padding:0px 0px 3px;'>Shipment Details</p>
                        </td>
                    </tr>

          
                    
                    <tr>
                        <td colspan='3' rowspan='1' id='yiv1669056380ydpdefbf859yiv5642539659shipmentDetails' style='padding:16px 40px;width:640px;'>
                            <table width='100%' cellspacing='0' cellpadding='0'>
                                <tbody>
                                    <tr>
                                        <td align='center' colspan='3' rowspan='1' valign='top' style='width:640px;min-height:115px;'>
                                            <table id='example' class='table table-striped table-bordered display' style='width:640px'>
                                                <thead>
                                                    <tr>
                                                        <th style='text-align:left'>Product Code</th>
                                                        <th style='text-align:left'>Product Name</th>
                                                        <th style='text-align:left'>Qty Ordered</th>
                                                        <th style='text-align:left'>Price</th>
                                                        <th style='text-align:left'>Sub Total </th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                include 'db.php';
                $result = mysqli_query($con, "SELECT * FROM o where billno = '$billno'"); 
                while ($row = mysqli_fetch_array($result)) {   
                    
                   
                   $chargeamount = $row['shippingcharge'];
                   $finalamountt = $row['finalamount'];
                    
                    $message .= "
                                                            <tr>
                                                                <td>
                                                                    <a target=\"_blank\" href=\"http://sadhanamotors.com/detailpage2.php?q=\"" . $row['productcode'] . "\"\">" . $row['productcode'] . "</a>
                                                                </td>
                                                                <td>
                                                                    <a target=\"_blank\" href=\"http://sadhanamotors.com/detailpage2.php?q=\"" . $row['productcode'] . "\"\">" . $row['name'] . "</a>
                                                                </td>
                                                                <td>" . $row['qty'] . "</td>
                                                                <td>" . $row['price'] . "</td>
                                                                <td>" . $row['subtotal'] . "</td>
                                                            </tr>";
                }
                $message .= "</tbody>
                                            </table>
                                        </td>
                                    </tr> 
                                    
                                    
                        
 
 
                                    <tr>
                                        <td colspan='2' rowspan='1' style='border-top:1px solid rgb(234, 234, 234);padding:0pt 0pt 16px;width:560px;'>&nbsp;</td>
                                    </tr>
                                   
                                    <tr>
                                        <td align='right' colspan='2' rowspan='1' valign='top' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:12px;line-height:18px;padding:0px 10px 0px 0px;color:rgb(51, 51, 51);width:480px;'>Shipping &amp; Handling:</td>
                                        <td align='right' colspan='1' rowspan='1' valign='top' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:12px;line-height:18px;color:rgb(51, 51, 51);width:85px;'>₹{$chargeamount}</td>
                                    </tr>
                                    <tr>
                                        <td align='right' colspan='2' rowspan='1' valign='top' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:14px;line-height:normal;padding:10px 10px 10px 0px;color:rgb(51, 51, 51);width:480px;'>Total Amount:</td>
                                        <td align='right' colspan='1' rowspan='1' valign='top' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:14px;line-height:normal;padding:10px 0px 5px;color:rgb(51, 51, 51);width:85px;'> <strong> ₹{$finalamountt}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' rowspan='1' style='padding:0 20px;line-height:22px;width:640px;'>
                            <p style='border-top:1px solid #ccc;padding:20px 0 0 0;'>Track your order with the <a rel='nofollow' shape='rect' target='_blank' href='' style='color:#006699;text-decoration:none;'>Sadhana Motors</a>.
                                <br clear='none'>If you need further assistance with your order, please visit
                                <a rel='nofollow' shape='rect' target='_blank' href='' style='color:#006699;text-decoration:none;'>Customer Service</a>.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' rowspan='1' style='padding:0 20px 0 20px;line-height:22px;width:640px;'>
                            <p style='margin:10px 0;padding:0 0 20px 0;border-bottom:1px solid #eaeaea;'>We hope to see you again soon!
                            <br clear='none'>
                            <span style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:14px;line-height:normal;'>
                                <strong>Sadhanamotors.uk</strong>
                            </span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' rowspan='1' style='font-size:10px;color:#666;padding:0 20px 20px 20px;line-height:16px;width:640px;'>
                        <p>This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this message.</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            If you want GST Bill, kindly send request on <a href='mailto:info@sadhanamotors.com'>info@sadhanamotors.com</a> with your online invoice number.
           

            ";
            
            
                        
            $subject = "Shipping Confirmation | Sadhana Motors";
                        
            $reg_user->send_mail($emailidofbuyer,$message,$subject); 
            
            ?>

       
         <br><br>
       
      
       
         <?php
            include('../db.php');           
            $result = mysqli_query($con," SELECT * FROM `payment` where billno = '$billno'");
            while($row = mysqli_fetch_array($result))
            {
                $paymentid = $row['paymentid']; 
              
           
          } ?>   
       

         <?php //  echo "<pre>";
// print_r($response);
// echo "</pre>";
  
echo "<p style='text-align:left'>
Payment ID : $paymentid <br>
Invoice No: $billno <br>
Buyer Name: " . $name . "<br>" ;
echo "Buyer Contact No: " . $mobile . "<br>" ;
echo "State:".$statee. " </p>"
?> 



<?php
include"db.php";
$result = mysqli_query($con,"UPDATE payment SET paymentid='$var' WHERE billno='$billno'");

?>
            
     
            
        
    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead><tr> <th>Product Code</th>   <th>Product Name</th> <th >Qty Ordered</th> <th>Price</th>  <th>Sub Total </th> <th>Shipping Amount </th>  
                               <th>Total Amount Paid</th> </tr>
                        </thead>
                        <tbody>
                            <?php 
                             include('../db.php');          
$result = mysqli_query($con,"SELECT * FROM o where billno = '$billno'");
while($row = mysqli_fetch_array($result))
{
    $order_details["totalItems"] += $row['qty'];
    $order_details["totalAmount"] = $row['finalamount'];
echo ' <tr> <td>'.$row['productcode'].'</td>     <td>'.$row['name'].'</td>  <td>'.$row['qty'].'</td> <td>₹'.$row['price'].'</td>
   <td>₹'.$row['subtotal'].'</td>   <td>₹'.$row['shippingcharge'].'</td> <td>₹'.$row['finalamount'].'</td>  </tr>
 '; } ?>
        </tbody>  </table>
        
        <?php 
        include "db.php";
        //  generate waybill
        // print_r($order_details);
        $pin_serviceable = Pincode::check_pin_serviceable($order_details["pin"]);
        if ($pin_serviceable == false)   {
            $q = "UPDATE `o` SET `bluedart_order`=0 WHERE `billno`=".$billno;
        } else {
            $awb_status = Waybill::generate_waybill($order_details);
            
            if (isset($awb_status["status"]))  {
                $insert_query = "INSERT INTO `bluedart`
                                        (`user`, `awb_no`, `token_no`, `pickup_datetime`, `dest_area`, `dest_loc`, `credit_ref`, `state`) 
                                    VALUES 
                                    (\"". $userName . "\", \"". $awb_status["awbno"] ."\",\"" . $awb_status["token"] . "\",\"" . $awb_status["pickupdate"] . "\",\"" . $awb_status["destArea"] . 
                                     "\",\"" . $awb_status["destLoc"] . "\",\"" . $awb_status["creditreference"] ."\",\"" . $statee . "\")";
                $q = mysqli_query($con, $insert_query);
                
                unset($_SESSION["cart_contents"]);
            } else {
                ?> 
                <p  class="error alert alert-danger">Your Payment has Failed</p>  
                <?php
            }
        }
  

  ?>



      </div>

  <?php include "footer.php"; ?>
   </div>



