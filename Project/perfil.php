<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Perfil</title>
	<?php
		include("cabecera.php");
	?>
</head>
<body>
	<div class="container centered fullscreen">
		<h1 class="title has-text-centered">Mi Perfil</h1>
	<?php
		include("utils/conexion.php");
		include('utils/auth.php');
		$codigo = $_SESSION['usuario'];
		$tipo = $_SESSION['tipo'];
	
		$sql = "select * from tipousuario where idtipousuario=$tipo";
		$f = mysqli_query($cn,$sql);
		$r = mysqli_fetch_array($f);
	
		$tipo_usuario = $r['tipousuario'];
		$tipo_usuario = strtolower($tipo_usuario);
	
		$sql = "select u.*,a.* from usuario u ,$tipo_usuario a where a.idusuario=u.idusuario and u.idusuario=$codigo";
		$f = mysqli_query($cn,$sql);
		$r = mysqli_fetch_array($f);
		$estado = $r['estado'];
		if ($r['estado'] == 1) { // alumno
			if ($tipo == 1) {
				$sql = "select u.*,a.*,e.* from usuario u ,alumno a, escuela e where a.idusuario=u.idusuario and a.idescuela=e.idescuela and u.idusuario=$codigo";
				$f = mysqli_query($cn,$sql);
				$r = mysqli_fetch_array($f);
		?>
				<table class="table is-striped is-hoverable is-bordered">
					<tr>
						<td>Codigo Universitario</td>
						<td><?php echo $r['codigo_universitario']; ?></td>
					</tr>
					<tr>
						<td>DNI</td>
						<td><?php echo $r['dni']; ?></td>
					</tr>
					<tr>
						<td>Escuela</td>
						<td><?php echo utf8_decode($r['escuela']); ?></td>
					</tr>
					<tr>
						<td>Apellidos</td>
						<td><?php echo utf8_decode($r['apellidos']); ?></td>
					</tr>
					<tr>
						<td>Nombres</td>
						<td><?php echo $r['nombres']; ?></td>
					</tr>
					<tr>
						<td>Direccion</td>
						<td><?php echo $r['direccion']; ?></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td><?php echo $r['email']; ?></td>
					</tr>
					<tr>
						<td>Celular</td>
						<td><?php echo $r['celular']; ?></td>
					</tr>
				</table>
			<?php
			} else if ($tipo == 4) { // personal
				$sql = "SELECT *
					FROM personal as p INNER JOIN escuela as e
						ON p.idescuela = e.idescuela
							INNER JOIN area as a
						WHERE p.idusuario = $codigo";
	
				$f = mysqli_query($cn,$sql);
				$r = mysqli_fetch_array($f);
	
			?>
				<table class="table is-bordered is-hoverable is-striped">
					<tr>
						<td>Codigo Administrativo</td>
						<td><?php echo $r["codigo_administrativo"]; ?></td>
					</tr>
					<tr>
						<td>DNI</td>
						<td><?php echo $r["dni"]; ?></td>
					</tr>
					<tr>
						<td>Nombre Completo</td>
						<td><?php echo $r["nombres"]." ".$r["apellidos"]; ?></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td><?php echo $r["email"]; ?></td>
					</tr>
					<tr>
						<td>Celular</td>
						<td><?php echo $r["celular"]; ?></td>
					</tr>
					<tr>
						<td>Direccion</td>
						<td><?php echo $r["direccion"]; ?></td>
					</tr>
					<tr>
						<td>Escuela</td>
						<td><?php echo $r["escuela"]; ?></td>
					</tr>
					<tr>
						<td>Area</td>
						<td><?php echo $r["area"]; ?></td>
					</tr>
				</table>
			<?php
			} else if ($tipo == 2) { // egresado
				$sql = "select u.*,e.*,eg.* from usuario u ,egresado eg, escuela e where eg.idusuario=u.idusuario and eg.idescuela=e.idescuela and u.idusuario=$codigo";
				$f = mysqli_query($cn,$sql);
				$r = mysqli_fetch_array($f);
			?>
				<table class="table is-bordered is-hoverable is-striped">
					<tr>
						<td>DNI</td>
						<td><?php echo $r['dni']; ?></td>
					</tr>
					<tr>
						<td>Escuela</td>
						<td><?php echo $r['escuela']; ?></td>
					</tr>
					<tr>
						<td>Apellidos</td>
						<td><?php echo $r['apellidos']; ?></td>
					</tr>
					<tr>
						<td>Nombres</td>
						<td><?php echo $r['nombres']; ?></td>
					</tr>
					<tr>
						<td>Direccion</td>
						<td><?php echo $r['direccion']; ?></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td><?php echo $r['email']; ?></td>
					</tr>
					<tr>
						<td>Celular</td>
						<td><?php echo $r['celular']; ?></td>
					</tr>
				</table>
			<?php
			} else if ($tipo == 3) { // institucion
				$sql = "select u.*,i.* from usuario u ,institucion i where i.idusuario=u.idusuario and u.idusuario=$codigo";
				$f = mysqli_query($cn,$sql);
				$r = mysqli_fetch_array($f);
			?>
				<table class="table is-striped is-hoverable is-bordered">
					<tr>
						<td>RUC</td>
						<td><?php echo $r['ruc']; ?></td>
					</tr>
					<tr>
						<td>Razon Social</td>
						<td><?php echo $r['razonsocial']; ?></td>
					</tr>
					<tr>
						<td>Razon Social</td>
						<td><?php echo $r['direccion']; ?></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td><?php echo $r['email']; ?></td>
					</tr>
					<tr>
						<td>Telefono</td>
						<td><?php echo $r['telefono']; ?></td>
					</tr>
				</table>
		<?php
			}
		}
		?>
		<br>
		<?php
			$sql = "select * from tipousuario where idtipousuario=$tipo";
			$f = mysqli_query($cn,$sql);
			$r = mysqli_fetch_array($f);
			$tipo_usuario = $r['tipousuario'];
			$tipo_usuario = strtolower($tipo_usuario);
		?>
		<div class="is-flex is-justify-content-center p-4">
			<a class="button is-black mr-2" href="actualizacion_<?php echo $tipo_usuario; ?>.php">
				ACTUALIZAR
			</a>
			<a class="button" href="principal.php">
				VOLVER
			</a>
		</div>
	</div>

</body>
</html>