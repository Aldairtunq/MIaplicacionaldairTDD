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

    <h1>Login</h1>
 
    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Introduce tu correo electrónico">
      <input name="password" type="password" placeholder="Ingresa tu contraseña">
      <input type="submit" value="enviar">
    </form>
  </body>
</html>