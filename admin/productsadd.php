<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>

<?php include "allcss.php" ?>


<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>



<body>

<?php include "header.php" ?>


<div id="wrapper">
	<div class="main-content">
		
		<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Add Product</h4>
					<!-- /.box-title -->
					<div class="card-content">

						<?php

include "db.php";

$result = mysqli_query($con, "SELECT * FROM products ORDER BY id DESC LIMIT 1");

while ($row = mysqli_fetch_array($result)) {
    $idcount = $row['id'] + 1;
    
    //echo $idcount;
}
?>

						<form class="form-horizontal" action="productupload.php" method="post" enctype="multipart/form-data" >

 


<input type="hidden" name="id" value="<?php echo $idcount;?>">

<input type="hidden" name="status" value="1">

							<div class="form-group">
								<label for="one" class="col-sm-3 control-label">Product Name</label>
								<div class="col-sm-3">
									<input type="text" name="name" class="form-control" id="one" placeholder="Enter Product Name...">
								</div>


								<label for="two" class="col-sm-3 control-label">Product Code</label>
								<div class="col-sm-3">
									<input type="text" name="productcode" class="form-control" id="two" placeholder="Enter Product Code...">
								</div>


							</div>





							<div class="form-group">
								<label for="three" class="col-sm-3 control-label">Select Category</label>
								<div class="col-sm-3"> 

									<select name="maincat" id="three" class="form-control">
								  <option>Select Main Category</option>
								   <?php

include"db.php";

$result = mysqli_query($con,"SELECT * FROM menu where parent_id = 0");
while($row = mysqli_fetch_array($result))
{
echo '<option value="' .$row['menu_id'].'">' .$row['menu_name'].'</option>';
} 
?>

							</select>

									
							
								</div> 







								<label for="r" class="col-sm-3 control-label">Stock</label>
								<div class="col-sm-3">
									<input type="number" name="stock" class="form-control" id="r" placeholder="Enter Current Stock">
								</div>



								</div>



							<div class="form-group">
								<label for="twenty" class="col-sm-3 control-label">Select Sub Category</label>
								<div class="col-sm-3"> 

									<select name="categoryid" id="twenty" class="form-control">
								  <option>Select Sub Category</option>
								   <?php

include"db.php";

$result = mysqli_query($con,"SELECT * FROM menu where parent_id != 0");
while($row = mysqli_fetch_array($result))
{
echo '<option value="' .$row['menu_id'].'">' .$row['menu_name'].'</option>';
} 
?>

							</select>

									
							
								</div>

								</div>





						<div class="form-group">
								<label for="four" class="col-sm-3 control-label">Product Main Image</label>
								<div class="col-sm-3">
									<input type="file" id="four" name="image">
									<p class="help-block">Image should be 1000 x 1000 in pixels</p>
								</div>

									<!-- <label for="five" class="col-sm-3 control-label">New / Old Product</label> -->
									<!-- <div class="col-sm-3">
										<select name="newold" id="five" class="form-control">
											<option value="">Select Type of Product </option>
											<option value="New">New Product</option>
											<option value="Old">Old Product</option>
										</select>
									</div> -->
								</div>
							<div class="form-group">
								<label for="ninty" class="col-sm-3 control-label">Product Weight</label>
								<div class="col-sm-3">
									<input type="text" name="weight" class="form-control" id="ninty" placeholder="Enter Product Weight...">
								</div>


								<label for="nintyone" class="col-sm-3 control-label">Product HSN Code</label>
								<div class="col-sm-3">
									<input type="text" name="hsncode" class="form-control" id="nintyone" placeholder="Enter Product HSN Code...">
								</div>


							</div>
							
							
							
							
							

							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="description" id="text" placeholder="Write your Product Description"></textarea>  

    <script>
        CKEDITOR.replace('text');
    </script>

								</div>
							</div>


							<div class="form-group">
								<label for="text2" class="col-sm-3 control-label">Long Description</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="descr" id="text2" placeholder="Write your Product Description"></textarea>  

    <script>
        CKEDITOR.replace('text2');
    </script>

								</div>
							</div>


 

							<div class="form-group">
								<label for="seven" class="col-sm-3 control-label">Multiple Images Upload</label>
								<div class="col-sm-3">
									
 <input class="fileinput btn-add" type="file" id="seven" name="files[]" multiple > <p class="help-block">Image should be 800 x 800 in pixels</p>
								
								</div> 



									<div class="form-group">
								<label for="twentytwo" class="col-sm-3 control-label">Select Brand</label>
								<div class="col-sm-3"> 

									<select name="brand" id="twentytwo" class="form-control">
								  <option selected="" disabled=“disabled” value="">Select Brand</option>
								   <?php

include"db.php";

$result = mysqli_query($con,"SELECT * FROM client");
while($row = mysqli_fetch_array($result))
{
echo '<option value="' .$row['name'].'">' .$row['name'].'</option>';
} 
?>

							</select>

									
							
								</div>

								</div>


							</div>
 
  
  	<div class="form-group">
								
								<label for="eleven" class="col-sm-3 control-label">MRP Price</label>
								<div class="col-sm-3">
									<input type="number" name="oldprice" class="form-control" id="eleven" placeholder="Enter Product Price ...">
								</div>
 

 <label for="ten" class="col-sm-3 control-label">Discounted Price</label>
								<div class="col-sm-3">
									<input type="number" name="price" class="form-control" id="ten" placeholder="Enter  Price...">
								</div>



							</div>
 

				<div class="form-group">
								<!-- <label for="eight" class="col-sm-3 control-label">Product Discount ( % )</label>
								<div class="col-sm-3">
									
<input type="number" name="discount" class="form-control" id="eight" placeholder="Enter Product Discount...">
								
								</div> -->

								<label for="nine" class="col-sm-3 control-label">Star Rating [1 - 5] </label>
								<div class="col-sm-3">
									
<input type="number" name="star"  class="form-control" id="nine" placeholder="Enter No of Stars...">
								
								</div>

							</div>
							<!-- <div class="form-group">
								<label for="hund" class="col-sm-3 control-label">GST of Product ( % )</label>
								<div class="col-sm-3">
									<input type="number" name="gst" class="form-control" id="hund" placeholder="Enter Product GST %...">
								</div>
							</div> -->
 						<div class="form-group">
								<label for="fifteen" class="col-sm-3 control-label">Meta Title</label>
								<div class="col-sm-3">
									<input type="text" name="metatitle" class="form-control" id="fifteen" placeholder="Enter Meta Title...">
								</div>


								<label for="sixteen" class="col-sm-3 control-label">Meta Tag</label>
								<div class="col-sm-3">
									<input type="text" name="metatag" class="form-control" id="sixteen" placeholder="Enter Meta Tag...">
								</div>


							</div>


							<div class="form-group">
								<label for="seventeen" class="col-sm-3 control-label">Meta Description</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="metadescription" id="seventeen" placeholder="Write your Meta Description"></textarea>
								</div>
							</div>




              </div>

							<div class="form-group margin-bottom-0">
									<label for="" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">  
<input type="submit" name="submit" value="Submit" class="btn btn-dark btn-sm waves-effect waves-light">

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
