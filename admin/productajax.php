<?php 
include "d.php";

extract($_POST);
$user_id=$db->real_escape_string($id);
$status=$db->real_escape_string($status);
$sql=$db->query("UPDATE products SET status='$status' WHERE id='$id'");
echo $sql;
//echo 1;
?>
