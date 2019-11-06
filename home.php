<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/validar_agg.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

    <?php require 'partials/header2.php' ?>

    <?php require 'partials/agregar.php' ?>
    <br>
    <div class="container"><p style="font-size: 30px;">Lista de Entrenadores</p></div>

      <div class="container">
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Alias</th>
                <th>Region</th>
                <th>Experiencia</th>
                <th>Distincion</th>
                <th><center>Acciones</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
  
                include('conexion/conexion.php');
    
                $sql = $base_de_datos->prepare('SELECT entrenador.id, entrenador.nombre, entrenador.apellido, entrenador.alias, 
                entrenador.descripcion, entrenador.experiencia, entrenador.id_region, entrenador.id_distincion, regiones.nombre_region, distincion.nombre_distincion FROM 
                pokemaster.entrenador, pokemaster.regiones, pokemaster.distincion WHERE regiones.id = entrenador.id_region
                AND distincion.id = entrenador.id_distincion;');
     
                $sql->execute();
        
                $entrenadores = $sql->fetchAll(PDO::FETCH_OBJ);
  
                  foreach($entrenadores as $entrenador){
                    //SELECT nombre_region FROM regiones WHERE id_regiones = id_relacionado_con_entrenador;
                    //$sql2 = $base_de_datos->prepare('SELECT region FROM regiones WHERE id = id;');
                  // $sql2->execute();
                  // $regiones = $sql2->fetchAll(PDO::FETCH_OBJ);

                    echo "<tr>";
                    echo "<td>".$entrenador->id."</td>";
                    echo "<td>".$entrenador->nombre."</td>";
                    echo "<td>".$entrenador->apellido."</td>";
                    echo "<td>".$entrenador->alias."</td>";
                    echo "<td>".$entrenador->nombre_region."</td>";
                   // echo "<td>".$entrenador->descripcion."</td>";
                    echo "<td>".$entrenador->experiencia."</td>";
                    echo "<td>".$entrenador->nombre_distincion."</td>";
                    $id = $entrenador->id;
                    echo "<td><center><div class='dropup'>";
                    echo "<button class='btn btn-success dropdown-toggle' type='button' data-toggle='dropdown'>Acción";
                    echo "<span></span></button>";
                    echo "<ul class='dropdown-menu'>";
                    echo "<li><a href='pokemones_entrenador.php?id=".$id."'>Pokemones</a></li>";
                    echo "<li><a href='add_pokemon.php?id=".$id."'>Agregar Pokemones</a></li>";
                    echo "<li class='divider'></li>";
                    echo "<li><a href='mod_entrenador.php?id=".$id."'>Modificar Entrenador</a></li>";
                    echo "<li><a href='procesos/drop_entrenador.php?id=".$id."'>Eliminar Entrenador</a></li>";
                    echo "</ul>";
                    echo "</div></center></td>";
                    /*echo "<td><center><a href='mod_entrenador.php?id=".$id."'><button type='button' class='btn btn-primary'>Pokemones</button></a>";
                    echo "<a href='add_pokemon.php?id=".$id."'><button type='button' class='btn btn-info'>Agregar Pokemón</button></a>";
                    echo "<a href='mod_entrenador.php?id=".$id."'><button type='button' class='btn btn-success'>Modificar</button></a>";
                    echo "<a href='procesos/drop_entrenador.php?id=".$id."'><button type='button' class='btn btn-danger'>Eliminar</button></a></center> </td>";*/
                    echo "</tr>";
                  }
                
            
              ?>

            </tbody>
          </table>
        </div>
    
</body>
</html>