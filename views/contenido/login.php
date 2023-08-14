<link rel="stylesheet" href="./css/login.css">
<main>
    <form class="form" action="./config/iniciar_sesion.php" method="POST">
        <p class="title">Iniciar Sesion</p>
        <div class="input-container">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>
        </div>
        <div class="input-container">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit" class="submit">Ingresar</button>

    </form>
</main>