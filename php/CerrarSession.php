<?php
session_start();
session_unset();
session_destroy();
$data=array();
$data['exito']=true;
echo json_encode($data);
?>