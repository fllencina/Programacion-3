
<!-- 
Lencina Fernanda

Aplicación Nº 18 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:
_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
i. La razón social.
ii. La razón social, y el precio por hora.
Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
métodos. -->

<?php
	/**
	 * 
	 */
	include "Auto.php";
	class Garage 
	{
	
		private $_razonSocial;
		private $_precioPorHora;
		private $_autos;	
		function __construct($razonSocial,$precioPorHora=0)
		{
			$this->_razonSocial=$razonSocial;
			$this->_precioPorHora=$precioPorHora;
			$this->_autos=array();		
		}

		function MostrarGarage()
		{
			$strRet = "<br>";
	        $strRet .= "_razonSocial: " . $this->_razonSocial . "<br>";
	        $strRet .= "_precioPorHora: $ " . $this->_precioPorHora . "<br>";
	        $strRet .= "_autos: <br>";
	        for($i=0;$i<count($this->_autos);$i++)
	        {
	        	$strRet .= "Auto ".($i+1);
	        	$strRet .="<br>---------------------<br>";
	        	$strRet .= Auto::MostrarAuto($this->_autos[$i]);
	        	 
	        }

	        return $strRet;
		}
		function Equals($auto2)
		{
			for($i=0;$i<count($this->_autos);$i++)
			{
				if($this->_autos[$i]->Equals($auto2))
				{
					return true;
				}				
			}						
			return false;
		}

		function Add($auto)
		{			
			if(!$this->Equals($auto))
			{
				array_push($this->_autos, $auto);
				return "Auto ingresado al garage";
			}
			else{
				return "El Auto ya estaba en el garage";
			}
		}
		function Remove($auto)
		{
			for($i=0;$i<count($this->_autos);$i++)
			{
				if($this->_autos[$i]->Equals($auto))
				{
					unset($this->_autos[$i]);	
							
					return "Auto eliminado del garage"; 
				}
				else{

				}
			}
			return "El auto no estaba en el garage";
		}


	}
?>

