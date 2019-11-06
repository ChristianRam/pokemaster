<?php
try{
	include('../conexion/conexion.php');
    
	$sql = $base_de_datos->prepare("UPDATE entrenador SET nombre = :nombre, apellido = :apellido, alias = :alias, id_region = :region, descripcion = :descripcion, experiencia = :experiencia, id_distincion = :distincion  WHERE entrenador.id = :id; ");
	
	$sql -> bindParam(':id', $_POST['id']);
	$sql -> bindParam(':nombre', $_POST['nombre']);
	$sql -> bindParam(':apellido', $_POST['apellido']);
	$sql -> bindParam(':alias', $_POST['alias']);
	$sql -> bindParam(':region', $_POST['region']);
	$sql -> bindParam(':descripcion', $_POST['descripcion']);
	$sql -> bindParam(':experiencia', $_POST['experiencia']);
	$sql -> bindParam(':distincion', $_POST['distincion']);

    $sql->execute();
    //echo $sql->rowCount() . "Entrenador Modificado Exitosamente.";
}
catch(PDOException $e){

    echo $e->getMessage();
}
	
?>

<script type="text/javascript">
	alert("Entrenador Modificado exitosamente");
	window.location.href='../home.php';
</script>