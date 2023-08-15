<?php 

$servidor= 'localhost';
$usuario = 'root';
$pass = "";
$nameDB = 'mussacafec';

// $servidor= 'localhost';
// $usuario = 'id21149620_root';
// $pass = "Cardenas2915.";
// $nameDB = 'id21149620_mussacafec';

$db = mysqli_connect($servidor,$usuario,$pass,$nameDB);

if(!isset($_SESSION)){
    session_start();
} 


?>