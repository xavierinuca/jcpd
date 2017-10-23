<?php
require_once("../Coneccion/conecta.php");
$db = new MySQL();
session_start();
//verificacion de la session
if (empty($_SESSION['user_id'])) {
    echo "<script>  document.location.href = \"../index.php\" </script>";
} else {
    $id_User = $_SESSION['user_id'];
    $respuesta = $db->consulta("CALL SP_BUSCAR_USUARIO_BY_ID(" . $id_User . ")");
    $row = $db->fetch_array($respuesta);
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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../css/datepicker.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>

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
<body id="top" style="background-color: #f6f6f6">
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


            <div class="col-sm-12 col-xs-12">
                <center>
                    <img src="../imagenes/cnna.png" style="max-width: 35%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="../imagenes/logo1.png" style="max-width: 35%;"></center>


            </div>


            <!-- ################################################################################################ -->
            <div class="clear"></div>
        </div>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->


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