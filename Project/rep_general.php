<?php 
    include("utils/auth.php");
    include("utils/conexion.php");
    include("utils/tools.php");

    $sql="SELECT (C.fecharegistro)Fecha,
                (A.username)Emisor,
                (C.asunto)Asunto,
                (D.area)Area,
                C.idtramite
        FROM usuario A 
        INNER JOIN tramite C ON A.idusuario = C.idusuario
        INNER JOIN area    D ON C.idarea    = D.idarea
        ORDER BY Fecha DESC";

    $data=mysqli_query($cn,$sql);
    $contadorRegistro = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte General</title>
    <?php
        include("cabecera.php");
    ?>
</head>
<body>
    <div class="container fullscreen centered p-5">
        <form action="rep_general.php" method="get">
            <?php
                $valueFechaI = "";
                $valueFechaF = "";
    
                if (isset($_REQUEST["fechai"])) {
                    $filterFechaI = $_REQUEST["fechai"];
                    $valueFechaI = "value = $filterFechaI";
                }
                if (isset($_REQUEST["fechaf"])) {
                    $filterFechaF = $_REQUEST["fechaf"];
                    $valueFechaF = "value = $filterFechaF";
                }
            ?>
            <h1 class="title is-size-3 has-text-centered">FILTRAR EXPEDIENTES</h1>
            <div class="form-filters mb-4">
                <div class="select mb-2" style="width: 100%;">
                    <select name="status" style="width: 100%;">
                        <option class="has-text-centered" value disabled selected> -- SELECCIONAR ESTADO -- </option>
                        <?php
                            $sqlConsultaEstado = "SELECT * FROM estadotramite";
                            $fConsultaEstado = mysqli_query($cn,$sqlConsultaEstado);
        
                            while ($rConsultaEstado = mysqli_fetch_array($fConsultaEstado)) {
                                $isSelected = "";
                                if (isset($_REQUEST["status"]) && $rConsultaEstado["idestadotramite"] == $_REQUEST["status"]) {
                                    $isSelected = "selected";
                                }
                        ?>
                            <option value="<?php echo $rConsultaEstado["idestadotramite"] ?>" <?php echo $isSelected ?>>
                                <?php echo $rConsultaEstado["estadotramite"] ?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-filters__dateinputs mb-2">
                    <input class="input mr-2" type="date" name="fechai" <?php echo $valueFechaI ?>>
                    <input class="input" type="date" name="fechaf" <?php echo $valueFechaF ?>>
                </div>
                <div class="form-filters__buttons">
                    <a class="button mr-2 is-link is-rounded" href="rep_general.php">Limpiar filtros</a>
                    <button class="button is-dark is-rounded" type="submit">Filtar Busqueda</button>
                </div>
            </div>
        </form>
        <table class="table is-bordered is-striped is-hoverable mb-4" align="center">
            <thead align="center">
                <th>ID</th>
                <th>Fecha de Emision</th>
                <th>Emisor</th>
                <th>Asunto</th>
                <th>Area asignada</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php
                    while($r = mysqli_fetch_array($data)) {
                        $idtramite = $r["idtramite"];
                        $sqlEstado = "SELECT * 
                            FROM historialtramite AS ht INNER JOIN estadotramite AS et
                                ON ht.idestadotramite = et.idestadotramite
                            WHERE ht.idtramite = '$idtramite' ORDER BY ht.fechaactualizacion 
                            DESC LIMIT 1";

                        $dataEstado = mysqli_query($cn,$sqlEstado);
                        $rEstado = mysqli_fetch_array($dataEstado);
                        $estado = $rEstado["estadotramite"];
                        $idEstado = $rEstado["idestadotramite"];
                ?>
                <?php
                    $status = isset($_REQUEST["status"]) ? $_REQUEST["status"] : FALSE;
                    $fechai = isset($_REQUEST["fechai"]) ? $_REQUEST["fechai"] : FALSE;
                    $fechaf = isset($_REQUEST["fechaf"]) ? $_REQUEST["fechaf"] : FALSE;
                    
                    if (validarFiltros($status, $fechai, $fechaf, $idEstado, $r["Fecha"])) {
                        $contadorRegistro = $contadorRegistro + 1;
                ?>
                    <tr>
                        <td><?php echo $r["idtramite"] ?></td>
                        <td><?php echo $r['Fecha']?></td>
                        <td><?php echo $r['Emisor']?></td>
                        <td><?php echo $r['Asunto']?></td>
                        <td><?php echo $r['Area']?></td>
                        <td><?php echo $estado ?></td>
                        <td>
                            <?php
                                if ($idEstado == 1) { // registrado ?>
                                <a  class="button is-info m-1"
                                    href="p_actualiza_estadotramite.php?idtramite=<?php echo $idtramite ?>&action=send&from=rep_general.php">
                                    Enviar al destinatario
                                </a>
                                <button 
                                    class="button m-1 is-light is-danger invalidate-button"
                                    data-idtramite="<?php echo $idtramite ?>">
                                    Invalidar
                                </button>
                            <?php
                                } else if ($idEstado == 2) { ?>
                                <a  class="button m-1 is-success is-light"
                                    href="p_actualiza_estadotramite.php?idtramite=<?php echo $idtramite?>&action=validate&from=rep_general.php">
                                    Habilitar
                                </a>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            <?php
                }
                if ($contadorRegistro == 0) {
            ?>
                <tr>
                    <td colspan="8" class="has-text-centered">
                        <p class="subtitle">No hay expedientes</p>
                    </td>
                </tr>
            <?php
                }
            ?>
            <tbody>
        </table>
        <div class="has-text-centered">
            <button onclick="exportReportToExcel(this)" class="button is-rounded mr-2">Guardar como XLSX</button>
            <a class="button" href="principal-administrador.php">Volver</a>
        </div>
        <div class="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <div class="modal-card-head">
                        <h1 class="is-size-3 invalidate-modal-title">Invalidando expediente</h1>
                    </div>
                    <div class="modal-card-body">
                        <form action="p_actualiza_estadotramite.php?action=invalidate&from=rep_general.php" method="post">
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
        <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
        <script text="javascript">
            function exportReportToExcel() {
            let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
            TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
                name: `rep_general.xlsx`, // fileName you could use any name
                sheet: {
                    name: 'Sheet 1' // sheetName
                }
            });
            }
        </script>
    </div>
</body>
</html>
 	



