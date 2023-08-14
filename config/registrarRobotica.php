<?php 
require_once('db.php');
require_once('config.php');

$categoria = limpiar_cadena($_POST['categoria']);
$institucion = limpiar_cadena($_POST['InstitucionRobotica']);
$nombre_1 = limpiar_cadena($_POST['nombre1']);
$correo_1 = limpiar_cadena($_POST['Email1']);
$contacto_1 = limpiar_cadena($_POST['contacto1']);
$nombre_2 = isset($_POST['nombre2']) ? limpiar_cadena($_POST['nombre2']) : null ;
$correo_2 = isset($_POST['Email2']) ? limpiar_cadena($_POST['Email2']) : null ;
$contacto_2 = isset($_POST['contacto2']) ? limpiar_cadena($_POST['contacto2']) : null ;

$query = "INSERT INTO robotica (
categoria,
institucion,
nombre_participante_1,
correo_participante_1,
contacto_participante_1,
nombre_participante_2,
correo_participante_2,
contacto_participante_2) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ssssssss",
        $categoria,
        $institucion, 
        $nombre_1, 
        $correo_1, 
        $contacto_1, 
        $nombre_2,  
        $correo_2,
        $contacto_2,  
    );
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['registrado'] = "
            <p>La institucion '$institucion' ha sido registrado correctamente en la categoria Robotica</p>
        " ;
    }

mysqli_close($db);
header('location:../index.php?vista=registro');

?>