<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>


<?php include "allcss.php" ?>

<body>

<?php include "header.php" ?>


<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">View Product</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr> 						 

								<th>Id</th>
								<th>Product Name</th>
								<th>Product Code</th> 
								<th>Old Price</th> 
								<th>Price</th> 
								<th>Description</th>  
								<th>Category</th>
								<th>Main Image</th>
						<th>Stock</th>

							<th>GST %</th> 
							
							<th>Weight</th> 
							
							<th>HSN Code</th> 
							
							<th>Status</th>	
							<th>Edit</th>	
								<th>Delete</th> 
							</tr>
						</thead>
					
						<tbody>
								<?php 
								include('db.php');
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM productimages WHERE idd=".$_GET['del']);

    $SQL = mysqli_query($con,"DELETE FROM products WHERE id=".$_GET['del']);

 ?>
                <script>
                alert('Successfully Deleted ...');
                window.location.href='productsview.php';
                </script>
                <?php

}
/* code for data delete */

$result = mysqli_query($con,"SELECT * FROM products order by id desc"); 

 $tmpCount = 1;

while($row = mysqli_fetch_array($result))
{

echo '

					
							<tr>
								  ';?>
                                                    <td>
                                                        <?php echo $tmpCount++ ?>
                                                    </td>
                                                    <?php echo '
						 
<td>'.$row['name'].'</td> 


								<td>'.$row['productcode'].'</td>
							
							<td>₹'.$row['oldprice'].'</td>
								<td>₹'.$row['price'].'</td>
 <td>'.substr($row['description'],0,100)."....".'</td> 

                         

 	<td>'.$row['categoryid'].'</td>
							

								<td><img style="width:80px" src="../images/products/'.$row['img'].'"> <br>'.$row['img'].'</td>

								
 	<td>'.$row['stock'].'</td>
 								
								<td>'.$row['gst'].'%</td>
									<td>'.$row['weight'].'KG</td>
										<td>'.$row['hsncode'].'</td>


'; ?> 
   <td><span data="<?php echo $row['id'];?>" class="status_checks btn-sm <?php echo ($row['status'])? 'btn-success' : 'btn-danger'?>"><?php echo ($row['status'])? 'Active' : 'Inactive'?></span></td>
<?php echo '
    <td>
  
  <a href="productedit.php?edit_id='.$row['id'].'">
   <button style="background-color:#304ffe;color:white" type="button" class="btn btn-success waves-effect waves-light btn-xs"> <i class="fa fa-pencil"></i></button>
  </a>
</td>
<td>
  <a  class="delete" href="?del='.$row['id'].'"> 
  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button>
   </a>
       
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
		<!-- /.row small-spacing -->		
		<footer class="footer">
			<ul class="list-inline">
				<li>2019 © Megance motor.</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</footer>
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
