<?php
include("conexion.php");


session_start(); 
$idUsuario = $_SESSION["idUsuario"];
$idPregunta = $_SESSION["idPregunta"];
$idRespuesta = $_SESSION["idRespuesta"];
insertarEstadistica($conexion);

//funciones
function insertarEstadistica($conexion){
    $sql = mysqli_query($conexion, "CALL listar_Categorias ($idUsuario, $idPregunta, $idRespuesta)") or die("Query fail: " . mysqli_error($conexion));
}

?>