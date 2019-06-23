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

    <?php
    include("Baner.php");
    session_start();
    //$Array = array("CICLO SUPERIOR","CICLO BASICO","PADRE","HOLA","HOLA","HOLA");
    //este array lo tiene que traer de la bd dinamicamente y estar lleno de objetos Categoria !!! 
    
	$servidor = "localhost";
    $nombreusuario = "root";
    $password = "";
    $conexion = new mysqli($servidor,$nombreusuario,$password);

    verifconexion($conexion);
    traerCategorias($conexion);    

    //funciones
    function verifconexion($conexion){
        if ($conexion -> connect_error ){
            die("conexion fallida: ". $conexion -> connect_error);
        }   
    }

	function traerCategorias($conexion){
		//esta linea obtiene las categorias y las guarda en $categoriasResultado
		$sql = mysqli_query($conexion, "CALL listar_Categorias()") or die("Query fail: " . mysqli_error($conexion));
		$categoriasResultado = $conexion -> query ($sql);
        //acá se esta guardando en una variable lo que trajo la query ($categoriasResultado). hay diferentes tipos de arrays, pero yo asumi que era uno asociativo
		$categorias = $categoriasResultado -> fetch_array(MYSQLI_ASSOC);	
    }	
    
    ?>
   

   <!--html-->
   <div class="container-fluid">
        <div class="ContenedorPregunta">
            <div class="row col-md-12 justify-content-center FondoBlanco">
                <p class="Pregunta center">¿En que ciclo est&aacute;s?</p>
            </div>
            <?php foreach($categorias as $categoria): ?>
                <div class="row col-md-12 FondoBlanco">
                    <button id="ciclos-link" type="button" class="btn btn-outline-secondary Respuesta"><?php echo $categoria;?></button>
                </div>
            <?php endforeach; ?>
               
        </div>
   </div>
    
</body>

</html>
