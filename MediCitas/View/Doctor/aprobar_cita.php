<?php
$conexion = new mysqli("localhost", "root", "", "db_mcitas");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$cita_id = $_POST['cita_id'];

$sql = "UPDATE solicitud SET estado='aprobada' WHERE id='$cita_id'";

if ($conexion->query($sql) === TRUE) {
    // Redirigir de vuelta a la página anterior
    header("Location: Solicitudes.php");
    exit();
} else {
    echo "Error al aprobar la cita: " . $conexion->error;
}

$conexion->close();
?>
