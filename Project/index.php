<?php

    session_start();

    if (isset($_SESSION["auth"]) && $_SESSION["auth"] == "1") {
        if ($_SESSION["tipo"] == "1" || $_SESSION["tipo"] == "2" || $_SESSION["tipo"] == "3") {
            header("location: principal.php");
        } else if ($_SESSION["tipo"] == "4") {
            header("location: principal-personal.php");
        } else {
            header("location: principal-administrador.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include("cabecera.php");
    ?>
    <title>Bienvenido - Inicia Sesión</title>
</head>
<body>
    <div class="message-container"></div>
    <div class="container centered fullscreen">
        <?php
            require("login.php");
        ?>
    </div>
</body>
</html>