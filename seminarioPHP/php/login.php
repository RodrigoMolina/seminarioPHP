<?php
	include_once('usuario.php');
	$usuar = $_POST["usu"];
	$contr =  $_POST["pass"];
	$u = new Usuario();
	if (($usuar != "") && ($contr != "")){
		try{
			$u->login($usuar,$contr);
		}
		catch
			(Exception $e){
    		echo 'Excepción capturada: ',  $e->getMessage();
		}
		header('location: ../index.php');
	}else{
		session_start();
		$_SESSION['error'] = 'Campos invalidos';
		header('location: ../iniciar.php');
	}
?>