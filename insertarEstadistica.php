<?php
include("conexion.php");

session_start(); 
if(isset($_POST["idRespuesta"]))
{
    $idRespuesta = $_POST["idRespuesta"];
    echo $_POST["idRespuesta"];
}

/*$idRespuesta=1;
$idPregunta=1;
$idUsuario=1;*/

$idUsuario = $_SESSION["idUsuario"];
$idPregunta = $_SESSION["idPregunta"];
$sql = mysqli_query($conexion, "CALL insertar_Estadistica($idUsuario, $idPregunta, $idRespuesta)") or die("Query fail: " . mysqli_error($conexion));
/*
insertarEstadistica($conexion);

//funciones
function insertarEstadistica($conexion, $idPregunta, $idRespuesta, $idUsuario){
    $sql = mysqli_query($conexion, "CALL insertar_Estadistica($idUsuario, $idPregunta, $idRespuesta)") or die("Query fail: " . mysqli_error($conexion));
}
*/
?>