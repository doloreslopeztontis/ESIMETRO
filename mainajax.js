function ClickPregunta(elem){
    console.log("click!");
    console.log(elem.val);
        var request = $.ajax({
            url: 'insertarEstadistica.php',
            type: 'get',
            dataType: 'html',
            data: {
                idRespuesta:$(elem).val()
            }
        });
  
            request.done( function ( data ) {
                $('#ciclos-link').html( data );
            });
            request.fail( function ( jqXHR, textStatus) {
                console.log( 'Sorry: ' + textStatus );
            });
        
        $("body").load("Respuesta.php");
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
        
        var request = $.ajax({
            url: 'traerUltimaEstadistica.php',
            type: 'get',
            dataType: 'html'
        });
  
            request.done( function ( data ) {
                $('#ciclos-link').html( data );
            });
            request.fail( function ( jqXHR, textStatus) {
                console.log( 'Sorry: ' + textStatus );
            });

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
