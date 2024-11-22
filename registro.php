<!doctype html>
<html lang="es">
<head>
	<title>Registro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css_l/style.css">
</head>
<body class="img js-fullheight" style="background-image: url(img/paisaje.jpg);">
	<section class="ftco-section">
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-4">
				<div class="login-wrap p-5">
					<h3 class="mb-4 text-center">REGISTRARSE</h3>
					<form action="Acciones/crud_login.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="NOMBRE" placeholder="NOMBRE" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="APE_PATERNO" placeholder="APELLIDO PATERNO" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="APE_MATERNO" placeholder="APELLIDO MATERNO" required>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="USUARIO" placeholder="CORREO" required>
						</div>
						
						<div class="form-group">
							<input id="password-field" type="password" name="CONTRASENA" class="form-control" placeholder="CONTRASEÑA" required>
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						</div>
						<div class="form-group">
							<button type="submit" value="BTNREGISTRAR" name="BTNREGISTRAR" class="form-control btn btn-primary submit px-3">REGISTRAR</button>
						</div>
						<div class="form-group">
							<p class="text-center">¿Ya tienes una cuenta? <a href="index.php" style="color: #fff">Inicia sesión</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>