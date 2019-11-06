<?php 

    session_start();
    include("../conexion/conexion.php");

    if(!empty($_POST['nombre']) && !empty($_POST['contraseña'])){

        $sql = $base_de_datos->prepare('SELECT id, nombre, contraseña FROM pokemaster.administrador WHERE nombre=:nombre');
        $sql -> bindParam(':nombre', $_POST['nombre']);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if(count($result) > 0 && password_verify($_POST['contraseña'], $result['contraseña'])){
            $_SESSION['user_id'] = $result['id'];

            header("Location: ../home.php");
        }else{

        }
    }


?>