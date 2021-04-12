

<!-- Lencina Fernanda
Aplicación Nº 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función d ate ) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple. -->



<?php

$hoy = date("F j, Y, g:i a");
echo $hoy ,'<br>';                 // March 10, 2001, 5:16 pm
$hoy = date("m.d.y");      
echo $hoy ,'<br>';                   // 03.10.01
$hoy = date("j, n, Y");   
echo $hoy ,'<br>';                    // 10, 3, 2001
$hoy = date("Ymd");       
echo $hoy ,'<br>';                    // 20010310
$hoy = date('h-i-s, j-m-y, it is w Day');
echo $hoy ,'<br>';     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
$hoy = date('\i\t \i\s \t\h\e jS \d\a\y.'); 
echo $hoy ,'<br>';  // it is the 10th day.
$hoy = date("D M j G:i:s T Y");      
echo $hoy ,'<br>';         // Sat Mar 10 17:16:18 MST 2001
$hoy = date('H:m:s \m \i\s\ \m\o\n\t\h'); 
echo $hoy ,'<br>';    // 17:03:18 m is month
$hoy = date("H:i:s");          
echo $hoy ,'<br>';               // 17:16:18
$hoy = date("Y-m-d H:i:s"); 
echo $hoy ,'<br>'; 

echo "--------------","<br>";
echo "Hoy es: ",date("d"), " / ",date("m"), " /",date("Y");
echo "<br>";

echo "--------------","<br>";

$dia=date("d");
$mes=date("m");

switch ($mes) {
	case '1':
		# code...
		break;
		case '1':
		echo "Es Verano";
		break;
		case '2':
		echo "Es Verano";
		
		break;
		case '3':
		if($dia<21)
		{
			echo "Es Verano";
		}
		else{
			echo "Es Otoño";
		}
		break;
		case '4':
		echo "Es Otoño";
		break;
		case '5':
		echo "Es Otoño";
		break;
		case '6':
		if($dia<21)
		{
			echo "Es Otoño";
		}
		else{
			echo "Es Invierno";
		}
		break;
		case '7':
		echo "Es Invierno";
		break;
		case '8':
		echo "Es Invierno";
		break;
		case '9':
		if($dia<21)
		{
			echo "Es Invierno";
		}
		else{
			echo "Es Primavera";
		}
		break;
		case '10':
		echo "Es Primavera";
		break;
		case '11':
		echo "Es Primavera";
		break;
	case '12':
		if($dia<21)
		{
			echo "Es Primavera";
		}
		else{
			echo "Es Verano";
		}
		break;
	default:
		# code...
		break;
}


?>

