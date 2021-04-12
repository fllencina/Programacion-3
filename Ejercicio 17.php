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

include "Auto.php";
	//Crear dos objetos “Auto” de la misma marca y distinto color.

	$Autos=array();
	
		$auto = new Auto("Ford","Blanco");
		array_push($Autos, $auto);	
		$auto = new Auto("Ford","Negro");
		array_push($Autos, $auto);	
		$auto= new Auto ("Chevrolet","Gris",700000);
		array_push($Autos, $auto);	
		$auto= new Auto ("Chevrolet","Gris",800000);
		array_push($Autos, $auto);	
		$auto = new Auto ("Audi","Azul",1000000,date('d/m/Y'));			
		array_push($Autos, $auto);		

	
	echo "<div style=display:inline-block;margin-top:50px>Control: Autos creados: <br>";
	for($i=0;$i<count($Autos);$i++)
	{
		echo "<br>________________________<br> Auto ",$i+1,": ";
		echo Auto::MostrarAuto($Autos[$i]);
	}

	echo "<br>________________________<br></div>";

	
//Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.
echo "<div style=display:inline-block;vertical-align:top;margin-left:50px;margin-top:50px>Autos precio con impuestos: <br> ";

for($i=2;$i<count($Autos);$i++)
	{
		echo "<br>________________________<br> Auto ",$i+1,": ";
		echo Auto::MostrarAuto($Autos[$i]);
		$autoPrecioImpuesto=$Autos[$i]->AgregarImpustos(1500);
		echo "<br> Precio con impuesto: $" ,$autoPrecioImpuesto;
	}
	echo "<br>________________________<br></div>";

	//Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.
	$importeSumaAutos1y2= Auto::Add($Autos[0],$Autos[1]);
	echo "<div style=display:inline-block;vertical-align:top;margin-left:50px;margin-top:50px>Importe de precio de 1er y 2do auto: <br> ", $importeSumaAutos1y2;
	//Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
	echo "<br><br>";
	$strComparacion1;
	$strComparacion2;
	if($Autos[0]->Equals($Autos[1]))
	{
		$strComparacion1="<br>Los autos comparados son iguales";
	}
	else{
		$strComparacion1="<br>Los autos comparados no son iguales";
	}
	if($Autos[0]->Equals($Autos[4]))
	{
		$strComparacion2="<br>Los autos comparados son iguales";
	}
	else{
		$strComparacion2="<br>Los autos comparados no son iguales";
	}
	
	echo "<br> Comparacion entre el 1er y 2do auto: ", $strComparacion1 ;
	echo "<br><br>";
	echo "<br> Comparacion entre el 1er y 5to auto: ", $strComparacion2 , "</div>";


echo "<div style=display:inline-block;vertical-align:top;margin-left:50px;margin-top:50px> Autos Impares <br> ";

for($i=0;$i<count($Autos);$i++)
	{
		if(($i+1)%2!=0)
		{
			echo "<br>________________________<br> Auto ",$i+1,": ";
			echo Auto::MostrarAuto($Autos[$i]);
		}
	}

?>

