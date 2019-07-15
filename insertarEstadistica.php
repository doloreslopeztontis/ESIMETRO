<?php
include("conexion.php");


session_start(); 
if(isset($_GET["idRespuesta"]))
{
    $idRespuesta = $_GET["idRespuesta"];
}

$idUsuario = $_SESSION["idUsuario"];
$idPregunta = $_SESSION["idPregunta"];
insertarEstadistica($conexion);

//funciones
function insertarEstadistica($conexion){
    $sql = mysqli_query($conexion, "CALL insertar_Estadistica($idUsuario, $idPregunta, $idRespuesta)") or die("Query fail: " . mysqli_error($conexion));
}

?>