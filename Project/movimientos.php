<?php 
//recepcionar los datos
include("utils/conexion.php");
include('utils/auth.php');
$c=$_SESSION['usuario'];
$tipo=$_SESSION['tipo'];

$tipo_usuario=$_GET['tipo'];
$codigo=$_GET['idtramite'];
//trabajar con la base de datos
$sql="select a.*,u.*,t.*,tip.*,ar.*,h.*,e.* from $tipo_usuario a,usuario u, tramite t, tipotramite tip,area ar, historialtramite h, estadotramite e where a.idusuario=u.idusuario and u.idusuario=t.idusuario and t.idtipotramite=tip.idtipotramite and t.idarea=ar.idarea and t.idtramite=h.idtramite and h.idestadotramite=e.idestadotramite and t.idtramite='$codigo' Order by h.fechaactualizacion desc";
$fila=mysqli_query($cn,$sql);
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
		#contenedor{
			width: 60%;
			margin: auto;
			text-align: center;
		}
		a{
			color: black;
			text-decoration-line:none ;
			font-weight: bold;
		}
		.boton{
			display: inline-block;
			width: 49%;
			height: 20px;
			padding: 15px 20px 35px 20px;
			vertical-align: middle;
			text-align: center;
			margin: auto;
		}
		.botones{
			width: 65%;
			margin: auto;
			height: 50px;
		}
	</style>
	<title>Consulta Tramite</title>
</head>
<body>
<br>
<br>
<br><br>
<div id="contenedor">
<p class="card-header-title" style="padding: 0;padding-bottom: 10px;"><b>SEGUIMIENTO</b></p>
<p align="left">Visualizando los movimientos del expediente: <?php echo $codigo; ?></p>
<br>
<center>
	<table class="table is-hoverable" style="width:100%;">
		<tr>
			<th><b>ID</b></th>
			<th><b>AREA</b></th>
			<th><b>TIPO DE DOCUMENTO</b></th>
			<th><b>REMITENTE</b></th>
			<th><b>ESTADO</b></th>
			<th><b>FECHA</b></th>
		</tr>
<?php 
while ($r=mysqli_fetch_array($fila)) { 
$idtramite=$r['idtramite'];
$password=$r['password'];
?>
			<tr>
				<td><?php echo $r['idtramite']; ?></td>
				<td><?php echo $r['area']; ?></td>
				<td><?php echo $r['tipotramite']; ?></td>
				<td><?php  
				if ($tipo==1) {
					echo $r['apellidos']." ".$r['nombres'];
				}elseif ($tipo==2) {
					echo $r['apellidos']." ".$r['nombres'];
				}elseif ($tipo==3) {
					echo $r['razonsocial'];
				}

				?></td>
				<td><?php echo $r['estadotramite']; ?></td>
				<td><?php echo $r['fechaactualizacion']; ?></td>
			</tr>
<?php  
}
?>
</table>
</center>
<br>
		<div class="botones">
			<a class="button is-dark boton" href="principal.php">
					CONSULTAR OTRO EXPEDIENTE
			</a>
			<a class="button is-dark boton" href="p_consulta.php?idtramite=<?php echo $idtramite; ?>&password=<?php echo $password; ?>">
					 VOLVER
			</a>
		</div>
</div>
<br><br>		
</body>
</html>