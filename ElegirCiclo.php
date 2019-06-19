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

    <?php
    include("Baner.php");
    $Array = array("CICLO SUPERIOR","CICLO BASICO","PADRE","HOLA","HOLA","HOLA");
    //este array lo tiene que traer de la bd dinamicamente y estar lleno de objetos Categoria !!! 
    //el id de la categoria clickeada tiene que ser pasada como value 
    ?>
   <div class="container-fluid">
        <div class="ContenedorPregunta">
            <div class="row col-md-12 justify-content-center FondoBlanco">
                <p class="Pregunta center">¿En que ciclo est&aacute;s?</p>
            </div>
            <?php foreach($Array as $categoria): ?>
                <div class="row col-md-12 FondoBlanco">
                    <button id="ciclos-link" type="button" class="btn btn-outline-secondary Respuesta"><?php echo $categoria;?></button>
                </div>
                <!--agregar value="$categoria->id" al boton-->
                <!--reemplazar echo $categoria por echo $categoria->Nombre-->
            <?php endforeach; ?>
               
        </div>
   </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="mainajax.js"></script>
</body>

</html>
