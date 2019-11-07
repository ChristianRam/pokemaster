<?php
try{
	include('../conexion/conexion.php');
    
	$sql = $base_de_datos->prepare("INSERT INTO `entrenador_pokemones` (`id_entrenador_pokemones`, `id_entrenador`, `id_pokemon`) VALUES (NULL, ".$_GET['id_entrenador'].", ".$_GET['id_pokemon'].");");
	//INSERT INTO `entrenador_pokemones` (`id`, `id_entrenador`, `id_pokemon`) VALUES (NULL, ".$_POST['id_entrenador'].", ".$_POST['id_pokemon'].");
	//"UPDATE `entrenador` SET `id`=".$_POST['id'].", `nombre` = '".$_POST['nombre']."', `apellido` = '".$_POST['apellido']."', `alias` = '".$_POST['alias']."', id_region = ".$_POST['region'].", `descripcion` = '".$_POST['descripcion']."', `experiencia` = ".$_POST['experiencia'].", id_distincion = ".$_POST['distincion']."  WHERE `entrenador`.`id` = ".$_POST['id']."; "
    $sql->execute();
    //echo $sql->rowCount() . "Modificado Exitosamente.";
}
catch(PDOException $e){

    echo $e->getMessage();
}
	
?>

<script type="text/javascript">
	alert("Pokemon Agregado Exitosamente");
	window.location.href='../home.php';
</script>