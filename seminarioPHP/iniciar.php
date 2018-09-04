<html>
<head>
<title>Sesion</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/javascript" src="js/all.js"></script>
</head>
<body>
<div class="ttitulo c">
	<label>Iniciar Sesion</label>
</div>
<hr class="hr1">
<center>
<img class="perfil" src="images/a.png" alt="">
<div class="caja">
	<form class="form-control" action="php/login.php" onsubmit="return validariniciar()" method="POST">
		<center>
		<label for="Usuario" class="">Usuario: <input id="usu" name="usu" type="text" placeholder="Usuario"></label><br>
			<div class="error">
			</div>
			<label for="Contraseña" class="">Contraseña: <input id="pass" name="pass" type="password" placeholder="Contraseña"></label><br>
			<br>
			<?php
				session_start();
				if (isset($_SESSION['error'])){
					?>
						<div class="error"><?php echo $_SESSION['error'] ?></div>
					<?php
					}
				session_destroy();
			?>
		<input type="submit" id="bregistarse" value="Iniciar">
		</center>
	</form>
</div>
</center>
<hr class="hr2">
<form class="c" action="index.php">
	<input type="submit" class="bregistarse" value="Volver">
</form>
</body>
</html>