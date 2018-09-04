<?php
	include('php/conect.php');
	$link = connectdb();
    if (isset($_SESSION['nombre'])){
        echo "Bienvenido ".$_SESSION['nombre']." ".$_SESSION['apellido'];
        ?>
        <a href="listadop.php">Administrar</a>
        /
        <a href="php/logout.php">Cerrar Sesion</a>
        <?php
    }else{
        ?>
        <a href="iniciar.php">Iniciar</a>
        /
        <a href="registro.php">Registarse</a>
        <?php 
    }
?>
