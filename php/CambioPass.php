<?php
include '../Coneccion/conecta.php';
$datos = array();
$bd=new MySQL();
$userCI=$_POST['userCI'];
$pass=$_POST['Pass'];
$passMD5=md5($pass);
$queryU="UPDATE t_usuarios SET t_usuarios.USU_PASWORD='".$passMD5."', t_usuarios.USU_CCONTRASENIA=0  WHERE  t_usuarios.USU_CEDULA='".$userCI."'";
$actulizaU=$bd->consulta($queryU);
if ($actulizaU)
{
    $datos['exito']=true;
    $datos['msj']="Cambio Correcto";
}else{
    $datos['exito']=true;
    $datos['msj']="No se realizo ningun cambio";
}
echo json_encode($datos);