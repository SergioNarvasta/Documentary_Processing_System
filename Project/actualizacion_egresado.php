<?php 
	include("utils/conexion.php");
	include("utils/auth.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="widdiv=device-widdiv, initial-scale=1">
	<title>Egresado</title>
	<?php
		include("cabecera.php");
	?>
</head>
<body>
<div class="container fullscreen centered">
	<form action="p_actualizacion_egresado.php" method="post">
		<h1 class="title has-text-centered has-weight-bold">Actualiza tu información de egresado</h1>
		<div class="card p-4">
			<div class="field">
				<label class="label">DNI: </label>
				<input class="input" type="text" name="dni" maxlength="8" required>
			</div>
			<div class="field">
				<label class="label">Escuela: </label>
				<div class="select">
					<select name="lstescuela">
						<?php 
						//trabajar con base de datos
						$sql="select * from escuela";
						$fila=mysqli_query($cn,$sql);
						while ($r=mysqli_fetch_array($fila)) {
						?>
						<option value="<?php echo $r['idescuela']; ?>"><?php echo $r['escuela']; ?></option>
						<?php 
						}
						?>
					</select>
				</div>
			</div>
			<div class="field">
				<label class="label">Apellidos: </label>
				<input class="input" type="text" name="apellidos" maxlength="200" required>
			</div>
			<div class="field">
				<label class="label">Nombres: </label>
				<input class="input" type="text" name="nombres" maxlength="200" required>
			</div>
			<div class="field">
				<div class="columna">Direccion: </div>
				<input type="text" name="direccion" maxlength="200" required class="input">
			</div>
			<div class="field">
				<label class="label">E-mail: </label>
				<input type="email" name="email" maxlength="200" required class="input">
			</div>
			<div class="field">
				<label class="label">Celular: </label>
				<input type="text" name="celular" maxlength="9" class="input">
			</div>
			<div class="is-flex is-justify-content-center">
				<input type="submit" value="Actualizar" class="button is-black is-rounded">
			</div>
		</div>
	</form>
	<footer class="has-text-centered mt-3">
		<a class="button" href="principal.php">Volver</a>
	</footer>
</div>

</body>
</html>