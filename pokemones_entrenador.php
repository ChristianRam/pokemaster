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
  <script src="js/validar_mod.js"></script>
</head>
<body >

<?php require 'partials/header2.php' ?>

  <div id="contenido">
  	<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<h1>Pokemones de Entrenadores</h1>
  		<br>
        <?php
            

            include('conexion/conexion.php');

            //$sql = $base_de_datos->prepare('SELECT * FROM entrenador;');
            $sql = $base_de_datos->prepare("SELECT * FROM entrenador WHERE id='".$_GET['id']."'; ");
            $sql->execute();
            $entrenadores = $sql->fetchAll(PDO::FETCH_OBJ);

            $sql3 = $base_de_datos->prepare("SELECT entrenador_pokemones.id_entrenador_pokemones, pokemones.id, pokemones.nombre, tipo_pokemon.nombre_tipo, pokemones.habitat FROM pokemaster.pokemones, pokemaster.tipo_pokemon, pokemaster.entrenador_pokemones
            WHERE entrenador_pokemones.id_entrenador = '".$_GET['id']."' AND entrenador_pokemones.id_pokemon = pokemones.id AND pokemones.id_tipo = tipo_pokemon.id;");
		      	$sql3->execute();
            $entrenador_pokemones = $sql3->fetchAll(PDO::FETCH_OBJ);


                /*SELECT pokemones.nombre, pokemones.id, pokemones.id_tipo, pokemones.habitad, tipo_pokemon.nombre, tipo_pokemon.id FROM 
                pokemaster.pokemones pokemaster.tipo_pokemon WHERE pokemones.id_tipo = tipo_pokemon.id;*/
            //$sql2 = $base_de_datos->prepare("SELECT pokemones.nombre, pokemones.id, pokemones.id_tipo, pokemones.habitad, tipo_pokemon.nombre, tipo_pokemon.id FROM pokemaster.pokemones pokemaster.tipo_pokemon WHERE pokemones.id_tipo = tipo_pokemon.id;");
            //$sql2->execute();
            //$pokemones = $sql2->fetcAll(PDO::FETCH_OBJ);

            //foreach($entrenadores as $entrenador){echo $entrenador->id;}
        ?>
            <div class="container card card-body" backgroud="fec0000">
            <label><strong>Id:</strong> <?php foreach($entrenadores as $entrenador){echo $entrenador->id;}?><br>
			      <strong>Nombre:</strong> <?php foreach($entrenadores as $entrenador){echo $entrenador->nombre;}?><br></label>
            
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th>Habitad</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach($entrenador_pokemones as $entrepokemon){
                //SELECT nombre_region FROM regiones WHERE id_regiones = id_relacionado_con_entrenador;
                //$sql2 = $base_de_datos->prepare('SELECT region FROM regiones WHERE id = id;');
                // $sql2->execute();
                // $regiones = $sql2->fetchAll(PDO::FETCH_OBJ);

                  echo "<tr>";
                  echo "<td>".$entrepokemon->id."</td>";
                  echo "<td>".$entrepokemon->nombre."</td>";
                  echo "<td>".$entrepokemon->nombre_tipo."</td>";
                  echo "<td>".$entrepokemon->habitat."</td>";
                  echo "<td><a href='procesos/drop_pokemon.php?id_entrenador_pokemones=".$entrepokemon->id_entrenador_pokemones."'><button type='button' class='btn btn-danger'>Eliminar</button></a></td>";
                  echo "</tr>";
              }

              ?>
              </tbody>
          </table>
     </div>
  	</div>

  </div>
  
	

</div>

</body>
</html>