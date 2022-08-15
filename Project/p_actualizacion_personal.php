<?php

    include("utils/conexion.php");
    include("utils/auth.php");

    $codusuario = $_SESSION["usuario"];

    // Validaciones
    if (isset($_POST["txtcodigoadministrativo"], $_POST["txtdni"], $_POST["txtescuela"], $_POST["txtemail"],
    $_POST["txtcel"], $_POST["txtdireccion"], $_POST["txtapellidos"], $_POST["txtnombres"], $_POST["txtarea"])) {
        $codigoadministrativo = $_POST["txtcodigoadministrativo"];
        $dni = $_POST["txtdni"];
        $escuela = $_POST["txtescuela"];
        $email = $_POST["txtemail"];
        $cel = $_POST["txtcel"];
        $direccion = $_POST["txtdireccion"];
        $apellidos = $_POST["txtapellidos"];
        $nombres = $_POST["txtnombres"];
        $area = $_POST["txtarea"];

        $sql = "UPDATE personal
            SET codigo_administrativo = '$codigoadministrativo',
                dni = '$dni',
                idescuela = $escuela,
                email = '$email',
                celular = '$cel',
                direccion = '$direccion',
                apellidos = '$apellidos',
                nombres = '$nombres',
                idarea = $area,
                estado = 1
            WHERE idusuario = $codusuario";

        mysqli_query($cn,$sql);
        header("location: actualizacion_personal.php?error=false&m=Datos actualizados correctamente");

    } else {
        header("location: actualizacion_personal.php?error=true&m=Ocurrio un error inesperado");
    }
?>