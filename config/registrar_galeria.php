<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
require_once('db.php');    
require_once('config.php');

$titulo = limpiar_cadena($_POST['titulo']) ;
$descripcion = limpiar_cadena($_POST['descripcion']);
$fecha = $_POST['fecha'];

$errores = [];

// Verificar si se seleccionó un archivo
if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    // Verificar si solo se seleccionó una imagen en caso de carga múltiple
    if (is_array($_FILES['imagen']['name'])) {
        $errores['imagen'] = "Por favor, selecciona solo una imagen para continuar.";
    }else{

        $ruta = '../uploads/';
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
        }

        $nombreImagen = $_FILES['imagen']['name'];
        $fileExtension = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));

        // Validar el formato de la imagen
        $formatosValidos = array('jpg', 'jpeg', 'png');
        if (!in_array($fileExtension, $formatosValidos)) {
            $errores['formato'] = "Formato de imagen no permitido. Se permiten solo formatos JPG, JPEG y PNG.";
        }else{
            // Limitar el nombre de archivo a 40 caracteres
            $nombreUnico = uniqid() . '_' . substr($nombreImagen, 0, 40 - strlen(uniqid())) . '.' . $fileExtension;
            $moverImagen = $ruta . $nombreUnico;
            $imagenGuardada = false;
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $moverImagen)) {
                $imagenGuardada = true;
            }
        }
    }
    
} else {
    $errores['imagen'] = "Por favor, selecciona una imagen para continuar.";
}
    

if(count($errores)==0 && $imagenGuardada == true){
    $query = "INSERT INTO galeria VALUES (null,'$nombreUnico','$titulo', '$descripcion','$fecha')";
    $guardar = mysqli_query($db, $query);
    
    if ($guardar) {
        $_SESSION['publicacionCreada'] = "<p>La publicacion '$titulo' ha sido creada con exito!</p>";
    }
}else{
    $_SESSION['errores'] = $errores;
}
    
mysqli_close($db);
header('location:../index.php?vista=galeria');
}
?>
