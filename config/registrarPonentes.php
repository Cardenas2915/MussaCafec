<?php 
require_once('db.php');
require_once('config.php');

$ejeTematico = limpiar_cadena($_POST['ejetematico']);
$institucion = limpiar_cadena($_POST['Institucion']);
$titulada = limpiar_cadena($_POST['titulada']);
$ficha = limpiar_cadena($_POST['ficha']);
$externa = limpiar_cadena($_POST['externa']);
$titulo = limpiar_cadena(['titulo']);
$tipoProyecto = limpiar_cadena(['tipoProyecto']);
$archivo_1 = $_POST['archivo_1'];
$archivo_2 = $_POST['archivo_2'];
$numeroPonentes = limpiar_cadena($_POST['numeroPonentes']);
$nombre_1 = limpiar_cadena($_POST['nombre1']);
$correo_1 = limpiar_cadena($_POST['correo1']);
$contacto_1 = limpiar_cadena($_POST['contacto1']);

if($numeroPonentes == 2){
    $nombre_2 = limpiar_cadena($_POST['nombre2']);
    $correo_2 = limpiar_cadena($_POST['correo2']);
    $contacto_2 = limpiar_cadena($_POST['contacto2']);
}else if($numeroPonentes == 3){
    $nombre_2 = limpiar_cadena($_POST['nombre2']);
    $correo_2 = limpiar_cadena($_POST['correo2']);
    $contacto_2 = limpiar_cadena($_POST['contacto2']);
    $nombre_3 = limpiar_cadena($_POST['nombre3']);
    $correo_3 = limpiar_cadena($_POST['correo3']);
    $contacto_3 = limpiar_cadena($_POST['contacto3']);
}





?>