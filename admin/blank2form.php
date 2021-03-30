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
		
		<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Input Types</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form class="form-horizontal">
							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Text</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="inp-type-1" placeholder="Some text value ...">
								</div>
							</div>

							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">File input</label>
								<div class="col-sm-6">
									<input type="file" id="exampleInputFile">
								<p class="help-block">Example block-level help text here.</p>
								</div>

								</div>


							<div class="form-group">
								<label for="inp-type-2" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-6">
									<input type="email" class="form-control" id="inp-type-2" placeholder="Email address">
								</div>
							</div>
							<div class="form-group">
								<label for="inp-type-3" class="col-sm-3 control-label">Password</label>
								<div class="col-sm-6">
									<input type="password" class="form-control" id="inp-type-3" placeholder="Password" value="Password">
								</div>
							</div>
							<div class="form-group">
								<label for="inp-type-4" class="col-sm-3 control-label">Placeholder</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="inp-type-4" placeholder="Placeholder">
								</div>
							</div>
							<div class="form-group">
								<label for="inp-type-5" class="col-sm-3 control-label">Textarea</label>
								<div class="col-sm-6">
									<textarea class="form-control" id="inp-type-5" placeholder="Write your meassage"></textarea>
								</div>
							</div>


							<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
									<button type="submit" class="btn btn-dark btn-sm waves-effect waves-light">Sign in</button>
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
					<h4 class="box-title">Banner</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
								<th>Banner</th>
								<th>Image</th>
								<th>Status</th>
								<th>Option</th>
							
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Age</th>
								<th>Start date</th>
								
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>2011/04/25</td>
								
							</tr>
						
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	
<?php include "allscripts.php"; ?>
