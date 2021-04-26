<?php

include "Usuarios.php";

	echo "Modificar Clave <br>";
	//var_dump($_POST) ;

	if(isset($_POST["mail"],$_POST["clavenueva"],$_POST["nombre"],$_POST["clavevieja"]))
	{
		$mail=$_POST["mail"];
		$Nombre=$_POST["nombre"];
		$Clavenueva=$_POST["clavenueva"];
		$ClaveVieja=$_POST["clavevieja"];

		$UsuarioClave=new Usuario();
		$UsuarioClave->CrearObjetoConParametros($mail,$Nombre,$Clavenueva);
		echo $UsuarioClave->CambiarClave();
		
		//$resultado=Usuario::TraerUnUsuarioMail( $mail) ;
		//echo Usuario::MostrarDatos($resultado);
}
?>