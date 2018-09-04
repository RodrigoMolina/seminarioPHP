<html>
<head>
  <title>Altapeli </title>
</head>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/javascript" src="js/all.js"></script>
<body>
<?php
	session_start();
	if (!isset($_SESSION['nombre'])){
		header("Location: iniciar.php");
	}
?>
<div id="titulo">
	<label>Ingrese Datos de Nueva Pelicula</label>
</div>
<hr>
<div class="">
	<div class="caja">
		<from class="" action="php/registro.php" method="POST">
			<div id="imagenp">
				<input type="file" id="files" name="files[]" /><br>
				<output id="list"></output>
			</div>
			<label for="Nombre">Nombre: <input id="Nombre" type="text"></label><br>
			<label for="Nombre">Genero: <input id="Genero" type="text"></label><br>
			<div class="anio"><label for="Nombre">Año:
				<select>
					<?php
						$num = 2017;
						for ($i=1900; $i<=$num ; $i++)
							echo "<option value=".$i.">".$i."</option>"
					?>
				</select> 
			</div>
			<div class="texto">
				<label for="Nombre">Sinopsis:  
					<textarea rows="4" cols="50">
					</textarea>
				</label><br>
			</div>
			<input type="button" id="bregistarse" value="Registrase">
		</from>
	</div>
</div>
<hr>
</body>
</html>