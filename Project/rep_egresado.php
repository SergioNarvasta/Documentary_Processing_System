<?php

    include("utils/auth.php");
    include("utils/conexion.php");

    $sql = "SELECT DISTINCT E.idtramite,
                (C.fecharegistro)Fecha,
                (B.dni)Dni,
                (A.username)Emisor,
                (C.asunto)Asunto,
                (D.area)Area,
                (F.estadotramite)Estado
        FROM usuario A
        INNER JOIN egresado  B ON A.idusuario = B.idusuario
        INNER JOIN tramite C ON A.idusuario = C.idusuario
        INNER JOIN area    D ON C.idarea    = D.idarea
        INNER JOIN historialtramite E ON C.idtramite       = E.idtramite
        INNER JOIN estadotramite F ON E.idestadotramite = F.idestadotramite
        GROUP BY E.idtramite";

    $data= mysqli_query($cn,$sql);
    $rows = mysqli_num_rows($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Egresados</title>
    <?php
        include("cabecera.php");
    ?>
</head>
<body>
    <div class="container fullscreen centered">
        <h1 class="title has-text-centered">Reporte de expedientes de egresados</h1>
        <table class="table is-hoverable is-bordered is-striped" align="center">
            <tr align="center">
                <td>ID</td>
                <td>Fecha de Emision</td>
                <td>Dni</td>
                <td>Nombres de Egresado</td>
                <td>Documento</td>
                <td>Asunto</td>
                <td>Area asignada</td>
                <td>Estado</td>
            </tr>
            <?php while($r = mysqli_fetch_array($data)){ 
                $idTramite = $r["idtramite"];
                    $sqlEstado = "SELECT *
                        FROM historialtramite AS ht
                        INNER JOIN estadotramite AS et
                        ON ht.idestadotramite = et.idestadotramite
                        WHERE ht.idtramite = '$idTramite'
                        ORDER BY ht.fechaactualizacion DESC";

                $f = mysqli_query($cn,$sqlEstado);
                $rEstado = mysqli_fetch_array($f);    
            ?> 
                <tr>
                    <td><?php echo $r['idtramite'] ?></td>
                    <td><?php echo $r['Fecha']?></td>
                    <td><?php echo $r['Dni']?></td>
                    <td><?php echo $r['Emisor']?></td>
                    <td>
                        <a href="tramites/<?php echo $r["idtramite"] ?>.pdf" target="_blank">Ver documento</a>
                    </td>
                    <td><?php echo $r['Asunto']?></td>
                    <td><?php echo $r['Area']?></td>
                    <td><?php echo $rEstado['estadotramite']?></td>    
                </tr>
            <?php } ?>
            <?php
                if ($rows == 0) {
            ?>
                <tr>
                    <td colspan="8">
                        <p class="has-text-centered is-size-5">No se encontraron expedientes</p>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
        <footer class="has-text-centered">
            <a href="principal-administrador.php" class="button">Volver</a>
        </footer>
    </div>
</body>
</html>
 	



