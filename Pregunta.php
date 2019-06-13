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
    
    $Contador=0;

    ?>
    <div class="container-fluid">
        <div class="ContenedorPregunta">
            <div class="row col-md-12 justify-content-center FondoBlanco">
                <p class="Pregunta center"><?php echo $Preguntas[$Contador]?></p>
            </div>
            <div class="row col-md-12 FondoBlanco">
            <?php for($i = 0; $i<4; $i++): ?>
                <button type="button" class="btn btn-outline-secondary Respuesta"><?php $Respuestas[$Contador][i].pregunta ?></button>
            <?php endfor?>
            </div>
        </div>
    </div>

</body>
</html>