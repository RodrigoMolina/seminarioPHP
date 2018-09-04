<html>
<head>
  <title>Altapeli </title>
</head>
<link rel="stylesheet" type="text/css" href="css/estiloas.css">
<body>
<div id="izquierda">
	<?php
	include ('./php/conect.php');
	$sql = "SELECT peliculas.nombre, peliculas.id, peliculas.sinopsis, peliculas.anio, generos.genero FROM peliculas INNER JOIN generos on peliculas.generos_id = generos.id order by peliculas.id";
	$result = mysqli_query($link,$sql);
    while ($row = mysqli_fetch_array($result)){   
	?>
		<div id="peli">
		    <div id="imagen">
				<a href="php/verMas.php?idPelicula=<?php echo $row ['id']?>">
					<img id="fotito" src="php/mostrarImagen.php?idb=<?php echo $row ['id']?>">
				</a>
			</div>
			<div id="descripcion">
				<form>
			       	<label>Nombre de la Pelicula: </label> <?php echo $row ["nombre"]?><p>
			       	<label>Genero: </label><?php echo $row ["genero"]?><p>
			       	<label>Año: </label><?php echo $row ["anio"]?><p>
			       	<label>Sinopsis: </label><?php echo $row ["sinopsis"]?><p>
			       	<label>Promedio: </label>
			       	<?php
			    	$id = $row ["id"];
			    	$sql2 = "SELECT AVG(calificacion) as promedio FROM comentarios WHERE peliculas_id = $id";
					$result2 = mysqli_query($link,$sql2); 
					$row = (mysqli_fetch_array($result2));
					if (!empty($row)){
			        	echo $row ["promedio"];
		    		}else{
		    			echo "No posee comentarios";
		    		}
			        ?><p>
			        <input type="button" id="bregistarse" value="Eliminar">
				</form>
			</div>
    	</div>
	<?php
	}
	?>
</div>
</body>
</html>