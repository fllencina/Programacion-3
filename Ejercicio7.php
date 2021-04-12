


<!--
 Lencina Fernanda
Aplicación Nº 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura f or ) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta < br/> ). Repetir la impresión de los números utilizando
las estructuras w hile y f oreach .

 -->
<?php

$cantidad=0;
$contador=1;
$ArrayImpares=array();
do{
	if ($contador%2!=0){
   		array_push($ArrayImpares, $contador) ;
   		$cantidad++;
	}
	else
	{  //echo "Es par";
   	}
$contador++;
} while($cantidad<10);

echo "Muestro numeros del array con estructura condicional for ";
echo "<br>";
for ($i=0; $i <count($ArrayImpares) ; $i++) { 
	echo $ArrayImpares[$i];
	echo "<br>";
}
echo "------------------------------------------";
echo "<br>";
echo "Muestro numeros del array con estructura condicional foreach ";
echo "<br>";

foreach ($ArrayImpares as  $value) {
	echo $value;
	echo "<br>";
}
echo "------------------------------------------";
echo "<br>";
echo "Muestro numeros del array con estructura condicional While ";
echo "<br>";

$indice=0;
while ($indice<count($ArrayImpares))
{
	echo $ArrayImpares[$indice];
	$indice=$indice+1;
	echo "<br>";
}
?>

