<?php 
include("utils/conexion.php");
include('utils/auth.php');
$codigo=$_SESSION['usuario'];
$tipo=$_SESSION['tipo'];
//recepcionar los datos del egresado
$ruc=$_POST['ruc'];
$razonsocial=$_POST['razonsocial'];
$direccion=$_POST['direccion'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
//tratar informacion
$razonsocial=strtoupper(trim($razonsocial));
$direccion=strtoupper(trim($direccion));
//actualizar datos
$sql="update institucion set ruc='$ruc', razonsocial='$razonsocial',direccion='$direccion', email='$email', telefono='$telefono',estado=1 where idusuario=$codigo ";
mysqli_query($cn,$sql);

header('location:principal.php');
?>