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
		
		



			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">View Offers of Home Page</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
							
								<th>Image</th>
									<th>Link</th>
									<th>Title</th>
								
								<th>Action</th>
							
							</tr>
						</thead>
					
     <tbody>


  <?php include('db.php');



?> 
    <?php


$result = mysqli_query($con,"SELECT * FROM offers"); 
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

            <td>'.$row['link'].'</td>

                       <td><img width="200px" src="../images/advertise/'.$row['img'].'" /></td>
                         <td>'.$row['title'].'</td>

  <td>  <a href="offersedit.php?edit_id='.$row['id'].'">
   <button type="button" class="btn btn-primary waves-effect waves-light btn-xs"> <i class="fa fa-pencil"></i></button>
  </a>
</td>
     

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
	
	

<!-- ACTIVE AND INACTIVE KA CODE -->

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).on('click','.status_checks',function(){
var status = ($(this).hasClass("btn-success")) ? '0' : '1';
var msg = (status=='0')? 'Deactivate' : 'Activate';
if(confirm("Are you sure to "+ msg)){
  var current_element = $(this);
  url = "userajax.php";
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
