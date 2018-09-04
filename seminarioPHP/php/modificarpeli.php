<?php
session_start();
$id = $_POST['id'];
$mas = "";
// si no sube imagen dejar la anterior cambiar despues
if (isset($_FILES['imagen']) && ($_FILES['imagen']['size'] > 0)) {      
    $tipoimg = $_FILES['imagen']['type'];
    $tipoimg = str_replace('image/','',$tipoimg);
    if (in_array($tipoimg,array("jpg","jpeg","png","gif"))) {
        if ($_FILES['imagen']['size'] < 65535) {
            $imagen = $_FILES['imagen']['tmp_name'];
            $imagen = file_get_contents("$imagen");
            $imagen = addslashes($imagen);
            $mas = ", contenidoImagen = '$imagen'";
        }
    }
}
if (isset($_POST['nombre']) && ($_POST['nombre']) != ""){
	$nom = $_POST['nombre'];
	if (isset($_POST['genero']) && ($_POST['genero']) != ""){
		$gen = $_POST['genero'];
		if (isset($_POST['anio']) && ($_POST['anio']) != ""){
			$ani = $_POST['anio'];
			if (isset($_POST['sino']) && (trim($_POST['sino'])) != ""){
				$sin = preg_replace('/ +/',' ',trim($_POST['sino']));
				$sql = "UPDATE peliculas SET nombre = '$nom', sinopsis = '$sin', anio = '$ani', generos_id = '$gen' ".$mas." WHERE id = '$id' ";
				include ('conect.php');
				$link = connectdb();
				$result	= mysqli_query($link,$sql);
				header ("Location: ../listadop.php");
			}else{
				$_SESSION['error'] = "Campo Sinopsis Vacio";
			}
		}else{
			$_SESSION['error'] = "Campo Año Vacio";
		}
	}else{
		$_SESSION['error'] = "Campo Genero Vacio";
	}
}else{
	$_SESSION['error'] = "Campo Nombre Vacio";
}
header ("Location: ../modificarpeli.php?idp=$id");
?>