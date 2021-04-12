<!-- 
Lencina Fernanda

Aplicación Nº 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.

 -->
<?php
	
	$palabra=array("H","O","L","A");
	$invertida=array_reverse($palabra);
	

echo "Palabra: <br>";
	for($i=0;$i<count($palabra);$i++)
	{
		echo $palabra[$i];
	}
echo "<br> Invertida: <br>";

	for($i=0;$i<count($invertida);$i++)
	{
		echo $invertida[$i];
	}	
?>

