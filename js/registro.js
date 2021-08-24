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
});

function insercionRegistroExitosa(TextoJson) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>' + TextoJson + '</p>');
}

function insercionRegistroErronea(TextoJson) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>Ocurrio un error en el servidor</p>' + TextoJson.responseText);
}