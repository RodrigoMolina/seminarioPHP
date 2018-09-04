<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../js/all.js"></script>
</head>
<body>
<div class="ttitulo c">
	<label>Detalles de la Pelicula</label>
</div>
<hr class="hr1">
<form class='boton' action="../" method="POST">
	<center>
    <div><input class="bt" type='submit' value='Volver'></div>
    </center>
</form>
<?php
include_once ('conect.php');
$link = connectdb();
$id = $_GET['idPelicula'];
$sql = "SELECT peliculas.nombre, peliculas.id, peliculas.sinopsis, peliculas.anio, generos.genero FROM peliculas INNER JOIN generos on peliculas.generos_id = generos.id WHERE peliculas.id = ".$id;
$result	= mysqli_query($link,$sql); 
$row = (mysqli_fetch_array($result));
?>
<div class="peli2 c">
	<div class="npeli">
		<?php echo $row ['nombre']?> <?php echo "(".$row ['anio'].")"?> <br>
	</div>
	<img src="mostrarImagen.php?id=<?php echo $row ['id']?>"><br>
	<label class="negrita">Genero:</label><?php echo $row ['genero']?><br>
	<label class="negrita">Promedio:</label>
	<?php 
			$peli = $row ['id'];
			$sql = "SELECT AVG(calificacion) as promedio FROM comentarios WHERE peliculas_id = $peli";
			$result	= mysqli_query($link,$sql); 
			$row = (mysqli_fetch_array($result));
			if ( $row[0] !=null ){
		        echo $row ["promedio"];
	    	}else{
				echo "<div class='mensaje'>No posee comentarios</div>";
			}
			?><br>	
</div>
<?php
		session_start();
		$idu = $_SESSION['idu'];
		$sql = "SELECT * FROM comentarios WHERE peliculas_id = $peli and usuarios_id = $idu";
		$result = mysqli_query($link,$sql); 
		$row = (mysqli_fetch_array($result));
		include_once('usuario.php');
		$u = new Usuario();
    	if (($u->islogin()) && ($row == 0)){?>
    		<div class="ncomentario">
    		<center>
    		<form class="form-control" action="altacomen.php" onsubmit="return validarcomen()" method="POST">
				<label>Comentario:</label><br>
					<textarea id="texto" name="texto"></textarea>
				<br>
				<label for="valor">Valoracion:
					<select name="valor">
					<?php
						$num = 5;
						for ($i=1; $i<=$num ; $i++)
							echo "<option value=".$i.">".$i."</option>"
					?>
				</select> 
				</label>
				<br>
				<input type="hidden" name="idpeli" value="<?php echo $id ?>">
				<?php
				if (isset($_GET['error']) && ($_GET['error'] == '1')){
					echo "<div class='error'> Ingrese Comentario </div>";
				}
				?>
    			<button class="bt" type="submit">Agregar Comentario</button>
			</form>
			</center>
		<?php
    	}
    echo '</div>';
?>
<div id="tcomentarios">
	<?php 
		$sql2 = "SELECT * FROM `comentarios` INNER JOIN usuarios WHERE comentarios.usuarios_id = usuarios.id AND comentarios.peliculas_id = ".$peli;
		$mas = " ORDER BY `fecha` ASC";
		$sql2 = $sql2.$mas;
		$result = mysqli_query($link,$sql2);
    	while ($row = mysqli_fetch_array($result)){ 
    	?>
    	<div id="tcomentario">
    		<div class="comentario">
				<label class="negrita">Nombre: <?php echo $row ['nombre']?></label><br>
				<label class="negrita">Apellido: <?php echo $row ['apellido']?></label><br>
				<label class="negrita">Comentario: <?php echo $row ['comentario']?></label><br>
    			<label class="negrita">Calificacion: </label>
				<?php
				$cant = $row ['calificacion'];
				for ($num = 0; $num < $cant; $num++){
					echo '<img id="cali" src="../images/estrellita.jpg">';
				}
				?>
    		</div>
        </div>
        <?php
        }
	?>
</div>
<hr class="hr2">
<form class='boton' action="../" method="POST">
	<center>
    <div><input class="bt" type='submit' value='Volver'></div>
    </center>
</form>	
</body>
</html>



