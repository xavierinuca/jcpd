$(document).ready(function () {
    $('#formAsg').on('submit', function () {
        //toma de variables del formulario al realizar submit
        var usuarioCI=$('#Usuario').val();
        var Rol=$('#Rol').val();
        $.ajax({
            //envio de variables a pagina php de carga
            url: '../../php/AsgRoles.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'userCI': usuarioCI, 'rol': Rol
            },
            success: function (data) {
                if (data.exito === true) {
                    alertify.success(data.msj);
                    setTimeout(" location.href = 'http://localhost:8080/jcdp/Administrador/pages/AsignarRol.php'", 300);
                } else {
                    alertify.error(data.msj);
                }
            }
        });
        e.preventDefault();
    });
});