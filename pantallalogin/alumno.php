<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM alumno";
    $query=mysqli_query($con,$sql);
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA ALUMNO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>

     <tr> <?php require 'C:\xampp\htdocs\MIaplicacionaldairTDD/otroscodigos/header.php' ?> </tr>

            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>INGRESE DATOS DEL ESTUDIANTE</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="cod_estudiante" placeholder="ingrese en codigo">
                                    <input type="text" class="form-control mb-3" name="dni" placeholder="DNI">
                                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Ingrese el Nombre">
                                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="Ingrese los Apellidos">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                       <th> <center> CODIGO</th>
                                        <th>DNI</th>
                                        <th>NOMBRE</th>
                                        <th>APELLIDOS</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['cod_estudiante']?></th>
                                                <th><?php  echo $row['dni']?></th>
                                                <th><?php  echo $row['nombres']?></th>
                                                <th><?php  echo $row['apellidos']?></th>    
                                                <th><a href="actualizar.php?id=<?php echo $row['cod_estudiante'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['cod_estudiante'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                               
                            </table>
                        </div>
                      
                    </div>  
                    <button class:"btn btn-primary btn-lg" >  <a href=" desloguear.php">  CERRAR SESION </a>  </button>

            </div>
            
    </body>
</html>