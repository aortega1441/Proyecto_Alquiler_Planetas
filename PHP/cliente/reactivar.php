<?php

// * Conexion a la base de datos
include("../conexion/db.php");

// * Guardamos los datos en variables
$email = $_REQUEST['email'];
$token = $_REQUEST['primero'];
$token .= $_REQUEST['segundo'];
$token .= $_REQUEST['tercero'];
$token .= $_REQUEST['cuarto'];

// * Consulta para verificar si el usuario existe
$consulta = "SELECT * FROM clientes WHERE email = '$email'";
$resultado = mysqli_query($conexion, $consulta) or die("Error al ejecutar la consulta: " . mysqli_error($conexion));

// * Verificamos si el usuario existe
while( $res = mysqli_fetch_array($resultado) ){

    // * Si el usuario existe, comprobamos si el token es correcto
    if( $res['token'] == $token ){

        // * Desbloqueamos al usuario e inciamos sesión
        mysqli_query($conexion, "UPDATE clientes SET bloqueo = 0, intentos = 0 WHERE email = '$email'") or die("Error al activar la cuenta: " . mysqli_error($conexion));
        header("Location: ../../index.php?reactivado=true");

    } else {

        // * Si el token es incorrecto, redirigimos al usuario al inicio
        header("Location: ../../index.php?reactivado=false");

    }

}

?>
