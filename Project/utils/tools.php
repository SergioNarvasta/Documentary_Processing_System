<?php

    function validarFiltros($status, $fechaI, $fechaF, $rStatus, $rFecha) {
        $mostrar = TRUE;
        if (isset($status) && $status) {
            $mostrar = $rStatus == $status;
        }
        if (isset($fechaI) && $fechaI) { // rango inicio
            $mostrar = $rFecha >= $fechaI;
        }
        if (isset($fechaF) && $fechaF) { // rango final
            $mostrar = $rFecha <= $fechaF;
        }
        if (isset($fechaI, $fechaF) && $fechaI && $fechaF) { // rango inicio - final
            $mostrar = $rFecha >= $fechaI && $rFecha <= $fechaF;
        }
        if (isset($status, $fechaI) && $status && $fechaI) {
            $mostrar = $rFecha >= $fechaI && $rStatus == $status; 
        }
        if (isset($status, $fechaF) && $status && $fechaF) {
            $mostrar = $rFecha <= $fechaF && $status == $rStatus;
        }
        if (isset($fechaI, $fechaF, $status) && $status && $fechaF && $fechaI) {
            $mostrar = $status == $rStatus && $fechaF >= $rFecha && $rFecha <= $fechaI;
        }
        return $mostrar;
    }
?>