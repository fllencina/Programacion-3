<?php
$suma=1;
$numero=1;
$Maximo=1000;
$Contador=0;

	do{		
		echo 'Suma enteros:', $suma, '+', $numero ;
		$suma=$suma+$numero;
		echo '  -->Resultado:', $suma ,'<br>';
		echo "\n";
		$Contador=$Contador+$numero;
	}while($suma<$Maximo);
	
	echo 'Cantidad de numeros:', $Contador ;
?>

