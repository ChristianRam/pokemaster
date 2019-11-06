<?php
	$usuario = "root";
	$contraseña = "";
	$nombre_base_de_datos = "pokemaster";

	try{
	  $base_de_datos = new PDO('mysql:host=127.0.0.1;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
	  $base_de_datos->query("set names utf8;");
	    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
	    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	}catch(Exception $e){
	  echo "Error en conexion a la base de datos: " . $e->getMessage();
	}
?>