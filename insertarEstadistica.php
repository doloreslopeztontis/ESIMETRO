<?php

$servidor = "localhost";
$nombreusuario = "root";
$password = "";
$conexion = new mysqli($servidor,$nombreusuario,$password);

verifconexion($conexion);

session_start(); 
$idUsuario = $_SESSION["idUsuario"];
$idPregunta = $_SESSION["idPregunta"];
$idRespuesta = $_SESSION["idRespuesta"];
insertarEstadistica($conexion);

//funciones
function verifconexion($conexion){
    if ($conexion -> connect_error ){
        die("conexion fallida: ". $conexion -> connect_error);
    }   
}

function insertarEstadistica($conexion){
    $sql = mysqli_query($conexion, "CALL listar_Categorias ($idUsuario, $idPregunta, $idRespuesta)") or die("Query fail: " . mysqli_error($conexion));
}

?>