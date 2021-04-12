
<!-- Aplicación Nº 25 ( AltaProducto)
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
crear un objeto y utilizar sus métodos para poder verificar si es un producto existente,
si ya existe el producto se le suma el stock , de lo contrario se agrega al documento en un
nuevo renglón
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase usuario
 -->

<?php

	require "Producto.php";

var_dump($_POST);

	if(isset($_POST["_codBarras"],$_POST["_nombre"],$_POST["_tipo"],$_POST["_stock"],$_POST["_precio"])) 
	{
		$_codBarras=$_POST["_codBarras"];
		
		if(strlen($_codBarras)==6 && is_numeric($_codBarras))
		{
			// echo "entra al if de codigo de barras";
			$_nombre=$_POST["_nombre"];
			$_tipo=$_POST["_tipo"];
			$_stock = $_POST["_stock"];
			$_precio=  $_POST["_precio"];
			
			$Producto=new producto($_codBarras,	$_nombre,$_tipo,$_stock,$_precio);

			

			echo $Producto->Validar("Productos.json");

		}
		else{
			echo "El codigo de barras no contiene la cantidad de caracteres correctos. ";
		}
		
	}
	else{
		echo "No se pudo ingresar.";
	}

?>

