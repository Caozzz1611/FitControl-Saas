<h2>Crear cuenta Administrador</h2>

<form method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nombre" required>
    <br><br>

    <input type="password" name="password" placeholder="Contraseña" required>
    <br><br>

    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>
    <br><br>

    <button type="submit">Crear cuenta</button>
</form>