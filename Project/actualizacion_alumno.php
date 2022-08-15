<?php
	include("utils/conexion.php");
	include('utils/auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="widdiv=device-widdiv, initial-scale=1">
	<title>Alumno</title>
	<?php
		include("cabecera.php");
	?>
</head>
<body>
	<div class="container fullscreen centered">
		<h1 class="title">Actualiza tu información de alumno</h1>
		<form action="p_actualizacion_alumno.php" method="post">
				<div class="card p-4" style="width: 400px">
					<div class="field">
						<label class="label">Codigo Universitario: </label>
						<input type="text" name="codigouniversitario" maxlength="10" required class="input">
					</div>
					<div class="field">
						<label class="label">DNI: </label>
						<input type="text" name="dni" maxlength="8" required class="input">
					</div>
					<div class="field">
						<label class="label">Escuela: </label>
						<div class="select">
							<select name="lstescuela">
								<?php
								
								$sql = "select * from escuela";
								$fila = mysqli_query($cn,$sql);
								while ($r = mysqli_fetch_array($fila)) {
								?>
									<option value="<?php echo $r['idescuela']; ?>"><?php echo utf8_encode($r['escuela']); ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="field">
						<label class="label">Apellidos: </label>
						<input type="text" name="apellidos" maxlength="200" required class="input">
					</div>
					<div class="field">
						<label class="label">Nombres: </label>
						<input type="text" name="nombres" maxlength="200" required class="input">
					</div>
					<div class="field">
						<label class="label">Direccion: </label>
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
				</div>
				<br>
				<input type="submit" value="Actualizar" class="button is-black is-rounded">
		</form>
		<footer class="has-text-centered mt-2">
			<a class="button" href="principal.php">Volver</a>
		</footer>
	</div>
</body>

</html>