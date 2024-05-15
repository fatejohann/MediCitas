<?php
include 'C:\xampp\htdocs\Medicitas\Config_db.php';

session_start();
if(!isset($_SESSION['username'])){
   header('Location: logueo.php');
   exit();
}
$user_id = $_SESSION['username'];

$query = "SELECT * FROM admins WHERE usuario = '$user_id'";
$result = $conexion->query($query);

if($result && $result->num_rows > 0){
   $fetch = $result->fetch_assoc();
}else{
   echo 'Usuario no encontrado';
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mi Perfil</title>
   <link rel="stylesheet" href="../../Assets/Css/profile.css">
</head>
<body>
<div class="update-profile">
   <form action="" method="post" enctype="multipart/form-data">
      <?php if (isset($fetch)): ?>
         <div class="flex">
            <div class="inputBox">
               <span>Email:</span>
               <input type="email" name="update_email" value="<?php echo htmlspecialchars($fetch['gmail']); ?>" class="box" disabled>
               <span>Nombre de usuario:</span>
               <input type="text" name="update_user" value="<?php echo htmlspecialchars($fetch['usuario']); ?>" class="box" disabled>
            </div>
         </div>
         <a href="Actualizar_pf.php" class="btn">Actualizar mi perfil</a>
         <a href="Index_ad.php" class="delete-btn">Volver</a>
      <?php endif; ?>
   </form>
</div>
</body>
</html>