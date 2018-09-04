<?php
$sql = "UPDATE `peliculas` SET `nombre` = '$_GET["nombre"]', `sinopsis` = 'nuevacasa', `anio` = '2016', `generos_id` = '$_GET["genero"]' WHERE `peliculas`.`id` = 7;";
$result	= mysqli_query($link,$sql); 
header ("Location: ../listadopeli.php");
?>