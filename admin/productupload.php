<?php
if(isset($_POST['submit'])){
    // Include the database configuration file
    include_once 'pconfig.php';
    
    // File upload configuration
    $targetDir = "../images/products/";
    $allowTypes = array('jpg','png','jpeg','gif');
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if(!empty(array_filter($_FILES['files']['name']))){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            $idd = $_POST['id'];
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$idd."','".$fileName."', NOW()),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
        }
        
        if(!empty($insertValuesSQL)){
            $insertValuesSQL = trim($insertValuesSQL,',');


            // Insert image file name into database
            $insert = $db->query("INSERT INTO productimages (idd, file_name, uploaded_on) VALUES $insertValuesSQL");
            if($insert){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = "Files are uploaded successfully.".$errorMsg;
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
    
    // Display status message
    echo $statusMsg;
}
?>




     <?php

include "db.php";

if(isset($_POST['submit']))
{
   
     $file=$_FILES['image']['tmp_name'];
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name= addslashes($_FILES['image']['name']);

    move_uploaded_file($_FILES["image"]["tmp_name"],"../images/products/" . $_FILES["image"]["name"]);


$img=$_FILES["image"]["name"];
$id=$_POST['id'];
$name=$_POST['name'];
$productcode=$_POST['productcode']; 
$description=$_POST['description'];
$metatitle=$_POST['metatitle'];
$metatag=$_POST['metatag'];
$metadescription=$_POST['metadescription']; 
$price=$_POST['price'];
$oldprice=$_POST['oldprice'];

$descr=$_POST['descr'];
$discount=$_POST['discount'];
$newold=$_POST['newold'];
$star=$_POST['star'];

$maincat=$_POST['maincat'];
$categoryid=$_POST['categoryid'];

$status=$_POST['status'];
$brand=$_POST['brand'];
$stock=$_POST['stock'];

$weight=$_POST['weight'];
$hsncode=$_POST['hsncode'];

$gst=$_POST['gst'];

             $save=mysqli_query($con,"INSERT INTO products (img,id,name,productcode,description,metatitle,metatag,metadescription,price,oldprice,descr,discount,newold,star,maincat,categoryid,status,brand,stock,gst,weight,hsncode) VALUES ('$img','$id','$name','$productcode','$description','$metatitle','$metatag','$metadescription','$price','$oldprice','$descr','$discount','$newold','$star','$maincat','$categoryid','$status','$brand','$stock','$gst','$weight','$hsncode')");

   ?>
                <script>
                alert('Successfully Inserted...Your data has been Submitted');
                window.location.href='productsview.php';
                </script>
                <?php

                   
    }
?>



