<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <script src="../alertifyjs/alertify.js" rel="stylesheet"></script>
    <link rel="stylesheet" href="../alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="../alertifyjs/css/themes/default.css">
    <script src='../js/jquery-3.2.1.min.js'></script>
    <script src="../js/loginVerifica.js" type="text/javascript"></script>
    <script src="../js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../js/Email.js" type="text/javascript"></script>
    <title>Restablecimiento de Contraseña</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
<h1>Restablecer Contraseña</h1>
<h1>Se enviara un correo al Administrador para que restablesca su contraseña</h1>
<form class="cf" id="formR" name="formR" method="POST">
    <center>
        <div>
            <input type="text" id="Usuario" name="Usuario" required="required" placeholder="Usuario">
            <input type="email" id="Email" name="Email" required="required" placeholder="Email">
        </div>
        <input type="submit" value="Enviar" id="input-submit" name="Restablecer" size="60">
    </center>
</form>


</body>
</html>
