$(document).ready(function () {
    $('#formIn').on('submit', function () {
        //toma de variables del formulario
        var usuarioCI=$('#Usuario').val();
        var estado=$('#Estado').val();
        //envio de la variables por ajax y redireccionamiento
        $.ajax({
            url: '../../php/CambioEstado.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'userCI': usuarioCI, 'estado': estado
            },
            success: function (data) {
                if (data.exito === true) {
                    alertify.success(data.msj);
                    setTimeout(" location.href = 'http://localhost:8080/jcdp/Administrador/pages/InactivarUsuarios.php'", 300);
                } else {
                    alertify.error(data.msj);
                }
            }
        });
        //previene que se recargue la pagina
        e.preventDefault();

    });
});