<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="mainajax.js"></script>

    <title>Elegir Ciclo</title>
</head>


<body>
    <?php include("Baner.php"); ?>
<!--html-->
   <div class="container-fluid">
        <div class="ContenedorPregunta">
            <div class="row col-md-12 justify-content-center FondoBlanco">
                <p class="Pregunta center">¿En que ciclo est&aacute;s?</p>
            </div>
    <?php
    
    include("conexion.php");

    session_start();
    session_unset();

    $sql = mysqli_query($conexion, "CALL traer_UltimaEstadistica(@ultimaestadistica)") or die ("Query fail: " . mysqli_error($conexion));
    $resultado = mysqli_query($conexion, "select @ultimaestadistica") or die ("Query fail: " . mysqli_error($conexion));
    $row = mysqli_fetch_array($resultado);
    $ultimousuario = $row[0];
    $_SESSION["idUsuario"] = $ultimousuario + 1;
	$_SESSION["Ponderacion"]=0;

    traerCategorias($conexion);       

	function traerCategorias($conexion){
		//esta linea obtiene las categorias y las guarda en $categoriasResultado
		$sql = mysqli_query($conexion, "CALL listar_Categorias()") or die("Query fail: " . mysqli_error($conexion));
		//$categoriasResultado = $conexion -> query ($sql);
        //acá se esta guardando en una variable lo que trajo la query ($categoriasResultado). hay diferentes tipos de arrays, pero yo asumi que era uno asociativo
		//$categorias = $sql -> fetch_array(MYSQLI_ASSOC);
         while ($categorias = mysqli_fetch_array($sql)){   
    
    ?>
    <div class="row col-md-12 FondoBlanco">
        <button id="ciclos-link" type="button" class="btn btn-outline-secondary Respuesta"><?php echo $categorias[1];?></button>
    </div>
    <?php } mysqli_close($conexion);}?>
               
        </div>
   </div>
    
</body>

</html>
