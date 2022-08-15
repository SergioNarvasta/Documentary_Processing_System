<?php 

include("utils/conexion.php");
include('utils/auth.php');
$codigo=$_SESSION['usuario'];
$tipo=$_SESSION['tipo'];

//recepcionar los datos del egresado
$dni=$_POST['dni'];
$facultad=$_POST['lstfacultad'];
$escuela=$_POST['lstescuela'];
$apellidos=$_POST['apellidos'];
$nombres=$_POST['nombres'];
$direccion=$_POST['direccion'];
$email=$_POST['email'];
$celular=$_POST['celular'];

//tratar informacion
$apellidos=strtoupper(trim($apellidos));
$nombres=strtoupper(trim($nombres));
$direccion=strtoupper(trim($direccion));

//actualizar datos
$sql="update egresado set dni='$dni',idescuela=$escuela,apellidos='$apellidos',nombres='$nombres',direccion='$direccion', email='$email', celular='$celular',estado=1 where idusuario=$codigo ";
mysqli_query($cn,$sql);

header('location:principal.php');
?>