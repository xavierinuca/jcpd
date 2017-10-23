<?php
require_once("../Coneccion/conecta.php");
$db = new MySQL();
session_start();
//verificaicon de sesion
if (empty($_SESSION['user_id'])) {
    echo "<script>  document.location.href = \"../index.php\" </script>";
} else {
    //el ultimo insert de la tabla caso
    $rowC = $db->consulta("CALL SP_ULTIMO_INSERT");
    $row = $db->fetch_array($rowC);
    $idCaso = $row['caso_id'];
    $db->next_result();
    //buscamos los datos del caso segun el ID
    $ncaso = $db->consulta("CALL SP_ULTIMO(" . $idCaso . ")");
    $rowCaso = $db->fetch_array($ncaso);
}
?>
<!DOCTYPE html>

<html>
<head>
    <title>JCDP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../alertifyjs/alertify.js" rel="stylesheet"></script>
    <link rel="stylesheet" href="../alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="../alertifyjs/css/themes/default.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
<!--- JS para procesar el fomrulario del afectado -->
    <script src="../js/afectado.js"></script>
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
                <input type="button" id="cerrarS" name="cerrarS" value="Cerrar Sesion" class="btn btn-info"
                       style="background-color: #394251">
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
            <form method="post" id="formAf" name="formAf">
                <div style="left: 43%; position: absolute">

                    DATOS DEL AFECTADO
                </div>
                <br>
                <br>


                <a>Número de Caso</a>
                <?php
                echo $rowCaso['CASO_NUMCASO'];
                $db->next_result();
                ?>
                <br>
                <hr>
                <br>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label ">Nombres:</label>
                        <div class="col-sm-5">
                            <input class="form-control" id="nombreAfectado" placeholder="Ingrese sus nombres" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Apellidos:</label>
                        <div class="col-sm-5">
                            <input class="form-control" id="apellidosAfectado" placeholder="Ingrese sus apellidos" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Número de Cédula:</label>
                        <div class="col-sm-5">
                            <input maxlength="10" minlength="10" class="form-control" id="cedula" placeholder="Ingrese su cédula" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Fecha de Nacimiento:</label>
                        <div class="col-sm-5">
                                <input class="form-control" id="fechaN" name="fechaN"  type="date"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Edad:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="edad" placeholder="Ingrese sus edad" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Género:</label>
                        <div class=" col-sm-5">
                            <select class="form-control" id="genero" name="genero">
                                <option> Seleccione</option>
                                <?php
                                //mostramos los diferentes catalogos
                                $ListaGenero = $db->consulta("CALL SP_BUSCAR_CATALOGO('Genero')");
                                while ($rowGene = $db->fetch_array($ListaGenero)) {
                                    echo "<option value='" . $rowGene['ctg_descripcion'] . "'>" . $rowGene['ctg_descripcion'] . "</option>";
                                }
                                $db->next_result();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Identidad:</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="etnia" name="etnia">
                                <option> Seleccione</option>
                                <?php
                                $ListaIdent = $db->consulta("CALL SP_BUSCAR_CATALOGO('Etnia')");
                                while ($rowIdent = $db->fetch_array($ListaIdent)) {
                                    echo "<option value='" . $rowIdent['ctg_descripcion'] . "'>" . $rowIdent['ctg_descripcion'] . "</option>";
                                }
                                $db->next_result();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Discapacidad:</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="discapacidadAf" name="discapacidadAf">
                                <option> Seleccione</option>
                                <?php
                                $ListaDis = $db->consulta("CALL SP_BUSCAR_CATALOGO('Discapacidad')");
                                while ($rowDis = $db->fetch_array($ListaDis)) {
                                    echo "<option value='" . $rowDis['ctg_descripcion'] . "'>" . $rowDis['ctg_descripcion'] . "</option>";
                                }
                                $db->next_result();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Dirección:</label>
                        <div class="col-sm-5">
                            <input class="form-control" id="direccion" placeholder="Ingrese su direccion" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Sector:</label>
                        <div class="col-sm-5">
                            <input class="form-control" id="sector" placeholder="Ingrese el sector" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Teléfono:</label>
                        <div class="col-sm-5">
                            <input maxlength="10" minlength="10" class="form-control" id="telefono" placeholder="Ingrese su telefono" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Email:</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="email" placeholder="Ingrese su email" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Observacion:</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" id="observacionAfec" name="observacionAfec"
                                      placeholder="" required="required"></textarea>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="col-sm-12 col-xs-12">
                        <button type="submit"><span></span>&nbsp;Guardar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


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
        <img src="../imagenes/logo2.png" style="max-width: 10%; ">
    </center>

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
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

    <script src="../layout/scripts/jquery.backtotop.js"></script>
    <script src="../layout/scripts/jquery.mobilemenu.js"></script>
    <!-- IE9 Placeholder Support -->
    <script src="../layout/scripts/jquery.placeholder.min.js"></script>
    <!-- / IE9 Placeholder Support -->

</body>
</html>