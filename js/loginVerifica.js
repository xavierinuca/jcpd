$(document).ready(function () {
    $('#form1').on('submit', function (e) {
        var Cedula = $('#CI').val();
        var Pass = $('#password').val();
        if (Cedula != "" && Pass != "") {
            $.ajax({
                url: 'php/verificarUsuarios.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'CI': Cedula, 'pass': Pass
                },
                success: function (data) {
                    if (data.exito === true) {
                        if(data.rol=="Administrador")
                        {
                            setTimeout(" location.href = 'http://localhost:8080/jcdp/Administrador/index.php'", 300);
                        }else
                        {
                            if(data.rol=="Especialista")
                            setTimeout(" location.href = 'http://localhost:8080/jcdp/Denuncias/index.php'", 300);
                        }
                    }else
                    {
                        alertify.error(data.msj);
                    }
                }
            });
            e.preventDefault();
        } else {
            alertify.error("Ingrese Datos");
        }
    });
});
