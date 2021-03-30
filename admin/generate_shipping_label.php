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
        Shipping Label: Invoice#<?php echo $bill_no; ?>
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

<body style="font-family: Helvetica Narrow, sans-serif; font-size: 20px;">
    <div>
        <table style="table-layout: fixed; border: 2px solid black; padding: 1rem;">
            <tr>
                <td>
                    <table style="table-layout: fixed; border-collapse: collapse; width: 100%;">
                        <tbody>
                            <tr>
                                <th style="width: 10%; border: 1px solid black; padding: 5px 10px;">Origin</th>
                                <td style="width: 15%; border: 1px solid black; padding: 5px 10px; font-weight: bold;">
                                    <?php echo '' .$self_info["AreaCode"] . ' / ' . $self_info["AreaLoc"]; ?>
                                </td>
                                <td rowspan="2"
                                    style="width: 20%; border: 1px solid black; padding: 5px 10px; text-align: center;">
                                    <b style="font-size: 1.5rem;">Dart Plus Prepaid</b>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 10%; border: 1px solid black; padding: 5px 10px;">Destination</th>
                                <td style="width: 15%; border: 1px solid black; padding: 5px 10px; font-weight: bold;">
                                    <?php echo $shipment_info["dest_area"] . ' / ' . $shipment_info["dest_loc"] ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
             <!--shipping & return address details -->
            <tr>
                <td>
                    <table style="table-layout: fixed; border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 50%; border: 1px solid black; padding: 5px 10px;">SHIP TO:-
                                </th>
                                <th style="width: 50%; border: 1px solid black; padding: 5px 10px;">FROM/RETURN :-
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 50%; border: 1px solid black; padding: 2px 10px;">
                                    <b><u>DELIVER TO</u>:</b><br />
                                    <?php
                                        echo $customer_info["userName"];
                                        echo ",<br />";
                                        echo $customer_info["address"];
                                        echo "<br />";
                                        echo "<br /> Pin Code: " . $customer_info["pincode"];
                                        echo "<br /><br />";
                                        echo "Contact No: " . $customer_info["mobile"];
                                    ?>
                                </td>
                                <td style="width: 50%; border: 1px solid black; padding: 2px 10px;">
                                    <b><u>IF UNDELIVERED PLEASE RETURN TO</u>:</b><br />
                                <?php
                                    echo $self_info["CustomerName"];
                                    echo ",<br />";
                                    echo $self_info["CustomerAddress1"];
                                    echo "<br />";
                                    echo $self_info["CustomerAddress2"];
                                    echo "<br />";
                                    echo $self_info["CustomerAddress3"];
                                    echo "<br /> Pin Code: " . $self_info["CustomerPincode"];
                                    echo "<br /><br />";
                                    echo "Contact No: " . $self_info["MobileTelNo"]
                                ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
             <!--shipper details -->
            <tr>
                <td>
                    <table style="table-layout: fixed; margin-top: 5px; border-collapse: collapse; width: 100%; font-size: 0.9rem;">
                        <tbody>
                            <tr>
                                <th style="width: 30%; border: 1px solid black; padding: 5px 10px;">Order Date</th>
                                <td style="width: 40%; border: 1px solid black; padding: 5px 10px;">
                                    <?php 
                                        $odt = new \DateTime($shipment_info["created_time"]);
                                        echo $odt->format("M-d-Y");
                                    ?>
                                </td>
                                <th style="width: 30%; border: 1px solid black; padding: 5px 10px;">Reference No.</th>
                                <td style="width: 40%; border: 1px solid black; padding: 5px 10px;">
                                    <?php echo $bill_no; ?>
                                </td>
                            </tr>
                            <tr>
                                <?php $pdt = new \DateTime($shipment_info["pickup_datetime"]) ?>
                                <th style="width: 30%; border: 1px solid black; padding: 5px 10px;">Pickup Date</th>
                                <td style="width: 40%; border: 1px solid black; padding: 5px 10px;">
                                    <?php echo $pdt->format("M-d-Y"); ?>
                                </td>
                                <th style="width: 30%; border: 1px solid black; padding: 5px 10px;">Pickup Time</th>
                                <td style="width: 40%; border: 1px solid black; padding: 5px 10px;">
                                    <?php echo $pdt->format("Hi"); ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%; border: 1px solid black; padding: 5px 10px;">GST No.</th>
                                <td style="width: 40%; border: 1px solid black; padding: 5px 10px;">
                                    <?php
                                        echo $self_info["CustomerGSTNumber"];
                                    ?>
                                </td>
                                <th style="width: 30%; border: 1px solid black; padding: 5px 10px;">PAN No.</th>
                                <td style="width: 40%; border: 1px solid black; padding: 5px 10px;">
                                    <?php
                                        echo $self_info["CustomerPAN"];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%; border: 1px solid black; padding: 5px 10px;">Pack Type</th>
                                <td style="width: 40%; border: 1px solid black; padding: 5px 10px;">L</td>
                                <th style="width: 30%; border: 1px solid black; padding: 5px 10px;">Package #
                                </th>
                                <td style="width: 40%; border: 1px solid black; padding: 5px 10px;">1</td>
                            </tr>
                            <tr>
                                <th style="width: 30%; border: 1px solid black; padding: 5px 10px;">
                                    Dimension (cm)</th>
                                <td style="width: 40%; border: 1px solid black; padding: 5px 10px;;">0.01 x 0.01 x 0.01</td>
                                <th style="width: 30%; border: 1px solid black; padding: 5px 10px;">Weight (kg)</th>
                                <td style="width: 40%; border: 1px solid black; padding: 5px 10px;">0.01</td>
                            </tr>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
             <!--AWB barcode -->
            <tr>
                <td>
                    <table style="table-layout: fixed; border-collapse: collapse; width: 100%; font-size: 2rem;">
                        <tbody>
                            <tr>
                                <td style="border: 1px solid black; padding: 10px 10px; text-align: center;">
                                    <span style="font-family: '3Of9Barcode'; font-size: 2.5rem"><?php echo '*' . $shipment_info["awb_no"] . '*'; ?></span>
                                    <br />
                                    <span>
                                        <?php echo $shipment_info["awb_no"]; ?>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
             <!--order details -->
            <tr>
                <td>
                    <table style="table-layout: fixed; border-collapse: collapse; width: 100%; text-align: center;">
                        <thead>
                            <tr>
                                <th colspan="3" style="width: 25%; border: 1px solid black; padding: 5px 10px; text-align: left; font-size: 1
                                    2rem;">
                                    PRODUCT DETAILS
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 30%; border: 1px solid black; padding: 5px 10px;">Description
                                </th>
                                <th style="width: 5%; border: 1px solid black; padding: 5px 10px;">Quantity</th>
                                <th style="width: 10%; border: 1px solid black; padding: 5px 10px;">Amount (₹)
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $total_order_amount = 0;
                                
                                while($order = mysqli_fetch_array($orders)) {
                                    if (empty($order))  {
                                        continue;
                                    } else {
                                        echo "<tr>";
                                        echo "<td style=\"width: 30%; border: 1px solid black; padding: 5px 10px;\">".$order["name"] ."</td>";
                                        echo "<td style=\"width: 5%; border: 1px solid black; padding: 5px 10px;\">" . $order["qty"] . "</td>";
                                        echo "<td style=\"width: 10%; border: 1px solid black; padding: 5px 10px;\">" . $order["total"] . "</td>";
                                        echo "</tr>";
                                        $total_order_amount += isset($order["total"]) ? $order["total"] : 0;
                                    }
                                }
                            ?>
                            <tr>
                                <td colspan="2" style="width: 10%; border: 1px solid black; padding: 5px 10px;">
                                    <b>Total Amount (₹)</b>
                                </td>
                                <td style="width: 10%; border: 1px solid black; padding: 5px 10px;">
                                    <?php echo $total_order_amount ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div style="margin: 3rem;display: flex;align-items: center;justify-content: center;">
        <button id="print-btn" style="font-size: 2rem;" onclick="window.print();">Print Label</button>
    </div>
</body>

</html>