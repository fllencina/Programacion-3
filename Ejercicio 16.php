
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
	include "Rectangulo.php";
	//include "Punto.php";
 $Punto1 = new Punto(4,10);
 $Punto3 = new Punto(10,14);
 echo "Coordenadas punto 1: ", $Punto1->GetX(),",",$Punto1->GetY();
 echo "<br>";
 echo "Coordenadas punto 3: ",$Punto3->GetX(),",",$Punto3->GetY();
	
	$Rectangulo = new Rectangulo($Punto1,$Punto3);
	echo "<br>-------------<br>";
echo "lado uno: ", $Rectangulo->ladoUno;
echo "<br>lado dos: ", $Rectangulo->ladoDos;

echo "<br>Area: ", $Rectangulo->area;
echo "<br>perimetro: " , $Rectangulo->perimetro;

echo "<br>-----------<br>";


	echo "<br>Dibujo: <br><br>" . $Rectangulo->Dibujar() . "<br>";
?>

