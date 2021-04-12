<!-- Lencina Fernanda

Aplicación Nº 20 (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario -->
<?php
include "Usuarios.php";

	echo "Agregar usuarios <br>";
	

	if (isset ($_POST["email"],$_POST["nombre"], $_POST["clave"]))
	{
		$Email=$_POST["email"];
		$Nombre=$_POST["nombre"];
		$Clave=$_POST["clave"];

		var_dump($_POST);
		$usuarioPostman = new Usuario($Email,$Nombre,$Clave);

		echo $usuarioPostman->Add($usuarioPostman);

		echo "<br>";


	}
?>

