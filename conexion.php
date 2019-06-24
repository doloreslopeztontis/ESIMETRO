<?php
/*Datos de conexion a la base de datos*/
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "esimetro_db";
 
$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysqli_set_charset($conexion, 'utf8'); 
if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}
?>