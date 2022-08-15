<?php 
	include("utils/conexion.php");
	include('utils/auth.php');
	$codigo=$_SESSION['usuario'];
	$tipo=$_SESSION['tipo'];

	//trabajar con la base de datos
	$sql="select * from tipousuario where idtipousuario=$tipo";
	$f=mysqli_query($cn,$sql);
	$r=mysqli_fetch_array($f);

	$tipo_usuario=$r['tipousuario'];
	$tipo_usuario=strtolower($tipo_usuario);

?>
<?php

    if (isset($_SESSION["auth"]) && $_SESSION["auth"] == "1") {
        if ($_SESSION["tipo"] == 4) {
            header("location: principal-personal.php");
        } else if ($_SESSION["tipo"] == 5) {
            header("location: principal-administrador.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="widdiv=device-widdiv, initial-scale=1">
	<?php
		include("cabecera.php");
	?>
	<style type="text/css">
		#tabla2{
		display: table;
		width: 60%;
		margin: auto;
		border-spacing: 25px;
		}
		.fila2{
		display: block;
		margin-bottom: 20px;
		width: 90%;
		text-align: center;
		}
		.tabla{
		display: table-cell;
		width: 30%;
		margin: 15px;
		height: 10em;
		border-style: solid;
		border-width: 1px;
		padding: 5em 2em 5em 2em;
		background-color: #edeaea;
		vertical-align: middle;
		}
		.fila{
		display: block;
		margin-bottom: 10px;
		}
		.columna{
		display: block;
		text-align: center;
		width: 90%;
		}
		.campo{
			width: 90%;
			height: 2em;
			padding-left: 10px;
			background-color: #d3cdcd;
		}
		#consultar{
			border-radius: 10px;
			border-width: 0px;
			width: 100%;
		}
		a{
			color: black;
			text-decoration-line:none ;
			font-weight: bold;
			width: 100%;height: 100%;
		}
		.boton{
			display: table-cell;
			width: 25%;
			height: 10px;
			padding: 15px 20px 15px 20px;
			background-color: #363636;
			vertical-align: middle;
			border-radius: 6px;
		}
	</style>
	<title>Principal</title>
</head>
<body>
<br><br>
<div id="tabla2">
	<div class="fila2">
		<h1 class="title is-1">BIENVENIDO</h1>
	</div>
		<div class="fila2">
		<h4 class="title is-4">QUE DESEAS HACER?</h4> 
	</div>
		<div class="fila2">
		<div class="tabla">
			<form action="p_consulta.php" method="post">
				<div class="fila">
					<div class="columna"><p class="card-header-title" style="font-size: 20px;">CONSULTA TU EXPEDIENTE</p></div>
				</div>
			    <div class="fila">
					<div class="columna">
						<input class="input is-info" type="text" name="codigo" maxlength="11" required placeholder="codigo de expediente" class="campo" autocomplete="off" >
					</div>
				</div>
				<div class="fila">
					<div class="columna">
						<input class="input is-info" type="password" name="password" placeholder="contraseña" required class="campo" autocomplete="off">
					</div>
				</div>
				<div class="fila">
					<div class="columna">
						<input type="submit" value="CONSULTAR" class="button is-dark" class="campo" id="consultar">
					</div>
				</div>
				</form>
			</div>
<?php 
	$sql="select u.*,a.* from usuario u ,$tipo_usuario a where a.idusuario=u.idusuario and u.idusuario=$codigo";
	$f=mysqli_query($cn,$sql);
	$r=mysqli_fetch_array($f);
	$estado=$r['estado'];

if ($estado==0) {
?>
			<div class="tabla">
				<a href="actualizacion_<?php echo $tipo_usuario;?>.php" class="button is-dark " style="white-space: inherit;">
					NO PUEDE TRAMITAR ACTUALIZE SUS DATOS
				</a>
			</div>
<?php 
} elseif ($estado==1) {
?>
		<div class="tabla" style="background-color:#363636;">
			<a href="tramite.php" class="button is-dark " style="white-space: inherit;">
				REGISTRA UN NUEVO TRAMITE
			</a>
		</div>
<?php
}
?>
	</div>
	<div class="fila2">
		<div class="boton">
			<a href="perfil.php" class="button is-dark">
				MI PERFIL
			</a>
		</div>
		<div class="boton">
			<a href="cerrarsesion.php" class="button is-dark">
				CERRAR SESION
			</a>
		</div>
	</div>
</div>
<div class="message-container"></div>
</body>
</html>