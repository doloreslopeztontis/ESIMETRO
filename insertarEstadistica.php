<?php
include("conexion.php");

session_start(); 
if(isset($_POST["respuesta"]))
{
    $idRespuesta = $_POST["respuesta"];
    echo $_POST["respuesta"];
}

$idUsuario = $_SESSION["idUsuario"];
$idPregunta = $_SESSION["Contador"]+1;
$sql = mysqli_query($conexion, "CALL insertar_Estadistica($idUsuario, $idPregunta, $idRespuesta)") or die("Query fail: " . mysqli_error($conexion));

?>