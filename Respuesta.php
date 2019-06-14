<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <title>Pantalla final</title>
</head>
<body>
    <?php include("Baner.php"); ?>

    <div class="container-fluid">
        <div class="ContenedorPregunta">
            <div class="row col-md-12 justify-content-center FondoBlanco">
                <p class="Pregunta center">Sabias que...</p>
            </div>
            <div class="row col-md-12 FondoBlanco">
                <div class="row col-md-12 justify-content-center FondoBlanco">
                    <p class="TestoDato center"><?php $Respuestas[$Contador].pregunta ?></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>