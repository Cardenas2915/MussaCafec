<?php 
require_once('db.php');
require_once('config.php');

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = limpiar_cadena($_POST['usuario']);
    $contrasena = limpiar_cadena($_POST['password']);

    $query = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($datos = mysqli_fetch_assoc($resultado)) {
        $_SESSION['usuario'] = $datos['usuario'];
    } else {
        $_SESSION['error-login'] = "
            <p>El usuario o la contraseña son incorrectos!</p>
        ";
        header('Location:index.php?vista=login');
    }
}
mysqli_close($db);
header('Location: ../index.php');
