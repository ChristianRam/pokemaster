<?php
try{
	include('../conexion/conexion.php');
	
	$sql1 = $base_de_datos->prepare("DELETE FROM `entrenador_pokemones` WHERE `entrenador_pokemones`.`id_entrenador` = ".$_GET['id']."; ");
	$sql1->execute();

	$sql = $base_de_datos->prepare("DELETE FROM `entrenador` WHERE `entrenador`.`id` = ".$_GET['id']."; ");
    
    $sql->execute();
    //echo $sql->rowCount() . "Entrenador Modificado Exitosamente.";
}
catch(PDOException $e){

    echo $e->getMessage();
}
	
?>

<script type="text/javascript">
	alert("Entrenador Eliminado exitosamente");
	window.location.href='../home.php';
</script>