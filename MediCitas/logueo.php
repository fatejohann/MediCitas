<?php
include ("C:/xampp/htdocs/MediCitas/Config_db.php");

session_start();

$usuario = $_POST['Usuario'];
$password = $_POST['Clave'];

$query_usuario = "SELECT * FROM users WHERE usuario = ? AND pass = ?";
$query_admin = "SELECT * FROM admins WHERE usuario = ? AND pass = ?";
$query_doctor = "SELECT * FROM doctor WHERE usuario = ? AND pass = ?";

$stmt_usuario = $conexion->prepare($query_usuario);
$stmt_usuario->bind_param("ss", $usuario, $password);
$stmt_usuario->execute();
$result_usuario = $stmt_usuario->get_result();

$stmt_admin = $conexion->prepare($query_admin);
$stmt_admin->bind_param("ss", $usuario, $password);
$stmt_admin->execute();
$result_admin = $stmt_admin->get_result();

$stmt_doctor = $conexion->prepare($query_doctor);
$stmt_doctor->bind_param("ss", $usuario, $password);
$stmt_doctor->execute();
$result_doctor = $stmt_doctor->get_result();

if ($result_usuario->num_rows == 1) {
    // Usuario de la tabla de usuarios
    $_SESSION['username'] = $usuario;
    header("Location: /MediCitas/View/Usuarios/index.php"); 
} elseif ($result_admin->num_rows == 1) {
    // Usuario de la tabla de administradores
    $_SESSION['username'] = $usuario;
    header("Location: /MediCitas/View/Admin/Index_ad.php"); 
} elseif ($result_doctor->num_rows == 1) {
    // Usuario de la tabladoctores
    $_SESSION['username'] = $usuario;
    header("Location: /MediCitas/View/Doctor/Index_doc.php"); 
} else {
    echo '<script type="text/javascript">
        alert("Hubo un error en las credenciales.");
        window.location.href="LoginForm.php";
        </script>';
        exit(); 
}

?>