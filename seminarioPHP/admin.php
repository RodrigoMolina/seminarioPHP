<html>
<head>
  <title>Administrador</title>
</head>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<body>
<hr>
<div class="container">
	<div  id="form-control">
		<form class="caja" action="php/login.php" method="POST" >
			<label for="Usuario">Usuario: <input id="Usuario" name="usu" type="text" placeholder="Usuario"></label><br>
			<label for="Contraseña">Contraseña: <input id="Contraseña" name="pass" type="text" placeholder="Contraseña"></label><br>
			<input type="submit" id="bregistarse" value="Iniciar">
		</form>
	</div>
</div>
<hr>
<center>
	<form action="index.php">
		<input type="submit" class="bregistarse" value="<--Volver">
	</form>
</center>
</body>
</html>