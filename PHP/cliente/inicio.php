<?php

// * Cargamos la utilidad de PHPMailer
use \PHPMailer\PHPMailer\PHPMailer;

// * Nos conectamos a la base de datos
include("conexion/db.php");

// * Guardamos los datos en variables
$email    = $_REQUEST['Email'];
$password = $_REQUEST['password'];
$fecha    = date("Y-m-d");

// * Consulta para verificar si el usuario existe
$consulta = "SELECT * FROM clientes WHERE email = '$email'";

// * Ejecutamos la consulta
$resultado = mysqli_query($conexion, $consulta) or die("Error al ejecutar la consulta: " . mysqli_error($conexion));

// * Verificamos si el usuario existe
while ($res = mysqli_fetch_array($resultado)) {

    // * Guardamos su nombre en una variable
    $nombre = $res['nombre'];

    // * Comprobamos si el usuario está bloqueado.
    if (!$res['bloqueo']) {

        // * Si no está bloqueado, comprobamos si la contraseña es correcta
        if (password_verify($password, $res['password'])) {

            // * Ponemos los intentos de inicio de sesión a 0 y actualizamos la fecha de inicio de sesión
            mysqli_query($conexion, "UPDATE clientes SET intentos = '0', fecha_ultima_conexion = '$fecha' WHERE email = '$email'") or
                die("Error al poner los intentos a 0: " . mysqli_error($conexion));


            // * Si la contraseña es correcta, iniciamos sesión
            session_start();
            $_SESSION['nombre'] = $nombre;
            $_SESSION['email']  = $email;

            // * Redirigimos al usuario a la página de inicio
            header("Location: ../../index.html?iniciado=true");
        } else {

            // * Si la contraseña es incorrecta, aumentamos los intentos de inicio de sesión
            mysqli_query($conexion, "UPDATE clientes SET intentos = intentos + 1 WHERE email = '$email'") or
                die("Error al aumentar los intentos: " . mysqli_error($conexion));

            // * Si los intentos son 3, bloqueamos al usuario
            if ($res['intentos'] == 2) {

                // * Generamos un token para el usuario
                $token = rand(1000, 9999);

                // * Guardamos el token en la base de datos y bloqueamos al usuario
                mysqli_query($conexion, "UPDATE clientes SET bloqueo = '1', token = '$token' WHERE email = '$email'") or
                die("Error al bloquear al usuario: " . mysqli_error($conexion));

                // * Enviamos el token al usuario
                require '../../vendor/autoload.php';
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'info@starhomes.rocks';
                $mail->Password = 'starhomes123';
                $mail->setFrom('info@starhomes.rocks', 'Reactivación de cuenta');
                $mail->addReplyTo('info@starhomes.rocks', 'starhomes.rocks');
                $mail->addAddress($email, $nombre);
                $mail->Subject = 'Reactivación de cuenta';
                $mail->IsHTML(true);
                $mail->Charset = 'UTF-8';
                $mail->Body = "Hola $nombre, has intentado iniciar sesión en starhomes.rocks con una contraseña incorrecta varías veces. <br> Para reactivar tu cuenta, introduce el siguiente código <a href='starhomes.works/paginas/cliente/reactiva.html'>aquí</a>: $token";

                if (!$mail->send()) {
                    
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    die();
                    
                } else {
                    
                    header("Location: ../../index.html?error=usuarioBloqueado");
                    die();
                
                }

            }

            // * Si la contraseña es incorrecta, redirigimos al usuario a la página de inicio
            header("Location: ../../index.html?iniciado=false");
        }
    } else {

        // * Si el usuario está bloqueado, redirigimos al usuario a la página de inicio
        header("Location: ../../index.html?error=usuarioBloqueado");
    }
}
