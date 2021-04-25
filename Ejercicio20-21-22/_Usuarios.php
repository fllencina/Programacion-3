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
	
	class Usuario
	{
		private $email;
		private $nombre;
		private $clave;

		function __construct ($email,$nombre="",$clave)
		{
			
				$this->email=$email;
				$this->nombre=$nombre;
				$this->clave=$clave;
			
		}

		function AddToCSV()
		{
			$file = fopen("Usuarios.csv","a+");
				
			$line=array($this->nombre, $this->email ,$this->clave );

  			if( fputcsv($file, $line))
  			{
  				fclose($file);
  				return "Usuario Agregado";
  			}		
			fclose($file);
			return "No se pudo agregar el usuario";
		}

		static function LeerUsuarios($path)
		{
			$usuariosArray=array();
			if(file_exists($path) )
			{ 	
				$Archivo=fopen($path, "r");
			
				while (!feof($Archivo)) {
	   				
	   				$linea = fgets($Archivo);
	   				if(!empty($linea))
	   				{$datos=explode(",", $linea);  				
	   				$nombre=$datos[0];
	   				$email=$datos[1];
	   				$clave=$datos[2];
	   				$usuario= new Usuario($email,$nombre,$clave);
	   				array_push($usuariosArray, $usuario);}
				}
				fclose($Archivo);	
			}
			return $usuariosArray;
		}

		static function MostrarLista($UsuariosArray)
		{
			$strRet="<ul>";
			for($i=0;$i<count($UsuariosArray);$i++)
			{
				$strRet.="<li>". "nombre: " .$UsuariosArray[$i]->nombre . ", email: " .$UsuariosArray[$i]->email . ", clave: " .$UsuariosArray[$i]->clave . "</li>";
				
			}
			$strRet.="</ul>";
			return $strRet;
		}

		function Validar($UsuariosArray)
		{
			
			$strRet;
			
			if(!empty($UsuariosArray))
			{
				for($i=0;$i<count($UsuariosArray);$i++)
				{
					if($UsuariosArray[$i]->email==$this->email)
					{
						if($UsuariosArray[$i]->clave==$this->clave)
						{
							$strRet= "Verificado.";
						}
						else{
							$strRet ="No coinciden los datos.";
						}
					}
					else{
						$strRet = "Usuario No Registrado.";
					}
				}
			}
			else{
				$strRet="No se puede leer el archivo, o esta vacio.";
			}
			return $strRet;
		}
	}

?>

