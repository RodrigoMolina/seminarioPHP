<?php
function connectdb(){
$servername = "localhost";
$username = "root";
$password = "";
$db = "cine";
$link = mysqli_connect($servername,$username,$password,$db) or 
    die("Error: No es posible establecer la conexion");
return $link;
}