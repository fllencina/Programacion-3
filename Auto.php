<!-- 
Lencina Fernanda 
Aplicación Nº 17 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos privados:
_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.
Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double
con la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.
● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)

 -->

<?php
	/**
	 * 
	 */
	class Auto 
	{
		private $_color;
		private $_precio;
		private $_marca;
		private $_fecha;

		
		function __construct($marca,$color,$precio=0,$fecha=null)
		{
			$this->_color=$color;
			$this->_marca=$marca;
			$this->_precio=$precio;
			$this->_fecha=$fecha;
		}

		function AgregarImpustos($impuesto)
		{
			return  $this->_precio + $impuesto;
		}

		static function  MostrarAuto($auto)
		{
			$strRet = "<br>";
	        $strRet .= "Color: " . $auto->_color . "<br>";
	        $strRet .= "Precio: $ " . $auto->_precio . "<br>";
	        $strRet .= "Marca: " . $auto->_marca . "<br>";
	        if($auto->_fecha!=null)
	        {
	        	$strRet .= "Fecha: " . $auto->_fecha . "<br>";
	        }
	        else{
	        	$strRet .= "Fecha: " . " - " . "<br>";
	        }

	        return $strRet;
		}
		function Equals($auto2)
		{
			if($this->_marca==$auto2->_marca)
			{
				return true;
			}			
			return false;
		}
		static function  Add($auto1,$auto2)
		{
			$RespuestaAdd;			
				if($auto1->Equals($auto2))
				{
					if($auto1->_color==$auto2->_color)
					{
						return "El precio de la suma de los autos es: $" . $auto1->_precio+$auto2->_precio;
					}
					else{
						$RespuestaAdd="Los autos no son del mismo color. ";
					}					
				}
				else{
					$RespuestaAdd="Los autos no son de la misma marca. ";
				}	
			
			$RespuestaAdd.= "$ 0.";
			return $RespuestaAdd;
		}
	}
?>

