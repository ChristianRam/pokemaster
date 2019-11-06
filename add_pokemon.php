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
  		<h1>Agregar Pokemón</h1>
  		<br>
        <form action="procesos/modif_entrenador.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
        <?php
            

            include('conexion/conexion.php');

            //$sql = $base_de_datos->prepare('SELECT * FROM entrenador;');
            $sql = $base_de_datos->prepare("SELECT * FROM entrenador WHERE id='".$_GET['id']."'; ");
            $sql->execute();
            $entrenadores = $sql->fetchAll(PDO::FETCH_OBJ);

			$sql2 = $base_de_datos->prepare('SELECT pokemones.id, pokemones.nombre, tipo_pokemon.nombre_tipo, pokemones.habitat FROM pokemaster.pokemones, pokemaster.tipo_pokemon
			WHERE pokemones.id_tipo = tipo_pokemon.id;');
			$sql2->execute();
			$pokemones = $sql2->fetchAll(PDO::FETCH_OBJ);
			
			$sql3 = $base_de_datos->prepare("SELECT * FROM entrenador_pokemones WHERE id_entrenador='".$_GET['id']."'; ");
			$sql3->execute();
            $entrenador_pokemones = $sql3->fetchAll(PDO::FETCH_OBJ);
                  
			$contador = 0;
			
                  
			

            //foreach($entrenadores as $entrenador){echo $entrenador->id;}
        ?>
            <div class="container card card-body" backgroud="fec0000">
            <label><strong>Id:</strong> <?php foreach($entrenadores as $entrenador){echo $entrenador->id;}?><br>
			<strong>Nombre:</strong> <?php foreach($entrenadores as $entrenador){echo $entrenador->nombre;}?><br>
			<strong>Pokemones que tiene: </strong><?php foreach($entrenador_pokemones as $tienepoke){$contador=$contador+1;}echo $contador;?></label>
            
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Tipo</th>
						<th>Habitat</th>
						<th>Acción</th>
					</tr>
				</thead>
				<tbody>

			  	<?php
					foreach($pokemones as $pokemon){


						echo "<tr>";
						echo "<td name='id_pokemon' id='id_pokemon'>".$pokemon->id."</td>";
						echo "<td>".$pokemon->nombre."</td>";
						echo "<td>".$pokemon->nombre_tipo."</td>";
						//echo "<td>".$pokemon->descripcion."</td>";
						echo "<td>".$pokemon->habitat."</td>";
						echo "<td><a href='procesos/add_pokemon.php?id_entrenador=".$entrenador->id."&id_pokemon=".$pokemon->id."'><button type='button' class='btn btn-success'>Agregar</button></a></td>";
						echo "</tr>";
					}

				?>
				</tbody>
            </table>
          </div>


  

            <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
     </div>
  	</div>

  </div>
  
	

</div>

</body>
</html>