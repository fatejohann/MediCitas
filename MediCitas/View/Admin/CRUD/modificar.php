<?php
session_start();

include ("C:/xampp/htdocs/MediCitas/Config_db.php");

$id = $_POST['id'];
$especialidad = $_POST['especialidad'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

$stmt = $conexion->prepare("UPDATE doctor SET especialidad = ?, nombre = ?, apellido = ?, edad = ?, telefono = ?, gmail = ? WHERE ID = ?");
$stmt->bind_param("sssiisi", $especialidad, $nombre, $apellido, $edad, $telefono, $email, $id);

if ($stmt->execute()) {
    echo '<script>
    alert("Usuario modificado con éxito.");
    window.location.href = "Crud.php";
    </script>';
} else {
    echo '<script>
    alert("Error al modificar los datos: ' . addslashes($conexion->error) . '");
    window.location.href = "Crud.php";
    </script>';
}

$stmt->close();
$conn->close();
?>