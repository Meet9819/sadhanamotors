<?php

session_start();

if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "sadhana")    {
    die();
}

require_once "db.php";
require_once __DIR__. DIRECTORY_SEPARATOR . "../bluedart/commons/config.php";

use BlueDart\Commons\Config\ConfigHandler;

$config = new ConfigHandler();
$self_info = $config->config["SadhanaMotorsDetails"];

$bill_no = $_GET["billno"];
$user = $_GET["user"];

if (!(isset($bill_no) && isset($user)))    {
    die();
}   else {
    $shipment = mysqli_query($con, "SELECT * FROM `bluedart` WHERE `credit_ref`=". $bill_no);
    $shipment_info = mysqli_fetch_array($shipment);

    $customer = mysqli_query($con, "SELECT `userName`, `mobile`, `address`, `pincode` FROM `tbl_users` WHERE `userEmail`=\"". $user . "\"");
    $customer_info = mysqli_fetch_array($customer);

    $orders = mysqli_query($con, "SELECT `name`, `qty`, `total` FROM `o` WHERE billno=". $bill_no);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/admin/">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
       Print Bill: Invoice#<?php echo $bill_no; ?>
    </title>
    <style>
        @font-face {
            font-family: '3Of9Barcode';
            src: url('assets/fonts/3of9/3of93Of9Barcode.eot?#iefix') format('embedded-opentype'), url('assets/fonts/3of9/3Of9Barcode.woff') format('woff'), url('assets/fonts/3of9/3Of9Barcode.ttf') format('truetype'), url('assets/fonts/3of9/3Of9Barcode.svg#3Of9Barcode') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        
        @media print {
            @page   {
                margin: 0;
            }
            
            body { 
                margin: 1.6cm;
                font-size: 11px !important;
            }
            
            #print-btn {
                display: none;
            }
        }
    </style>
</head>

<body style="font-family: Helvetica Narrow, sans-serif; font-size: 14px;">
    <div> 
    
    
    
    
    
    
    
            
            
            
            
            
            
            
            
            
          
    
    
            
            <table  width='640' cellspacing='0' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:12px;line-height:16px;color:rgb(51, 51, 51);background-color:rgb(255, 255, 255);margin:0px auto;' cellpadding='0'>
                <tbody>
                    <tr>
                        <td colspan='1' rowspan='1' valign='top' style='padding:14px 0px 10px 20px;width:100px;border-collapse:collapse;'>
                            <a rel='nofollow' shape='rect' target='_blank' href='' title='Visit sadhanamotors.com'>
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
                                                <a rel='nofollow' shape='rect' target='_blank' href='' style='text-decoration:none;color:#006699;'>     <?php echo $bill_no; ?></a>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' rowspan='1' style='width:640px;'>
                            <p style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:18px;line-height:normal;color:rgb(204, 102, 0);margin:15px 20px 0px;'>Hello     <?php
                                        echo  $customer_info["userName"]; ?> ,</p>
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
                                            
                                            
                                             <?php
                                        echo  " 
                                        
                                        <p style='margin:2px 0;'> <strong> ". $customer_info["userName"] ."
                                        <br clear='none'>  ".$customer_info["address"]."  Pin Code: " . $customer_info["pincode"]." , India </strong>.
                                                <br clear='none'> " . $customer_info["mobile"];
                                       
                                    ?> 
                                    <?php echo "
                                       <br> Invoice No - ".$bill_no; ?>
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
                                                        <th style='text-align:right'>Sub Total </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                include '../db.php';
                $result = mysqli_query($con, "SELECT * FROM o where billno = '$bill_no'"); 
                while ($row = mysqli_fetch_array($result)) {   
                    
                   
                   $chargeamount = $row['shippingcharge'];
                   $finalamountt = $row['finalamount'];
                    
                 
                                                           echo " <tr>
                                                                <td>
                                                                    <a target=\"_blank\" href=\"http://sadhanamotors.com/detailpage2.php?q=\"" . $row['productcode'] . "\"\">" . $row['productcode'] . "</a>
                                                                </td>
                                                                <td>
                                                                    <a target=\"_blank\" href=\"http://sadhanamotors.com/detailpage2.php?q=\"" . $row['productcode'] . "\"\">" . $row['name'] . "</a>
                                                                </td>
                                                                <td>" . $row['qty'] . "</td>
                                                                <td>" . $row['price'] . "</td>
                                                                <td style='text-align:right'>" . $row['subtotal'] . "</td>
                                                            </tr>";
                } ?> 
              </tbody>
                                            </table>
                                        </td>
                                    </tr> 
                                    
                                    
                                    
                        <?php echo "
 
 
                                    <tr>
                                        <td colspan='2' rowspan='1' style='border-top:1px solid rgb(234, 234, 234);padding:0pt 0pt 16px;width:560px;'>&nbsp;</td>
                                    </tr>
                                   
                                    <tr>
                                        <td align='right' colspan='2' rowspan='1' valign='top' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:12px;line-height:18px;padding:0px 10px 0px 0px;color:rgb(51, 51, 51);width:480px;'>Shipping &amp; Handling:</td>
                                        <td align='right' colspan='1' rowspan='1' valign='top' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:12px;line-height:18px;color:rgb(51, 51, 51);width:85px;'>₹ $chargeamount</td>
                                    </tr>
                                    <tr>
                                        <td align='right' colspan='2' rowspan='1' valign='top' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:14px;line-height:normal;padding:10px 10px 10px 0px;color:rgb(51, 51, 51);width:480px;'>Total Amount:</td>
                                        <td align='right' colspan='1' rowspan='1' valign='top' style='font-style:normal;font-weight:normal;font-stretch:normal;font-size:14px;line-height:normal;padding:10px 0px 5px;color:rgb(51, 51, 51);width:85px;'> <strong> ₹ $finalamountt</strong>
                                        </td>
                                    </tr>
                                </tbody> "; ?> 
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
                                <strong>Sadhanamotors.com</strong>
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
            
            
    </div>
    <div style="margin: 3rem;display: flex;align-items: center;justify-content: center;">
        <button id="print-btn" style="font-size: 2rem;" onclick="window.print();">Print Bill</button>
    </div>
</body>

</html>