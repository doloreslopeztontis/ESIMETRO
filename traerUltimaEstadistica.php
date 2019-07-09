<?php
  
include("conexion.php");
traerUltimaEstadistica($conexion);

session_start();
$_SESSION["idUsuario"];
$_SESSION["idUsuario"] = $ultimaestadistica + 1;

function traerUltimaEstadistica($conexion){
    //no estoy segura que el stored procedure se llame asi, pero no lo encontre en la bdd
    $sql = mysqli_query($conexion, "CALL traer_UltimaEstadistica()") or die ("Query fail: " . mysqli_error($conexion));
    $ultimaestadistica = $conexion -> query($sql);
}

?>