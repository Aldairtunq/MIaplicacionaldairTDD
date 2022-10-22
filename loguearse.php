<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /loguerarse.php');
  }
  require 'conexiologin.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /loguearse.php");
    } else {
      $message = 'lo siento, esas credenciales no coinciden';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'otroscodigos/header.php' ?>

    <h1>INICIAR SESION</h1>
    <span> or <a href="registrarse.php">Regresar a Registrarse</a></span>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    
    <form action="loguearse.php" method="POST">
      <input name="email" type="text" placeholder="Ingrese su email.com">
      <input name="password" type="password" placeholder="Ingrese su contraseña">
      <input type="submit" value="enviar">
    </form>
  </body>
</html>
