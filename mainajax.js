function ClickPregunta(){
    console.log("click!");
        var request = $.ajax({
            url: 'insertarEstadistica.php',
            type: 'POST',
            dataType: 'text',
            data: ({
                idRespuesta:"value"
            }),
            success: function(data){
                console.log(request.idRespuesta);
            }
        });       
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
            type: 'POST'
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

    $('#respuestasForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
          type: 'POST',
          url: 'insertarEstadistica.php',
          data: $('#respuestasForm').serialize() ,
          success: function () {
            //console.log(data.)
          }
        });
    });
});

//$( "#main-container" ).load( "Pregunta.php #pregunta-container" );
