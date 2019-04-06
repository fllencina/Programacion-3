<?php
include_once './clases/Humano.php';
include_once './clases/Persona.php';
include_once './clases/Alumno.php';

// $Nombre=$_GET["Nombre"];
$Apellido=$_POST["Apellido"];

// $DNI=$_GET["DNI"];
$Legajo=$_POST["Legajo"];
// // var_dump($_GET);
// $Humano=new Humano($Nombre,$Apellido);
// var_dump($Humano->ToJson());
// $Alumno=new Alumno($Nombre,$Apellido,$DNI,$Legajo);
// var_dump($Alumno.ToJson());
// var_dump($_FILES);
// $Foto = $_FILES;
// $extension=$_FILES['foto']['type'];
//  $carpetaDestino="./fotos/";
//  $carpetaDestinobkp="./fotosBackup/";
//  var_dump($extension);
//  $name=$Legajo.$Apellido.'.'.$extension;
// var_dump($name);
MoverACarpeta();
 function MoverACarpeta()
{
    $Apellido=$_POST["Apellido"];
    $Legajo=$_POST["Legajo"];
    $Foto = $_FILES;
    $extension=$_FILES['foto']['type'];
    $name=$Legajo.$Apellido.'.'.$extension;
    $carpetaDestino="C:\xampp\htdocs\Clase1\Foto/";
    $carpetaDestinobkp="./fotosBackup/";
    
    var_dump($name);
    $nombre_fichero = 'C:\xampp\tmp/ib140D.tmp';
    
        if (file_exists($nombre_fichero)) {
            echo "El fichero $nombre_fichero existe";

        }
         else {
            echo "El fichero $nombre_fichero no existe";
             move_uploaded_file ( $nombre_fichero , $carpetaDestino );
        }
   
}

?>
