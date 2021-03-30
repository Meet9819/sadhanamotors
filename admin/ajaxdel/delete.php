<?php
//delete.php
$connect = mysqli_connect("localhost","root","","sadhaye5_motor");
if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM productimages WHERE id = '".$id."'";
  mysqli_query($connect, $query);
 }
}
?>