$(document).ready(function () {
    $('#formCambioC').on('submit', function (event) {
        //toman de datos del formulario de cambio de contrasenia
        var usuarioCI = $('#Usuario').val();
        var nombres=$('#Usuario option:selected').html();
        var Pass = $('#PassUsu').val();
        if(verificarC(Pass,nombres))
        {
            $.ajax({
                url: '../../php/CambioPass.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'userCI': usuarioCI, 'Pass': Pass
                },
                success: function (data) {
                    if (data.exito === true) {
                        alertify.success(data.msj);
                        setTimeout(" location.href = 'http://localhost:8080/jcdp/Administrador/pages/CambioContrasenia.php'", 300);
                    } else {
                        alertify.error(data.msj);
                    }
                }
            });

        }
        event.preventDefault();
    });

});


function verificarC(contraseña,nombres) {


    if (contraseña.length < 6) {
        alert("la contraseña debe tener mas de 6 caracteres!");

        return false;
    } else {
        if (contraseña === nombres) {
            alert("La contraseña debe ser diferente al usuario!");

            return false;
        } else {
            re = /[0-9]/;
            if (!re.test(contraseña)) {
                alert("La contraseña debe tener al menos un numero!");

                return false;
            } else {
                re = /[a-z]/;
                if (!re.test(contraseña)) {
                    alert("La contraseña debe tener al menos una letra minuscula!");

                    return false;
                } else {
                    re = /[A-Z]/;
                    if (!re.test(contraseña)) {
                        alert("La contraseña debe tener al menos un letra mayuscula!");

                        return false;
                    } else {

                        return true;
                    }
                }
            }

        }

    }

}