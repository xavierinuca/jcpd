<?php
require_once("../../Coneccion/conecta.php");
$bd = new MySQL();
session_start();
//verificamos la session
//buscamo el usuario correspodiente al ID de la sesion
if (empty($_SESSION['user_id'])) {
    //si no hay una sesion se dirige a la pagina de inicio
    echo "<script>  document.location.href = \"../index.php\" </script>";
} else {
    $id_User = $_SESSION['user_id'];
    $respuesta = $bd->consulta("CALL SP_BUSCAR_USUARIO_BY_ID(" . $id_User . ")");
    $row = $bd->fetch_array($respuesta);
    $bd->next_result();
    //busqueda de usuarios
    $ListaUsuarios = $bd->consulta("CALL SP_LIST_ACTIVE()");
    $bd->next_result();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrador</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../../js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../../alertifyjs/alertify.js" rel="stylesheet"></script>
    <link rel="stylesheet" href="../../alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="../../alertifyjs/css/themes/default.css">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Cambio de estador por medio de JS-->
    <script src="../../js/EstadoUsuarios.js" type="text/javascript"></script>
    <script>

        $(document).ready(function () {
            $('#cerrarS').on('click', function (e) {
                $.ajax({
                    url: '../../php/CerrarSession.php',
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="../index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>JC</b>DP</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>JCPD</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../../imagenes/perfil1.png" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php
                                echo $row['USU_NOMBRE'] . " " . $row['USU_APELLIDO'];
                                ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../../imagenes/perfil1.png" class="img-circle" alt="User Image">

                                <p>
                                    <?php
                                    echo $row['USU_NOMBRE'] . " " . $row['USU_APELLIDO'];
                                    ?>

                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a id="cerrarS" name="cerrarS" class="btn btn-default btn-flat">Cerrar Sesion</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../../imagenes/perfil.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php
                        echo $row['USU_NOMBRE'] . " " . $row['USU_APELLIDO'];
                        ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">Configuraciones</li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Usuarios</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="CrearUsuarios.php"><i class="fa fa-user"></i> Crear Usuarios</a></li>
                        <li><a href="VistaUsuarios.php"><i class="fa  fa-table"></i> Tablas de Usuarios</a></li>
                        <li><a href="InactivarUsuarios.php"><i class="fa  fa-user-times"></i> Inhabilitar Usuarios</a></li>
                        <li><a href="CambioContrasenia.php"><i class="fa fa-unlock"></i> Restaurar Contraseñas</a></li>
                        <li><a href="AsignarRol.php"><i class="fa  fa-wrench"></i> Asignar Rol</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Usuarios</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/charts/chartjs.html"><i class="fa fa-user"></i> Crear Usuarios</a></li>
                        <li><a href="pages/charts/morris.html"><i class="fa fa-unlock"></i> Restaurar Contraseñas</a>
                        </li>

                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Administracion
                <small>Panel de Control</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Estado de Usuarios</li>
            </ol>
        </section>

        <!-- Main content Contenido-->
        <section class="content" style="margin-left: 30%">
            <div class="row" >
                <!-- left column -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Estado de Usuarios</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form id="formIn" name="formIn" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Usuario:</label>
                                    <select class="form-control" id="Usuario" name="Usuario">
                                        <option> Seleccione</option>
                                        <?php
                                        //mostrando la lista de usuarios
                                        while ($rowUsers = $bd->fetch_array($ListaUsuarios)) {
                                            echo "<option value='" . $rowUsers['USU_CEDULA'] . "'>" . $rowUsers['USU_NOMBRE'] . " " . $rowUsers['USU_APELLIDO'] . "</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado:</label>
                                    <select class="form-control" id="Estado" name="Estado">
                                        <option> Seleccione</option>
                                        <option value="1"> Activo</option>
                                        <option value="0"> Inactivo</option>

                                    </select>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" id="CrearUsu" name="CrearUsu" class="btn btn-primary">Cambiar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">

        <strong>Copyright &copy; 2017-2018</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
