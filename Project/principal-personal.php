<?php
    include("utils/conexion.php");
    include("utils/auth.php");

    $codigo = $_SESSION["usuario"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
    <?php
        include("cabecera.php");
    ?>
</head>
<body>
    <div class="message-container"></div>
    <div class="container centered fullscreen">
        <section>
            <main>
                <?php
                    $sqlEstadoPerfil = "SELECT * 
                        FROM personal AS p
                        WHERE p.idusuario = $codigo";
                    
                    $f = mysqli_query($cn,$sqlEstadoPerfil);
                    $rPerfil = mysqli_fetch_array($f);
                    $estaActualizado = $rPerfil["estado"];

                    if ($estaActualizado == 0){
                ?>
                    <a class="principalpersonal__main-option has-text-weight is-size-4" href="actualizacion_personal.php">
                        <p class="is-size-4">Ir al Perfil</p>
                        <div>
                            <p class="is-size-6">Es necesario actualizar tus datos antes de ver tus expedientes</p>
                        </div>
                    </a>
                <?php
                    } else {
                ?>
                    <a class="principalpersonal__main-option has-text-weight is-size-4" href="reporte-area.php">Ver Reporte de Mi Area</a>
                <?php
                    }
                ?>
            </main>
            <footer class="principalpersonal__footer">
                <a class="button is-black principalpersonal-footer__option" href="perfil.php">Mi perfil</a>
                <a class="button is-danger is-light principalpersonal-footer__option" href="cerrarsesion.php">Cerrar sesion</a>
            </footer>
        </section>
    </div>
</body>
</html>