function ClickPregunta(elem){
    console.log("click!");
        var request = $.ajax({
            url: 'insertarEstadistica.php',
            type: 'POST',
            dataType: 'text',
            data: {
                respuesta:elem.value
            },
            success: function(data){
                console.log(request.data);
                $("body").load("Respuesta.php");
            }
        });       
}

function TerminarJuego(){
    console.log("fin!!!");
    $("body").load("PantallaFinal.php");
}


$(document).ready(function() { 
    console.log( "ready!" );    

    //click en boton de bienvenida
    $("#index-link").click(function () {
        console.log( "click!" );
        $("body").load("ElegirCiclo.php");
        }
    );

    //click en una categoria
    $("#ciclos-link").click(function () {
        console.log( "click!" );
        $("body").load("Pregunta.php");
        }
    );

    //click en continuar
    $("#continuar-link").click(function () {
        console.log( "click!" );
        $("body").load("Pregunta.php");
        }
    ); 

});

//$( "#main-container" ).load( "Pregunta.php #pregunta-container" );
