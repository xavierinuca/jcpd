$(document).ready(function () {
    $('#formC').on('submit', function (event) {
        //tomando los datos del formulario de la creacion de los usuarios
        var Nombre = $('#NombreUsu').val();
        var Apellido = $('#ApellidoUsu').val();
        var Cedula = $('#CI').val();
        var Correo = $('#EmailUsu').val();
        var Pass = $('#PassUsu').val();
        if (validardatos(Nombre, Apellido, Cedula, Correo, Pass)) {
            $.ajax({
                url: '../../php/CrearUsuarios.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'Nombre': Nombre, 'Apellido': Apellido, 'CI': Cedula, 'Correo': Correo, 'pass': Pass
                },
                success: function (data) {
                    if (data.exito === true) {
                        alertify.success(data.msj);
                        setTimeout("location.href = 'http://localhost:8080/jcdp/Administrador/pages/CrearUsuarios.php'", 700);
                    } else {
                        alertify.error(data.msj);
                    }

                }
            });
        }
        event.preventDefault();
    });
});

function validardatos(nombres, apellidos, cedula, correo, contraseña) {

    var correov = /^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/
    var nombrev = /^[a-zñÑáéíóú\d_\s]{4,28}$/i
    var telefonov = /^([0-9]{10})$/


    if (nombrev.test(nombres) && nombrev.test(apellidos)) {

        //Preguntamos si la cedula consta de 10 digitos
        if (cedula.length == 10) {

            //Obtenemos el digito de la region que sonlos dos primeros digitos
            var digito_region = cedula.substring(0, 2);

            //Pregunto si la region existe ecuador se divide en 24 regiones

            if (digito_region >= 1 && digito_region <= 24) {

                // Extraigo el ultimo digito
                var ultimo_digito = cedula.substring(9, 10);

                //Agrupo todos los pares y los sumo
                var pares = parseInt(cedula.substring(1, 2)) + parseInt(cedula.substring(3, 4)) + parseInt(cedula.substring(5, 6)) + parseInt(cedula.substring(7, 8));

                //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
                var numero1 = cedula.substring(0, 1);
                var numero1 = (numero1 * 2);
                if (numero1 > 9) {
                    var numero1 = (numero1 - 9);
                }

                var numero3 = cedula.substring(2, 3);
                var numero3 = (numero3 * 2);
                if (numero3 > 9) {
                    var numero3 = (numero3 - 9);
                }

                var numero5 = cedula.substring(4, 5);
                var numero5 = (numero5 * 2);
                if (numero5 > 9) {
                    var numero5 = (numero5 - 9);
                }

                var numero7 = cedula.substring(6, 7);
                var numero7 = (numero7 * 2);
                if (numero7 > 9) {
                    var numero7 = (numero7 - 9);
                }

                var numero9 = cedula.substring(8, 9);
                var numero9 = (numero9 * 2);
                if (numero9 > 9) {
                    var numero9 = (numero9 - 9);
                }

                var impares = numero1 + numero3 + numero5 + numero7 + numero9;

                //Suma total
                var suma_total = (pares + impares);

                //extraemos el primero digito
                var primer_digito_suma = String(suma_total).substring(0, 1);

                //Obtenemos la decena inmediata
                var decena = (parseInt(primer_digito_suma) + 1) * 10;

                //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
                var digito_validador = decena - suma_total;

                //Si el digito validador es = a 10 toma el valor de 0
                if (digito_validador == 10)
                    var digito_validador = 0;

                //Validamos que el digito validador sea igual al de la cedula
                if (digito_validador == ultimo_digito) {
                    if (correov.test(correo)) {
                        if (contraseña.length < 6) {
                            alertify.error("la contraseña debe tener mas de 6 caracteres!");

                            return false;
                        } else {
                            if (contraseña === nombres || contraseña === apellidos) {
                                alertify.error("La contraseña debe ser diferente al usuario!");

                                return false;
                            } else {
                                re = /[0-9]/;
                                if (!re.test(contraseña)) {
                                    alertify.error("La contraseña debe tener al menos un numero!");

                                    return false;
                                } else {
                                    re = /[a-z]/;
                                    if (!re.test(contraseña)) {
                                        alertify.error("La contraseña debe tener al menos una letra minuscula!");

                                        return false;
                                    } else {
                                        re = /[A-Z]/;
                                        if (!re.test(contraseña)) {
                                            alertify.error("La contraseña debe tener al menos un letra mayuscula!");

                                            return false;
                                        } else {

                                            return true;
                                        }
                                    }
                                }

                            }

                        }

                    } else {
                        alertify.error('El correo es incorrecto');
                        return false;
                    }

                } else {
                    alertify.error('la cedula es incorrecta');
                    return false;
                }

            } else {
                // imprimimos en consola si la region no pertenece
                alertify.error('Esta cedula no pertenece a ninguna region');
                return false;
            }
        } else {
            //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
            alertify.error('Esta cedula tiene menos o mas de 10 Digitos');
            return false;
        }


    } else {
        alertify.error("Nombres y Apellidos invalidos");

        return false;
    }
}
