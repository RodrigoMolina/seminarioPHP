<html>
<head>
	<title>Modificar Pelicula </title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="js/all.js"></script>
</head>
<body>
<?php
	include ('./php/conect.php');
	$link = connectdb();
	session_start();
	if (!isset($_SESSION['nombre'])){
		header("Location: iniciar.php");
	}
	$sql = "SELECT * FROM `peliculas` WHERE id = ".$_GET['idp'];
	$result = mysqli_query($link,$sql);
	$peli = mysqli_fetch_array($result);
?>
<div class="ttitulo c">
	Modificar Pelicula
</div>
<hr class="hr1">
<div class="caja">
	<form class="form-control" action="php/modificarpeli.php" method="POST" onsubmit="return validarpeli2()" enctype="multipart/form-data">
		<center>
		<div id="">
			<div class="imgpeli">
				<img src="php/mostrarImagen.php?id=<?php echo $_GET['idp']?>"><br>
				<output id="list"></output>
			</div>
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
		<label for="Nombre">Nombre: <input name="nombre" id="nombre" type="text" value="<?php echo $peli['nombre']?>"></label><br>
		<label for="Genero">Genero:</label>
		<select id="genero" name="genero">
		<?php
			$sql2 = "SELECT * FROM `generos`";
			$result = mysqli_query($link,$sql2);
				while ($row = mysqli_fetch_array($result)){
				$selec = '';
					if ($row['id'] == $peli['generos_id']){
						echo '<OPTION value="'.$row['id'].'" selected>'.$row['genero'].'</OPTION>';
				}else{
					echo '<OPTION value="'.$row['id'].'">'.$row['genero'].'</OPTION>';
				}
			}
			?>
		</select>
		<div class="anio">
			<label for="Nombre">Año:
				<select id="anio" name="anio">
				<?php
					$num = 2017;
					for ($i=1900; $i<=$num ; $i++)
						if ($i == $peli['anio']){
							echo '<OPTION value="'.$i.'" selected>'.$i.'</OPTION>';
						}else{
							echo '<OPTION value="'.$i.'">'.$i.'</OPTION>';
						}
				?>
			</select> 
		</div>
		<label for="Sinopsis">Sinopsis:</label><br>
		<textarea id="sino" name="sino">
		<?php
			echo preg_replace('/ +/',' ',trim($peli['sinopsis']));
		?>
		</textarea>
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
			<input type="hidden" name="id" value="<?php echo $_GET['idp'] ?>">
			<input type="submit" class="bt" value="Modificar">
		</center>	
	</form>
</div>
<hr class="hr2">
<form class="c" action="index.php">
	<input type="submit" class="bt" value="<--Volver">
</form>
</body>
</html>