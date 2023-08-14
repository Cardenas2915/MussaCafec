<?php 
require_once('db.php');
require_once('config.php');

$ejeTematico = limpiar_cadena($_POST['ejetematico']);
$institucion = limpiar_cadena($_POST['tipoInstitucion']);
$ficha = isset($_POST['ficha']) ? limpiar_cadena($_POST['ficha']) : null ;
$titulada = isset($_POST['titulada']) ? limpiar_cadena($_POST['titulada']) : null ;
$externa = isset($_POST['externa']) ? limpiar_cadena($_POST['externa']) : null ;
$titulo = limpiar_cadena($_POST['titulo']);
$tipoProyecto = limpiar_cadena($_POST['tipoProyecto']);
$numeroPonentes = limpiar_cadena($_POST['numeroPonentes']);
$nombre_1 = limpiar_cadena($_POST['nombre1']);
$correo_1 = limpiar_cadena($_POST['correo1']);
$contacto_1 = limpiar_cadena($_POST['contacto1']);

$nombre_2 = isset($_POST['nombre2']) ? limpiar_cadena($_POST['nombre2']) : null ;
$correo_2 = isset($_POST['correo2']) ? limpiar_cadena($_POST['correo2']) : null ;
$contacto_2 = isset($_POST['contacto2']) ? limpiar_cadena($_POST['contacto2']) : null;

$nombre_3 = isset($_POST['nombre3']) ? limpiar_cadena($_POST['nombre3']) : null ;
$correo_3 = isset($_POST['correo3']) ? limpiar_cadena($_POST['correo3']) : null ;
$contacto_3 = isset($_POST['contacto3']) ? limpiar_cadena($_POST['contacto3']) : null;


$errores = [];
if (isset($_FILES['archivo_1']) && $_FILES['archivo_1']['error'] === UPLOAD_ERR_OK) {
    $nombreArchivo = $_FILES['archivo_1']['name'];
    $tamañoArchivo = $_FILES['archivo_1']['size'];
    $tipoArchivo = $_FILES['archivo_1']['type'];
    $archivoTemporal = $_FILES['archivo_1']['tmp_name'];

    // Validar el tipo y tamaño del archivo
    $extensionesValidas = array(
        'application/pdf',
        'application/vnd.ms-powerpoint',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation'
    );    
    $tamañoMaximo = 20 * 1024 * 1024; // 20MB en bytes
    $carpetaDestino = '../resources/ponentes/';

    if (in_array($tipoArchivo, $extensionesValidas)) {
        if ($tamañoArchivo <= $tamañoMaximo) {
            // Mover el archivo a la carpeta "Ponente" 
            if (!is_dir($carpetaDestino)) {
                mkdir($carpetaDestino, 0777, true);
            }
            $rutaDestino = $carpetaDestino . $nombreArchivo;
            $moverArchivo = false;
            if (move_uploaded_file($archivoTemporal, $rutaDestino)) {
                $moverArchivo = true;
            } 
        } else {
            $errores['tamaño'] = "El tamaño de archivo no debe exceder los 20MB.";
        }
    } else {
        $errores['formato-pdf'] = "El archivo debe ser un archivo PDF o una presentación de PowerPoint.";
    }
} else {
    $errores['error-archivo'] = "Error al cargar el archivo, verifique que esté bien definido.";
}


    if (isset($_FILES['archivo_2']) && $_FILES['archivo_2']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo_2 = $_FILES['archivo_2']['name'];
        $tamañoArchivo_2 = $_FILES['archivo_2']['size'];
        $tipoArchivo_2 = $_FILES['archivo_2']['type'];
        $archivoTemporal_2 = $_FILES['archivo_2']['tmp_name'];

        // Validar el tipo y tamaño del archivo
        $extensionesValidas_2 = array(
            'application/msword', // Tipo MIME para archivos de Word DOC
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' // Tipo MIME para archivos de Word DOCX
        );
        if (in_array($tipoArchivo_2, $extensionesValidas_2)){
            // Mover el archivo a la carpeta "Ponente"
                if($tamañoArchivo_2 <= $tamañoMaximo){
                        $rutaDestino = $carpetaDestino . $nombreArchivo_2;
                        $moverArchivo_2 = false;
                        if (move_uploaded_file($archivoTemporal_2, $rutaDestino)) {
                            $moverArchivo_2 = true;
                        } 
                }else{
                    $errores['tamaño'] = "El tamaño de archivo no debe exceder los 20MB.";
                }
            } else {
                $errores['formato-docx'] = "El archivo debe ser un archivo Word (doc o docx).";
            }
        
    } else {
        $errores['error-archivo'] = "Error al cargar el archivo verifique que este bien definido.";
    }

    if (count($errores) == 0) {

        $query = "INSERT INTO ponentes (
        eje_tematico,
        tipo_Institucion,
        titulada,
        ficha,
        institucion,
        ponente_1,
        correo_1,
        contacto_1,
        ponente_2,
        correo_2,
        contacto_2,
        ponente_3,
        correo_3,
        contacto_3,
        titulo_proyecto,
        tipo_proyecto,
        archivo_1,
        archivo_2) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssssssssssss",
            $ejeTematico, 
            $institucion, 
            $titulada, 
            $ficha, 
            $externa,  
            $nombre_1,
            $correo_1, 
            $contacto_1,
            $nombre_2,
            $correo_2, 
            $contacto_2,
            $nombre_3,
            $correo_3, 
            $contacto_3,
            $titulo,
            $tipoProyecto,
            $nombreArchivo,
            $nombreArchivo_2
        );
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['registrado'] = "
                <p>El proyecto '$titulo' ha sido registrado correctamente en la categoria Ponentes</p>
            " ;
        }
    }else{
        $_SESSION['errores'] = $errores;
    }
    mysqli_close($db);
    header('location:../index.php?vista=registro');
    

?>

