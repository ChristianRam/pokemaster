<?php 

    session_start();
	require "conexion/conexion.php";
	
	$message = "";

    if(!empty($_POST['nombre']) && !empty($_POST['password'])){

        $sql = $base_de_datos->prepare('SELECT id, nombre, contraseña FROM pokemaster.administrador WHERE nombre=:nombre');
        $sql -> bindParam(':nombre', $_POST['nombre']);
        $sql->execute();
		$result = $sql->fetch(PDO::FETCH_ASSOC);

        if(!empty($result) && password_verify($_POST['password'], $result['contraseña'])){
            $_SESSION['user_id'] = $result['id'];

            header("Location: /pokemaster/home.php");
        }else{
			$message = "Usuario y/o contraseña incorrecto!";
        }
    }


?>

<!DOCTYPE html>
<html>
    
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
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/pokebola.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="signin.php" method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="nombre" class="form-control input_user" placeholder="Nombre" onkeypress="return soloLetras(event)" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" placeholder="Contraseña" required>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
							<button type="submit" name="entrar" class="btn login_btn">Entrar</button>
						</div>
					</form>
				</div>
				<div class="mt-4">
					<?php if(!empty($message)): ?>
					<div class="d-flex justify-content-center links"><p><?= $message ?></p></div>
					<?php endif; ?>
					<div class="d-flex justify-content-center links">
						¿Aún no eres entrenador Pokimón? <a href="signup.php" class="ml-2">Registrarse</a>
					</div>
				</div>
			</div>
		</div>
     </div>

</body>


</html>
