<!-- AMAY -->
    
    <?php
error_reporting(0);
session_start();
if(!isset($_SESSION["userSession"])){
header("Location: login.php");
exit(); }
?> 


<?php
	     $img=$_POST['img'];
		 $name=$_POST['name'];
         $price=$_POST['price'];
    
         $useremailid=$_POST['useremailid'];
         $pid=$_POST['pid'];

if (!$useremailid) {
    http_response_code(403);
    echo json_encode(array("msg" => "login required"));
} else {
    include 'database.php';

    $sql1 = ("SELECT * FROM `wishlist` WHERE `useremailid`=$useremailid AND `pid`=$pid;");
    $result = mysqli_query($conn, $sql1);
    if (mysqli_affected_rows($conn) > 0) {
        http_response_code(400);
        echo json_encode(array("msg" => "Product already added to wishlist!"));
    } else {
        $sql2 = "INSERT INTO `wishlist`(`img`,`name`,`price`,`useremailid`,`pid`, `description`) VALUES ('$img' , '$name', $price, $useremailid, $pid, '')";
        if (mysqli_query($conn, $sql2)) {
            http_response_code(201);
            echo json_encode(array("msg" => "Product added to wishlist successfully!"));
        } else {
            http_response_code(500);
            echo json_encode(array("msg" => "Internal Server Error occured"));
        }
    }

    mysqli_close($conn);
}
?>
<!-- AMAY -->
   
   