<?php 

    include("../conexion/conexion.php"); 
    
    if(isset($_POST['agregar'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $alias = $_POST['alias'];
        $region = $_POST['region'];
        $descripcion = $_POST['descripcion'];
        $experiencia = $_POST['experiencia'];
        $distincion = $_POST['distincion'];

        $sql = $base_de_datos->prepare('SELECT alias FROM pokemaster.entrenador WHERE alias= "'.$alias.'"');
        $sql->execute();
        $alias_bd = $sql->fetchAll(PDO::FETCH_OBJ);

        if(empty($alias_bd)){
        
 
        $query = "INSERT INTO entrenador(nombre, apellido, alias, id_region, descripcion, 
        experiencia, id_distincion) VALUES('$nombre', '$apellido', '$alias', '$region', '$descripcion', 
        '$experiencia', '$distincion')";

        $sql = $base_de_datos->prepare($query);
        $sql->execute();
        
        header("Location: ../home.php");

        }else{
           
            $mensaje = "Este alias ya se encuentra en uso";
            echo "<script>";
            echo "alert('$mensaje');";  
            echo "window.location = '../home.php';";
            echo "</script>"; 
        }
        
    }

?>