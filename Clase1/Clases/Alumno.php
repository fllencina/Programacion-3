<?php
include_once 'Persona.php';

class Alumno extends Persona{
   public  $Legajo;

    public function __construct($Nombre,$Apellido,$DNI,$Legajo){
        parent::__construct($Nombre,$Apellido,$DNI);
        $this->Legajo=$Legajo;
        }
    function ToJson(){
        return  json_encode($this);
    }
}
?>