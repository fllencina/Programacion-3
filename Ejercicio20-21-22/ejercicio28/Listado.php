
<!-- 

Lencina Fernanda

Aplicación Nº 21 ( Listado CSV y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.csv.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
<ul>
<li>Coffee</li>
<li>Tea</li>
<li>Milk</li>
</ul>
Hacer los métodos necesarios en la clase usuario -->

<?php
	include "Usuarios.php";

	echo "Listas <br>";
	var_dump($_GET) ;

	if(isset($_GET))
	{
		$TipoLista=$_GET["Lista"];
		echo $TipoLista , "<br>";
	switch ($TipoLista) {
		case 'usuarios':
		echo "Lista de usuarios: <br>";

	 $resultado=Usuario::TraerTodoLosUsuarios();
	 
	 if(isset($resultado))
	 {
	 	echo Usuario::MostrarDatos($resultado);
	 }
	else{
		echo "no trae datos";
		
	}
	}
				
}
?>

