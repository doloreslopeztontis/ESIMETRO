<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">

    <title>Pregunta</title>
</head>
<body>
    <?php 
    include("Baner.php");
    session_start();
    if (!isset($_SESSION['Contador'])){ //si la variable Contador no esta seteada que la incialice en 0
        $_SESSION['Contador'] = 0;
        
    }

    class Respuesta
    {
        //El idPregunta no lo agrego porque es la posición del primer array
        //La opción tampoco la agrego porque es la posición del segundo array
        public $respuesta;
        public $ponderacion;
    }

    $respuesta1 = new Respuesta();
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

    $Preguntas = array("hotel?","Trivago");
    ?>
    <div class="container-fluid">
        <div class="ContenedorPregunta">
            <div class="row col-md-12 justify-content-center FondoBlanco">
                <p class="Pregunta center"><?php echo $Preguntas[$_SESSION['Contador']]?></p>
            </div>
            <div class="row col-md-12 FondoBlanco">
            <?php $index = 0; 
            foreach($Respuestas as $respuesta){ ?> 
                    <p class="btn btn-outline-secondary Respuesta Res"><?php echo $Respuestas[$_SESSION['Contador']][$index]->respuesta; ?></p>
                    <?php
                    $index++;
                    } ?>
            </div>
        </div>
    </div>

</body>
</html>