

<!-- Lencina Fernanda

Aplicación Nº 22 ( Login)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado,
Retorna un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario
 -->
<?php

include "Usuarios.php";

	echo "Login <br>";
	var_dump($_POST) ;

	if(isset($_POST["mail"],$_POST["clave"]))
	{
		$Email=$_POST["mail"];
		$Nombre=$_POST["nombre"];
		$Clave=$_POST["clave"];

		//$arrayUsuarios=Usuario::LeerUsuarios("Usuarios.csv");
		 $resultado=Usuario::TraerTodoLosUsuarios();
		// var_dump($resultado);

		if(!empty($resultado))
		{
			$UsuarioLogin=new Usuario();
			$UsuarioLogin->CrearObjetoConParametros($Email,$Nombre,$Clave);

		}
	 //echo $UsuarioLogin->Validar($arrayUsuarios);
		var_dump($UsuarioLogin);
	 echo $UsuarioLogin->Validar($resultado);
	}
	else{
		echo "Debe completar datos.";
	}
?>