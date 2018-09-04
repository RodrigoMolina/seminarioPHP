<?php
$id = $_GET['id']; 
include_once ('conect.php');
$link = connectdb();
$sql = "SELECT contenidoimagen, tipoimagen FROM peliculas WHERE id = $id";
	$result	= mysqli_query($link, $sql); 
	$row= mysqli_fetch_array($result);
	header("Content-type:" . $row['tipoimagen']); 
	echo $row['contenidoimagen']; 
	mysqli_close($link); 
?>