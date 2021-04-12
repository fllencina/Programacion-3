


<!--
 Lencina Fernanda

Aplicación Nº 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $ num , pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
 -->


<?php
$num = random_int(20, 60);


	echo "num ",$num ,'<br>';

switch (true) {
	case ($num/10>=2 && $num/10<3):
		if($num-20==0)
		{
			echo "Veinte";
		}
		else
		{
			echo "Veinti",unidad($num-20);
		}

		break;
		case ($num/10>=3 && $num/10<4):
		if($num-30==0)
		{
			echo "Treinta";
		}
		else
		{
			echo "Treinta y ",unidad($num-30);
		}
		break;
		case ($num/10>=4 && $num/10<5):
		if($num-40==0)
		{
			echo "Cuarenta";
		}
		else
		{
			echo "Cuarenta y ",unidad($num-40);
		}
		break;
		case ($num/10>=5 && $num/10<60):
		if($num-50==0)
		{
			echo "Cincuenta";
		}
		else
		{
			echo "cincuenta y ",unidad($num-50);
		}
		break;
		case ($num/10==0 ):
		
			echo "Sesenta";
		break;
	default:
		echo "Algo salio mal";
		break;
}

function unidad($numero){
	switch ($numero)
	{
		case 9:
		{
			$numuni = "nueve";
			break;
		}
		case 8:
		{
			$numuni = "ocho";
			break;
		}
		case 7:
		{
			$numuni = "siete";
			break;
		}
		case 6:
		{
			$numuni = "seis";
			break;
		}
		case 5:
		{
			$numuni = "cinco";
			break;
		}
		case 4:
		{
			$numuni = "cuatro";
			break;
		}
		case 3:
		{
			$numuni = "tres";
			break;
		}
		case 2:
		{
			$numuni = "dos";
			break;
		}
		case 1:
		{
			$numuni = "uno";
			break;
		}
		case 0:
		{
			$numuni = "";
			break;
		}
	}
	//echo $numuni;
	return $numuni;
}

?>

