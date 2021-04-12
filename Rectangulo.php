<!-- Lencina Fernanda 

Aplicación Nº 16 (Rectangulo - Punto)
Codificar las clases Punto y Rectangulo.
La clase Punto ha de tener dos atributos privados con acceso de sólo lectura (sólo con
getters), que serán las coordenadas del punto. Su constructor recibirá las coordenadas del
punto.
La clase Rectangulo tiene los atributos privados de tipo Punto _vertice1, _vertice2, _vertice3
y _vertice4 (que corresponden a los cuatro vértices del rectángulo).
La base de todos los rectángulos de esta clase será siempre horizontal. Por lo tanto, debe tener
un constructor para construir el rectángulo por medio de los vértices 1 y 3.
Los atributos ladoUno, ladoDos, área y perímetro se deberán inicializar una vez construido el
rectángulo.
Desarrollar una aplicación que muestre todos los datos del rectángulo y lo dibuje en la página.

 -->
 
<?php
include "Punto.php";

	class Rectangulo{

		protected $_vertice1;
		protected $_vertice2;
		protected $_vertice3;
		protected $_vertice4;

		public $area;
		public $ladoUno;
		public $ladoDos;
		public $perimetro;


		public function __construct($vertice1,$vertice3,$vertice2=null,$vertice4=null)
		{
			if($vertice2!=null)
			{
				$this->_vertice2 = new Punto($vertice2->GetX(),$vertice2->GetY());
			}
			
			if($vertice4!=null)
			{
				$this->vertice4 = new Punto($vertice4->GetX() ,$vertice4->GetY());
			}

			$this->ladoUno=( $vertice3->GetX()-$vertice1->GetX());

			$this->ladoDos=( $vertice3->GetY()-$vertice1->GetY());

			$this->perimetro=2*($this->ladoUno + $this->ladoDos);
			$this->area=$this->ladoUno*$this->ladoDos;
		}

		public function Dibujar()
		{
				$strRet = "\n &nbsp;&nbsp;\n";

	        for ( $altura = 0; $altura < $this->ladoDos; $altura++ ) {
	            for ( $base = 0; $base < $this->ladoUno; $base++ ) {
	                $strRet .= "*";
	            }
	            $strRet .= "\n<br>&nbsp;&nbsp;\n";
	        }
        	return $strRet;
		}


	}
?>

