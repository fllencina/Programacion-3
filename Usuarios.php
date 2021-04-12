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
		public $email;
		public $nombre;
		public $clave;
		public $id;
		public $fecha;
		public $foto;

		function __construct ($email,$nombre="",$clave, $Foto=null)
		{
			$this->email=$email;
			$this->nombre=$nombre;
			$this->clave=$clave;	
				
				$this->id=self::ObtieneIDUsuario();
				
			
				$this->fecha=self::ObtenerFecha();
			
			if($Foto!=null)
			{
				if(!realpath("Usuarios\Fotos\\"))	
				{
					mkdir("Usuarios");
					mkdir("Usuarios\Fotos");
				}	

				if(move_uploaded_file($Foto, "./Usuarios/Fotos/".$this->email.".jpg",))
					{
						echo "<br>Se movio Foto <br>";
						$this->foto="\Usuarios\Fotos\\".$this->email.".jpg";
					}
				else{
						echo "<br>No Se movio Foto <br>";
				}
			}
		}

		function ObtenerFecha()
		{
			return date("d-m-Y");
		}

		static function  ObtieneIDUsuario()
		{
			if(!file_exists("UsuarioID.txt")){
				$file=fopen("UsuarioID.txt","w+");
				fwrite($file, 0);
				fclose($file);					
			}

			$file=fopen("UsuarioID.txt","r");
			$idUsuario = fgets($file);
			fclose($file);
			$file=fopen("UsuarioID.txt","w");
			fwrite($file, $idUsuario+1);
			fclose($file);
			return $idUsuario+1;
		}		

		static function addToJSON($arrayJson,$path,$dato)
		{	
			$strRet;
			$fh = fopen($path, 'w+');
			fwrite($fh,"[");
				for($i=0;$i<count($arrayJson);$i++)
				{
					$jsonencoded = json_encode($arrayJson[$i],true,JSON_FORCE_OBJECT);
					
					fwrite($fh, $jsonencoded);	
					if($i<(count($arrayJson)-1))
					{	
						fwrite($fh,",\r\n");
					}
					else{
						//fwrite($fh,",\r\n");
					}
				}
				$Retorno=false;
				if($dato!=null) 
				{
					$jsonencoded = json_encode($dato,true,JSON_FORCE_OBJECT);
					if(count($arrayJson)==0)
					{
						$Retorno=fwrite($fh, $jsonencoded);
					}
					else{
						$Retorno=fwrite($fh, ",\r\n" . $jsonencoded);
					
					}
				}	
				fwrite($fh,"]");
				fclose($fh);

				if($Retorno)
				{
					$strRet="Dato Agregado Correctamente.";
				}
				else{
					$strRet="El Dato no pudo ser agregado.";
				}
			
			return $strRet;		
		}

		static function LeerJSON($path)
		{
			$Array=array();
			if(file_exists($path))
			{ 	
				$datos = file_get_contents($path);
				$json = json_decode($datos);
				if(!empty($json))
				{			
					foreach ($json as $DatoEspecifico) 
					{  
	    				array_push($Array, $DatoEspecifico);
					}
				}	
			}
			else{
				$file=fopen($path,"w+");
				fclose($file);
			}
			return $Array;
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
				$strRet.="<li>". "nombre: " .$UsuariosArray[$i]->nombre . ", email: " .$UsuariosArray[$i]->email . ", foto: " .$UsuariosArray[$i]->foto . "</li>";
				
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
							break;
						}
						else{
							$strRet ="No coinciden los datos.";
							break;
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
		static function ExisteUsuario($_usuarioID,$arrayUsuarios)
		{
			if(!empty($arrayUsuarios))
			{
				for($i=0;$i<count($arrayUsuarios);$i++)
				{
					if($arrayUsuarios[$i]->id==$_usuarioID)
					{
						return true;
					}
				}
			}		
			return false;
		}
	}

?>

