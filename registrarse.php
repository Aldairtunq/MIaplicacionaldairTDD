  
 <?php

require 'conexiologin.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(':password', $password);

  if ($stmt->execute()) {
    $message = 'Nuevo usuario creado con exito';
  } else {
    $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>SignUp</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <?php require 'otroscodigos/header.php' ?>

  <?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
  <?php endif; ?>

  <h1>REGISTRARSE</h1>
  <span> <a href="loguearse.php">Iniciar secion</a></span>

  <form action="signup.php" method="POST">
    <input name="email" type="text" placeholder="ingresar su email">
    <input name="password" type="password" placeholder="ingresar la contraseña">
  
    <input type="submit" value="Enviar">
  </form>

</body>
</html>
