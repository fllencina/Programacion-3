<?php

include_once 'Humano.php';
class Persona extends Humano
{
    public $DNI;

    public function __construct($Nombre=null,$Apellido=null,$DNI=null){
        parent::__construct($Nombre=null,$Apellido=null);
        $this->DNI=$DNI;
        }

    function ToJson(){
       return  json_encode($this);
    }
}
?>