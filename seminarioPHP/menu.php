<html>
<head>
  <title>Menu</title>
</head>
<link rel="stylesheet" type="text/css" href="css/estiloas.css">
<body>
<?php
$link = connectdb();
$sql = "SELECT * from generos";
$result = mysqli_query($link,$sql);
echo "<ul>";
while ($row = mysqli_fetch_array($result)){	 
?>
	<?php echo "<th><a href='eliminarc.php'>".$row ["genero"]."</a></th>"?>
<?php
}
echo "</ul>";
?>
</body>
</html>