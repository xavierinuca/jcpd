<?php
header("Content-Type: text/html;charset=utf-8");
require_once("../Coneccion/conecta.php");
$coneccion = new MySQL();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>JCDP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../js/jquery-3.2.1.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="../css/datepicker.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">

        function Habilitar() {
            document.getElementById("afectado").style.display = 'block';
            document.getElementById("denunciante").style.display = 'block';
            document.getElementById("denunciado").style.display = 'block';

        }

    </script>
    <script>
        $(function () {
            $('#dp2').datepicker();
            $('#dp3').datepicker();
            $('#dp4').datepicker();

        });
    </script>

    <style>

        html, body {
            width: 100%;
            color: #D0D0D0;
        }

        .contenedor {
            width: 49%;
            background-color: #6A737C;
            margin: 1% 1%;

        }


    </style>
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

    <!-- AQUI EL CONTENIDO-->
    <div style="float: left; width: 50%" class="wrapper row0">
        <div class="hoc container clear" style="left: 10%">
            <!-- ################################################################################################ -->
            <form>
                <div style="left: 43%; position: absolute">

                    REGISTROS DE MEDIDAS EMERGENTES
                </div>
                <br>
                <br>
                <a>Número de Caso</a><br><br>
                <a>Información del Caso</a>
                <hr style="color: #3B5998; size: 3%">
                <br>
                <br>
                <div class="form-horizontal" style="margin-bottom: 34%">
                    <div class="form-group">
                        <label class="control-label ">Fecha de aplicación:</label>
                        <div class="col-sm-5">
                            <div class='input-group date' id='datetimepicker1'>
                                <input id="dp2" name="dp2" data-date-format="mm/dd/yyyy" placeholder="MM/DD/YhYYY"
                                       type="text"/>
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Fecha de inicio de la medida:</label>
                        <div class="col-sm-5">
                            <div class='input-group date' id='datetimepicker2'>
                                <input id="dp3" name="dp3" data-date-format="mm/dd/yyyy" placeholder="MM/DD/YhYYY"
                                       type="text"/>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Fecha de conclusión de la medida:</label>
                        <div class="col-sm-5">
                            <div class='input-group date' id='datetimepicker3'>
                                <input id="dp4" name="dp4" data-date-format="mm/dd/yyyy" placeholder="MM/DD/YhYYY"
                                       type="text"/>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Responsable:</label>
                        <div class="col-sm-5">
                            <input class="form-control" id="responsable" placeholder="Nombre Responsable">
                        </div>
                    </div>

                    <br>
                    <br>

                    <div class="col-sm-12 col-xs-12">
                        <button type="button"><span></span>&nbsp;Guardar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button">&nbsp;Regresar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                    </div>
                    <!-- ################################################################################################ -->
                    <div class="clear"></div>
                </div>
            </form>
        </div>
    </div>

    <!-- AQUI CONTENIDO DERECHA   -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

    <div style="float: right; width: 50%" class="wrapper row0">
        <div class="hoc container clear" style="left: 10%">
            <!-- ################################################################################################ -->
            <form method="post">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <a>TIPO DE MEDIDA APLICAR</a>

                <br>
                <br>
                <a>Medidas de protección art 79 </a>
                <br>
                <br>
<!-- busca los catalogos de cada articulo--->
                <?php
                $result = $coneccion->consulta("CALL SP_BUSCAR_CATALOGO('Art.79')");
                while ($row = $coneccion->fetch_array($result)) {
                    echo '<input type="checkbox" name="Derechos" value="' . $row["ctg_descripcion"] . '">    ' . utf8_encode($row["ctg_descripcion"]) . '<br>';
                }
                $coneccion->next_result();
                ?>
                <br>
                <a>Medidas de protección art 94 </a>
                <br>
                <br>

                <?php
                $result = $coneccion->consulta("CALL SP_BUSCAR_CATALOGO('Art.94')");
                while ($row = $coneccion->fetch_array($result)) {
                    echo '<input type="checkbox" name="Derechos" value="' . $row["ctg_descripcion"] . '">    ' . utf8_encode($row["ctg_descripcion"]) . '<br>';
                }
                $coneccion->next_result();
                ?>
                <br>
                <a>Medidas de protección art 217  </a>
                <br>
                <br>
                <?php
                $result = $coneccion->consulta("CALL SP_BUSCAR_CATALOGO('Art.217')");
                while ($row = $coneccion->fetch_array($result)) {
                    echo '<input type="checkbox" name="Derechos" value="' . $row["ctg_descripcion"] . '">    ' . utf8_encode($row["ctg_descripcion"]) . '<br>';
                }
                $coneccion->next_result();
                ?>
            </form>
        </div>
    </div>

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->


    <div class="wrapper row5">
        <div id="copyright" class="hoc clear">
            <!-- ################################################################################################ -->
            <center>
                <img src="../imagenes/logo2.png" style="max-width: 13%;"></center>
            <!-- ################################################################################################ -->
        </div>
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
