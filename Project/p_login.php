<?php

    session_start();
    include("utils/conexion.php");

    $usuario = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM usuario 
        WHERE username = '$usuario' 
        AND password = '$password'
        AND idestadocuenta = 2";


    $fila = mysqli_query($cn,$query);
    $r = mysqli_fetch_array($fila);
    $existeUsuario = mysqli_num_rows($fila);

    if ($existeUsuario <= 0) {
        header("location: login.php?error=true&m=El usuario no existe o no se encuentra habilitado");
    } else {
        $idusuario = $r["idusuario"];
        $tipousuario = $r["idtipousuario"];
        
        $_SESSION["usuario"] = $idusuario;
        $_SESSION["tipo"] = $tipousuario;

        $_SESSION["auth"] = 1;
        
        if ($tipousuario == 4) {
            header("location: principal-personal.php?error=false&m=Bienvenido");
            // usuario "personal";
        } else if ($tipousuario == 5) {
            header("location: principal-administrador.php?error=false&m=Bienvenido");
            // usuario "admin";
        } else {
            header("location: principal.php?error=false&m=Bienvenido");
            // usuario "normal";
        }
    }
?>