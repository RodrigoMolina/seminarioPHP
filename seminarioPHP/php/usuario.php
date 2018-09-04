<?php
include_once ('conect.php');
class Usuario{
	public function cargarUsu($nombre,$apellido,$id){
		session_start();
		$_SESSION['nombre'] = $nombre;
		$_SESSION['apellido'] = $apellido;
		$_SESSION['idu'] = $id;
		echo $_SESSION['idu'];
	}
	private function setAdmin($num){// 1 para admin, 0 usuario comun
		$_SESSION['administrador'] = $num;
	}
	public function logout(){
		session_start();
		unset($_SESSION['nombre']);
		unset($_SESSION['apellido']);
		unset($_SESSION['administrador']); 
	}
	public function buscarUsu($usuario,$contra){
		$link = connectdb();
		$sql = "SELECT * FROM usuarios WHERE nombreusuario = '$usuario' AND password = '$contra'";
		$result = mysqli_query($link,$sql);
		$cant = mysqli_num_rows($result);
		if ($cant > 0){
			$reg = mysqli_fetch_array($result);
			$this->cargarUsu($reg['nombre'],$reg['apellido'],$reg['id']);
			$this->setAdmin($reg['administrador']);
		}else{		
			throw new Exception('Usuario o contraseña incorrectos');	
		}
	}

	public function islogin(){
		if (isset($_SESSION['idu'])){
			return true;
		}else{
			return false;
		}
	}
/*	public function esA() {
		if(isset( $_SESSION['administrador'] )) {
			return true;
		}
		else {
			return false;
		}
		return false;
	}
*/	public function esA(){
		if(isset( $_SESSION['administrador'] )){
			return true;
		}
		else{
			return false;
		}
	}

	public function login($usu,$pass){
		$reg = $this->buscarUsu($usu,$pass);
	}
}