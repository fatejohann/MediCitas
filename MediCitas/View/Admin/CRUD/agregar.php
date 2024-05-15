<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Assets/Css/registros.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap">
    <script src="https://kit.fontawesome.com/4c18fef4cd.js" crossorigin="anonymous"></script>

    <title>Formulario Registro</title>
</head>
<body>
  <div class="cont">
<section> 

    <form action="Registro.php" method="post">
     <center><img src="../../../Assets/Img/logo-login.png" height="190"></center>
      <hr class="divider">
      <br><br>
      <label for="text" id="Especialidad" name="special">Especialidad:</label>
      <input type="text" id="Especialidad" name="special" required>
        <br><br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="Nombre" name="name" required>
           <br><br>
        <label for="second-name">Apellido:</label>
        <input type="text" id="Apellido" name="second" required>
          <br><br>
        <label for="age">Edad: </label>
        <input type="number" id="Edad" name="age" required>
          <br><br>
          <label for="telefono">Teléfono de contacto:</label>
        <input type="text" id="telefono" name="telefono" pattern="[0-9]{4}-[0-9]{4}" title="Por favor ingrese un número de teléfono válido en el formato xxxx-xxxx" required>
          <br><br>
        <label for="gmail">Correo electrónico:</label>
        <input type="email" id="Gmail" name="email" required>
        <br><br>
        <label for="usuario">Usuario:</label>
        <input type="text" id="Nomuser" name="user" required>
          <br><br>
        <label for="gmail">Contraseña:</label>
        <input type="password" id="Pass" name="clave" required><i class="fa-solid fa-eye" id="eye-icon"></i>
        <br><br>
        <input type="submit" value="Registrar" name="subir">
      </form>
      <script src="../../../Assets/Js/password.js"></script>
  </div>
</body>
</html>