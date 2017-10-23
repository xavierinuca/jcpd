$(document).ready(function () {
   $('#formDn').on('submit', function (event) {
       //tomando los datos del formulario denunciante
       var nombres = $('#nombreD').val();
       var apellidos = $('#apellidosD').val();
       var CI = $('#cedula').val();
       var fecha = $('#fechaN').val();
       var edad = $('#edad').val();
       var relacion=$('#relacionAfec').val();
       var Direccion = $('#direccion').val();
       var sector = $('#sector').val();
       var telefono = $('#telefono').val();
       var email = $('#email').val();
       var observacion=$('#observacionD').val();
       var etnia = $("#etnia option:selected").val();
       var discapacidad = $("#discapacidadAf option:selected").val();
       var genero = $("#genero option:selected").val();
       var Catgeneral= new Array();
       Catgeneral.push(etnia);
       Catgeneral.push(discapacidad);
       Catgeneral.push(genero);


       $.ajax({
           url: '../php/RDemandante.php',
           type: 'POST',
           dataType: 'json',
           data: {
               'nombres':nombres, 'apellidos':apellidos,'CI':CI,'fecha':fecha,'edad':edad,'relacion':relacion,'direccion':Direccion,
               'sector':sector,'telefono':telefono,'email':email,'observacion':observacion,'Catgeneral':Catgeneral

           },
           success: function (data) {
               if (data.exito === true) {
                   alertify.success(data.msj);
                   setTimeout("location.href = 'http://localhost:8080/jcdp/Denuncias/datos-denunciado.php'", 300);
               } else {
                   alertify.error(data.msj);
               }

           }
       });
       event.preventDefault();



   });

});