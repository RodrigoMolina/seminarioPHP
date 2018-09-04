<html>
<head>
  <title>Listado de Peliculas </title>
</head>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<body>
<?php
	session_start();
	if (!isset($_SESSION['nombre'])){
		header("Location: iniciar.php");
	}
?>
<div class="ttitulo c">
	<label>Listado de Peliculas</label>
</div>
<center>
<div class="menu">	
	<ul class="ult">
		<li class="lit"><a href="index.php">Home</a></li>
		<li class="lit"><a href="">|</a></li>
		<li class="lit"><a href="altapeli.php">Alta Pelicula</a></li>
		<li class="lit"><a href="">|</a></li>
		<li class="lit"><a href="generos.php">Generos</a></li>
	</ul> 
</div>
<a href="php/logout.php">Cerrar Sesion</a></li>
<hr class="hr1">
<?php 
if (isset($_SESSION['error'])){
	echo '<div class="mensaje">';
	echo $_SESSION["error"];
	echo '</div>';
	unset($_SESSION["error"]);
}
?>
</center>
<div class="peliculas">
	<?php
	include ('./php/conect.php');
	$link = connectdb();
	$sql = "SELECT peliculas.nombre, peliculas.id, peliculas.sinopsis, peliculas.anio, generos.genero FROM peliculas INNER JOIN generos on peliculas.generos_id = generos.id order by peliculas.id";
	$result = mysqli_query($link,$sql);
    while ($row = mysqli_fetch_array($result)){   
	?>
		<div class="pelicula">
			
		<label class="n">Pelicula: </label> <?php echo $row ["nombre"]?>&nbsp;&nbsp;&nbsp;&nbsp;
    	<label class="n">Genero: </label><?php echo $row ["genero"]?><br>
    	<label class="n">Año: </label><?php echo $row ["anio"]?>&nbsp;&nbsp;&nbsp;&nbsp;
    	<label class="n">Promedio: </label>
    	<?php
    		$id = $row ["id"];
    		$sql2 = "SELECT AVG(calificacion) as promedio FROM comentarios WHERE peliculas_id = $id";
			$result2 = mysqli_query($link,$sql2); 
			$row2 = (mysqli_fetch_array($result2));
			if (!empty($row2)){
    			echo $row2 ["promedio"];
			}else{
				echo "No posee comentarios";
			}
    	?>
    	<br>
    	<label class="n">Sinopsis: </label><?php echo $row ["sinopsis"]?><br>
    	<form  method="GET" action="modificarpeli.php">
        <input type="hidden" name="idp" value="<?php echo $id ?>">
        <input class="" type="submit" value="Modificar">
	    </form>
		<form method="POST" action="php/borrarpeli.php" onsubmit="return confirm('Eliminar Pelicula? Los comentarios de peliucla se eliminaran')">
			<input type="hidden" name="id" value="<?php echo $id ?>">
        	<input class="" type="submit" value="Borrar">
   		</form>	
		</div>
	<?php
	}
	?>
</div>
<hr class="hr2">
<center>
	<form action="index.php">
		<input type="submit" class="bregistarse" value="<--Volver">
	</form>
</center>
</body>
</html>