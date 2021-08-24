$(document).ready(function () {
    $('#btEnviar').click(function () {
        var datos = $('#msj').serialize();
        $.ajax({
            data: datos,
            url: 'insertaMensaje.php',
            type: 'POST',
            success: function (r) {
                envioExitoso(r);
                
            },
            error: function (r) {
                envioFallido(r);
            }
        });
        return false;
    });
    $('#btUpdate').click(function () {
        var datos2 = $('#updateUser').serialize();
        $.ajax({
            data: datos2,
            url: 'updateUser.php',
            type: 'POST',
            success: function (r) {
                updateExitoso(r);
            },
            error: function (r) {
                updateFallido(r);
            }
        });
        return false;
    });
});


function envioExitoso(TextoJson) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>' + TextoJson + '</p>');
    LimpiaCampos();
}

function envioFallido(TextoJson) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>Ocurrio un error en el servidor</p>' + TextoJson.responseText);
}

function updateExitoso(TextoJson) {
    $("#pnlUpdate").dialog();
    $("#pnlUpdate").html('<p>' + TextoJson + '</p>');
    document.write("Actualizacion exitosa, redirigiendo...");
    setTimeout( function() { window.location.href = "index.php"; }, 2000 );
}

function updateFallido(TextoJson) {
    $("#pnlUpdate").dialog();
    $("#pnlUpdate").html('<p>Ocurrio un error en el servidor</p>' + TextoJson.responseText);
}
function LimpiaCampos(){
    $('#name').val('');
    $('#from').val('');
    $('#message').val('');
}