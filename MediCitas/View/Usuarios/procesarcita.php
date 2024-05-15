<?php
include ("C:/xampp/htdocs/MediCitas/Config_db.php");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha'];
$mensaje = $_POST['mensaje'];
$doctor_id = $_POST['doctor_id'];

$sql = "INSERT INTO solicitud (nombre, email, telefono, fecha, mensaje, doctor_id) VALUES ('$nombre', '$email', '$telefono', '$fecha', '$mensaje', '$doctor_id')";

if ($conexion->query($sql) === TRUE) {
    echo '<script>
    alert("Cita enviada con éxito. Será revisada por el personal médico.");
    window.location.href = "index.php";
    </script>';
} else {
    echo '<script>
      alert("Error al agendar cita: ' . addslashes($conexion->error) . '");
       window.location.href = "Redcita.php";
       </script>';
}

$conexion->close();
?>