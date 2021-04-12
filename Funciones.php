


<!--
 Lencina Fernanda



 -->

<?php

function esPar($numero)
{
	if($numero%2==0)
	{
		 return true;
	}
	return false;
}
function Validar ($palabra,$max,$ListaPalabras)
	{
		if(strlen($palabra)<$max)
		{
			 if(in_array($palabra, $ListaPalabras))
			 {		 	
			 	return 1;
			 }
		}
		
		return 0;
	}


?>

