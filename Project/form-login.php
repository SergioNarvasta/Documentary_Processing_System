<form action="p_login.php" method="post">
    <div class="field">
      <label class="label">Nombre de Usuario:</label>
      <div class="control">
        <input class="input" name="username" type="text" placeholder="Ingresa el nombre de usuario">
      </div>
    </div>
    <div class="field">
      <label class="label">Contraseña:</label>
      <div class="control">
        <input class="input" type="password" name="password" placeholder="Ingresa tu contraseña">
      </div>
    </div>
    <button class="button is-black mb-3" type="submit">Iniciar sesión</button>
    <div>
        Aún no tienes una cuenta? <a href="register.php">Registrate</a>
    </div>
</form>