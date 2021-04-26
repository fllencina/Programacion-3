<?php

require "Producto.php";

//var_dump($_POST);

	if(isset($_POST["codBarras"],$_POST["nombre"],$_POST["tipo"],$_POST["stock"],$_POST["precio"])) 
	{
		$codBarras=$_POST["codBarras"];
		
		if(strlen($codBarras)==6 && is_numeric($codBarras))
		{
			$nombre=$_POST["nombre"];
			$tipo=$_POST["tipo"];
			$stock = $_POST["stock"];
			$precio=  $_POST["precio"];
			$cantProd=0;

			$Producto=new producto();
			$Producto->SeteaObjetoNuevo($codBarras,$nombre,$tipo,$stock,$precio);
			//var_dump($Producto);
			if(Producto::ExisteProductoStock($codBarras,$cantProd))
			{
				echo $Producto->VerificarIngresoProductoSQL();
				echo "<br> Actualizado";
			}
			else{
				echo "<br>El producto no existe. No se pudo hacer";
			}	
			

			

		}
	}
?>