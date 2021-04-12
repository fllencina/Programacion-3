


<!--
 Lencina Fernanda

Aplicación Nº 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘c olor’ , ‘m arca’ , ‘t razo’ y ‘p recio’ . Crear, cargar y mostrar tres
lapiceras.

 -->

<?php
$Color=array('azul','negro','rojo','verde');
$Marca=array('PaperMate','Bic','Faber','Parker');
$Trazo=array('fino','grueso','medio');
$Precio=array(10,20,30,50,100);
$Lapiceras=array();
$CantidadLapiceras=1;
while($CantidadLapiceras<=3)
{
	$lapicera=array("Color"=>$Color[random_int(0,3)],"Marca"=>$Marca[random_int(0,3)],"Trazo"=>$Trazo[random_int(0,2)],"Precio"=>$Precio[random_int(0,4)]);
	array_push($Lapiceras, $lapicera);
	
	echo "Lapicera ",$CantidadLapiceras," => Color: ",$lapicera["Color"],", Marca: ",$lapicera["Marca"],", Trazo: ",$lapicera["Trazo"],", Precio: ",$lapicera["Precio"], "<br>";
	$CantidadLapiceras=$CantidadLapiceras+1;
}


?>

