<?php
header("Content-Type: text/html;charset=utf-8");
include '../Coneccion/conecta.php';
$datos = array();
$bd = new MySQL();
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$CI = $_POST['CI'];
$fecha = $_POST['fecha'];
$edad = $_POST['edad'];
$relacion = $_POST['relacion'];
$direccion = $_POST['direccion'];
$sector = $_POST['sector'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$observacion = $_POST['observacion'];
$Catgeneral = $_POST['Catgeneral'];
$resultU = $bd->consulta("CALL SP_ULTIMO_INSERT()");
$rowID = $bd->fetch_array($resultU);
$casoID = $rowID['caso_id'];
$bd->next_result();
$insertRD = $bd->consulta("CALL SP_INSERT_DENUNCIANTE('" . $nombres . "','" . $apellidos . "','" . $CI . "','" . $fecha . "',$edad,'" . $relacion . "','" . $direccion . "','" . $sector . "','" . $telefono . "','" . $email . "','" . $observacion . "',$casoID)");
$bd->next_result();
if ($insertRD) {
    for ($i = 0; $i < count($Catgeneral); $i++) {
        $var = $Catgeneral[$i];
        $result = $bd->consulta("SELECT * FROM t_catalogogeneral WHERE t_catalogogeneral.ctg_descripcion LIKE '$var'");
        $row = $bd->fetch_array($result);
        $CTGid = $row['ctg_id'];
        $bd->next_result();
        $resultU = $bd->consulta("SELECT MAX(dden_id) AS dden_id FROM t_denunciante;");
        $ultimo = $bd->fetch_array($resultU);
        $ddenID = $ultimo['dden_id'];
        $bd->next_result();
        $insertAux = $bd->consulta("INSERT INTO t_auxdenunciante(t_auxdenunciante.dden_id,t_auxdenunciante.ctg_id) VALUES (" . $ddenID . "," . $CTGid . ")");
        $bd->next_result();
        if ($insertAux) {
            $datos['exito'] = true;
            $datos['msj'] = "Se registro con exito";
        } else {
            $datos['exito'] = false;
            $datos['msj'] = "Ha ocurrido un error al registrar";
        }

    }
} else {
    $datos['exito'] = false;
    $datos['msj'] = "Ha ocurrido un error al registrar";
}
echo json_encode($datos);

