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
		
		<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Add FAQs</h4>
					<!-- /.box-title -->
					<div class="card-content">
						
<?php
include('db.php');
 if(isset($_POST['save']))
{
  $question = $_POST['question'];
  $answer = $_POST['answer'];  
  $save=mysqli_query($con,"INSERT INTO faq (question,answer) VALUES ('$question','$answer')");
 ?>
                <script>
                alert('Successfully Inserted ...');
                window.location.href='faq.php';
                </script>
                <?php

                             
    }
?>

	  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Question</label>
								<div class="col-sm-6">
									<input type="text" name="question" class="form-control" id="" placeholder="Enter Question" required="">
								</div>
							</div>

	

							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Answer</label>
								<div class="col-sm-6"> 

									<textarea type="text" name="answer" class="form-control" id="" placeholder="Enter Answer" required=""></textarea>
								
								</div>
							</div>

	


						


							<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
										 <input class="btn btn-dark btn-sm waves-effect waves-light" type="submit" name="save" value="Submit" />

								
								</div>
							</div>


						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>





			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Menu </h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
							
									<th>Question </th>
									<th>Answer</th>
							
								<th>Action</th>
							
							</tr>
						</thead>
					

							<?php
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM faq WHERE id=".$_GET['del']);

 ?>
                <script>
                alert('Successfully Deleted ...');
                window.location.href='faq.php';
                </script>
                <?php

}
/* code for data delete */

$result = mysqli_query($con,"SELECT * FROM faq"); 
 $tmpCount = 1;
while($row = mysqli_fetch_array($result))
{

echo '

						<tbody>
							<tr>
								 ';?>
                                                    <td>
                                                        <?php echo $tmpCount++ ?>
                                                    </td>
                                                    <?php echo '
							
							
								  <td> '.$row['question'].'</td>

								 <td> '.$row['answer'].'</td>


<td>

					<a href="faqedit.php?edit='.$row['id'].'">
   <button style="background-color:#304ffe;color:white" type="button" class="btn  btn-xs"><i class="fa fa-pencil"></i></button>
  </a> 


  			 <a class="btn btn-danger btn-xs waves-effect waves-light" href="?del='.$row['id'].'"> <i class="fa fa-trash-o"></i></a></td>

							</tr>
						
						</tbody>

                                   

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
  url = "menuajax.php";
  $.ajax({
  type:"POST",
  url: url,
  data: {menu_id:$(current_element).attr('data'),status:status},
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
