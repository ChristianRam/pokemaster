<!DOCTYPE html>
<html>
<head>
  <title>Distinciones</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<?php require 'partials/header2.php' ?>
    </nav>

    <div class="container">
            <h2>Distinciones</h2>
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                </tr>
              </thead>
              <tbody>
                <?php
              

                  include('Conexion/conexion.php');
                  
                  
                  
                  $sql = $base_de_datos->prepare('SELECT * FROM distincion;');
                  
                  
                  $sql->execute();
                  
                  
                  $distinciones = $sql->fetchAll(PDO::FETCH_OBJ);
                  
                  
                  
                    foreach($distinciones as $distincion){


                      echo "<tr>";
                      echo "<td>".$distincion->id."</td>";
                      echo "<td>".$distincion->nombre_distincion."</td>";
                      echo "<td>".$distincion->descripcion."</td>";
                      echo "</tr>";
                    }
                  
              
                ?>

              </tbody>
            </table>
          </div>


</body>

</body>
</html>