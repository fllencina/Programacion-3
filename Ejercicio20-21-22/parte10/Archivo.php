<?php

include_once "Usuarios.php";
include_once "Producto.php";
include_once "Venta.php";


//A-Obtener los detalles completos de todos los usuarios y poder ordenarlos alfabéticamente de forma ascendente o descendente.
/*echo "Usuarios ordenados alfabeticamente";
var_dump($_POST["order"]);
if(isset($_POST["order"]))
{
	$resultado=Usuario::TraerTodoLosUsuarios($_POST["order"]);
	echo Usuario::MostrarDatos($resultado);
	//var_dump($resultado);
}
else{
  		echo "faltan datos";
  	}
*/

//B. Obtener los detalles completos de todos los productos y poder ordenarlos alfabéticamente de forma ascendente y descendente.
// echo "Productos ordenados alfabeticamente";
// if(isset($_POST["order"]))
// {
// 	$resultado=Producto::TraerTodoLosProductos($_POST["order"]);
// 	echo Producto::MostrarDatos($resultado);
// 	//var_dump($resultado);
// }
//else{
 // 		echo "faltan datos";
  //	}

//C. Obtener todas las compras filtradas entre dos cantidades.

/* echo "Ventas entre cantidades";
 if(isset($_POST["CantMin"],$_POST["CantMax"]))
 {
 	$resultado=Venta::TraerTodoVentasCantidades($_POST["CantMin"],$_POST["CantMax"]);
 	echo Venta::MostrarDatos($resultado);
	//var_dump($resultado);
 }
 else{
  		echo "faltan datos";
  	}
*/

 //D. Obtener la cantidad total de todos los productos vendidos entre dos fechas.
/*echo " cantidad vendida entre fechas <br>";
 if(isset($_POST["fecha1"],$_POST["fecha2"]))
 {
 	$resultado = Venta::TraerVentasEntreFechas($_POST["fecha1"],$_POST["fecha2"]);
 	echo Venta::MostrarcantidadVentasEntreFechas($resultado);
 }
 else{
  		echo "faltan datos";
  	}
 */

 //E. Mostrar los primeros “N” números de productos que se han enviado.
  // echo " Mostrar los primeros n numeros de prod vendidos <br>";
  // if(isset($_POST["limit"]))
  // {
  // 	echo Venta::TraerTodoVentasLimit($_POST["limit"]);
  // 	
  // }
 //else{
  //		echo "faltan datos";
  //	}

//F. Mostrar los nombres del usuario y los nombres de los productos de cada venta.
/* echo " Mostrar nombre de usuario y de prod vendidos <br>";
  
   	echo Venta::TraerTodoVentas();
   //	var_dump($resultado);
  	

  //G. Indicar el monto (cantidad * precio) por cada una de las ventas.
  	/*echo "monto de cada venta";
  	echo Venta::TraerTodoVentasMonto();
  	
*/

  //	H. Obtener la cantidad total de un producto (ejemplo:1003) vendido por un usuario (ejemplo: 104).
	/*echo "Cantidad de producto vendido por usuario <br>";
	if(isset($_POST["usuarioid"],$_POST["productoid"]))
	{
		echo Venta::TraerTodoVentasPorUsuarioyProducto($_POST["usuarioid"],$_POST["productoid"]);
	}
	else{
  		echo "faltan datos";
  	}
	*/
  	
  //	I. Obtener todos los números de los productos vendidos por algún usuario filtrado por localidad (ejemplo: ‘Avellaneda’).
  	// echo "codigo de barras de producto vendidos por usuarios de una localidad <br>";
  	// if(isset($_POST["localidad"]))
  	// {
  	// 	echo Venta::TraerTodoVentasPorLocalidadUsuario($_POST["localidad"]);
  	// }
  	// else{
  	// 	echo "faltan datos";
  	// }

  	// J. Obtener los datos completos de los usuarios filtrando por letras en su nombre o apellido.
 //  	echo "Mostrar usuario filtrado <br>";

	// if(isset($_POST["nombre"]))
	// {
	// 	$resultado=Usuario::TraerUsuarioPorNombre($_POST["nombre"]);
	// 	echo Usuario::MostrarDatos($resultado);
	// }
	// else{
  	// 	echo "faltan datos";
  	// }

  	//K. Mostrar las ventas entre dos fechas del año.
 //  if(isset($_POST["fecha1"],$_POST["fecha2"]))
 // {
 // 	$resultado = Venta::TraerVentasEntreFechas($_POST["fecha1"],$_POST["fecha2"]);
 // 	echo Venta::MostrarDatos($resultado);
 // }
 // else{
 //  		echo "faltan datos";
 //  	}
 
  	?>