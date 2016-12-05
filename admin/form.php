<?php
include("functions.php");
$conn=connect();
if(!$conn){
	die(mysqli_conect_error());
}
if($_POST["action"]=="delate"){
	$id=$_POST['id'];
	$query="delete from films where id='$id'";
	$res=mysqli_query($conn,$query);
}
if($_POST["action"]=="update"){
	$id=$_POST['id'];
	$text=$_POST['text'];
	$text1=$_POST['text1'];

	$query="update films set title='$text',price='$text1' where id='$id'";
	$res1=mysqli_query($conn,$query);
}
if($_POST["action"]=="ins"){
	$text=$_POST['text'];
	$text1=$_POST['text1'];
	$query="insert into films (title, price) values ('$text','$text1')";
	$res1=mysqli_query($conn,$query);
}
?>