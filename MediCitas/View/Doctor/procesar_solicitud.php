<?php
include ("C:/xampp/htdocs/MediCitas/Config_db.php");

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha'];
$mensaje = $_POST['mensaje'];
$doctor_id = $_POST['doctor_id']; // Aquí obtenemos el ID del doctor seleccionado

// Consulta SQL para insertar la cita en la base de datos
$sql = "INSERT INTO solicitud (nombre, email, telefono, fecha, mensaje, doctor_id) VALUES ('$nombre', '$email', '$telefono', '$fecha', '$mensaje', '$doctor_id')";

// Ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    echo "La cita se ha registrado correctamente.";
} else {
    echo "Error al registrar la cita: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>