<?php
require_once 'db.php'; 

if (isset($_GET['id'])) {
    $idEliminar = $_GET['id'];
    // Obtener el nombre de archivo de la imagen
    $query = "SELECT * FROM ponentes WHERE id = $idEliminar";
    $resultado = mysqli_query($db, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $idEliminar = $fila['id'];
        $archivo1 = $fila['archivo_1'];
        $archivo2 = $fila['archivo_2'];

        // Borrar los archivos de la carpeta
        if (file_exists("../resources/ponentes/$archivo1")) {
            unlink("../resources/ponentes/$archivo1");
        }
        
        if (file_exists("../resources/ponentes/$archivo2")) {
            unlink("../resources/ponentes/$archivo2");
        }

        // Eliminar el registro de la base de datos
        $queryEliminar = "DELETE FROM ponentes WHERE id = $idEliminar";
        $Eliminar = mysqli_query($db, $queryEliminar);
        if ($Eliminar) {
            $_SESSION['delete'] = "<p>La ponencia se ha eliminado con exito!.</p>";
        } 
    } else {
        $_SESSION['delete'] = "<p>No se encontró este registro.</p>";
    }

}

mysqli_close($db);
header('location:../index.php?vista=administrador')
?>