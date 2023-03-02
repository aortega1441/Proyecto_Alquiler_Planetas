<?php 

include('../conexion/db.php');

session_start();
$idCliente = $_SESSION["idCliente"];

$planetName = $_REQUEST['planetName'];
$fechaIda = $_REQUEST['fechaIda'];
$fechaVuelta = $_REQUEST['fechaVuelta'];
$personas = $_REQUEST['personas'];
$precio = $_REQUEST['precio'];

if( $fechaIda == '' || $fechaVuelta == '' || $personas == '' ){
    
echo "error";    
    
} else {

$fechaHoy = date('d-m-Y');

    if( $fechaIda < $fechaHoy ){
        
        echo "pasada";
        
    } else {
        
        $consulta = "SELECT fecha_entrada, fecha_salida FROM reservas WHERE nombre_planeta = '$planetName'";
        
        $todaFechas = mysqli_query($conexion, $consulta) or die("Error al ejecutar la consulta: " . mysqli_error($conexion));
        
        $deLoco = true;
        
        while ($fechas = mysqli_fetch_array($todaFechas)){
                

            if( $fechaIda == $fechas['fecha_entrada'] || $fechaIda == $fechas['fecha_salida'] || $fechaVuelta == $fechas['fecha_entrada'] || $fechaVuelta == $fechas['fecha_salida'] || ($fechaIda >= $fechas['fecha_entrada'] && $fechaIda <= $fechas['fecha_salida']) || ($fechaVuelta >= $fechas['fecha_entrada'] && $fechaVuelta <= $fechas['fecha_salida']) ){
                
                $deLoco = false;
                
            } else {
                
                $deLoco = true;
                
            }
            
            

        }

        if( $deLoco ){
            
            $fechaLlegada = date("Y-m-d", strtotime($fechaIda));
            $fechaSalida = date("Y-m-d", strtotime($fechaVuelta));

            mysqli_query($conexion, "INSERT INTO reservas (id_cliente, nombre_planeta, fecha_entrada, fecha_salida, personas, precio) VALUES ('$idCliente', '$planetName', '$fechaLlegada', '$fechaSalida', '$personas', '$precio')") or
            die("Error al registrar reserva: " . mysqli_error($conexion));
            
            echo "ok";
            
        } else {
            
            echo "cogido";
            
        }
        
    }

}
?>