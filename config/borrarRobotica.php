<?php
require_once 'db.php'; 

if (isset($_GET['id'])) {
    $idEliminar = $_GET['id'];
    // Obtener el nombre de archivo de la imagen
    $query = "SELECT * FROM robotica WHERE id = $idEliminar";
    $resultado = mysqli_query($db, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $idEliminar = $fila['id'];

        // Eliminar el registro de la base de datos
        $queryEliminar = "DELETE FROM robotica WHERE id = $idEliminar";
        $Eliminar = mysqli_query($db, $queryEliminar);
        if ($Eliminar) {
            $_SESSION['delete'] = "<p>El proyecto de Robotica se ha eliminado con exito!</p>";
        } 
    } else {
        $_SESSION['delete'] = "<p>No se encontró este registro.</p>";
    }

}

mysqli_close($db);
header('location:../index.php?vista=administrador')
?>