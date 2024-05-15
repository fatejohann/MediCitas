<?php
session_start();
include 'C:\xampp\htdocs\Medicitas\Config_db.php';

if (!isset($_SESSION['username'])) {
    header('Location: logueo.php');
    exit();
}

$user_id = $_SESSION['username'];
$stmt = $conexion->prepare("SELECT * FROM users WHERE usuario = ?");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $fetch = $result->fetch_assoc();
} else {
    echo 'Usuario no encontrado';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['update_name'];
    $apellido = $_POST['update_second'];
    $email = $_POST['update_email'];
    $new_pass = $_POST['update_pass']; 
    
    if(empty($new_pass)){
        $new_pass = $fetch['pass'];
      }
    $stmt = $conexion->prepare("UPDATE users SET nombre = ?, apellido = ?, gmail = ?, pass = ? WHERE usuario = ?");
    $stmt->bind_param("sssss", $nombre, $apellido, $email, $new_pass, $user_id);
    
    if ($stmt->execute()) {
        echo '<script>
        alert("Datos modificados exitosamente."); 
        window.location.href = "Perfil.php";
        </script>';
    } else {
        echo '<script>
        alert("Error al modificar los datos: ' . addslashes($conexion->error) . '");
         window.location.href = "Actualizar_pf.php";
         </script>';
    }
    
    $stmt->close();
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../Assets/Css/profile.css">
   <title>Mi Perfil</title>
</head>
<body>
<div class="update-profile">
   <form action="" method="post" enctype="multipart/form-data">
      <?php if (isset($fetch)): ?>
         <div class="flex">
            <div class="inputBox">
               <span>Nombre:</span>
               <input type="text" name="update_name" value="<?php echo htmlspecialchars($fetch['nombre']); ?>" class="box">
               <span>Apellido:</span>
               <input type="text" name="update_second" value="<?php echo htmlspecialchars($fetch['apellido']); ?>" class="box">
               <span>Email:</span>
               <input type="email" name="update_email" value="<?php echo htmlspecialchars($fetch['gmail']); ?>" class="box">
               <span>Nueva contraseña:</span>
               <input type="password" name="update_pass" class="box">
            </div>
         </div>
         <input type="submit" value="Guardar Cambios" name="update_profile" class="btn">
         <a href="Perfil.php" class="delete-btn">Volver</a>
      <?php endif; ?>
   </form>
</div>
</body>
</html>