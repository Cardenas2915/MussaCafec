<?php
require_once 'db.php'; 

if (isset($_GET['id'])) {
    $idEliminar = $_GET['id'];
    // Obtener el nombre de archivo de la imagen
    $query = "SELECT * FROM galeria WHERE id = $idEliminar";
    $resultado = mysqli_query($db, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $nombreArchivo = $fila['nombre_imagen'];
        $idEliminar = $fila['id'];

        // Eliminar el registro de la base de datos
        $queryEliminar = "DELETE FROM galeria WHERE id = $idEliminar";
        $Eliminar = mysqli_query($db, $queryEliminar);
        if ($Eliminar) {
            // Eliminar la imagen físicamente
            $rutaImagen = '../uploads/' . $nombreArchivo;
            if (file_exists($rutaImagen)) {
                unlink($rutaImagen);
            }
            $_SESSION['delete'] = "<p>La publicacion se ha eliminado correctamente.</p>";
        } 
    } else {
        $_SESSION['delete'] = "<p>No se encontró esta publicacion.</p>";
    }

}

mysqli_close($db);
header('location:../index.php?vista=galeria')
?>
