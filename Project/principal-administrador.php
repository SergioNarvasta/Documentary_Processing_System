<?php

    include("utils/auth.php");
    include("utils/conexion.php");

    $codigoUsuario = $_SESSION["usuario"];
    $sqlTipoUsuario = "SELECT * FROM usuario AS u WHERE u.idusuario = $codigoUsuario";
    
    $fTipoUsuario = mysqli_query($cn,$sqlTipoUsuario);
    $rTipoUsuario = mysqli_fetch_array($fTipoUsuario);

    if ($rTipoUsuario["idtipousuario"] != 5) {
        header("principal.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include("cabecera.php");
    ?>
    <title>PANEL DE ADMINISTRADOR</title>
</head>
<body>
    <div class="message-container"></div>
    <section class="container centered fullscreen">
        <header class="has-text-centered mb-5">
            <h1 class="title">Bienvenido administrador</h1>
        </header>
        <main class="admin__options mb-6">
            <a class="admin__option is-size-4 has-text-weight has-text-centered m-2" href="rep_alumno.php">
                Reporte de expedientes de alumnos
            </a>
            <a class="admin__option is-size-4 has-text-weight has-text-centered m-2" href="rep_egresado.php">
                Reporte de expedientes de egresado
            </a>
            <a class="admin__option is-size-4 has-text-weight has-text-centered m-2" href="rep_institucion.php">
                Reporte de expedientes de institucion
            </a>
            <a class="admin__option is-size-4 has-text-weight has-text-centered m-2" href="rep_general.php">
                Reporte general
            </a>
        </main>
        <footer class="is-flex is-justify-content-center p-2">
            <a class="button is-dark mr-4" href="administrarusuarios.php">Administrar usuarios</a>
            <a class="button is-light is-danger" href="cerrarsesion.php">Cerrar Sesion</a>
        </footer>
    </section>
</body>
</html>