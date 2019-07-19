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

        session_start();
        $Ponderacion = $_SESSION["Ponderacion"];
        echo $Ponderacion;
    if($Ponderacion<=30){
        switch ($NumRandom) {
            case '0':
                $ImagenAMostrar = "img/recurso1.png"; //Ubicacion del archivo 
                $LugarAEnviar = "https://es-la.facebook.com/";//url del lugar donde se redirigira al usuario
                break;
            
            case '1':
                $ImagenAMostrar = "img/recurso1.png";//Ubicacion del archivo ;
                $LugarAEnviar = "https://es-la.facebook.com/";//url del lugar donde se redirigira al usuario
                break;

            case '2':
                $ImagenAMostrar = "img/recurso1.png"; //Ubicacion del archivo ;
                $LugarAEnviar = "https://es-la.facebook.com/";//url del lugar donde se redirigira al usuario
                break;
        }
    }
    else if(($Ponderacion>30)&&($Ponderacion<=60)){
        switch ($NumRandom) {
            case '0':
                $ImagenAMostrar = "img/recurso1.png" ;//Ubicacion del archivo ;
                $LugarAEnviar = "https://es-la.facebook.com/";//url del lugar donde se redirigira al usuario
                break;
            
            case '1':
                $ImagenAMostrar = "img/recurso1.png" ; //Ubicacion del archivo ;
                $LugarAEnviar = "https://es-la.facebook.com/";//url del lugar donde se redirigira al usuario
                break;

            case '2':
                $ImagenAMostrar = "img/recurso1.png";//Ubicacion del archivo ;
                $LugarAEnviar = "https://es-la.facebook.com/";//url del lugar donde se redirigira al usuario
                break;
        }
    }
    else{
        switch ($NumRandom) {
            case '0':
                $ImagenAMostrar = "img/recurso1.png"; //Ubicacion del archivo ;
                $LugarAEnviar = "https://es-la.facebook.com/";//url del lugar donde se redirigira al usuario
                break;
            
            case '1':
                $ImagenAMostrar = "img/recurso1.png"; //Ubicacion del archivo ;
                $LugarAEnviar = "https://es-la.facebook.com/";//url del lugar donde se redirigira al usuario
                break;

            case '2':
                $ImagenAMostrar = "img/recurso1.png";//Ubicacion del archivo ;
                $LugarAEnviar = "https://es-la.facebook.com/";//url del lugar donde se redirigira al usuario
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
                    <a href="<?php echo $LugarAEnviar; ?>" target="_Blank"><img class="ImgFinal" src=<?php echo $ImagenAMostrar; ?> alt="Recurso" ></a>
                </div>
                
            </div>
            <div class="row col-md-12">
                <a class="col-md-6 col-sm-12" href="<?php echo $LugarAEnviar; ?>" target="_Blank"><button id="continuar -link" type="button" class="btn btn-outline-secondary Continuar BotonFinal">RECURSO</button></a>
                <a class="col-md-6 col-sm-12" href="https://campus.ort.edu.ar/educacionsexualintegral" target="_Blank"><button id="continuar -link" type="button" class="btn btn-outline-secondary Continuar BotonFinal">HOME ESI</button></a>
            </div>
        </div>
    </div>

</body>
</html>