<?php
    include("utils/auth.php");
    include("utils/conexion.php");

    if (isset($_REQUEST["idtramite"], $_REQUEST["action"])){
        $idTramite = $_REQUEST["idtramite"];
        $accion = $_REQUEST["action"];

        if ($accion == "aprove") {
            $nuevoEstado = "4"; // registrado
        } else if ($accion == "invalidate") {
            $idMotivo = $_REQUEST["idmotivo"];
            $motivoDesc = isset($_REQUEST["motivodesc"]) ? $_REQUEST["motivodesc"] : "";
            $sqlObservacion = "INSERT INTO observacion(descripcion, idtramite, idmotivo)
                VALUES ('$motivoDesc', '$idTramite', $idMotivo)";

            echo $sqlObservacion;
            mysqli_query($cn,$sqlObservacion);

            $nuevoEstado = "2"; // rechazado
        } else if ($accion == "validate") {
            $nuevoEstado = "1";
        } else if ($accion == "send") {
            $nuevoEstado = "3";
        }

        $sqlActualizaEstado = "INSERT INTO 
            historialtramite (idtramite, idestadotramite)
            VALUES ('$idTramite', $nuevoEstado)";


        echo $sqlActualizaEstado;
        mysqli_query($cn,$sqlActualizaEstado);

        if (isset($_REQUEST["from"])) {
            $from = $_REQUEST["from"];
            header("location: ".$from);
        } else {
            header("location: reporte-area.php");
        }


    } else {
        header("location: principal.php");
    }
?>