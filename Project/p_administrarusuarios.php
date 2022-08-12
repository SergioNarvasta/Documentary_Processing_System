<?php

    $idusuario = $_GET["userId"];
    $action = $_GET["action"];

    if (isset($idusuario, $action)) {
        include("utils/conexion.php");

        if ($action == "enable") {
            $sqlUpdateUser = "UPDATE usuario SET idestadocuenta = 2 WHERE idusuario = $idusuario";
        } else {
            $sqlUpdateUser = "UPDATE usuario SET idestadocuenta = 1 WHERE idusuario = $idusuario";
        }
        mysqli_query($cn,$sqlUpdateUser);

        header("location: administrarusuarios.php");
        
    } else {
        header("location: administrarusuarios.php");
    }

?>