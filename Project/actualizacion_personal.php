<?php

	include("utils/auth.php");
	include("utils/conexion.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="widdiv=device-widdiv, initial-scale=1">
	<title>Personal</title>
	<?php
		include("cabecera.php");

		$codusuario = $_SESSION["usuario"];

		$sqlDatosPersonal = "SELECT * 
			FROM personal AS p INNER JOIN escuela AS e
					ON p.idescuela = e.idescuela
					INNER JOIN area AS a 
					ON p.idarea = a.idarea
				WHERE p.idusuario = $codusuario";

		$fData = mysqli_query($cn,$sqlDatosPersonal);
		$rData = mysqli_fetch_array($fData);
	?>
</head>
<body>
	<div class="message-container"></div>
	<div class="container fullscreen centered">
		<h1 class="title has-text-weight-bold has-text-centered">Actualiza tu información de personal</h1>
		<form action="p_actualizacion_personal.php" method="post" class="mt-4 update-form">
			<div class="left">
				<div class="field">
					<label for="txtcodigo" class="label">Código administrativo:</label>
					<input type="text" class="input" name="txtcodigoadministrativo" placeholder="9876543210" minlength="10" maxlength="10" 
						value="<?php echo $rData["codigo_administrativo"] ?>" required>
				</div>
				<div class="field">
					<label for="txtdni" class="label">DNI:</label>
					<input class="input" type="number" name="txtdni" id="txtdni" placeholder="12345678" minlength="10" maxlength="10"
						value="<?php echo $rData["dni"] ?>" required>
				</div>
				<label for="selectescuela" class="label">Escuela:</label>
				<div class="select mb-2">
					<select name="txtescuela" id="selectescuela" required>
						<option value>-- SELECCIONAR ESCUELA --</option>
						<?php
							$sqlEscuela = "SELECT * 
								FROM escuela";

							$f = mysqli_query($cn,$sqlEscuela);
							while($r = mysqli_fetch_array($f)){
						?>
							<option value="<?php echo $r["idescuela"]?>"
								<?php
									if ($r["idescuela"] == $rData["idescuela"]){
										echo "selected";
									}
								?>
							><?php echo $r["escuela"] ?></option>
						<?php
							}
						?>
					</select>
				</div>
				<label for="area" class="label">Area:</label>
				<div class="select mb-2">
					<select name="txtarea" id="area" required>
						<option value>-- SELECCIONAR AREA --</option>
						<?php
							$sqlArea = "SELECT * 
								FROM area";

							$f = mysqli_query($cn,$sqlArea);
							while ($r = mysqli_fetch_array($f)) {
						?>
							<option value="<?php echo $r["idarea"] ?>"
								<?php
									if ($r["idarea"] == $rData["idarea"]) {
										echo "selected";
									}
								?>
							><?php echo $r["area"] ?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="field">
					<label for="email" class="label">Email:</label>
					<input class="input" type="email" name="txtemail" id="email" placeholder="ejemplo@dominio.com"
						value="<?php echo $rData["email"] ?>" required>
				</div>
			</div>
			<div class="right">
				<div class="field">
					<label for="cel" class="label">Celular:</label>
					<input type="number" name="txtcel" id="cel" class="input" placeholder="Número telefónico"
						value="<?php echo $rData["celular"] ?>" required>
				</div>
				<div class="field">
					<label for="direccion" class="label">Direccion:</label>
					<input id="direccion" name="txtdireccion" type="text" class="input" placeholder="Ingrese su direccion"
						value="<?php echo $rData["direccion"] ?>" required>
				</div>
				<div class="field">
					<label for="apellidos" class="label">Apellidos:</label>
					<input class="input" type="text" name="txtapellidos" id="apellidos" placeholder="Ingrese sus apellidos"
						value="<?php echo $rData["apellidos"] ?>" required>
				</div>
				<div class="field">
					<label for="nombres" class="label">Nombres:</label>
					<input class="input" type="text" name="txtnombres" id="nombres" placeholder="Ingrese sus nombres"
						value="<?php echo $rData["nombres"] ?>" required>
				</div>
				<button class="button is-dark" type="submit">Actualizar</butt>
			</div>
		</form>
		<footer class="has-text-centered p-4">
			<a class="button is-rounded" role="button" href="principal.php">Regresar</a>
		</footer>
	</div>
</body>
</html>