<?php
require_once("../Coneccion/conecta.php");
$bd = new MySQL();
$datos[] = array();
$destino = "";
$row = "";
if (isset($_POST['Email']) && isset($_POST['CI'])) {
    //buscar dicho correo asociado a un usuario
    $email = $_POST['Email'];
    $CI = $_POST['CI'];
    $destino = "joseijd69@gmail.com";
    $lista = $bd->consulta("CALL SP_BUSCAR_BY_EMAIL_USER('" . $CI . "','" . $email . "')");
    $row = $bd->fetch_array($lista);
    $id=$row['USU_ID'];
    $bd->next_result();
    $cambio=$bd->consulta("UPDATE t_usuarios SET t_usuarios.USU_CCONTRASENIA=1 WHERE t_usuarios.USU_ID=$id");

}

error_reporting(E_ALL);
require("PHPMailer/class.smtp.php");
require("PHPMailer/class.phpmailer.php");
$mail = new PHPMailer();
$mail->charSet = "UTF-8";
$mail->IsSMTP(); // set mailer to use SMTP
//$mail->SMTPDebug = 2;
$mail->From = "joseibadangois@gmail.com";
$mail->FromName = "Administrador";
$mail->Host = "smtp.gmail.com"; // specif smtp server
$mail->SMTPSecure = "tls"; // Used instead of TLS when only POP mail is selected
$mail->Port = 587; // Used instead of 587 when only POP mail is selected
$mail->SMTPAuth = true;
$mail->Username = "joseibadangois@gmail.com"; // SMTP username
$mail->Password = "JoseIbadango95"; // SMTP password
$mail->AddAddress("joseijd69@gmail.com", "Jiansen"); //replace myname and mypassword to yours
$mail->AddReplyTo("joseibadangois@gmail.com", "Jiansen");
$mail->WordWrap = 50; // set word wrap
//$mail->AddAttachment("c:\\temp\\js-bak.sql"); // add attachments
//$mail->AddAttachment("c:/temp/11-10-00.zip");

$mail->IsHTML(true); // set email format to HTML

$mail->Subject = 'Peticion de Cambio de Contraseña';
$mail->Body = 'Estimado Administrador se ha solicitado el cambio de contraseña del usuario:' . $row['USU_NOMBRE'] . " " . $row['USU_APELLIDO'];
$bd->close();
if (!$mail->Send()) {
    $datos['exito'] = true;
    $datos['msj'] = "Se ha enviado un correo al Administrador";
} else {
    $datos['exito'] = true;
    $datos['msj'] = "Se ha enviado un correo al Administrador";
}

echo json_encode($datos);
?>