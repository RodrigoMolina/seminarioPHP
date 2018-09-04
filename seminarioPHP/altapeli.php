<html>
<head>
	<title>Altapeli </title>
<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
<script type="text/javascript" src="js/all.js"></script>
</head>
<body>
<?php
	include_once ('./php/conect.php');
	$link = connectdb();
	session_start();
	if (!isset($_SESSION['nombre'])){
		header("Location: iniciar.php");
	}
?>
<a class="linkcerrar" href="php/logout.php">Cerrar Sesion</a></li>
<div class="ttitulo c">
	<label>Datos de Nueva Pelicula</label>
</div>
<hr class="hr1">
<center>
<div class="caja">
	<form class="" action="php/altapeli.php" onsubmit="return validarpeli()" method="POST" enctype="multipart/form-data" >
		<center>
		<div id="imagenes">
			<output id="list"></output><br>
			<input type="file" id="files" name="imagen" />
			<script>
				function archivo(evt) {
				  var files = evt.target.files; // FileList object

				  // Obtenemos la imagen del campo "file".
				  for (var i = 0, f; f = files[i]; i++) {
				    //Solo admitimos imágenes.
				    if (!f.type.match('image.*')) {
				        continue;
				    }

				    var reader = new FileReader();

				    reader.onload = (function(theFile) {
				        return function(e) {
				          // Insertamos la imagen
				         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
				        };
				    })(f);

				    reader.readAsDataURL(f);
				  }
				}

				document.getElementById('files').addEventListener('change', archivo, false);
     		</script>
		</div>			
		<label>Nombre: <input id="nombre" name="nombre" type="text"></label><br>
		<label for="genero">Genero: </label>
		<select id="genero" name="genero">
			<option value="">Elija una</option>
			<?php
			$sql2 = "SELECT * FROM `generos`";
			$result = mysqli_query($link,$sql2);
   			while ($row = mysqli_fetch_array($result)){
					echo '<OPTION value="'.$row['id'].'">'.$row['genero'].'</OPTION>';
				}
    		?>
    	</select>
       	<br>
		<div class="ano">
			<label for="anio">Año:</label>
			<select id="anio" name="anio">
				<option value="">Elija una</option>
				<?php
					$num = 2017;
					for ($i=1900; $i<=$num ; $i++)
						echo "<option value=".$i.">".$i."</option>"
				?>
			</select> 
		</div>
		<label class="c" for="sino">Sinopsis:</label><br>  
				<textarea id="sino" name="sino"></textarea>
			<br>
		<?php
			
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
		<input type="submit" id="bregistarse" value="Agregar"> 
	</form>
</div>
</center>
<hr class="hr2">
<center>
	<form action="index.php">
		<input type="submit" class="bregistarse" value="Volver">
	</form>
</center>
</body>
</html>