$(document).ready(function () {
    $("#btRegister").click(function () {
        ingresaRegistro($("input[name='tipo']:checked").val(), $("#nombre").val(), $("#apellidos").val(), $("#email").val(), $("#password").val(), $("#empresa").val());
    });
});

function ingresaRegistro(ptipo, pnombre, papellidos, pemail, ppassword, pempresa) {
    try {
        $.ajax({
            data: {
                $tipoUsuario: ptipo,
                $nombreUsuario: pnombre,
                $apellidosUsuario: papellidos,
                $emailUsuarios: pemail,
                $passUsuario: ppassword,
                $empresaUsuario: pempresa,
            },
            url: 'insertaRegistro.php',
            type: 'POST',
            dataType: 'text',
            success: function (r) {
                insercionRegistroExitosa(r);
            },
            error: function (r) {
                insercionRegistroErronea(r);
            }
        });
    } catch (err) {
        alert(err);
    }
}

function insercionRegistroExitosa(TextoJson) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>' + TextoJson + '</p>');
}

function insercionRegistroErronea(TextoJson) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>Ocurrio un error en el servidor</p>' + TextoJson.responseText);
}