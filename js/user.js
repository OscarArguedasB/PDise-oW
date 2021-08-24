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
});
function envioExitoso(TextoJson) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>' + TextoJson + '</p>');
}

function envioFallido(TextoJson) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>Ocurrio un error en el servidor</p>' + TextoJson.responseText);
}