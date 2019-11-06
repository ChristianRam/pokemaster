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
  <script src="js/validar_agg.js"></script>
</head>
<body >

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand">
        <img src="img/pokebola.png" alt="logo" style="width:40px;">
    </a>
    
    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="home.php">Entrenadores</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="regiones.php">Regiones</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="distinciones.php">Distinciones</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="pokemones.php">Pokemones</a>
        </li>
    </ul>
    </nav>
  <div id="contenido">
  	<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<h1>Modificar Entrenador</h1>
  		<br>
        <form action="procesos/modif_entrenador.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
        <?php
            

            include('conexion/conexion.php');

            
            $sql = $base_de_datos->prepare("SELECT entrenador.id, entrenador.nombre, entrenador.apellido, entrenador.alias, 
            entrenador.descripcion, entrenador.experiencia, entrenador.id_region, entrenador.id_distincion, regiones.nombre_region, distincion.nombre_distincion FROM 
            pokemaster.entrenador, pokemaster.regiones, pokemaster.distincion WHERE entrenador.id = :id AND regiones.id = entrenador.id_region
            AND distincion.id = entrenador.id_distincion;");
            $sql -> bindParam(':id', $_GET['id']);
            $sql->execute();
            
            $entrenadores = $sql->fetchAll(PDO::FETCH_OBJ);


        ?>
            <div class="container card card-body" backgroud="fec0000">
            
            <input type="hidden" name="id" id="id" value="<?php foreach($entrenadores as $entrenador){echo $entrenador->id;}?>">

            <label>Nombre: </label>
            <input type="text" id="nombre" name="nombre" class="form-control input_user" value="<?php foreach($entrenadores as $entrenador){echo $entrenador->nombre;}?>" onkeypress="return soloLetras(event)"  required><br>

            <label>Apellido: </label>
            <input type="text" id="apellido" name="apellido" class="form-control input_user" value="<?php foreach($entrenadores as $entrenador){echo $entrenador->apellido;}?>" onkeypress="return soloLetras(event)"  required><br>
            
            <label>Alias: </label>
            <input type="text" id="alias" class="form-control input_user" name="alias" value="<?php foreach($entrenadores as $entrenador){echo $entrenador->alias;}?>" required><br>

            <label>Region: </label>
            <select class="form-control" id="region" name="region" required>
                                        <option value='<?php foreach($entrenadores as $entrenador){echo $entrenador->id_region;}?>' selected><?php foreach($entrenadores as $entrenador){echo $entrenador->nombre_region;}?></option>
                                        <?php 
                                            $sql = $base_de_datos->prepare('SELECT nombre_region FROM pokemaster.regiones;');
                                            $sql->execute();
                                            $regiones = $sql->fetchAll(PDO::FETCH_OBJ);
                                            $contador = 0;
                                            foreach($regiones as $region){
                                                $contador = $contador + 1;
                                                echo "<option value='".$contador."'>".$region->nombre_region."</option>";
                                            }

                                        ?>
                                    </select><br>

            <label>Descripcion: </label>
            <textarea style="border-radius: 10px;" rows="3" class="form-control input_user" cols="50" id="descripcion" name="descripcion" required><?php foreach($entrenadores as $entrenador){echo $entrenador->descripcion;}?></textarea><br>

            <label>Experiencia: </label>
            <input type="number" id="experiencia" name="experiencia" class="form-control input_user" onkeypress="return soloNumeros(event);" 
                            maxlength="2" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                            value="<?php foreach($entrenadores as $entrenador){echo $entrenador->experiencia;}?>" required>
                            
                            <br>

            <label>Distincion: </label>
            <div style="margin-bottom: 40px ;"><select class="form-control" id="distincion" name="distincion" required>
                                        <option selected="true" value='<?php foreach($entrenadores as $entrenador){echo $entrenador->id_distincion;}?>'><?php foreach($entrenadores as $entrenador){echo $entrenador->nombre_distincion;}?></option>
                                        <?php 
                                            $sql = $base_de_datos->prepare('SELECT nombre_distincion FROM pokemaster.distincion;');
                                            $sql->execute();
                                            $distinciones = $sql->fetchAll(PDO::FETCH_OBJ);
                                            $contador = 0;
                                            foreach($distinciones as $distincion){
                                                $contador = $contador + 1;
                                                echo "<option value='".$contador."'>".$distincion->nombre_distincion."</option>";
                                            }

                                        ?>
                                    </select>

            </div>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
     </div>
  	</div>

  </div>
  
	

</div>

</body>
</html>