<?php
require_once 'db.php'; 

if (isset($_GET['id'])) {
    $idEliminar = $_GET['id'];
    // Obtener el nombre de archivo de la imagen
    $query = "SELECT * FROM poster WHERE id = $idEliminar";
    $resultado = mysqli_query($db, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $idEliminar = $fila['id'];
        $archivo = $fila['archivo'];

        // Borrar los archivos de la carpeta
        if (file_exists("../resources/poster/$archivo")) {
            unlink("../resources/poster/$archivo");
        }
        // Eliminar el registro de la base de datos
        $queryEliminar = "DELETE FROM poster WHERE id = $idEliminar";
        $Eliminar = mysqli_query($db, $queryEliminar);
        if ($Eliminar) {
            $_SESSION['delete'] = "<p>El poster se ha eliminado con exito!</p>";
        } 
    } else {
        $_SESSION['delete'] = "<p>No se encontró este registro.</p>";
    }

}

mysqli_close($db);
header('location:../index.php?vista=administrador')
?>