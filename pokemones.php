<!DOCTYPE html>
<html>
<head>
  <title>Pokemones</title>
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
            <h2>Pokemones</h2>
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th>Descripción</th>
                  <th>Habitat</th>
                </tr>
              </thead>
              <tbody>
                <?php
              

                  include('Conexion/conexion.php');
                  
                  
                  
                  $sql = $base_de_datos->prepare('SELECT * FROM pokemones;');
                  
                  
                  $sql->execute();
                  
                  
                  $pokemones = $sql->fetchAll(PDO::FETCH_OBJ);
                  
                  
                  
                    foreach($pokemones as $pokemon){


                      echo "<tr>";
                      echo "<td>".$pokemon->id."</td>";
                      echo "<td>".$pokemon->nombre."</td>";
                      echo "<td>".$pokemon->id_tipo."</td>";
                      echo "<td>".$pokemon->descripcion."</td>";
                      echo "<td>".$pokemon->habitat."</td>";
                      echo "</tr>";
                    }
                  
              
                ?>

              </tbody>
            </table>
          </div>


</body>

</body>
</html>