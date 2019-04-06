<?php
include_once 'Persona.php';

class Alumno extends Persona{
   public  $Legajo;

    public function __construct($Nombre=null,$Apellido=null,$DNI=null,$Legajo=null){
        parent::__construct($Nombre=null,$Apellido=null,$DNI=null);
        $this->Legajo=$Legajo;
        }
    function ToJson(){
        return  json_encode($this);
    }

    //  function Agregar ($Alumno)
    // {
    //     $nombre_fichero = '/path/to/foo.txt';

    //     if (file_exists($nombre_fichero)) {
    //         echo "El fichero $nombre_fichero existe";
    //     } else {
    //         echo "El fichero $nombre_fichero no existe";
    //         $gestor = fopen("c:\\folder\\resource.txt", "r");

    //     }
    // }
   

   
}


?>