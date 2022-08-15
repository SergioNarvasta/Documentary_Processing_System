<?php

    include("utils/auth.php");
    include("utils/conexion.php");

    if ($_SESSION["tipo"] != 5) {
        header("location: principal.php");
    }

    $limit = isset($_GET["limit"]) ? $_GET["limit"] : 5;
    $from = isset($_GET["desde"]) ? $_GET["desde"] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION DE USUARIOS</title>
    <?php
        include("cabecera.php");
    ?>
</head>
<body>
    <div class="container fullscreen centered">
        <h1 class="title has-text-centered">Administración de usuarios</h1>
        <table class="table is-bordered is-striped is-hoverable">
            <tr>
                <td>ID de Usuario</td>
                <td>Nombre de Usuario</td>
                <td>Tipo de Usuario</td>
                <td>Estado de cuenta</td>
                <td>Accion</td>
            </tr>
            <?php
                $sqlUsers = "SELECT *
                    FROM usuario AS u INNER JOIN tipousuario AS tu
                        ON u.idtipousuario = tu.idtipousuario
                                      INNER JOIN estadocuenta as ec
                        ON ec.idestadocuenta = u.idestadocuenta ORDER BY u.idusuario limit $from, $limit";

                $sqlTotalUsuarios = "SELECT * FROM usuario";
    
                $filaTotal = mysqli_query($cn,$sqlTotalUsuarios);
                $fila = mysqli_query($cn,$sqlUsers);

                while($r = mysqli_fetch_array($fila)){
            ?>
                <tr>
                    <td>
                        <?php echo $r["idusuario"] ?>
                    </td>
                    <td>
                        <?php echo $r["username"] ?>
                    </td>
                    <td>
                        <?php echo $r["tipousuario"] ?>
                    </td>
                    <td>
                        <?php echo $r["estadocuenta"] ?>
                    </td>
                    <td>
                        <?php
                            if ($r["idtipousuario"] != 5) {
                                if ($r["idestadocuenta"] == 1) {
                                    ?>
                                <a class="button is-success" href="p_administrarusuarios.php?userId=<?php echo $r["idusuario"]?>&action=enable">HABILITAR</a>
                                <?php
                                } else {
                                ?>
                                <a class="button is-warning" href="p_administrarusuarios.php?userId=<?php echo $r["idusuario"]?>&action=disable">DESHABILITAR</a>
                                <?php
                                }
                            }
                        ?>    
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
        <div class="p-4 is-flex is-justify-content-center">
            <?php
                $total = mysqli_num_rows($filaTotal);
                $numPaginas = ceil($total / $limit);

                for($i = 0; $i < $numPaginas; $i++) {
            ?>
                <a class="button is-success is-light is-small mr-2" href="administrarusuarios.php?desde=<?php echo $i * $limit ?>&limit=<?php echo $limit?>">
                    <?php echo ($i + 1) ?>
                </a>
            <?php
                }
            ?>
        </div>
        <a class="button is-link" href="principal.php">Regresar</a>
    </div>
</body>
</html>