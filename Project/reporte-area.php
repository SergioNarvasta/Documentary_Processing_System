<?php
    include("utils/auth.php");
    include("utils/conexion.php");

    $tipousuario = $_SESSION["tipo"];
    $idusuario = $_SESSION["usuario"];

    if ($tipousuario != 4) { // si no es alguien del personal
        header("location: principal.php");
    } 

    $sqlEmpleadoArea = "SELECT * FROM
        personal AS p INNER JOIN area AS a
            ON p.idarea = a.idarea
        WHERE p.idusuario = $idusuario";

    $f = mysqli_query($cn,$sqlEmpleadoArea);
    $registrosValidos = mysqli_num_rows($f);
    $existeEmpleado = $registrosValidos > 0;

    if ($existeEmpleado == FALSE) {
        header("location: principal.php");
    }

    $r = mysqli_fetch_array($f);

    $areaPersonal = $r["idarea"];
    $sqlRegistrosArea = "SELECT * FROM
        tramite AS t INNER JOIN usuario AS u
                    ON u.idusuario = t.idusuario
                    INNER JOIN tipotramite AS tt
                    ON tt.idtipotramite = t.idtipotramite
                    INNER JOIN area AS a
                    ON a.idarea = t.idarea
                    WHERE t.idarea = $areaPersonal";

    // echo $sqlRegistrosArea;
    $filaRegistros = mysqli_query( $cn,$sqlRegistrosArea);
    $numRegistrosValidos = 0;
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
    <title>Reporte de Mi Area</title>
</head>
<body>
    <div class="container centered fullscreen">
        <h2 class="is-size-3 has-text-centered">Visualizando expedientes dirigidos al area de <?php echo '" '.$r["area"].' "' ?></h2>
            <table class="table is-striped is-bordered is-hoverable mt-5">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tipo de Expediente</td>
                    <td>Documento</td>
                    <td>Remitente</td>
                    <td>Estado</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($r = mysqli_fetch_array($filaRegistros)){
                        $idusuarioTramite = $r["idusuario"];
                        $idtramite = $r["idtramite"];

                        $sqlEstadoTramite = "SELECT * 
                            FROM historialtramite AS ht INNER JOIN estadotramite AS et
                                ON ht.idestadotramite = et.idestadotramite 
                            WHERE idtramite = '$idtramite' ORDER BY ht.fechaactualizacion DESC LIMIT 1";

                        $filaEstadoTramite = mysqli_query($cn,$sqlEstadoTramite);
                        $estadoTramite = mysqli_fetch_array($filaEstadoTramite);

                        $tipousuarioTramite = $r["idtipousuario"];
                        if ($tipousuarioTramite == 1) { // alumno
                            $sqlRemitente = "SELECT * FROM alumno WHERE idusuario = $idusuarioTramite";
                            $f = mysqli_query($cn,$sqlRemitente);
                            $rusuario = mysqli_fetch_array($f);
                            $remitente = "".$rusuario["apellidos"]." ".$rusuario["nombres"];
                            
                        } else if ($tipousuarioTramite == 2) { // egresado
                            $sqlRemitente = "SELECT * FROM egresado WHERE idusuario = $idusuarioTramite";
                            $f = mysqli_query($cn,$sqlRemitente);
                            $rusuario = mysqli_fetch_array($f);
                            $remitente = "".$rusuario["apellidos"]." ".$rusuario["nombres"];
                        } else if ($tipousuarioTramite == 3) { // institucion
                            $sqlRemitente = "SELECT * FROM institucion WHERE idusuario = $idusuarioTramite";
                            $f = mysqli_query($cn,$sqlRemitente);
                            $rusuario = mysqli_fetch_array($f);
                            $remitente = $rusuario["razonsocial"];
                        }
                ?>
                <?php
                    if ($estadoTramite["idestadotramite"] == 3) { // solo los que estan habilitados para revision
                        $numRegistrosValidos = $numRegistrosValidos + 1;
                ?>
                    <tr>
                        <td><?php echo $r["idtramite"] ?></td>
                        <td><?php echo $r["tipotramite"] ?></td>
                        <td>
                            <a target="_blank" href="tramites/<?php echo $r["idtramite"].".pdf" ?>">Ver documento</a>
                        </td>
                        <td><?php echo $remitente ?></td>
                        <td><?php echo $estadoTramite["estadotramite"] ?></td>
                        <td>
                                <a
                                    class="button is-light m-1 is-small is-success" 
                                    href="p_actualiza_estadotramite.php?idtramite=<?php echo $idtramite?>&action=aprove">
                                    Aprobar
                                </a>
                                <a
                                    class="button is-light m-1 is-small is-danger invalidate-button"
                                    data-idtramite="<?php echo $r["idtramite"] ?>"
                                    >
                                    Inhabilitar
                                </a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                <?php
                    }
                    if ($numRegistrosValidos == 0) {
                ?>
                    <tr>
                        <td colspan="6" class="has-text-centered">
                            <p class="sutitle">No hay expedientes pendientes</p>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <footer class="has-text-centered">
            <a class="button is-link is-rounded" href="principal.php">
                Volver
            </a>
        </footer>
    </div>
    <div class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="modal-card">
                <div class="modal-card-head">
                    <h1 class="is-size-3 invalidate-modal-title">Invalidando expediente</h1>
                </div>
                <div class="modal-card-body">
                    <form action="p_actualiza_estadotramite.php?action=invalidate" method="post">
                        <div class="select mb-3">
                            <select name="idmotivo">
                                <option value disabled selected>-- SELECCIONA UN MOTIVO --</option>
                                <?php
                                    $sqlMotivo = "SELECT * FROM motivo";
                                    $f = mysqli_query($cn,$sqlMotivo);
                                    while ($r = mysqli_fetch_array($f)) {
                                ?>
                                    <option value="<?php echo $r["idmotivo"] ?>">
                                        <?php echo $r["motivo"] ?>
                                    </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="idtramite" class="input_idtramite">
                        <div class="field">
                            <label for="txtmotivo" class="label">Ingrese una descripción del motivo</label>
                            <textarea id="txtmotivo" class="textarea" name="motivodesc" required></textarea>
                        </div>
                        <button class="button is-danger" type="submit">Invalidar</button>
                    </form>
                </div>
            </div>
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
    </div>
    <script text="javascript">
        const modalEnableButtons = document.querySelectorAll(".invalidate-button");
        const modalDisableButtons = document.querySelectorAll(".modal-background, .modal-close");
        const modalTarget = document.querySelector(".modal");
        const modalTitle = document.querySelector(".invalidate-modal-title");
        const inputIdTramite = document.querySelector(".input_idtramite");

        modalEnableButtons.forEach((button) => {
            const idTramite = button.dataset.idtramite;
            button.addEventListener("click", () => {
                modalTarget.classList.add("is-active");
                modalTitle.textContent = `Invalidando expediente: ${idTramite}`;
                inputIdTramite.setAttribute("value", idTramite);
            })
        })

        modalDisableButtons.forEach((btn) => {
            btn.addEventListener("click", () => {
                modalTarget.classList.remove("is-active");
            })
        })
    </script>
</body>
</html>