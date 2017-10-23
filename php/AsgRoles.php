<?php
include '../Coneccion/conecta.php';
$datos = array();
$bd=new MySQL();
$userCI=$_POST['userCI'];
$rol=$_POST['rol'];
$queryR="SELECT 
  t_roles.ROL_TIPO,
  t_roles.ROL_ID
FROM
  t_roles WHERE t_roles.ROL_TIPO='".$rol."'";
$queryU="SELECT 
  t_usuarios.USU_ID,
  t_usuarios.USU_NOMBRE,
  t_usuarios.USU_APELLIDO,
  t_usuarios.USU_CEDULA,
  t_usuarios.USU_EMAIL,
  t_usuarios.USU_ESTADO  
FROM
  t_usuarios  WHERE  t_usuarios.USU_CEDULA='".$userCI."'";
$busqR=$bd->consulta($queryR);
$bd->next_result();
$busqU=$bd->consulta($queryU);
$rowR=$bd->fetch_array($busqR);
$rowU=$bd->fetch_array($busqU);
$rolID=$rowR['ROL_ID'];
$UsuID=$rowU['USU_ID'];
$update="UPDATE t_usuarios SET t_usuarios.USU_ESTADO=1,t_usuarios.rol_id=$rolID WHERE t_usuarios.USU_ID=$UsuID";
$result=$bd->consulta($update);
if ($result)
{
    $datos['exito']=true;
    $datos['msj']="Asginacion Correcta";
}else{
    $datos['exito']=false;
    $datos['msj']="No se puedo Asignar";
}
echo json_encode($datos);


