<?php
//En este archivo php se realiza el cambio de estado del usuario
include '../Coneccion/conecta.php';
$datos = array();
$bd=new MySQL();
//variable cedula del usuario y el estado a asignar
$userCI=$_POST['userCI'];
$estado=$_POST['estado'];
//busqueda del usuario
$queryU="SELECT 
  t_usuarios.USU_ID,
  t_usuarios.USU_NOMBRE,
  t_usuarios.USU_APELLIDO,
  t_usuarios.USU_CEDULA,
  t_usuarios.USU_EMAIL,
  t_usuarios.USU_ESTADO  
FROM
  t_usuarios  WHERE  t_usuarios.USU_CEDULA='".$userCI."'";
$busqU=$bd->consulta($queryU);
$rowU=$bd->fetch_array($busqU);
$UsuID=$rowU['USU_ID'];
$bd->next_result();
//asignacion del estado y update a la tabla
if($estado==1)
{
    $update="UPDATE t_usuarios SET t_usuarios.USU_ESTADO=0 WHERE t_usuarios.USU_ID=$UsuID";
    $result=$bd->consulta($update);
}else{
    $update="UPDATE t_usuarios SET t_usuarios.USU_ESTADO=0 WHERE t_usuarios.USU_ID=$UsuID";
    $result=$bd->consulta($update);
}

if ($result)
{
    $datos['exito']=true;
    $datos['msj']="Asginacion Correcta";
}else{
    $datos['exito']=false;
    $datos['msj']="No se puedo Asignar";
}
echo json_encode($datos);


