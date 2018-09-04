<html>
<head>
	<title>Listado de Generos</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<div class="ttitulo c">
	<label>Listado de Generos</label>
</div>
<hr class="hr1">
<center>
<table border="2" style="width:50%">
  <tr>
    <th>Id</th>
    <th>Genero</th>
    <th>Editar</th>
  </tr>
<?php
include_once ('./php/conect.php');
$link = connectdb();
$sql = "SELECT * from generos";
$result = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($result)){	 
?>
	<?php echo "<tr>"?>	 
	<?php echo "<th>".$row ["id"]."</th>"?>
	<?php echo "<th>".$row ["genero"]."</th>"?>
	<?php echo "<th><a href='modificarc.php'>Modificar</a>/<a href='eliminarc.php'>Eliminar</a></th>"?>
	<?php echo "<tr>"?>
<?php
}
?>
</div>
</table> 
<hr class="hr2">
	<form action="">
	<label class="campo" ="">Nuevo Genero: </label><input type="text"><input type="submit" value="Agregar">
	</form>
<hr class="hr1">
<form action="index.php">
		<input type="submit" class="bregistarse" value="<--Volver">
	</form>
</body>
</html>