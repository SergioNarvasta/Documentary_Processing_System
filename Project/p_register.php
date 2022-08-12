<?php

    function regresarARegister($message) {
        header("location: register.php?error=true&m=$message");
    }

    if (isset($_POST["username"], $_POST["password"], $_POST["repassword"], $_POST["tipousuario"]) == FALSE) {
        regresarARegister("Todos los campos deben ser rellenados correctamente");
    } else {
        $usuario = $_POST["username"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $tipousuario = $_POST["tipousuario"];
        
        if (strlen($usuario) >= 8 && strlen($password) >= 8) {
            if ($password == $repassword) {
                include("utils/conexion.php");

                $sqlUser = "INSERT INTO usuario(username, password, idtipousuario, idestadocuenta)
                    VALUES ('$usuario', '$password', $tipousuario, 1)";

                mysql_query($sqlUser); // crea el usuario
                $sqlConsultaNuevoUsuario = "SELECT * FROM usuario WHERE username = '$usuario'";
                $fila = mysql_query($sqlConsultaNuevoUsuario);
                $nuevoUsuario = mysqli_fetch_array($fila);
                
                // registrar en tabla segun el tipo de usuario

                if ($nuevoUsuario["username"]) {
                    if ($tipousuario == 1){ // es alumno
                        $sqlDatos = "INSERT INTO alumno(idusuario) VALUES (".$nuevoUsuario["idusuario"].")";
                    } else if ($tipousuario == 2) { // es egresado
                        $sqlDatos = "INSERT INTO egresado(idusuario) VALUES (".$nuevoUsuario["idusuario"].")";
                    } else if ($tipousuario == 3) { // institucion
                        $sqlDatos = "INSERT INTO institucion(idusuario) VALUES (".$nuevoUsuario["idusuario"].")";
                    } else if ($tipousuario == 4) { // personal
                        $sqlDatos = "INSERT INTO personal(idusuario) VALUES (".$nuevoUsuario["idusuario"].")";
                    }
                }



                mysql_query($sqlDatos); // crea la entidad segun el tipo de usuario


                header("location: index.php?error=false&m=El usuario se creo correctamente!");
            } else {
                regresarARegister("Las contraseñas no coinciden");
            }
        } else {
            regresarARegister("El usuario y la contraseña deben contener al menos 8 caracteres");
        }
        
    
    }    



?>