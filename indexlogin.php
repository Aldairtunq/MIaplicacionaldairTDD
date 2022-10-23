
<?php

  session_start();

  require 'conexiologin.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome to you WebApp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    
  </head>
  <body>

    <?php require 'otroscodigos/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> BIENVENIDO . <?= $user['email']; ?>
      <br> tu estas satisfactoriamente logueado
      <a href="desloguear.php">
        cerrar sesion
      </a>
    <?php else: ?>

      <h1>POR FAVOR INGRESA O REGISTRATE</h1>

     <button> <a href="loguearse.php">INICIAR SECION </a> </button> <---------->          
     <button> <a href="registrarse.php">REGISTRARSE</a> </button>
    <?php endif; ?>
  </body>
</html>


