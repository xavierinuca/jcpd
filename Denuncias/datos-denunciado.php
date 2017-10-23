<!DOCTYPE html>

<html>
<head>
  <title>JCDP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../js/jquery-3.2.1.js" type="text/javascript"></script>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="../js/bootstrap.js"></script>
  <script src="../js/bootstrap.min.js"></script>

    <script>

        $(document).ready(function () {
            $('#cerrarS').on('click', function (e) {
                $.ajax({
                    url: '../php/CerrarSession.php',
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        if (data.exito === true) {
                            setTimeout(" location.href = 'http://localhost:8080/jcdp/index.php'", 200);
                        }
                    }
                });
            });
        });

    </script>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear">
    <!-- ################################################################################################ -->


  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear">
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="index.php">Junta Cantonal de Protección de Derechos</a></h1>
      </div>
        <div style="float: right">
            <input type="button" id="cerrarS" name="cerrarS"  value="Cerrar Sesion" class="btn btn-info"style="background-color: #394251">
        </div>
    </header>

    <!-- ################################################################################################ -->

  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    <nav id="mainav" class="hoc clear">
      <!-- ################################################################################################ -->
      <ul class="clear">

        <li><a class="drop" href="#">CASOS</a>
          <ul>
            <li><a href="registro-casos.php">Registro de Casos</a></li>
            <li><a href="Busqueda-casos.php">Busqueda de Casos</a></li>

          </ul>
        </li>
        <li><a class="drop" href="#">AUDITORIA</a>
          <ul>
            <li><a href="#">Level 2</a></li>
            <li><a class="drop" href="#">Level 2 + Drop</a>
              <ul>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
              </ul>
            </li>
            <li><a href="#">Level 2</a></li>
          </ul>
        </li>
        <li><a href="#">REPORTES</a></li>
        <li><a href="#">JUNTAS</a></li>
        <li><a href="#">USUARIOS</a></li>
        <li><a href="#">PROCESOS</a>
          <ul>
            <li><a href="pages/gallery.html">Revision de Casos</a></li>
            <li><a href="pages/full-width.html">Revision de Avocatorias</a></li>
            <li><a href="pages/gallery.html">Revision de Audiencias</a></li>
            <li><a href="pages/full-width.html">Revision de Audiencias de Prueba</a></li>
            <li><a href="pages/gallery.html">Cumplimiento de Medidas Administrativas</a></li>
            <li><a href="pages/full-width.html">Cumplimiento de Medidas Emergentes</a></li>

          </ul>



        </li>
      </ul>
      <!-- ################################################################################################ -->
    </nav>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->

  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->

  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->

  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- AQUI EL CONTENIDO-->
  <div class="wrapper row0">
    <div class="hoc container clear">
      <!-- ################################################################################################ -->
      <form>
        <div style="left: 43%; position: absolute">

          DATOS DEL DENUNCIADO
        </div>
        <br>
        <br>





        <a>Número de Caso</a>

        <br>
        <hr>
        <br>
        <div class="form-horizontal">
          <div class="form-group">
            <label class="control-label ">Nombres:</label>
            <div class="col-sm-5">
              <input class="form-control" id="nombreAfectado" placeholder="Ingrese sus nombres">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Apellidos:</label>
            <div class="col-sm-5">
              <input class="form-control" id="apellidosAfectado" placeholder="Ingrese sus apellidos">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Número de Cédula:</label>
            <div class="col-sm-5">
              <input class="form-control" id="cedula" placeholder="Ingrese sus apellidos">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Fecha de Nacimiento:</label>
            <div class="col-sm-5">
              <input class="form-control" id="fecha">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Edad:</label>
            <div class="col-sm-5">
              <input class="form-control" id="edad" placeholder="Ingrese sus edad">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Género:</label>
            <div class="col-sm-5">
              <input type="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Relación con el Afectado:</label>
            <div class="col-sm-5">
              <textarea name="observacionA" class="form-control" id="relacionAfec" placeholder=""></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Identidad:</label>
            <div class="col-sm-5">
              <input type="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Discapacidad:</label>
            <div class="col-sm-5">
              <input type="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Dirección:</label>
            <div class="col-sm-5">
              <input class="form-control" id="direccion" placeholder="Ingrese su direccion">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Sector:</label>
            <div class="col-sm-5">
              <input class="form-control" id="sector" placeholder="Ingrese el sector">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Teléfono:</label>
            <div class="col-sm-5">
              <input class="form-control" id="telfono" placeholder="Ingrese su telefono">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Email:</label>
            <div class="col-sm-5">
              <input class="form-control" id="email" placeholder="Ingrese sus email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label ">Observacion:</label>
            <div class="col-sm-5">
              <textarea name="observacionA" class="form-control" id="observacionA" placeholder=""></textarea>
            </div>
          </div>

            <br>
            <br>
            <div class="col-sm-12 col-xs-12">
                <button type="button"><span></span>&nbsp;Guardar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button">&nbsp;Regresar al Caso</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
          <!-- ################################################################################################ -->
          <div class="clear"></div>
        </div>
      </form>
      <!-- ################################################################################################ -->
      <div class="clear"></div>
    </div>
  </div>
    <center>
        <img src="../imagenes/logo2.png" style="max-width: 10%; "  >
    </center>
  <div class="wrapper row5">
    <div id="copyright" class="hoc clear">
      <!-- ################################################################################################ -->

      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
  <!-- JAVASCRIPTS -->
  <script src="../layout/scripts/jquery.min.js"></script>
  <script src="../layout/scripts/jquery.backtotop.js"></script>
  <script src="../layout/scripts/jquery.mobilemenu.js"></script>
  <!-- IE9 Placeholder Support -->
  <script src="../layout/scripts/jquery.placeholder.min.js"></script>
  <!-- / IE9 Placeholder Support -->
</body>
</html>