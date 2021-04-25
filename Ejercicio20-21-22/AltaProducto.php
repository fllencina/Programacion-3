
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

//var_dump($_POST);

	if(isset($_POST["codBarras"],$_POST["nombre"],$_POST["tipo"],$_POST["stock"],$_POST["precio"])) 
	{
		$codBarras=$_POST["codBarras"];
		
		if(strlen($codBarras)==6 && is_numeric($codBarras))
		{
			// echo "entra al if de codigo de barras";
			$nombre=$_POST["nombre"];
			$tipo=$_POST["tipo"];
			$stock = $_POST["stock"];
			$precio=  $_POST["precio"];
			
			$Producto=new producto();
			$Producto->SeteaObjetoNuevo($codBarras,$nombre,$tipo,$stock,$precio);
		//	var_dump($Producto);
			//$resultado=producto::TraerTodoLosProductos();
			//var_dump($resultado);
			//Producto::MostrarDatos($resultado);

			//if(isset($resultado))
			//{
				echo $Producto->VerificarIngresoProductoSQL();
			//}
			//echo $Producto->Validar("Productos.json");

		}
		else{
			echo "El codigo de barras no contiene la cantidad de caracteres correctos. ";
		}
		
	}
	else{
		echo "No se pudo ingresar.";
	}

?>

