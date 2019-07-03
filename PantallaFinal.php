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
        $NumRandom = rand (0 ,2 );
        echo $NumRandom;

    if($Ponderacion<=30){
        switch ($NumRandom) {
            case '0':
                $ImagenAMostrar = //Ubicacion del archivo ;
                $LugarAEnviar = //url del lugar donde se redirigira al usuario
                break;
            
            case '1':
                $ImagenAMostrar = //Ubicacion del archivo ;
                $LugarAEnviar = //url del lugar donde se redirigira al usuario
                break;

            case '2':
                $ImagenAMostrar = //Ubicacion del archivo ;
                $LugarAEnviar = //url del lugar donde se redirigira al usuario
                break;
        }
    }
    else if(($Ponderacion>30)&&($Ponderacion<=60)){
        switch ($NumRandom) {
            case '0':
                $ImagenAMostrar = //Ubicacion del archivo ;
                $LugarAEnviar = //url del lugar donde se redirigira al usuario
                break;
            
            case '1':
                $ImagenAMostrar = //Ubicacion del archivo ;
                $LugarAEnviar = //url del lugar donde se redirigira al usuario
                break;

            case '2':
                $ImagenAMostrar = //Ubicacion del archivo ;
                $LugarAEnviar = //url del lugar donde se redirigira al usuario
                break;
        }
    }
    else{
        switch ($NumRandom) {
            case '0':
                $ImagenAMostrar = //Ubicacion del archivo ;
                $LugarAEnviar = //url del lugar donde se redirigira al usuario
                break;
            
            case '1':
                $ImagenAMostrar = //Ubicacion del archivo ;
                $LugarAEnviar = //url del lugar donde se redirigira al usuario
                break;

            case '2':
                $ImagenAMostrar = //Ubicacion del archivo ;
                $LugarAEnviar = //url del lugar donde se redirigira al usuario
                break;
        }
    }
    ?>

    <div class="container-fluid">
        <div class="ContenedorPregunta">
            <div class="row col-md-12 justify-content-center FondoBlanco">
                <p class="Pregunta center">TERMINASTE, ¡FELICITACIONES!</p>
            </div>
            <div class="row col-md-12 FondoBlanco">
                <div class="row col-md-12 justify-content-center FondoBlanco TextoFinal">
                    <p class="TestoDato TextoFinal center">Te recomendamos que sigas aprendiendo y buscando nueva información. Aca tenes por donde podrias empezar:</p>
                </div>
            </div>
            <div class="row col-md-12 FondoBlanco">
                <div class="row col-md-12 justify-content-center FondoBlanco ">
                    <a href="<?php echo $LugarAEnviar; ?>"><img class="ImgFinal" src="img/recurso1.png" alt="Recurso"></a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>