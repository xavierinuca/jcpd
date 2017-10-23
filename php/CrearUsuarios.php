<?php
include '../Coneccion/conecta.php';
$datos = array();
$bd = new MySQL();
$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Cedula = $_POST['CI'];
$Correo = $_POST['Correo'];
$Pass = $_POST['pass'];
$PassMd5 = md5($Pass);
$query = "Insert into t_usuarios (USU_NOMBRE,USU_APELLIDO,USU_CEDULA,USU_EMAIL,USU_PASWORD,USU_ESTADO,USU_CCONTRASENIA) 
values('" . $Nombre . "','" . $Apellido . "','" . $Cedula . "','" . $Correo . "','" . $PassMd5 . "',0,0)";
$resp = $bd->consulta($query);
if ($resp === true) {
    $datos['exito'] = true;
    $datos['msj'] = "Usuario Creado";

} else {
    $datos['exito'] = false;
    $datos['msj'] = "Error al Crear Usuario ";

}
$bd->close();
echo json_encode($datos);
