<?php
include ('conect.php');
$link = connectdb();
$sql1 = "SELECT * FROM `comentarios` WHERE comentarios.peliculas_id = ".$_POST['id'];
$result1 = mysqli_query($link,$sql1);
$cant = mysqli_num_rows($result1);
if ($cant >0 ){
	while ($comentario = mysqli_fetch_array($result1)){   
		$borrar = "DELETE FROM `comentarios` WHERE `comentarios`.`id` = ".$comentario['id'];
		$result	= mysqli_query($link,$borrar); 
		//elimino todos los comentarios de la pelicula
	}
}
$sql = "DELETE FROM `peliculas` WHERE `peliculas`.`id` = ".$_POST['id'];
$result	= mysqli_query($link,$sql); 
//elimino la pelicula
header ("Location: ../listadop.php");
//vuelvo al listado
?>