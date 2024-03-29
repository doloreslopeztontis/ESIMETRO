<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="mainajax.js"></script>

    <title>Sabias que...</title>
</head>


<body>
    <?php include("Baner.php");
    include ("conexion.php");
    session_start();

    ?>

    <div class="container-fluid">
        <div class="ContenedorPregunta">
            <div class="row col-md-12 justify-content-center FondoBlanco">
                <p class="Pregunta center">SABIAS QUE...</p>
            </div>
            <div class="row col-md-12 FondoBlanco">
                <div class="row col-md-12 justify-content-center FondoBlanco">
                    <p class="TextoDato center"><?php echo $_SESSION["textoFinal"]; ?></p>
                </div>
            </div>
            <div class="row col-md-12 FondoBlanco">
                <button id="continuar-link" type="button" class="btn btn-outline-secondary Continuar">CONTINUAR</button>
            </div>
        </div>
    </div>

    <?php 
        $_SESSION["Contador"] = $_SESSION["Contador"] + 1;
    ?>

</body>
</html>