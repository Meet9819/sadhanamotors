<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); 
}
?>

<?php include "allcss.php" ?>

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

<body>
<?php include "header.php" ?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Bill Details  
						
					</h4>
				

			
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Invoice No </th>
								<th>Product Code</th>	<th>Product Name</th>
									<th >Qty Ordered</th>
										<th>Price</th>	<th>Sub Total </th>
											
									<th>Total Amount Paid</th> 
								<th>User Email Id</th>
								
							

							
							<th>Created At</th> 
						
					
						<th>Action</th> 
							</tr>
						</thead>
					
						<tbody>
								






				<?php 
include('db.php');

   $o = $_GET['edit_id']; 
 $result = mysqli_query($con,"SELECT * FROM payment where id = '$o'"); 
 
while($row = mysqli_fetch_array($result))
{
	 $bil = $row['billno'];
}
							
$result = mysqli_query($con,"SELECT * FROM o where billno = '$bil'"); 


while($row = mysqli_fetch_array($result))
{

echo '			<tr>
								  
						 	<td>'.$row['billno'].'</td>

								<td>'.$row['productcode'].'</td>
								<td>'.$row['name'].'</td>
								<td>'.$row['qty'].'</td>
								
	<td>'.$row['price'].'</td>
									<td>'.$row['subtotal'].'</td> <td>'.$row['finalamount'].'</td>
								
 	<td>'.$row['shippingcharge'].'</td>
			<td>'.$row['useremailid'].'</td>
											<td>'.$row['datee'].'</td>			

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

     <!-- ACTIVE AND INACTIVE KA CODE -->  

<?php include "allscripts.php"; ?>
