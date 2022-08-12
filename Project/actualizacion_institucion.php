<?php 
	include("utils/conexion.php");
	include("utils/auth.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="widdiv=device-widdiv, initial-scale=1">
	<title>Institucion</title>
	<?php
		include("cabecera.php");
	?>
</head>
<body>
	<div class="container centered fullscreen">
		<h1 class="title">Actualiza tu información de institución</h1>
		<form action="p_actualizacion_institucion.php" method="post">
			<div class="card p-5">
				<div class="field">
					<label class="label">RUC: </label>
					<input type="text" name="ruc" maxlength="11" required class="input">
				</div>
				<div class="field">
					<label class="label">Razon Social: </label>
					<input type="text" name="razonsocial" maxlength="200" required class="input">
				</div>
				<div class="field">
					<label class="label">E-mail: </label>
					<input type="email" name="email" maxlength="200" required class="input">
				</div>
				<div class="field">
					<label class="label">Telefono: </label>
					<input type="text" name="telefono" maxlength="7" class="input">
				</div>
				<div class="field">
					<label class="label">Direccion: </label>
					<input type="text" name="direccion" maxlength="200" required class="input">
				</div>
				<input type="submit" value="Actualizar" class="button is-black">
			</div>
		</form>
		<footer class="has-text-centered mt-3">
			<a href="principal.php" class="button">Volver</a>
		</footer>
	</div>
</body>
</html>