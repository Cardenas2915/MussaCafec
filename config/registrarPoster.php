<?php 

require_once('db.php');
require_once('config.php');

$institucion = limpiar_cadena($_POST['nombreInstitucion']);
$participantes = limpiar_cadena($_POST['Nparticipantes']);

$titulo = limpiar_cadena($_POST['tituloProyecto']);
$archivo = $_POST['archivo'];

?>