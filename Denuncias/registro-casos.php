<?php
header("Content-Type: text/html;charset=utf-8");
require_once("../Coneccion/conecta.php");
$coneccion = new MySQL();
session_start();

if (empty($_SESSION['user_id'])) {
    echo "<script>  document.location.href = \"../index.php\" </script>";
} else {
    $id_User = $_SESSION['user_id'];
    $respuesta = $coneccion->consulta("CALL SP_BUSCAR_USUARIO_BY_ID(" . $id_User . ")");
    $row = $coneccion->fetch_array($respuesta);
    $coneccion->next_result();
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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
    <link href="../css/datepicker.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/Denuncias.js"></script>


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

        hr {
            width: 50px;
            background-color: rgba(8, 7, 6, 0.79);
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
            <form id="formRC">
                <div style="left: 43%; position: absolute">

                    REGISTROS DE CASOS JCDP
                </div>
                <br>
                <br>
                <a>DATOS DEL CASO</a>

                <br>
                <br>
                <div class="form-horizontal" style="margin-bottom: 34%">
                    <div class="form-group">
                        <label class="control-label ">Numero de Caso:</label>
                        <div class="col-sm-5">
                            <input class="form-control" id="num_caso" placeholder="Numero de Caso" value="JCDP-">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Procedimiento con Conocimiento:</label>
                        <div class="col-sm-5">
                            <?php
                            $Cat1 = $coneccion->consulta("CALL SP_BUSCAR_CATALOGO('Procedimiento')");
                            while ($row = $coneccion->fetch_array($Cat1)) {
                                echo '<input type="radio" name="TProcedimiento" value="' . $row["ctg_descripcion"] . '">    ' . utf8_encode($row["ctg_descripcion"]) . '<br>';
                            }
                            $coneccion->next_result();
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Tipo de Denuncia:</label>
                        <div class="col-sm-5">
                            <?php
                             $coneccion->next_result();
                            $Cat2 = $coneccion->consulta("CALL SP_BUSCAR_CATALOGO('Denuncia')");
                            while ($row = $coneccion->fetch_array($Cat2)) {
                                echo '<input type="radio" name="TDenuncia" value="' . $row["ctg_descripcion"] . '">    ' . utf8_encode($row["ctg_descripcion"]) . '<br>';
                            }
                                 $coneccion->next_result();
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Motivo:</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" id="motivo" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Observacion:</label>
                        <div class="col-sm-5">
                            <textarea name="observacion" class="form-control" id="observacion"
                                      placeholder=""></textarea>
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="guardar">Guardar</button>
                        </div>
                    </div>
                    <br>

                    <div class="col-sm-12 col-xs-12">
                        <button type="button" id="afectado" style="display: none"
                                onclick="location.href='http://localhost/jcdp/pages/datos-afectado.php'">Ingresar
                            Afectado
                        </button>
                        <br>
                        <button type="button" id="denunciante" style="display: none"
                                onclick="location.href='http://localhost/jcdp/pages/datos-denunciante.php'">Ingresar
                            Denunciante
                        </button>
                        <br>
                        <button type="button" id="denunciado" style="display: none"
                                onclick="location.href='http://localhost/jcdp/pages/datos-denunciado.php'">Ingresar
                            Denunciado
                        </button>
                        <br>
                    </div>
                    <!-- ################################################################################################ -->
                    <div class="clear"></div>
                </div>

        </div>
    </div>

    <!-- AQUI CONTENIDO DERECHA   -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

    <div style="float: right; width: 50%" class="wrapper row0">
        <div class="hoc container clear" style="left: 10%">
            <!-- ################################################################################################ -->

                <br>
                <br>
                <a>DATOS DERECHO AMENAZADO O VIOLENTADO</a>

                <br>
                <br>
                <a>Derecho Amenazado o Violentado</a>
                <br>
                <br>
                <a>Clasificación del Derecho Amenazado o Violentado</a>
                <br>
                <br>
                <a>Derechos de Desarrollo: </a>
                <br>
                <?php
                $result = $coneccion->consulta("CALL SP_BUSCAR_CATALOGO('Derechos de Desarrollo')");
                while ($row = $coneccion->fetch_array($result)) {
                    echo '<input type="checkbox" name="Derechos" value="' . $row["ctg_descripcion"] . '">    ' . utf8_encode($row["ctg_descripcion"]) . '<br>';
                }
                ?>
                <br>
                <a>Derechos de Proteccion: </a>
                <br>
                <?php
                $coneccion->next_result();

                $result2 = $coneccion->consulta("CALL SP_BUSCAR_CATALOGO('Derechos de proteccion')");
                while ($row2 = $coneccion->fetch_array($result2)) {
                    echo '<input type="checkbox" name="Derechos" value="' . $row2["ctg_descripcion"] . '">    ' . utf8_encode($row2["ctg_descripcion"]) . '<br>';
                }
                ?>
                <br>
                <a>Derechos de Participacion : </a>
                <br>
                <?php
                $coneccion->next_result();
                $result3 = $coneccion->consulta("CALL SP_BUSCAR_CATALOGO('Derechos de participacion')");
                while ($row3 = $coneccion->fetch_array($result3)) {
                    echo '<input type="checkbox" name="' . $row3["ctp_tipo"] . '" value="' . $row3["ctg_descripcion"] . '">    ' . utf8_encode($row3["ctg_descripcion"]) . '<br>';
                }
                ?>


            </form>

        </div>
    </div>


    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

    <img src="../imagenes/logo2.png" style="max-width: 10%; position: static ">
    <div class="wrapper row5">
        <div id="copyright" class="hoc clear">
            <!-- ################################################################################################ -->

            <!-- ################################################################################################ -->

        </div>
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