<?php

// * Cargamos la utilidad de PHPMailer
use \PHPMailer\PHPMailer\PHPMailer;

// * Nos conectamos a la base de datos
include("../conexion/db.php");

// * Guardamos los datos en variables
$nombre    = $_REQUEST['nombre'];
$apellido  = $_REQUEST['apellido'];
$email     = $_REQUEST['Email'];
$password  = $_REQUEST['password'];
$bloqueado = 1;

// * Consulta para verificar si el usuario existe
$consulta = "SELECT * FROM clientes WHERE email = '$email'";

// * Ejecutamos la consulta
$resultado = mysqli_query($conexion, $consulta) or die("Error al ejecutar la consulta: " . mysqli_error($conexion));

// * Verificamos si el usuario existe
if (mysqli_num_rows($resultado) > 0) {

    // * Si el usuario existe, redirigimos al usuario al inicio
    header("Location: ../../index.php?existe=true");

} else {

    // * Codificamos la contraseña
    $password = password_hash($password, PASSWORD_DEFAULT);

    // * Si el usuario no existe, lo registramos
    mysqli_query($conexion, "INSERT INTO clientes (nombre, apellido, email, password, bloqueo) VALUES ('$nombre', '$apellido', '$email', '$password', '$bloqueado')") or
        die("Error al registrar al usuario: " . mysqli_error($conexion));

    // * Enviamos un correo de confirmación al usuario
    require '../../vendor/autoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'info@starhomes.rocks';
    $mail->Password = '*******';
    $mail->setFrom('info@starhomes.rocks', 'Activación cuenta en SmartHomes');
    $mail->addReplyTo('info@starhomes.rocks', 'starhomes.rocks');
    $mail->addAddress($email, $nombre);
    $mail->Subject = 'Activación cuenta en SmartHomes';
    $mail->IsHTML(true);
    $mail->Charset = 'UTF-8';
    //$mail->Mailer = "smtp";
    $mail->Body = "Hola $nombre, gracias por registrarte en SmartHomes. Para activar tu cuenta, haz click en el siguiente enlace: <a href='https://starhomes.rocks/PHP/cliente/activar.php?email=$email'>Activar cuenta</a>";

    if (!$mail->send()) {
        
        echo "Mailer Error: " . $mail->ErrorInfo;
        die();

    } else {

        header("Location: ../../index.php?registrado=true");
        die();

    }

}
