<!DOCTYPE html>
<html>
<head>
  <title>Regiones</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

  <?php require 'partials/header2.php' ?>

    <div class="container">
            <h2>Regiones</h2>
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Capital</th>
                  <th>Nombre</th>
                  <th>Profesor</th>
                  <th>Villano</th>
                  <th>Descripción</th>
                  <th>Liga</th>
                </tr>
              </thead>
              <tbody>
                <?php
              

                  include('Conexion/conexion.php');
                  
                  
                  
                  $sql = $base_de_datos->prepare('SELECT * FROM regiones;');
                  
                  
                  $sql->execute();
                  
                  
                  $regiones = $sql->fetchAll(PDO::FETCH_OBJ);
                  
                  
                  
                    foreach($regiones as $region){


                      echo "<tr>";
                      echo "<td>".$region->id."</td>";
                      echo "<td>".$region->capital."</td>";
                      echo "<td>".$region->nombre_region."</td>";
                      echo "<td>".$region->profesor."</td>";
                      echo "<td>".$region->villano."</td>";
                      echo "<td>".$region->descripcion."</td>";
                      echo "<td>".$region->liga."</td>";
                      echo "</tr>";
                    }
                  
              
                ?>

              </tbody>
            </table>
          </div>


</body>

</body>
</html>