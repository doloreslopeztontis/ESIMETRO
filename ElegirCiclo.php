<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">

    <title>Elegir Ciclo</title>
</head>
<body>
    <?php include("Baner.php");
    $Array = array("CICLO SUPERIOR","CICLO BASICO","PADRE");
    ?>

   <div class="container-fluid">
        <div class="ContenedorPregunta">
            <div class="row col-md-12 justify-content-center FondoBlanco">
                <p class="Pregunta center">¿En que ciclo est&aacute;s?</p>
            </div>
            <?php foreach($Array as $NombreCategoria): ?>
                <div class="row col-md-12 FondoBlanco">
                    <button type="button" class="btn btn-outline-secondary Respuesta"><?php echo $NombreCategoria;?></button>
                </div>
            <?php endforeach; ?>
               
        </div>
   </div>
</body>
</html>

    <!-- hago un while mientras siga habiendo mas categorias(nose en que forma me las va a mandar iris)
                < ?php while ()?> {
                    <button type="button" class="btn btn-outline-secondary Respuesta">< ?php echo $VariableConCategoria;?></button>
                } -->