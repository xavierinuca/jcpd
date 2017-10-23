$(document).ready(function () {
    $("#formR").on('submit', function (event) {
        //tomando los datos del formulario para el restablecer la contraseña
        var Cedula = $('#Usuario').val();
        var Email = $('#Email').val();
        if (Cedula != "" && Email != "") {
            $.ajax({
                url: '../Restablecer/Mailer.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'CI': Cedula, 'Email': Email
                },
                success: function (data) {
                    if (data.exito === true) {
                        alertify.success(data.msj);
                        setTimeout("location.href = 'http://localhost:8080/jcdp/index.php'", 700);
                    } else {
                        alertify.error(data.msj);
                    }
                }
            });
            event.preventDefault();
        } else {
            alertify.error("Ingrese Datos");
        }
    });
});