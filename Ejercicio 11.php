

<!-- Lencina Fernanda

Aplicación Nº 11 (Potencias de números)
Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función
que las calcule invocando la función pow).
 -->

<?php
	
	$numeros=array(1,2,3,4);
	for ($n= 1 ; $n<=4;$n++) {
		echo "<br>Potencias del numero ", $n;
		echo  "<br>............. <br>";
		for($i=1;$i<=4;$i++)
		{
			
			echo "Exponente :",$i;
			echo " - Resultado: ";
			echo pow($n, $i), "<br>............. <br>";
		}
	}
?>

