<?php 

$servidor= 'localhost';
$usuario = 'root';
$pass = "";
$nameDB = 'mussacafec';

$db = mysqli_connect($servidor,$usuario,$pass,$nameDB);

if(!isset($_SESSION)){
    session_start();
} 


?>