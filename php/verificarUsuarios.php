<?php
// se verifica la existencia de usuarios al momento de logearse
include '../Coneccion/conecta.php';
$datos = array();
$bd=new MySQL();
$Cedula = $_POST['CI'];
$Contra = $_POST['pass'];
$passMD5=md5($Contra);
session_start();
//metodo que devuelve tru o false si encuentra al usuario
$row=$bd->verificarU($Cedula,$passMD5);
if(isset($row))
{
    $userid=$row['USU_ID'];
    $_SESSION['user_id']=$userid;
    $datos['exito']=true;
    $datos['msj']="";
    $datos['rol']=$row['ROL_TIPO'];
    echo json_encode($datos);
}else{
    $datos['exito']=false;
    $datos['msj']="Usuario no encontrado o Inactivo, por favor revise sus datos o solicite su activacion";
    echo json_encode($datos);
}
$bd->close();