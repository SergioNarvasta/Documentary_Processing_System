<?php
    include("utils/conexion.php");

    $sqlTipoUsuario = "SELECT * FROM tipousuario WHERE idtipousuario != 5";
    $fila = mysqli_query($cn,$sqlTipoUsuario);
?>

<form action="p_register.php" method="post">
    <div class="field">
        <label for="username" class="label">Nombre de Usuario:</label>
        <input class="input" type="text" name="username" placeholder="Ingresa el nombre de usuario" required>
    </div>
    <div class="field mb-2">
        <label for="password" class="label">Contraseña:</label>
        <input class="input" id="password" type="password" name="password" placeholder="Ingresa tu contraseña" required>
    </div>
    <div class="field mb-2">
        <label for="repassword" class="label">Repite contraseña:</label>
        <input class="input" id="repassword" type="password" name="repassword" placeholder="Ingresa tu contraseña nuevamente" required>
    </div>
    <div class="field">
        <label for="tipousuario" class="label">Tipo de usuario:</label>
        <div class="select mb-3">
            <select id="tipousuario" name="tipousuario" required>
                <option disabled selected value>--Selecciona un tipo de usuario--</option>
                <?php
                    while ($r = mysqli_fetch_array($fila)) {
                ?>
                <option value="<?php echo $r["idtipousuario"]?>">
                    <?php echo $r["tipousuario"] ?>
                </option>
                <?php
                    }
                ?>
            </select>
        </div>
    </div>
    <div>
        <button class="button is-success mb-3" type="submit">Registrarme</button>
    </div>
    <div>
        Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>
    </div>
</form>