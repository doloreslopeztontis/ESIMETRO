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

    <title>Pregunta</title>
</head>


<body>

    <?php    
    //TODAVIA NO ME PASARON QUE CATEGORIA ES SELECCIONADA
    include("Baner.php");
    //include("conexion.php");

    session_start();
    if (!isset($_SESSION['Contador'])){ //si la variable Contador no esta seteada que la incialice en 0
        $_SESSION['Contador'] = 0;        
    }

    //clases
    class Respuesta{
        //El idPregunta no lo agrego porque es la posición del primer array + 1
        public $opcion;
        public $respuesta;
        public $ponderacion;
    };

    class Preguntas{
        public $Categoria;
        public $Pregunta;
        public $TextoFinal; 
    };

    class Categoria{
        public $idCategoria;
        public $NombreCategoria;
    };
    

    //la linea de abajo la comente porque no entiendo para que servia
    //array[Preguntas] = new array ArrayADevolver; 
    
    $ArrayPreguntas = ObtenerArrayPreguntas();
    $ArrayRespuestas = obtenerArrayRespuestas();
    
    //HARCODEO EL ARRAY
    /*$respuesta1 = new Respuesta();
    $respuesta1->respuesta = 'Si, claro';
    $respuesta1->ponderacion = 40;

    $respuesta2 = new Respuesta();
    $respuesta2->respuesta = 'No, de ninguna forma';
    $respuesta2->ponderacion = 20;

    $respuesta3 = new Respuesta();
    $respuesta3->respuesta = 'Puede que si';
    $respuesta3->ponderacion = 30;

    $respuesta4 = new Respuesta();
    $respuesta4->respuesta = 'Tal vez';
    $respuesta4->ponderacion = 10;

    $respuesta5 = new Respuesta();
    $respuesta5->respuesta = 'aaaa';
    $respuesta5->ponderacion = 40;

    $respuesta6 = new Respuesta();
    $respuesta6->respuesta = 'bbbb';
    $respuesta6->ponderacion = 20;

    $respuesta7 = new Respuesta();
    $respuesta7->respuesta = 'ccccc';
    $respuesta7->ponderacion = 30;

    $respuesta8 = new Respuesta();
    $respuesta8->respuesta = 'dddddd';
    $respuesta8->ponderacion = 10;

    $Respuestas = array
    (   
        //esto lo tiene que traer de la bd dinamicamente
        array($respuesta1, $respuesta2, $respuesta3, $respuesta4),
        array($respuesta5, $respuesta6, $respuesta7, $respuesta8)
    );
    */


    function ObtenerArrayPreguntas(){
        include("conexion.php");
        $idCategoria=6;
        $sql = mysqli_query($conexion, "CALL listar_Preguntas ($idCategoria)") or die("Query fail: " . mysqli_error($conexion));
        //yo en este caso usaria la palabra query en vez de prepare, pero no entiendo la diferencia
        //$Resultado = $conexion->prepare($sql);
        
        $Contador = 0;    
        $Objeto = new Preguntas();
            while ($row = mysqli_fetch_array($sql)){  
        
                $Objeto->Categoria = $row[1];
                $Objeto->Pregunta = $row[2];
                $Objeto->TextoFinal = $row[3];

                $ArrayADevolver[$Contador] =  $Objeto;
                $Contador++;
            }
        
        mysqli_close($conexion);
    
        return $ArrayADevolver;    
    }

    function obtenerArrayRespuestas(){
        include("conexion.php");
        $idPregunta = $_SESSION["Contador"];
        $sql = mysqli_query($conexion, "CALL listar_Respuestas ($idPregunta)") or die("Query fail: " . mysqli_error($conexion));
        $opcion;
        $respuesta;
        $ponderacion;
        $Contador = 0;    
        $Objeto = new Respuesta();
        while ($row = mysqli_fetch_array($sql)){  
                $Objeto->opcion = $row[1];
                $Objeto->respuesta = $row[2];
                $Objeto->ponderacion = $row[3];

                $ArrayADevolver[$Contador] =  $Objeto;
                $Contador++;
            }
        
        mysqli_close($conexion);
    
        return $ArrayADevolver;    
    }

    ?>


    <!--html-->
    <div class="container-fluid">
        <div class="ContenedorPregunta">
            <div class="row col-md-12 justify-content-center FondoBlanco">
                <p class="Pregunta center"><?php echo $ArrayPreguntas[$_SESSION['Contador']]->Pregunta; ?></p>
            </div>
            <div class="row col-md-12 FondoBlanco">
            <?php $index = 0; 
            foreach($ArrayRespuestas as $respuesta){ ?> 
                    <button id="pregunta-link"></button><p class="btn btn-outline-secondary Respuesta Res"><?php echo $Respuestas[$_SESSION['Contador']][$index]->respuesta; ?></p>
                    <?php
                    $index++;
                    } ?>
            </div>
        </div>
    </div>

</body>
</html>