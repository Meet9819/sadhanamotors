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
					<h4 class="box-title">Edit FAQs</h4>
					<!-- /.box-title -->
					<div class="card-content">

<?php
include "db.php";

// EDIT 
if(isset($_GET['edit']))
{
$result = mysqli_query($con,"SELECT * FROM faq WHERE id=".$_GET['edit']);
$getROW = $result->fetch_array();
}


// UPDATE
if(isset($_POST['update']))
{
$result = mysqli_query($con,"UPDATE faq SET question='".$_POST['question']."',answer='".$_POST['answer']."' WHERE id=".$_GET['edit']);



               ?>
                <script>
                alert('Successfully Updated..');
               window.location.href='faq.php';
                </script>
                <?php

}



?>

  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Question</label>
								<div class="col-sm-6">
									<input type="text" name="question" class="form-control" id="" placeholder="Enter Menu Name" value="<?php if(isset($_GET['edit'])) echo $getROW['question'];  ?>"  required="">
								</div>
							</div>

						
	
	<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Answer</label>
								<div class="col-sm-6"> 

									<textarea type="text" name="answer" class="form-control"    required="" id="" placeholder="Enter Menu Name"><?php if(isset($_GET['edit'])) echo $getROW['answer'];  ?></textarea>
								</div>
							</div>


							<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
										 <input class="btn btn-primary btn-sm waves-effect waves-light" type="submit" name="update" value="Update" />
   							
								</div>
							</div>


						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>



	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	     
<?php include "allscripts.php"; ?>
