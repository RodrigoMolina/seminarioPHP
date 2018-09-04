
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
session_start();
if (isset($_POST['texto']) && ($_POST['texto']) != ""){
	$text = $_POST['texto'];
	if (isset($_POST['valor']) && ($_POST['valor']) != "")
	$valo = $_POST['valor'];
	$fecha = date('Y-m-d');
	$sql = "INSERT INTO `comentarios` (`id`, `comentario`, `fecha`, `peliculas_id`, `usuarios_id`, `calificacion`) VALUES (NULL, '$text', '$fecha', '$_POST[idpeli]', '$_SESSION[idu]', '$valo')";
	include ('conect.php');
	$link = connectdb();
	$result	= mysqli_query($link,$sql);
	$_SESSION['error'] = "Se agrego Pelicula";
	header ("Location: verMas.php?idPelicula=".$_POST['idpeli']);
}else{
	$_SESSION['error'] = "No se agrego Pelicula";
	header ("Location: verMas.php?error=1&idPelicula=".$_POST['idpeli']);
}

?>
</body>
</html>