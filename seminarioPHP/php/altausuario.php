 <?php
    session_start();
    include ('conect.php');
	$link = connectdb();
    $_SESSION['error'] = "";
    // Valida el nombre de usuario
    $cadenaval = "/^[a-zA-Z ñÑáéíóúÁÉÍÓÚäëïöüÄËÏÖÜ\']*$/";
    if (isset($_POST['Nombre']) && ($_POST['Nombre'] !== "") && (preg_match($cadenaval, $_POST['Nombre']))){
        $nombre = $_POST['Nombre'];
        $nombre = preg_replace('/ +/',' ',trim($nombre));
    }else{ 
        $_SESSION['error'] = "Campo Nombre Vacio";
    }
    // Valida el apellido del usuario
    if (isset($_POST['Apellido']) && ($_POST['Apellido'] !== "") && (preg_match($cadenaval, $_POST['Apellido']))){
        $apellido = $_POST['Apellido'];
        $apellido = preg_replace('/ +/',' ',trim($apellido));
    }else{ 
        $_SESSION['error'] = "Campo apellido invalido";
    }
    // Valida el Usuario
    $emailval = "/\w{6,}/";
    if (isset($_POST['Usuario']) && ($_POST['Usuario'] !== "") && (preg_match($emailval,$_POST['Usuario']))){
        $usu = $_POST['Usuario'];
    }else{
        $_SESSION['error'] = "Campo Usuario invalido"; 
    }
    // Valida el correo del usuario 
    $emailval = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
    if (isset($_POST['Email']) && ($_POST['Email'] !== "") && (preg_match($emailval,$_POST['Email']))){
        $correo = $_POST['Email'];
    }else{
        $_SESSION['error'] = "Campo Email invalido"; 
    }
    $mayuscula= "/[A-Z]+/";
	$minuscula = "/[a-z]+/";
	$caracespeciales= "/[\^$.*@+?=!:|\\/()\[\]{}]+|[0-9]+/";
    if (isset($_POST['Pass']) && ($_POST['Pass'] !== "") && (preg_match($mayuscula, $_POST['Pass']) && preg_match($minuscula, $_POST['Pass']) && preg_match($caracespeciales, $_POST['Pass']))){
        if (strlen($_POST['Pass']) >= 6) {
            $clave = $_POST['Pass']; 
        }else{
            $_SESSION['error'] = "campo contraseña vacio";
        }
    }
    // Valida la confirmación de la clave
    if (isset($_POST['Pass2']) && ($_POST['Pass2'] != "") && ($_POST['Pass2'] == $_POST['Pass'])){
		$sql = "SELECT * FROM usuarios WHERE nombreusuario = '$usu'";
		$result	= mysqli_query($link,$sql); 
		$row = mysqli_fetch_array($result);
		if (!$row){
			$usu = $_POST['Usuario'];
			$ema = $_POST['Email'];
			$p = $_POST['Pass'];
			$nom = $_POST['Nombre'];
			$ape = $_POST['Apellido'];
			$sql2="INSERT INTO `usuarios` (`id`, `nombreusuario`, `email`, `password`, `nombre`, `apellido`, `administrador`) VALUES (NULL, '$usu', '$ema', '$p', '$nom', '$ape', '0');";
			$result	= mysqli_query($link,$sql2); 
		}else{
			$_SESSION['error'] = $_SESSION['error']." Usuario no Registrado";
		}
    }else{
		$_SESSION['error'] = "Claves diferentes";
	}
    $n=$_POST['Nombre'];
    $a=$_POST['Apellido'];
    $e=$_POST['Email'];
    $u=$_POST['Usuario'];
    
header("location: ../");
?>
