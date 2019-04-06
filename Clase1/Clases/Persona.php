<?php

include_once 'Humano.php';
class Persona extends Humano
{
    public $DNI;

    public function __construct($DNI){
        parent::__construct();
        $this->DNI=$DNI;
        }

    function ToJson(){
       return  json_encode($this);
    }
}
?>