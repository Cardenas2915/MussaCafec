<?php 
require_once('db.php');
require_once('config.php');

$NombreInstitucion = limpiar_cadena($_POST['nombreInstitucion']);
$participantes = limpiar_cadena($_POST['participantes']);
$titulo = limpiar_cadena($_POST['tituloProyecto']);

$errores = [];

if(!is_numeric($participantes)){
    $errores['numerico'] = "El campo participantes debe contener un caracter numerico";
}

if(count($errores)==0){

    $query = "INSERT INTO feria_empresarial (institucion, participantes, titulo_proyecto) VALUES (?, ?, ?);";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "sss",
        $NombreInstitucion, 
        $participantes,
        $titulo 
    );
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['registrado'] = "
            <p>El proyecto '$titulo' ha sido registrado correctamente en la categoria Feria empresarial</p>
        " ;
    }
}else{
    $_SESSION['errores'] = $errores;
}
mysqli_close($db);
header('location:../index.php?vista=registro');


?>