
<!-- 

Aplicación Nº 24 ( Listado JSON y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.json.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
<ul>
<li>apellido, nombre,foto</li>
<li>apellido, nombre,foto</li>
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
		if(file_exists("Usuarios.json") )
			{
			$arrayUsuarios=Usuario::LeerUsuariosJson("Usuarios.json");
			if(!empty($arrayUsuarios))
			{
				echo Usuario::MostrarLista($arrayUsuarios);
			}
			else{
				echo "No hay usuarios en la lista o no se encontro el archivo";
			}
		}
		else{
			echo "<br> No se encuentra el archivo. <br>";
		}
			break;
		
		
		default:
			# code...
			break;
	}
				
}
?>

