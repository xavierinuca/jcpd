<?php
//Regristro de los casos
header("Content-Type: text/html;charset=utf-8");
include '../Coneccion/conecta.php';
$datos = array();
$bd = new MySQL();
$NCaso = $_POST['Ncaso'];
$motivo = $_POST['motivo'];
$observacion = $_POST['observacion'];
$derechosV = $_POST['derechosV'];
//Insert de caso a la base de datos
$insertCaso = $bd->consulta("CALL SP_INSERT_CASO('" . $NCaso . "','" . $motivo . "','" . $observacion . "')");
$bd->next_result();
if ($insertCaso) {
    for ($i = 0; $i < count($derechosV); $i++) {
        $var = $derechosV[$i];
        //buscamo en el catalogo los diferentes derechos
        $result = $bd->consulta("SELECT * FROM t_catalogogeneral WHERE t_catalogogeneral.ctg_descripcion LIKE '$var'");
        $row = $bd->fetch_array($result);
        $CTGid = $row['ctg_id'];
        $bd->next_result();
        //tomamos el ultimo ingreso de caso para trabajar
        $resultU = $bd->consulta("CALL SP_ULTIMO_INSERT");
        $ultimo = $bd->fetch_array($resultU);
        $casoID = $ultimo['caso_id'];
        $bd->next_result();
        //insertamos los derechos con la tabla de caso que lo necesite
        $insertAux = $bd->consulta("INSERT INTO t_auxcaso(t_auxcaso.caso_id,t_auxcaso.ctg_id) VALUES(".$casoID.",".$CTGid.")");
        $bd->next_result();
        if ($insertAux) {
            $datos['exito'] = true;
            $datos['msj']="Se registro con exito";
        } else {
            $datos['exito'] = false;
            $datos['msj']="Ha ocurrido un error al registrar";
        }
    }
} else {
    $datos['exito'] = false;
    $datos['msj']="Ha ocurrido un error al registrar";
}
$bd->close();
echo json_encode($datos);


