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
	include "Garage.php";


	$Garage=new Garage("Empresa_A");
	$Garage2=new Garage("Empresa_B",200);
	
		$auto = new Auto("Ford","Blanco");
		echo $Garage->Add($auto);
		echo "<br>";
		echo $Garage2->Add($auto);
		echo "<br>";

		$auto = new Auto("Ford","Negro");
		echo $Garage->Add($auto);
		echo "<br>";

		echo $Garage2->Add($auto);	
		echo "<br>";

		$auto= new Auto ("Chevrolet","Gris",700000);
		echo $Garage->Add($auto);
		echo "<br>";

		echo $Garage2->Add($auto);
		echo "<br>";

		$auto= new Auto ("Chevrolet","Gris",800000);
		echo $Garage->Add($auto);
		echo "<br>";
		echo $Garage2->Add($auto);	
		echo "<br>";
		$auto = new Auto ("Audi","Azul",1000000,date('d/m/Y'));			
		echo $Garage->Add($auto);
		echo "<br>";
		echo $Garage2->Add($auto);	
		echo "<br>";	

	
	echo "<div style=display:inline-block;margin-top:50px>Control: Autos creados: <br>";
/*	for($i=0;$i<count($Garage->_autos);$i++)
	{
		echo "<br>________________________<br> Auto ",$i+1,": ";
		echo Auto::MostrarAuto($Garage->_autos[$i]);
	}
*/
	echo "<br>________________________<br></div>";
	
	echo $Garage->MostrarGarage();
	echo "<br>";
	echo $Garage2->MostrarGarage();
	$auto = new Auto("Ford","Blanco");
	echo $Garage->Remove($auto);
	echo "<br>";
	echo $Garage->MostrarGarage();
	echo "<br>";
	$auto = new Auto("volkswagen","Blanco");
	echo $Garage->Remove($auto);

?>

