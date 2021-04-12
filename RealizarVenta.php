
<!-- Aplicación Nº 26 (RealizarVenta)
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
POST .
Verificar que el usuario y el producto exista y tenga stock.
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
carga los datos necesarios para guardar la venta en un nuevo renglón.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en las clases -->

<?php

	require "Producto.php";
	require "Usuarios.php";
	require "Venta.php";

var_dump($_POST);

	if(isset($_POST["_codBarras"],$_POST["_usuarioId"],$_POST["_cantProd"])) 
	{
		$_codBarras=$_POST["_codBarras"];
		
		if(strlen($_codBarras)==6 && is_numeric($_codBarras))
		{
			
			$_usuarioId=$_POST["_usuarioId"];
			$_cantProd=$_POST["_cantProd"];
			
			$arrayUsuarios=Usuario::LeerJSON("Usuarios.json");
			$arrayProductos=Usuario::LeerJSON("Productos.json");
			$arrayVentas=Usuario::LeerJSON("VentasRealizadas.json");

			if(Usuario::ExisteUsuario($_usuarioId,$arrayUsuarios)&& Producto::ExisteProductoStock($_codBarras,$arrayProductos,$_cantProd))
			{
				$_venta=new Venta($_codBarras,$_usuarioId,$_cantProd);

				echo "Venta Realizada";
				Usuario::AddToJson($arrayVentas,"VentaRealizada",$_venta);
				$arrayProductos=Producto::ActualizarStock($arrayProductos,$_codBarras,$_cantProd);
				Usuario::AddToJson($arrayProductos,"Productos.json",null);

			}
			else{
				echo "No se pudo realizar la venta.";
			}

		}
		else{
			echo "El codigo de barras no contiene la cantidad de caracteres correctos. ";
		}
		
	}
	else{
		echo "Faltan datos.";
	}

?>

