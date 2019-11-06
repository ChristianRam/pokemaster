<?php 
    require "conexion/conexion.php";

    $message = "";

    if(!empty($_POST['nombre']) && !empty($_POST['password'])){
		if($_POST['password'] == $_POST['confirm-password']){
			$sql = $base_de_datos->prepare('INSERT INTO pokemaster.administrador(nombre, apellido, contraseña) VALUES(:nombre, :apellido, :password)');
			$sql -> bindParam(':nombre', $_POST['nombre']);
			$sql -> bindParam(':apellido', $_POST['apellido']);
			$contraseña = password_hash($_POST['password'], PASSWORD_BCRYPT);
			$sql -> bindParam(':password', $contraseña);
			
			if($sql->execute()){
				$message = "Usuario registrado exitosamente!";
			}else{
				$message = "El usuario no pudo ser registrado!";
			}
		}else{
			$message= "ERROR! Las contraseñas no coinciden!";	
		}
        
        
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Entrenador Pokemón</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/tema.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/validar_agg.js"></script>
</head>
<body>
    
    <?php require 'partials/header.php' ?>
    <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card_regis">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/pokebola.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="signup.php" method="post">
                        <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="nombre" class="form-control input_user" placeholder="Nombre" onkeypress="return soloLetras(event)" required>
                            </div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="apellido" class="form-control input_user" placeholder="Apellido" onkeypress="return soloLetras(event)" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" placeholder="Contraseña" required>
                        </div>
                        <div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="confirm-password" class="form-control input_pass" placeholder="Confirmar Contraseña" required>
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="submit" name="registrar" class="btn login_btn">Registrar</button>
						</div>
					</form>
				</div>
				<div class="mt-4">
					<?php if(!empty($message)): ?>
					<div class="d-flex justify-content-center links"><p><?= $message ?></p></div>
					<?php endif; ?>
					<div class="d-flex justify-content-center links">
						¿Ya estas registrado? <a href="signin.php" class="ml-2">Logeate</a>
					</div>
				</div>
			</div>
		</div>
     </div>

</body>
</html>