$(document).ready(function () {
    $("#formRC").on('submit', function (event) {
        //tomando los datos del formulario del caso
        var Ncaso = $("#num_caso").val();
        var Motivo = $("#motivo").val();
        var Observacion = $("#observacion").val();
        var derechosV = new Array();
        var Procedimiento = $("input:radio[name='TProcedimiento']:checked").val();
        var Denuncia = $("input:radio[name='TDenuncia']:checked").val();
        derechosV.push(Procedimiento);
        derechosV.push(Denuncia);
        $("input[name='Derechos']:checked").each(function () {
            var D = $(this).val();
            derechosV.push(D);
        });


        $.ajax({
            url: '../php/Registro.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'derechosV': derechosV, 'Ncaso':Ncaso,'motivo':Motivo,'observacion':Observacion
            },
            success: function (data) {
                if (data.exito === true) {
                    alertify.success(data.msj);
                    setTimeout("location.href = 'http://localhost:8080/jcdp/Denuncias/datos-afectado.php'", 500);
                } else {
                    alertify.error(data.msj);
                }

            }
        });
       event.preventDefault();
    });
});

function encode_utf8(s) {

    return unescape(encodeURIComponent(s));

}


function decode_utf8(s) {

    return decodeURIComponent(escape(s));

}