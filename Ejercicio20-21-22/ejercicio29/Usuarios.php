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
include_once "AccesoDatos.php";
	
	class Usuario
	{
		public $mail;
		public $nombre;
		public $apellido;

		public $clave;
		public $id;
		public $fecha_de_registro;
		public $localidad;
		//protected $foto;

		
		public function __construct()
		{}

		public  function CrearObjetoConParametros ($email=null,$nombre="",$clave=null,$apellido=null,$localidad=null)
		{
			self::__construct();
			if($email!=null)
			 {
			 	$this->mail=$email;
			 }
			 if($nombre!=null)
			{
				$this->nombre=$nombre;
			}
			if($clave!=null)
			{
				$this->clave=$clave;
			}
			if($apellido!=null)
			{
				$this->apellido=$apellido;
			}
			if($localidad!=null)
			{
				$this->localidad=$localidad;	
			}

				//$this->id=self::ObtieneIDUsuario();
			$this->fecha_de_registro=self::ObtenerFecha();
			
			
		}

		function ObtenerFecha()
		{
			return date("Y-m-d");
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
				
			$line=array($this->nombre, $this->mail ,$this->clave );

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
	   				$mail=$datos[1];
	   				$clave=$datos[2];
	   				$usuario= new Usuario($mail,$nombre,$clave);
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
				$strRet.="<li>". "nombre: " .$UsuariosArray[$i]->nombre . ", email: " .$UsuariosArray[$i]->mail . ", foto: " .$UsuariosArray[$i]->foto . "</li>";
				
			}
			$strRet.="</ul>";
			return $strRet;
		}

		function Validar($UsuariosArray)
		{
			
			$strRet;
			
			if(!empty($UsuariosArray))
			{
				foreach($UsuariosArray as $Usuario)
				{
					if($Usuario->mail==$this->mail)
					{
						if($Usuario->clave==$this->clave)
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


		static function ExisteUsuario($usuarioID)
		{
			//if(!empty($arrayUsuarios))
			//{
				//for($i=0;$i<count($arrayUsuarios);$i++)
				//{
					//if($arrayUsuarios[$i]->id==$_usuarioID)
					//{
						//return true;
					//}
				//}
			//}		
			//return false;
			$resultado=self::TraerUnUsuario($usuarioID);
			if(isset($resultado))
			{
				return true;
			}
			else{
				return false;
			}

		}

		public static function TraerUnUsuario( $id) 
		{
			
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			
				$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where id = $id");
			
			$consulta->execute();
			$UserBuscado= $consulta->fetchObject('usuario');
			
			return $UserBuscado;						
		}

		public static function TraerUnUsuarioMail( $mail) 
		{
			
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			
				$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where mail=?");
			
			$consulta->execute(array($mail));
			$UserBuscado= $consulta->fetchObject('usuario');
			
			return $UserBuscado;						
		}


		public function CambiarClave()
		{
			$strRet;
			var_dump($this->mail);
			$UserEncontrado=self::TraerUnUsuarioMail($this->mail);
			var_dump($UserEncontrado);
			if(isset($UserEncontrado))
			{
				if($UserEncontrado->nombre==$this->nombre)
				{
					$UserEncontrado->clave=$this->clave;
					$UserEncontrado->ModificarClaveUsuario();
					$strRet= "clave cambiada";
				}
				else{
					$strRet="No coinciden los datos.";
				}
			}
			else{
				$strRet= "no se encuentra el usuario, no se puede cambiar clave";
			}
			return $strRet;
		}
		public function InsertarUsuario()
	 	{
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into Usuario (nombre,apellido,mail,clave,localidad,fecha_de_registro)values(:nombre,:apellido,:mail, :clave,:localidad,:fecha_de_registro)");
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
				$consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
				$consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);

				$consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
				$consulta->bindValue(':fecha_de_registro',$this->fecha_de_registro , PDO::PARAM_STR);
				$consulta->execute();		
				return "Usuario ingresado: IDUsuario: ". $objetoAccesoDato->RetornarUltimoIdInsertado();
		}

		public static function TraerTodoLosUsuarios($order="asc")
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario order by apellido ".$order);
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");		
		}


		public static function MostrarDatos($resultado)
		{
			$table="<table><thead><tr><th>Nombre</th> <th>Apellido</th><th>Email</th><th>Clave</th><th>Localidad</th><th>Fecha de registro</th></tr></thead><tbody>";
			foreach($resultado as $fila)
    		{
          		$table.="<tr>";
          		$table.="<td>".$fila->nombre ."</td> ";
          		$table.="<td>".$fila->apellido."</td>";
          		$table.="<td>".$fila->mail."</td>";
          		$table.="<td>".$fila->clave."</td>";
          		$table.="<td>".$fila->localidad."</td>";
          		$table.="<td>".$fila->fecha_de_registro."</td>";
          		$table.="</tr>";                           
   			}

			 $table.="</tbody></table>";

			 return $table;
		}

		public function ModificarClaveUsuario()
	 	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update usuario 
				set clave=:clave
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);
						
			return $consulta->execute();
		 }

		 public static function TraerUsuarioPorNombre($nombre)
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuario where nombre like '%".$nombre."%' or apellido like '%".$nombre."%'");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");		
		}
}

?>

