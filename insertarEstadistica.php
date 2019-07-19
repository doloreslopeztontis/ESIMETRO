<?php
include("conexion.php");

session_start(); 
if(isset($_POST["respuesta"]))
{
    $idRespuesta = $_POST["respuesta"];
}

$idUsuario = $_SESSION["idUsuario"];
$idPregunta = $_SESSION["Contador"]+1;
$sql = mysqli_query($conexion, "CALL insertar_Estadistica($idUsuario, $idPregunta, $idRespuesta)") or die("Query fail: " . mysqli_error($conexion));


$sql = mysqli_query($conexion, "CALL traer_Ponderacion($idPregunta, $idRespuesta)") or die ("Query fail: " . mysqli_error($conexion));
$row = mysqli_fetch_array($sql);
$ponderacion = $row[0];
$_SESSION["Ponderacion"] += $ponderacion;

?>