<!-- Lencina Fernanda
Aplicación Nº 23 (Registro JSON)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
crear un dato con la fecha de registro , toma todos los datos y utilizar sus métodos para
poder hacer el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario. -->
<?php
include "Usuarios.php";

	echo "Agregar usuarios <br>";
	


//var_dump($_POST);
	//if (isset ($_POST["email"], $_POST["nombre"], $_POST["clave"],$_FILES["foto"]["tmp_name"]))
	if (isset ($_POST["mail"], $_POST["nombre"], $_POST["clave"],$_POST["apellido"],$_POST["localidad"]))
	{
		$Email=$_POST["mail"];
		$Nombre=$_POST["nombre"];
		$Clave=$_POST["clave"];
		$Apellido=$_POST["apellido"];
		$Localidad=$_POST["localidad"];


		//$Foto=$_FILES["foto"]["tmp_name"];
			$usuarioPostman = new Usuario($Email,$Nombre,$Clave,$Apellido,$Localidad);
		
	//	$usuarioPostman = new Usuario($Email,$Nombre,$Clave,$Apellido,$Localidad);
	//	$arrayUsuarios=Usuario::LeerUsuariosJSON("Usuarios.json");
	//	echo $usuarioPostman->addToJSON($arrayUsuarios);
		//echo $usuarioPostman->AddToCSV($usuarioPostman);
		
			echo $usuarioPostman->InsertarUsuario();
		
		
	}
	else{
		echo "no se pudo ingresar usuario";
		
	}
	echo "<br>";

	

?>

