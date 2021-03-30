<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
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
					<h4 class="box-title">Sale Product</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
								<th>Product Name</th>
								<th>Product Code</th>
								<th>Category</th>
								<th>Main Image</th>
								<th>Price</th> 

						
							<th>SALE</th> 
								

							</tr>
						</thead>
					
						<tbody>
								<?php 
								include('db.php');
/* code for data delete */
if(isset($_GET['del']))
{
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
								<td>'.$row['categoryid'].'</td>
								<td>'.$row['img'].'</td>
								<td>₹'.$row['price'].'</td>
 

								
							
							

  ';?>   <td><i data="<?php echo $row['id'];?>" class="status_checks btn-sm <?php echo ($row['sale'])? 'btn-success' : 'btn-danger'?>"><?php echo ($row['sale'])? 'Sale' : 'Not in Sale'?></i></td>
<?php echo '
  

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
		
		
	</div>
	<!-- /.main-content -->
</div>
<!-- ACTIVE AND INACTIVE KA CODE -->

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).on('click','.status_checks',function(){
var status = ($(this).hasClass("btn-success")) ? '0' : '1';
var msg = (status=='0')? 'Not in Sale' : 'Sale';
if(confirm("Are you sure to "+ msg)){
	var current_element = $(this);
	url = "saleajax.php";
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
