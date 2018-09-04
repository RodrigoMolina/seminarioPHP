<?php 
	include('usuario.php');
	$u = new Usuario();
	$u->logout();
	header('location: ../index.php') 
?>