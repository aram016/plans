<?php
$count=$_POST['count'];
$f_id=$_POST['cin'];
include("admin/functions.php");
$conn=connect();
$query="INSERT INTO `user_bay`(`film_id`, `count`) VALUES (".$f_id.",".$count.")";
$res=mysqli_query($conn,$query);
header("location:index.php");
?>