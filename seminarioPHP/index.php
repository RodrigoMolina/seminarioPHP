<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<title>Cinema</title>
</head>
<body>
<div class="cod">
	<?php
	if (isset($_GET['genero'])){
		if ($_GET['genero'] != 'Todas'){
			$g='&genero='.$_GET['genero'];
			$degenero = ' and generos_id = '.$_GET['genero'];
		}else{
			$g='';$degenero='';
		}
	}else{
		$g ='';
		$degenero='';
	}
	if (isset($_GET['anio'])){
		if ($_GET['anio'] != 'Todas'){
			$a='&año='.$_GET['anio'];
			$delanio = ' and anio = '.$_GET['anio'];
		}else{
	  		$a='';
	  		$delanio= '';
	  	}
	}else{
		$a = '';
		$delanio= '';
	}
	if (isset($_GET['nombuscar'])){
		if ($_GET['nombuscar'] != ''){
			$n='&nombuscar='.$_GET['nombuscar'];
			$denombre = " and nombre like '%".$_GET['nombuscar']."%'";
		}else{
			$n = '';
			$denombre = '';
		}
	}else{
		$n = '';
		$denombre = '';
	}
	if (isset($_GET['tipo'])){
		$t='&tipo='.$_GET['tipo'];
		$por = ' order by '.$_GET['tipo'];
	}else{
		$t='';
		$por='';
		$_GET['tipo']='';
	}
	if (isset($_GET['orden'])){
		$o='&orden='.$_GET['orden'];
	}else{
	  $o='';
	  $_GET['orden'] = '';
	}
	if (isset($_GET['pos'])){
	  $inicio=$_GET['pos'];
	}else{
	  $inicio=0;
	}
	?>
</div>
<div class="login">
	<?php
	include('php/conect.php');
	$link = connectdb();
    session_start();
    if (isset($_SESSION['nombre']))
    {
        echo "Bienvenido ".$_SESSION['nombre']." ".$_SESSION['apellido'];
        if ($_SESSION['administrador'])
        	echo '<a href="listadop.php">Administrar</a>';
        ?>
        /
        <a href="php/logout.php">Cerrar Sesion</a>
    <?php
    }
    else
    {
        ?>
        <a href="iniciar.php">Iniciar</a>
        /
        <a href="registro.php">Registarse</a>
        <?php 
    }
    ?>
</div>
<br>
<div class="busqueda c">
	<form action="index.php" method="get">
		<label>Nombre de la Pelicula:</label>
        <?php 
			if (isset($_GET['nombuscar']))
				$otronom = $_GET['nombuscar'];
			else
				$otronom = '';
        ?>
        <input class="selec" value="<?php echo $otronom ?>" name="nombuscar">
        <label>Ordenar por:</label>
        <select name="tipo">
			<label>Ordenar por: </label>
			<option value="Nombre" <?php if (($_GET['tipo']) == 'Nombre'){echo "selected";} ?>>Nombre</option>
			<option value="Anio" <?php if (($_GET['tipo']) == 'Anio'){echo "selected";} ?>>Año</option>
		</select>
        <select name="orden">
			<option value="asc" <?php if (($_GET['orden']) == 'asc'){echo "selected";} ?>>Ascendente</option>
			<option value="desc" <?php if (($_GET['orden']) == 'desc'){echo "selected";} ?>>Desendente</option>
		</select><br>
		<label>Genero:</label>
		<select name="genero">
        <option>Todas</option>
			<?php
			$sql2 = "SELECT * FROM `generos`";
			$result = mysqli_query($link,$sql2);
   			while ($row = mysqli_fetch_array($result)){
				$esono = '';
   				if ($row['id'] == $_GET['genero']){
					$esono = 'selected';
				}
				echo '<OPTION value="'.$row['id'].'"'.$esono.'>'.$row['genero'].'</OPTION>';
			}
    		?>
        </select>
        <label>Año:</label>
        <select name="anio">
        <option>Todas</option>
		<?php
    	$sql3 = "SELECT DISTINCT anio FROM peliculas";
		$result = mysqli_query($link,$sql3);
   		while ($row = mysqli_fetch_array($result)){
			$esono = '';
			if ($row['anio'] == $_GET['anio']){
				$esono = 'selected';
			}
			echo '<OPTION value="'.$row['anio'].'"'.$esono.'>'.$row['anio'].'</OPTION>';
		}
    	?>
        </select>
		<input type="hidden" name="pos" value="0">
	  	<input type="submit" value="Buscar">
	</form>
</div>
<div class="container">
	<div class="peliculas">
		<?php
		$sql = "SELECT peliculas.id, peliculas.nombre, peliculas.anio, peliculas.sinopsis, generos.genero FROM peliculas INNER JOIN generos on peliculas.generos_id = generos.id WHERE 1 = 1 ";
		$sql = $sql.$delanio;
		$sql = $sql.$degenero;
		$sql = $sql.$denombre;
		$sql = $sql.$por;
		$sql = $sql.' '.$_GET['orden'];
		$sql = $sql.' limit '.$inicio.',5';
		$result = mysqli_query($link,$sql);
		$impresos =0;
		$cant = mysqli_num_rows($result);
		if ($cant >0 ){
	    	while ($row = mysqli_fetch_array($result)){   
	    	$impresos++;
			?>						
			<div class="pelicula">  
	  			<div class="imagenpeli">
	    			<a href="php/verMas.php?idPelicula=<?php echo $row ['id']?>">
	          			<img class="imgpeli" src="php/mostrarImagen.php?id=<?php echo $row ['id']?>">
	        		</a>
	    		</div>
		    	<div class="">
		    		<div class="texto_teli">  
						<label class="">Pelicula: </label> <?php echo $row ["nombre"]?><br>
						<label class="">Genero: </label><?php echo $row ["genero"]?><br>
						<label class="">Año: </label><?php echo $row ["anio"]?><br>
						<label class="">Promedio: </label>
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
						<label class="">Sinopsis: </label><?php echo $row ["sinopsis"]?><br>
			        </div>
	    		</div>
	    	</div>
	    	<?php 
			}
		}else{
			echo '<div class="mensaje c n">0 Peliculas encontradas</div>';
		}
		?>
  	</div>
</div>
</div>
<div class="paginado">
	<?php
	if ($inicio==0) 
		echo "Anteriores ";
	else{
		$anterior=$inicio-5;
		echo "<a href=\"index.php?pos=$anterior$g$a$n$t$o\">Anteriores </a>";
	}
	if ($impresos==5){
			$proximo=$inicio+5;
			echo "<a href=\"index.php?pos=$proximo$g$a$n$t$o\">Siguientes</a>";
	}else
			echo "Siguientes";
	?>
</div>	
</body>
</html>