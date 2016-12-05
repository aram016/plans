
<?php
function connect(){
	$server="localhost";
	$login="root";
	$password="";
	$base="cinema";
	$con=mysqli_connect($server,$login,$password,$base);
	if(!$con)
		return mysqli_connect_error();
	return $con;
}
 function total(){
 	
 	$conn=connect();
 	$arr=array_keys($_SESSION['cart']);
 	$str=implode(',', $arr);
 	
 	$query="SELECT id, price FROM `books` WHERE id in ($str)";
 		$res1=mysqli_query($conn,$query);
 		$total=0;
		 while ($row=mysqli_fetch_assoc($res1)){
		 	$total+=$row['price']*$_SESSION['cart'][$row['id']];
		 }
	mysqli_close($conn);
 	return $total;

 }

 ?>


