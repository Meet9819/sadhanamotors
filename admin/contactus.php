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
		






			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Feedback [ Contact Form ]</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
							
									<th>User Name</th>
									
									<th>Email Id</th>
									<th>Mobile</th>
									<th>Message</th>
								
									
							
							</tr>
						</thead>
					
     <tbody>



<?php
include "d.php"; 

$sql=$db->query("Select * from contactform");
 $tmpCount = 1;
            foreach ($sql as $key => $user) :
 ?>
<tr>
 			<td><?php echo $tmpCount++ ?> </td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['mobile']; ?></td>
            <td><?php echo $user['message']; ?></td> 

      


        </tr>
       <?php endforeach; ?>
	 </tbody>



					</table>
				</div>
				<!-- /.box-content -->
			</div>




	
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	
<?php include "allscripts.php"; ?>
