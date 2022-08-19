<?php 
include("utils/conexion.php");
include('utils/auth.php');
$codigo=$_SESSION['usuario'];
$tipo=$_SESSION['tipo'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="widdiv=device-widdiv, initial-scale=1">
	<style type="text/css">
		.tabla{
		display: block;
		width: 40%;
		margin: auto;
		padding: 5em 3em 5em 3em;
		background-color: #f5f5f5;
		}
		.fila{
		display: flex;
		margin-bottom: 10px;	
		}
		.columnaiz{
		display: inline-block;
		text-align: left;
		width: 40%;
		}
		.columnader{
		display: inline-block;
		text-align: left;
		width: 60%;
		}
		.campo{
			width: 100%;
		}
		.boton{
			display: inline-block;
			width: 40%;
			height: 10px;
			padding: 15px 5px 35px 5px;
			vertical-align: middle;
			margin: auto;
			text-align: center;
			font-weight: bold;
		}
	</style>
	<?php
		include("cabecera.php");
	?>
	<title>Tramite</title>
	
</head>
<body>
<br><br>
<form action="p_tramite.php" method="post" enctype="multipart/form-data">
		<center>
			<div class="tabla">
				<div class="fila">
					<div class="columnaiz"><label class="label">Tipo de Tramite:</label> </div>
					<div class="select is-info columnader">
						<select name="tipotramite" class="campo">
						<?php 
						//trabajar con base de datos
						$sql="select * from tipotramite";
						$fila=mysqli_query($cn,$sql);
						while ($r=mysqli_fetch_array($fila)) {
						?>
						<option value="<?php echo $r['idtipotramite']; ?>"><?php echo $r['tipotramite']; ?></option>
						<?php 
						}
						?>
						</select>
					</div>
				</div>
				<div class="fila">
					<div class="columnaiz"><label class="label">Area:</label></div>
					<div class="select is-info columnader">
						<select name="area" class="campo">
						<?php 
						//trabajar con base de datos
						$sql="select * from area";
						$fila=mysqli_query($cn,$sql);
						while ($r=mysqli_fetch_array($fila)) {
						?>
						<option value="<?php echo $r['idarea']; ?>"><?php echo $r['area']; ?></option>
						<?php 
						}
						?>
						</select>
					</div>
				</div>
				<div class="fila">
					<div class="columnaiz"><label class="label">Asunto:</label></div>
					<div class="columnader">
						<input class="input is-info campo" type="text" name="asunto">
					</div>
				</div>
				<div class="fila">
					<div class="columnaiz"><label class="label">Adjuntar:</label></div>
					<div class="file has-name columnader">
						<label class="file-label">
    					<input class="file-input campo" type="file" name="archivo">
    					<span class="file-cta">
      					<span class="file-icon">
        				<i class="fas fa-upload"></i>
      					</span>
      					<span class="file-label" style="width:250px">
        				Sube tu archivo
      					</span>
    					</span>
  						</label>
					</div>
				</div>
				<br>
				<center>
				<input type="submit" value="REGISTRAR TRAMITE" class="button is-dark boton">
				<a href="principal.php" class="button is-dark boton">
					VOLVER
				</a>
				</center>	
			</div>
		</center>
</form>
</body>
</html>