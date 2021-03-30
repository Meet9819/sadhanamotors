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
                $("a.btn").click(function(e) {
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
		
	


			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">View User</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
							
									<th>User Name</th>
										<th>Last Name</th>
									<th>Email Id</th>


									<th>Password</th>
									<th>Status</th>
									<th>Contact</th>
									<th>Address</th>

								
									<th>State</th>
									<th>Pincode</th>
							<TH>Delete</TH>
							
							</tr>
						</thead>
					
     <tbody>

  <?php include('db.php');
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM tbl_users WHERE userID=".$_GET['del']);

 ?>
                                        <script>
                                            alert('Successfully Deleted ...');
                                            window.location.href = 'registeruser.php';
                                        </script>
                                        <?php

}
/* code for data delete */


?> 
    <?php


$result = mysqli_query($con,"SELECT * FROM tbl_users order by userID desc"); 
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

            <td>'.$row['userName'].'</td>
 <td>'.$row['lastname'].'</td>
              <td>'.$row['userEmail'].'</td>
                <td>'.$row['userPass'].'</td>
                  <td>'.$row['userStatus'].'</td>
                    <td>'.$row['mobile'].'</td>
                      <td>'.$row['address'].'</td> 
 <td>'.$row['state'].'</td>
                       <td>'.$row['pincode'].'</td>
                       

      <td> 

								 <a class="btn btn-danger btn-xs waves-effect waves-light" href="?del='.$row['userID'].'"> <i class="fa fa-trash-o"></i></a></td>


     

							</tr>


';
}
?> 


      



					</table>
				</div>
				<!-- /.box-content -->
			</div>


	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	

<?php include "allscripts.php"; ?>
