
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

	if(isset($_POST["codBarras"],$_POST["id_usuario"],$_POST["cantidad"])) 
	{
		$codBarras=$_POST["codBarras"];
		
		if(strlen($codBarras)==6 && is_numeric($codBarras))
		{
			
			$usuarioId=$_POST["id_usuario"];
			$cantProd=$_POST["cantidad"];
			
			//$arrayUsuarios=Usuario::LeerJSON("Usuarios.json");
			//$arrayProductos=Usuario::LeerJSON("Productos.json");
			//$arrayVentas=Usuario::LeerJSON("VentasRealizadas.json");
//if(Usuario::ExisteUsuario($_usuarioId,$arrayUsuarios)&& Producto::ExisteProductoStock($_codBarras,$arrayProductos,$_cantProd))
		//	{
			if(Usuario::ExisteUsuario($usuarioId)&& Producto::ExisteProductoStock($codBarras,$cantProd))
			{
				$_venta=new Venta();
				$_venta->__SetearObjetoVentas($codBarras,$usuarioId,$cantProd);

				//echo "Venta Realizada";
				//Usuario::AddToJson($arrayVentas,"VentaRealizada",$_venta);
				//$arrayProductos=Producto::ActualizarStock($arrayProductos,$_codBarras,$_cantProd);
				//Usuario::AddToJson($arrayProductos,"Productos.json",null);
				echo $_venta->InsertarVenta();
				$ProdBuscado = Producto::TraerUnProducto($codBarras);
				$ProdBuscado->stock=$ProdBuscado->stock-$cantProd;
				$ProdBuscado->fecha_de_modificacion=$ProdBuscado->ObtenerFecha();
				$ProdBuscado->ModificarProductoParametros();
			}
			else{
				echo "No se pudo realizar la venta.";
			}

		}
		else{
			echo "El codigo de barras no contiene formato correcto. ";
		}
		
	}
	else{
		echo "Faltan datos.";
	}

?>

