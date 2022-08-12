<?php 
//include("auth.php");
include("utils/conexion.php");
//include("cabecera.php");
$sql="SELECT (C.fecharegistro)Fecha,
             (B.dni)Dni,
             (A.username)Emisor,
             (C.asunto)Asunto,
             (D.area)Area,
             (F.estadotramite)Estado
       FROM usuario A 
       INNER JOIN personal  B ON A.idusuario = B.idusuario
       INNER JOIN tramite C ON A.idusuario = C.idusuario
       INNER JOIN area    D ON C.idarea    = D.idarea
       INNER JOIN historialtramite E ON C.idtramite       = E.idtramite
       INNER JOIN estadotramite F ON E.idhistorialtramite = F.idestadotramite";

$data=mysqli_query($cn,$sql);
$cont = 1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Alumnos</title>
    <h1>Reporte de Solicitudes de Personal</h1>
</head>
<body> 
<button><a href="reportes.php" >Volver</a></button>      
<br><br>
    <fieldset id="grupo" style="width:70%;">
    <legend>Reporte</legend>
            <table align="center">
                <tr align="center">
                    <td>ID</td>
                    <td>Fecha de Emision</td>
                    <td>Dni</td>
                    <td>Datos de Personal</td>
                    <td>Asunto  </td>
                    <td>Area asignada</td>
                    <td>Estado</td>
                </tr>
                <?php while($r = mysqli_fetch_array($data)){ ?> 
                <tr>
                    <td><?php echo $cont?></td>
                    <td><?php echo $r['Fecha']?></td>
                    <td><?php echo $r['Dni']?></td>
                    <td><?php echo $r['Emisor']?></td>
                    <td><?php echo $r['Asunto']?></td>
                    <td><?php echo $r['Area']?></td>
                    <td><?php echo $r['Estado']?></td>    
                </tr>
                <?php } ?> 
            </table>			
    </fieldset>
</body>
</html>
 	



