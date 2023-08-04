<?php 
session_start();
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layaout/header.php';
require_once 'views/layaout/navbar.php';


if(!isset($_GET['vista']) || $_GET['vista'] == ""){
    $_GET['vista']='home';
}

if(is_file('./views/contenido/'.$_GET['vista'].'.php') &&  $_GET['vista'] != 'home'){

    include('./views/contenido/'.$_GET['vista'].'.php');
}else{

    if($_GET['vista']=='home'){
        
        include('views/contenido/home.php');
    }else{
        include('views/404.php');
    }
}

require_once 'views/layaout/footer.php';
?>

