<?php

$ultimousuario = 0;
include("conexion.php");
traerUltimaEstadistica($conexion);

session_start();
$_SESSION["idUsuario"] = $ultimousuario + 1;

function traerUltimaEstadistica($conexion){
    //no estoy segura que el stored procedure se llame asi, pero no lo encontre en la bdd
    $sql = mysqli_query($conexion, "CALL traer_UltimaEstadistica(@ultimaestadistica)") or die ("Query fail: " . mysqli_error($conexion));
    $ultimousuario = mysqli_query($conexion, 'select @ultimaestadistica') or die ("Query fail: " . mysqli_error($conexion));;
}

?>