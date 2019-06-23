<?php
  
$servidor = "localhost";
$nombreusuario = "root";
$password = "";
$conexion = new mysqli($servidor,$nombreusuario,$password);

verifconexion($conexion);
traerUltimaEstadistica($conexion);

session_start();
$_SESSION["idUsuario"];
$_SESSION["idUsuario"] = $ultimaestadistica + 1;

//funciones
function verifconexion($conexion){
    if ($conexion -> connect_error ){
        die("conexion fallida: ". $conexion -> connect_error);
    }   
}

function traerUltimaEstadistica($conexion){
    //no estoy segura que el stored procedure se llame asi, pero no lo encontre en la bdd
    $sql = mysqli_query($conexion, "CALL traer_UltimaEstadistica()") or die ("Query fail: " . mysqli_error($conexion));
    $ultimaestadistica = $conexion -> query($sql);
}

?>