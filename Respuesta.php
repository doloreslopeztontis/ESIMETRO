<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">
    <title>Sabias que...</title>
</head>
<body>
    <?php include("Baner.php");
    session_start(); 

    //$TextosFinales=array($respuesta1, $respuesta2, $respuesta3, $respuesta4);
    ?>

    <div class="container-fluid">
        <div class="ContenedorPregunta">
            <div class="row col-md-12 justify-content-center FondoBlanco">
                <p class="Pregunta center">Sabias que...</p>
            </div>
            <div class="row col-md-12 FondoBlanco">
                <div class="row col-md-12 justify-content-center FondoBlanco">
                    <p class="TestoDato center"><?php $Respuestas[ $_SESSION['Contador']].TextoFinal ?></p>
                </div>
            </div>
            <div class="row col-md-12 FondoBlanco">
                <button type="button" class="btn btn-outline-secondary Continuar">CONTINUAR</button>
            </div>
        </div>
    </div>

    <?php 
        $_SESSION['Contador'] = $_SESSION['Contador'] + 1;
    ?>

</body>
</html>