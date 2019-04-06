<?php
class Humano{
   public  $Nombre;
   public  $Apellido;

    function _consutruct($Nombre,$Apellido)
    {
        $this->Nombre=$Nombre;
        $this->Apellido=$Apellido;
    }
    
    function ToJson()
    {
       return json_encode($this);
    }
}
?>