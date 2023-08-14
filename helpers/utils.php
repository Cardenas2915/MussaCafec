<?php 
function BorrarErrores(){

	if(isset($_SESSION['errores'])){
		$_SESSION['errores']=null;
	}

	if(isset($_SESSION['registrado'])){
		$_SESSION['registrado']=null;
	}
	
	if(isset($_SESSION['publicacionCreada'])){
		$_SESSION['publicacionCreada']=null;
	}
	if(isset($_SESSION['delete'])){
		$_SESSION['delete']=null;
	}
}

function mostrarAlerta($errores,$parametro){
	$alerta = "";
	if(isset($errores[$parametro]) && !empty($parametro)){
		$alerta = "
        <div class='error-archivo'>
            <h1>Error al registrar</h1>
            <p class='error-archivo'>". $errores[$parametro]."</p>
        </div>";
	}
	return $alerta;
}

function objetosGaleria($db){
	$datosGaleria = ""; 
	$query = "SELECT * FROM galeria";
	$execute = mysqli_query($db, $query);

	if($execute && mysqli_num_rows($execute)>0){
		$datosGaleria = $execute;
	}
	return $datosGaleria;
}

function obtenerRegistros($conexion,$tabla,$campo){
    $sql = "SELECT COUNT($campo) FROM $tabla  ";
        
        $totalResultado = mysqli_query($conexion, $sql);
        $total = mysqli_fetch_array($totalResultado);
        $total = (int) $total[0];
        return $total;
}

function obtenerDatos($db,$tabla){
    $sql = "SELECT * FROM $tabla";
    $obtener = mysqli_query($db, $sql);
    return $obtener;
}

?>
