<?php 

	//recepcionar los datos
	include("utils/conexion.php");
	include('utils/auth.php');
	$c=$_SESSION['usuario'];
	$tipo=$_SESSION['tipo'];

	//obtener tipousuario
	$sql="select * from tipousuario where idtipousuario=$tipo";
	$f=mysqli_query($cn,$sql);
	$r=mysqli_fetch_array($f);

	$tipo_usuario=$r['tipousuario'];
	$tipo_usuario=strtolower($tipo_usuario);
	
	//Metodo get
	if (isset($_GET["idtramite"])) {
		$codigo=$_GET['idtramite'];
	}else{
		$codigo=$_POST['codigo'];
	}
	if (isset($_GET["password"])) {
		$password=$_GET['password'];
	}else{
		$password=$_POST['password'];
	}

	//trabajar con la base de datos
	include("utils/conexion.php");
	$sql="SELECT * from tramite where idtramite='$codigo' and password='$password'";
	$f=mysqli_query($cn,$sql);
	if (mysqli_num_rows($f)==0) {
		header('location:principal.php');
	}else{
	$r=mysqli_fetch_array($f);
	$idtramite=$r['idtramite'];

	$sql = "SELECT 
		a.*,u.*,t.*,tip.*,ar.*,h.*,e.* 
		FROM $tipo_usuario a,usuario u, tramite t, tipotramite tip,area ar, historialtramite h, estadotramite e 
		where a.idusuario=u.idusuario and 
		      u.idusuario=t.idusuario and 
			  t.idtipotramite=tip.idtipotramite and 
			  t.idarea=ar.idarea and 
			  t.idtramite=h.idtramite and 
			  h.idestadotramite=e.idestadotramite and 
			  t.idtramite='$idtramite' 
			  Order by h.fechaactualizacion desc Limit 1";

	$f=mysqli_query($cn,$sql);
	if (mysqli_num_rows($f)==0) {
		header('location:principal.php');
	}
	$r=mysqli_fetch_array($f);
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
			width: 60%;
			margin: auto;
			height: 50px;
		}
		p{
			padding-bottom: 5px;
		}
	</style>
	<title>Consulta Tramite</title>
</head>
<body>
<br>
<br>
<br><br>
<div id="contenedor">
<p class="card-header-title" style="padding: 0;padding-bottom: 10px;"><b>DETALLES DEL TRAMITE</b></p>
<p>Fecha de emision</p>
<p><?php echo $r['fecharegistro']; ?></p>
<p>Fecha de actualizacion</p>
<p><?php echo $r['fechaactualizacion']; ?></p>
<br>

<center>
	<table class="table is-hoverable is-bordered" style="width:100%;">
			<tr>
				<th><b>ID</b></th>
				<th><b>AREA</b></th>
				<th><b>TIPO DE DOCUMENTO</b></th>
				<th><b>REMITENTE</b></th>
				<th><b>ESTADO</b></th>
			</tr>
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
				<td><?php echo $r['estadotramite'] ?></td>
			</tr>
	</table>
</center>
<br>
		<div class="botones">
			<a class="button is-dark boton" href="movimientos.php?idtramite=<?php echo $codigo;?>&tipo=<?php echo $tipo_usuario; ?>">
					VER MOVIMIENTOS
			</a>
			<a class="button is-dark boton" href="principal.php">
					 VOLVER
			</a>
		</div>
</div>
<br><br>		
</body>
</html>
<?php  
}
?>
