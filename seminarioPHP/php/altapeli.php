<?php
session_start();
if (isset($_FILES['imagen']) && ($_FILES['imagen']['size'] > 0)) {
	if (isset($_FILES['imagen']) && ($_FILES['imagen']['size'] > 0)) {      
        $tipoimg = $_FILES['imagen']['type'];
        $tipoimg = str_replace('image/','',$tipoimg);
        if (in_array($tipoimg,array("jpg","jpeg","png","gif"))) {
            if ($_FILES['imagen']['size'] < 65535) {
                $imagen = $_FILES['imagen']['tmp_name'];
                $imagen = file_get_contents("$imagen");
                $imagen = addslashes($imagen);
           		if (isset($_POST['nombre']) && ($_POST['nombre']) != ""){
					$nom = $_POST['nombre'];
					if (isset($_POST['genero']) && ($_POST['genero']) != ""){
						$gen = $_POST['genero'];
						if (isset($_POST['anio']) && ($_POST['anio']) != ""){
							$ani = $_POST['anio'];
							if (isset($_POST['sino']) && (trim($_POST['sino'])) != ""){
								$sin = $_POST['sino'];
								$sql = "INSERT INTO `peliculas` (`id`, `contenidoImagen` , `nombre`, `sinopsis`, `anio`, `generos_id`, `tipoimagen`) VALUES (NULL, '$imagen','$nom', '$sin', '$ani', '$gen', '$tipoimg')";
								include ('conect.php');
								$link = connectdb();
								$result	= mysqli_query($link,$sql); 
								$_SESSION['error'] = "Alta pelicula exitosa";
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
            }//---Tamaño imagen
            else{
            	$_SESSION['error'] = "Imagen muy grande";
            }
        }//---Tipo imagen
    }//---Isset imagen
	
} else{
	$_SESSION['error'] = "Campo Seleccione una imagen";
}

header ("Location: ../altapeli.php");
?>