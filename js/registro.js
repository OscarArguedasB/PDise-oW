$(document).ready(function () {
    $('#btRegister').click(function () {
        var datos = $('#registro').serialize();
        $.ajax({
            data: datos,
            url: 'insertaRegistro.php',
            type: 'POST',
            success: function (r) {
                insercionRegistroExitosa(r);
            },
            error: function (r) {
                insercionRegistroErronea(r);
            }
        });
        return false;
    });
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
    LimpiaCampos();
}

function envioFallido(TextoJson) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>Ocurrio un error en el servidor</p>' + TextoJson.responseText);
}

function insercionRegistroExitosa(TextoJson) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>' + TextoJson + '</p>');
}

function insercionRegistroErronea(TextoJson) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>Ocurrio un error en el servidor</p>' + TextoJson.responseText);
}
function LimpiaCampos(){
    $('#name').val('');
    $('#from').val('');
    $('#message').val('');
}