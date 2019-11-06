<?php
try{
	include('../conexion/conexion.php');
    
	$sql = $base_de_datos->prepare("DELETE FROM `entrenador_pokemones` WHERE `entrenador_pokemones`.`id_entrenador_pokemones` = ".$_GET['id_entrenador_pokemones']."; ");
    
    $sql->execute();
    //echo $sql->rowCount() . "Entrenador Modificado Exitosamente.";
}
catch(PDOException $e){

    echo $e->getMessage();
}
	
?>

<script type="text/javascript">
	alert("Pokemon Eliminado exitosamente");
	window.location.href='../home.php';
</script>