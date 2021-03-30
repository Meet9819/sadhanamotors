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
					<h4 class="box-title">Edit Product</h4>
					<!-- /.box-title -->
					<div class="card-content">

				


<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT maincat, categoryid, productcode, name, oldprice, price,description,img,discount,descr,star,newold,metatitle,metatag,metadescription,stock,brand,gst,weight,hsncode,sale FROM products WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: productsview.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
$maincat=$_POST['maincat'];
$categoryid=$_POST['categoryid'];
$productcode=$_POST['productcode'];  
$name = $_POST['name']; 
$oldprice=$_POST['oldprice'];
$price=$_POST['price'];

$description=$_POST['description'];
$discount=$_POST['discount'];  
$descr=$_POST['descr'];
$newold=$_POST['newold'];
$star=$_POST['star'];

$metatitle=$_POST['metatitle'];
$metatag=$_POST['metatag'];
$metadescription=$_POST['metadescription']; 


$stock=$_POST['stock'];
$gst=$_POST['gst'];


$weight=$_POST['weight'];
$hsncode=$_POST['hsncode'];

$sale=$_POST['sale'];

$brand=$_POST['brand'];

        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
                    
        if($imgFile)
        { 
        
            
            $upload_dir = '../images/products/'; // upload directory 
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $img = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['img']);
                    move_uploaded_file($tmp_dir,$upload_dir.$img);
                }
                else
                {
                    $errMSG = "Sorry, your file is too large it should be less then 5MB";
                }
            }
            else
            {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
            }   
        }
        else
        {
            // if no image selected the old image remain as it is.
            $img = $edit_row['img']; // old image from database
        }   
                        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        { 

$stmt = $DB_con->prepare('UPDATE products SET maincat=:maincat,categoryid=:categoryid,productcode=:productcode, name=:name,  img=:img, oldprice=:oldprice, price=:price, description=:description, discount=:discount, descr=:descr, newold=:newold, star=:star, metatitle=:metatitle, metatag=:metatag, metadescription=:metadescription,stock=:stock,brand=:brand,gst=:gst,weight=:weight,hsncode=:hsncode, sale=:sale
    WHERE id=:id');

 	$stmt->bindParam(':maincat',$maincat);    
 	$stmt->bindParam(':categoryid',$categoryid);    
  	$stmt->bindParam(':productcode',$productcode);    
 
    $stmt->bindParam(':name',$name);    
    $stmt->bindParam(':img',$img);
 
    $stmt->bindParam(':oldprice',$oldprice);   
    $stmt->bindParam(':price',$price);   
    $stmt->bindParam(':description',$description);   
    $stmt->bindParam(':discount',$discount);   
    $stmt->bindParam(':descr',$descr);  

     
   $stmt->bindParam(':newold',$newold);   
    $stmt->bindParam(':star',$star); 

    $stmt->bindParam(':metatag',$metatag);   
   $stmt->bindParam(':metatitle',$metatitle);    
    $stmt->bindParam(':metadescription',$metadescription);    
   $stmt->bindParam(':stock',$stock);  
     $stmt->bindParam(':brand',$brand);  
     
     $stmt->bindParam(':gst',$gst);  
     
        
     $stmt->bindParam(':weight',$weight);  
        
     $stmt->bindParam(':hsncode',$hsncode);  
     $stmt->bindParam(':sale',$sale);  

            $stmt->bindParam(':id',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='productsview.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
        
        }
        
                        
    }
    
?>




					<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >


						
							<div class="form-group">
								<label for="one" class="col-sm-3 control-label">Product Name</label>
								<div class="col-sm-3">
									<input type="text" name="name" class="form-control" id="one" placeholder="Enter Product Name..." value="<?php echo $name; ?>">
								</div>


								<label for="two" class="col-sm-3 control-label">Product Code</label>
								<div class="col-sm-3">
									<input type="text" name="productcode" class="form-control" id="two" placeholder="Enter Product Code..." value="<?php echo $productcode; ?>">
								</div>


							</div>


							<div class="form-group">
								<label for="three" class="col-sm-3 control-label">Select Category</label>
								<div class="col-sm-3"> 

									<select name="maincat" id="three" class="form-control">

								
								   <option><?php echo $maincat; ?></option>   <option>Select Main Category</option> 
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
                                    <input type="number" name="stock" value="<?php echo $stock; ?>" class="form-control" id="r" placeholder="Enter Current Stock">
                                </div>





								</div>



							<div class="form-group">
								<label for="twenty" class="col-sm-3 control-label">Select Sub Category</label>
								<div class="col-sm-3"> 

									<select name="categoryid" id="twenty" class="form-control"> 
										<option><?php echo $categoryid; ?></option> 
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
								
								
								
								<label for="twenty" class="col-sm-3 control-label">Select Sale / Not Sale</label>
								<div class="col-sm-3"> 

									<select name="sale" id="twenty" class="form-control"> 
										<option value="<?php echo $sale; ?>"><?php echo $sale; ?></option> 
								  <option value="1">Sale</option>
								  <option value="0">Not in Sale</option>
								 
							</select>

									
							
								</div>

								</div>





							<div class="form-group">
								<label for="four" class="col-sm-3 control-label">Product Main Image</label>
								<div class="col-sm-3">   <img src="../images/products/<?php echo $img; ?>" height="70" width="150" />

								<input type="file" id="four" name="user_image"> 
								<p class="help-block">Image should be 1000 x 1000 in pixels</p>
								</div>

								<label for="five" class="col-sm-3 control-label">New / Old Product</label>
								<div class="col-sm-3">
									
								<select name="newold" id="five" class="form-control">
									<option value="<?php echo $newold; ?> "><?php echo $newold; ?> </option>
									<option value="">Select Type of Product </option>
								<option value="New">New Product</option>
								<option value="Old">Old Product</option>
								</select>
								</div>

								</div>








							<div class="form-group">
								<label for="nintyine" class="col-sm-3 control-label">Product Weight</label>
								<div class="col-sm-3">
									<input type="text" name="weight" class="form-control" id="nintyine" placeholder="Enter Product Weight..." value="<?php echo $weight; ?>">
								</div>


								<label for="nintytwo" class="col-sm-3 control-label">Product Code</label>
								<div class="col-sm-3">
									<input type="text" name="hsncode" class="form-control" id="nintytwo" placeholder="Enter Product HSN Code..." value="<?php echo $hsncode; ?>">
								</div>


							</div>
							
							
							

							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
								<textarea class="form-control" name="description" id="text" placeholder="Write your Product Description"><?php echo $description; ?></textarea>  

    							<script>
      							  CKEDITOR.replace('text');
    							</script>

								</div>
							</div>


                            <div class="form-group">
                                <label for="text2" class="col-sm-3 control-label">Long Description</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="descr" id="text2" placeholder="Write your Product Description"><?php echo $descr; ?> </textarea>  

    <script>
        CKEDITOR.replace('text2');
    </script>

                                </div>
                            </div>
 


                                    <div class="form-group">
                                <label for="twentytwo" class="col-sm-3 control-label">Select Brand</label>
                                <div class="col-sm-3"> 

                                    <select name="brand" id="twentytwo" class="form-control">
                                    <option value="<?php echo $brand; ?>"><?php echo $brand; ?></option>
                                    <option>Select Brand</option>
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


 
                            <div class="form-group">
                                <label for="ten" class="col-sm-3 control-label">Discounted Price</label>
                                <div class="col-sm-3">
                                    <input type="number" name="price" class="form-control" id="ten" placeholder="Enter Product Price..." value="<?php echo $price; ?>">
                                </div>


                                <label for="eleven" class="col-sm-3 control-label">MRP Price</label>
                                <div class="col-sm-3">
                                    <input type="number" name="oldprice" class="form-control" id="eleven" placeholder="Enter Product MRP Price ..." value="<?php echo $oldprice; ?>">
                                </div>


                            </div>
 

                    

							<div class="form-group">
								<label for="eight" class="col-sm-3 control-label">Product Discount</label>
								<div class="col-sm-3">
									
								<input type="text" name="discount" class="form-control" id="eight" placeholder="Enter Product Discount..." value="<?php echo $discount; ?>">
								
								</div>

								<label for="nine" class="col-sm-3 control-label">Star Rating [1 - 5] </label>
								<div class="col-sm-3">
									
								<input type="number" name="star"  class="form-control" id="nine" placeholder="Enter No of Stars..." value="<?php echo $star; ?>">
								
								</div>

							</div>
 
 
 
 
 
							<div class="form-group">
								<label for="hund" class="col-sm-3 control-label">GST ( % )</label>
								<div class="col-sm-3">
									
								<input type="number" name="gst" class="form-control" id="hund" placeholder="Enter Product GST %..." value="<?php echo $gst; ?>">
								
								</div>

							</div>
 




						<div class="form-group">
								<label for="fifteen" class="col-sm-3 control-label">Meta Title</label>
								<div class="col-sm-3">
									<input type="text" name="metatitle" class="form-control" id="fifteen" placeholder="Enter Meta Title..."  value="<?php echo $metatitle; ?>">
								</div>


								<label for="sixteen" class="col-sm-3 control-label">Meta Tag</label>
								<div class="col-sm-3">
									<input type="text" name="metatag" class="form-control" id="sixteen" placeholder="Enter Meta Tag..."  value="<?php echo $metatag; ?>">
								</div>


							</div>


							<div class="form-group">
								<label for="seventeen" class="col-sm-3 control-label">Meta Description</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="metadescription" id="seventeen" placeholder="Write your Meta Description"> <?php echo $metadescription; ?></textarea>
								</div>
							</div>




              </div>

							<div class="form-group margin-bottom-0">
									<label for="" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">  
<input type="submit" name="btn_save_updates" value="Update" class="btn btn-dark btn-sm waves-effect waves-light">
   



										</div>
							</div>


						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white --> 







<?php $id = $_GET['edit_id']; 
?>


    <div class="col-lg-12 col-xs-12">
                <div class="box-content card white">
                    <h4 class="box-title">Add More Images</h4>
                    <!-- /.box-title -->
                    <div class="card-content">
                        


<form action="productsubimgupload.php" method="post" enctype="multipart/form-data">
  

        <input type="hidden" name="idd" value="<?php echo $id = $_GET['edit_id']; ?> ">

        <div class="form-group">
                               <div class="col-sm-6"> 

                              <input type="file" name="files[]" multiple >


                                <p class="help-block">Image should be 3527 x 2372 in pixels</p>  

                                 <input class="btn btn-dark btn-sm waves-effect waves-light" type="submit"  name="submit" value="Upload" /> 
                                </div>

                                </div>


</form>

</div></div></div>

<div class="col-xs-12">
           
                
                
                
                
                
                
                
                
                
                
                
                
                
	<?php
//index.php
$connect = mysqli_connect("localhost","root","","sadhaye5_motor"); 

$id = $_GET['edit_id'];

$query = "SELECT * FROM productimages where idd = $id";
$result = mysqli_query($connect, $query);
?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <style>
   #box
   {
    width:600px;
    background:gray;
    color:white;
    margin:0 auto;
    padding:10px;
    text-align:center;
   }
  </style>


            <div class="box-content">

  <div class="container">
   <?php
   if(mysqli_num_rows($result) > 0)
   {
   ?>
   <div class="table-responsive"> 

       <h4 class="box-title">View Product Images</h4>
                
                 

    <table class="table table-bordered">
     <tr>
      <th>Name</th>
    
      <th>Delete</th>
     </tr>
   <?php
    while($row = mysqli_fetch_array($result))
    {
   ?>
     <tr id="<?php echo $row["id"]; ?>" >
      <td><img width="50px" src="../images/products/<?php echo $row["file_name"]; ?>"> <br> <?php echo $row["file_name"]; ?></td> 

   
    
      <td><input type="checkbox" name="id[]" class="delete_customer" value="<?php echo $row["id"]; ?>" /></td>
     </tr>
   <?php
    }
   ?>
    </table>
   </div>
   <?php
   }
   ?>
   <div align="center">
    <button type="button" name="btn_delete" id="btn_delete" class="btn btn-danger">Delete</button>
   </div>
</div>

<script>
$(document).ready(function(){
 
 $('#btn_delete').click(function(){
  
  if(confirm("Are you sure you want to delete this?"))
  {
   var id = [];
   
   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length === 0) //tell you if the array is empty
   {
    alert("Please Select atleast one checkbox");
   }
   else
   {
    $.ajax({
     url:'ajaxdel/delete.php',
     method:'POST',
     data:{id:id},
     success:function()
     {
      for(var i=0; i<id.length; i++)
      {
       $('tr#'+id[i]+'').css('background-color', '#ccc');
       $('tr#'+id[i]+'').fadeOut('slow');
      }
     }
     
    });
   }
   
  }
  else
  {
   return false;
  }
 });
 
});
</script>














            </div>
            
                
                
            </div>
        

			</div>




















	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	
<?php include "allscripts.php"; ?>
