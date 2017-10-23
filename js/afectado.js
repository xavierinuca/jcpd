$(document).ready(function () {
    $("#formAf").on('submit', function (event) {
        //tomando los valores del fomrulario formAf
        var nombres = $('#nombreAfectado').val();
        var apellidos = $('#apellidosAfectado').val();
        var CI = $('#cedula').val();
        var fecha = $('#fechaN').val();
        var edad = $('#edad').val();
        var Direccion = $('#direccion').val();
        var sector = $('#sector').val();
        var telefono = $('#telefono').val();
        var email = $('#email').val();
        var observacion=$('#observacionAfec').val();
        var etnia = $("#etnia option:selected").val();
        var discapacidad = $("#discapacidadAf option:selected").val();
        var genero = $("#genero option:selected").val();
        var Catgeneral= new Array();
        Catgeneral.push(etnia);
        Catgeneral.push(discapacidad);
        Catgeneral.push(genero);
//envio de la variables por ajax a un archivo php para su ejecucion
        $.ajax({
            url: '../php/RAfectado.php',
            type: 'POST',
            dataType: 'json',
            data: {
               'nombres':nombres, 'apellidos':apellidos,'CI':CI,'fecha':fecha,'edad':edad,'direccion':Direccion,
                'sector':sector,'telefono':telefono,'email':email,'observacion':observacion,'Catgeneral':Catgeneral

            },
            success: function (data) {
                if (data.exito === true) {
                    alertify.success(data.msj);
                    setTimeout("location.href = 'http://localhost:8080/jcdp/Denuncias/datos-denunciante.php'", 500);
                } else {
                    alertify.error(data.msj);
                }

            }
        });
        event.preventDefault();
    });
});