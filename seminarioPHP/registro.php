<html>
<head>
<title>Registro</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/javascript" src="js/all.js"></script>
</head>
<body>
<div class="ttitulo c">
	<label>Ingrese sus Datos</label>
</div>
<hr class="hr1">
<div class="container c">
	<center>
	<div class="caja">
	<?php 
		if (isset($_GET['n'])){
			$nombre = $_GET['n'];
		}else{
			$nombre = '';
		}
		if (isset($_GET['a'])){
			$apellido = $_GET['a'];
		}else{
			$apellido = '';
		}
		if (isset($_GET['e'])){
			$email = $_GET['e'];
		}else{
			$email = '';
		}
		if (isset($_GET['u'])){
			$usuario = $_GET['u'];
		}else{
			$usuario = '';
		}

	?>
		<form class="form-control" action="php/altausuario.php" onsubmit="return validar()" method="POST">
			<label class="" for="Apellido">Apellido:</label>
			<input id="Apellido" name="Apellido" type="text" placeholder="Apellido" value="<?php echo "$apellido"; ?>"><br>
			<label class="" for="Nombre">Nombre:</label>
			<input id="Nombre" name="Nombre" type="text" placeholder="Nombre" value="<?php echo "$nombre"; ?>"><br>
			<label class="" for="Email">Email:</label>
			<input id="Email" name="Email" type="text" placeholder="Email @" value="<?php echo "$email"; ?>"><br>
			<label class="" for="Usuario">Usuario:</label> 
			<input id="Usuario" name="Usuario" type="text" placeholder="Usuario" value="<?php echo "$usuario"; ?>"><br>
			<label class="c1" id="textsmall">(Al menos 6 caracteres)</label><br>
			<label class="" for="Pass">Contraseña: <input id="Pass" name="Pass" type="password" placeholder="Contraseña"></label><br>
			<label class="c1" id="textsmall">(Al menos 6 caract, 1 letra mayúscula, 1 letra minuscula</label><br>
			<label class="c1" id="textsmall">y 1 caracter especial)</label><br>
			<label class="" for="Pass2">Repetir: <input id="Pass2" name="Pass2" type="password" placeholder="Contraseña"></label><br>
			<?php	
				session_start();		
				if (isset($_SESSION['error'])) {
				    ?>
				    <div class="error">
				        <?php
				        echo $_SESSION['error'];
				        unset($_SESSION['error']);
				        ?>
				    </div>
				    <?php
				}
			?>
			<input type="submit" class="bt" value="Registrase">
		</form>
	</div>
	</center>
</div>
<hr class="hr2">
<center>
	<form action="index.php">
		<input type="submit" class="bt" value="Volver">
	</form>
</center>
</body>
</html>