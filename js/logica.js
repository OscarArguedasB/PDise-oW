$(document).ready(function () {
    //$("#pnlMensaje").slideToggle("slow");

    ;

    $("#btEnviar").click(function () {
        ingresaTutoria($("#nombreAlumno").val(), $("#idProfesor").val(), $("#idDia").val(), 
        $("input[name='hora']:checked").val(), $("#asunto").val());
    });

    $("#btRestablecer").click(function () {
        LimpiaCampos();
    });
    

});

