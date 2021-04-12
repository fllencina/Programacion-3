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
	



	if (isset ($_POST["email"], $_POST["nombre"], $_POST["clave"],$_FILES["foto"]["tmp_name"]))
	{
		$Email=$_POST["email"];
		$Nombre=$_POST["nombre"];
		$Clave=$_POST["clave"];
		$Foto=$_FILES["foto"]["tmp_name"];


		
		$usuarioPostman = new Usuario($Email,$Nombre,$Clave,$Foto);
		$arrayUsuarios=Usuario::LeerUsuariosJSON("Usuarios.json");
		echo $usuarioPostman->addToJSON($arrayUsuarios);
		//echo $usuarioPostman->AddToCSV($usuarioPostman);

		echo "<br>";

	}
?>

