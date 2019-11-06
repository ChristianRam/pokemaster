<?php
try{
	include('../conexion/conexion.php');
    
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