<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); 
}
?>

<?php include "allcss.php" ?>

 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
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
            
            function checkUncheckAllManifest()    {
                var a = document.getElementsByName("add-to-manifest");
                for (var i = 0; i < a.length; i++) {
                    a[i].checked ? a[i].checked = false : a[i].checked = true;
                }
            }
            
            function generateShippingManifest() {
                var url = "http://localhost:8080/sadhana/11/admin/generate_shipping_manifest.php?";
                var a = document.getElementsByName("add-to-manifest");
                for (var i = 0; i < a.length; i++) {
                    if (a[i].checked)   {
                        url += "billno[]=" + a[i].value + "&";
                    }
                }
                
                url = url.substr(0, url.length - 1);
                
                window.open(url);
            }
</script>

<body>
<?php include "header.php" ?>
<div id="wrapper">
	<div class="main-content">  
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content" >
					<h4 class="box-title">Orders</h4>
				
				
				
					<!-- /.dropdown js__dropdown -->
					<div style="margin: 5px;" >
					    <a type="button" class="btn btn-dark btn-sm waves-effect waves-light" onclick="generateShippingManifest()">Generate Shipping Manifest</a>
					</div> 
					
					<div class="col-xs-12" style="    overflow-x: auto;">
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
							    <th title="Select All">
							        <button class="btn btn-dark btn-sm waves-effect waves-light" onclick="checkUncheckAllManifest()" title="Add All to Manifest">
							            <span class="fas fa-plus"></span>
							        </button>
							    </th>
								<th>Invoice No </th> 
								<th>Print Bill</th>
								<th>Product Details</th>
								<th>Paid Amount</th> 
								<th>User Email Id</th>
								<th>Transaction Id</th>	<th>Bluedart Delivery</th>
								<th>Created At</th>
								<th>Label</th>
							</tr>
						</thead>
						<tbody>
								<?php 
								include('db.php');
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM payment WHERE id=".$_GET['del']);

 ?>
                <script>
                alert('Successfully Deleted ...');
                window.location.href='order.php';
                </script>
                <?php

}
/* code for data delete */
 
$result = mysqli_query($con,"SELECT p.id,p.billno,p.name,p.email,p.phone,p.product_price,p.product_name,p.paymentid,p.address,p.productcode,p.created,otable.bluedart_order FROM payment p, o otable WHERE p.billno = otable.billno"); 




 $tmpCount = 1;

while($row = mysqli_fetch_array($result))
{

echo '

					
							<tr>
    							<td>
    							     <input title="Add to manifest" type="checkbox" name="add-to-manifest" value="' . $row["billno"] . '"><br>
    							</td>  
    						 	<td>'.$row['billno'].'</td> 	
    						 	<td>
    						 	    <a type="button" class="btn btn-dark btn-sm waves-effect waves-light" href="billprint.php?billno='. $row['billno'] .'&user=' . $row['email'] . '" target="_blank">Print Bill</a>
    						 	</td>
    						 	<td><a href="orderdetails.php?edit_id='.$row['id'].'">Bill Details</a></td>
    						 	<td>'.$row['product_price'].'</td>
    						 	<td>'.$row['email'].'</td>
    						 	<td>'.$row['paymentid'].'</td> 
    						 	
    						 		<td>	 ';?> <?php	$bluedart_order = $row['bluedart_order'];

if ($bluedart_order == 1) { 
    echo '			 <i  class="status_checks btn-sm btn-success">Delivery</i>';
} 

else{ 
        echo ' <i  class="status_checks btn-sm btn-danger">No Delivery</i>';
} ?> <?php echo '</td>
    						 		
    						 	<td>'.$row['created'].'</td>
    						 	<td>
    						 	    <a type="button" class="btn btn-dark btn-sm waves-effect waves-light" href="generate_shipping_label.php?billno='. $row['billno'] .'&user=' . $row['email'] . '" target="_blank">View Label</a>
    						 	</td>
						 	</tr>

						


							'; } ?>

						</tbody>
					</table> 
					
					
					
					
					
					
					
				</div>
				<!-- /.box-content -->
			</div>
		
			<!-- /.col-xs-12 -->
		</div>
	
	</div>
	<!-- /.main-content -->
</div>
<!-- ACTIVE AND INACTIVE KA CODE -->

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).on('click','.status_checks',function(){
var status = ($(this).hasClass("btn-success")) ? '0' : '1';
var msg = (status=='0')? 'Deactivate' : 'Activate';
if(confirm("Are you sure to "+ msg)){
  var current_element = $(this);
  url = "productajax.php";
  $.ajax({
  type:"POST",
  url: url,
  data: {id:$(current_element).attr('data'),status:status},
  success: function(data)
    {   
      location.reload();
    }
  });
  }      
});
</script>
<script>
    function generatePDF(billno)  {
        let url = window.location.href;
        urlBase = url.substring(0, url.lastIndexOf('/')+1);
        url = urlBase + "generate_pdf.php?billno=" + billno;
        $.get(url);
    }
</script>

     <!-- ACTIVE AND INACTIVE KA CODE -->  

<?php include "allscripts.php"; ?>
