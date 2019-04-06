<?php
include_once './clases/Humano.php';
include_once './clases/Persona.php';
include_once './clases/Alumno.php';

$Nombre=$_GET["Nombre"];
$Apellido=$_GET["Apellido"];
// $DNI=$_GET["DNI"];
// $Legajo=$_GET["Legajo"];
// var_dump($_GET);
$Humano=new Humano($Nombre,$Apellido);
var_dump($Humano->ToJson());
?>
