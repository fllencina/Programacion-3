<?php
		include_once "AccesoDatos.php";
	class Producto 
	{
		public $codBarras;
		public $nombre;
		public $tipo;
		public $stock;
		public $precio;
		public $id;
		public $fecha_de_creacion;
		public $fecha_de_modificacion;
		function __construct()
		{

		}
		function SeteaObjetoNuevo($_codBarras=null,$_nombre=null,$_tipo=null,$_stock=null,$_precio=null)
		{
			$this->codBarras=$_codBarras;
			$this->nombre=$_nombre;
			$this->tipo=$_tipo;
			$this->stock=$_stock;
			$this->precio=$_precio;
			$this->fecha_de_creacion=self::ObtenerFecha();
			$this->fecha_de_modificacion=self::ObtenerFecha();

			
		}

		function ObtenerFecha()
		{
			return date("Y-m-d");
		}
		static function  ObtieneIDProducto()
		{
			if(!file_exists("ProductoID.txt")){
				$file=fopen("ProductoID.txt","w+");
				fwrite($file, 0);
				fclose($file);					
			}

			$file=fopen("ProductoID.txt","r");
			$idProducto = fgets($file);
			fclose($file);
			$file=fopen("ProductoID.txt","w");
			fwrite($file, $idProducto+1);
			fclose($file);
			return $idProducto+1;
		}	

		 function Validar($resultado){
		 	$srtRet;
		 	$Agregar=false;
		 	//$ArrayProductos=Usuario::LeerJson($path);

		 	if(!empty($resultado))
		 	{
		 		$Existe=false;
			 	foreach ($resultado as $producto) 			 	
				{
					if($producto->codBarras!=$this->codBarras)
					{
						$Existe=false;
					}
					else if($producto->codBarras==$this->codBarras)
					{
						$Existe=true;
						break;
					}
				}

				if($Existe==false) //INSERTAR
				{		
					//$this->_id = self::ObtieneIDProducto();
						
					$srtRet= "<br>Ingresado.<br>";
					$Agregar=true;			
				}
				else if($Existe==true) //SUMAR STOCK
				{
					//$ArrayProductos[$i]->_stock=$ArrayProductos[$i]->_stock+$this->_stock;
					$srtRet= "<br>Actualizado<br>";	
				}
		 	}
		 	else{ 
		 		$this->_id = self::ObtieneIDProducto();
				$srtRet= "<br>Ingresado.<br>";
				$Agregar=true;
		 	}
		 	$dato=$this;
		 	if(	$Agregar==false)
		 	{
		 		$dato=null; 		
		 	}
		 	//Usuario::AddToJson($ArrayProductos,$path,$dato);
			
			return $srtRet;
		
		}
		static function ExisteProductoStock($CodBarras,$cantidad)
		{
			// if(!empty($arrayProductos))
			// {
			// 	for($i=0;$i<count($arrayProductos);$i++)
			// 	{
			// 		if($arrayProductos[$i]->codBarras==$CodBarras && $arrayProductos[$i]->stock>$cantidad)
			// 		{
			// 			return true;
			// 		}
			// 	}
			// }		
			// return false;

			$Prod=self::TraerUnProducto($CodBarras);

			if($Prod!=null)
			{
				if($Prod->stock > $cantidad )
				{
					//var_dump($Prod);
					return true;
				}
				else{
					//var_dump($Prod);
					return false;
				}
			}
			else{
				//var_dump($Prod);
				return false;
			}
		}
		static function ActualizarStock($arrayProductos,$codBarras,$cantidad)
		{
			for($i=0;$i<count($arrayProductos);$i++)
			{
				if($arrayProductos[$i]->codBarras==$codBarras)
				{
					$arrayProductos[$i]->stock=$arrayProductos[$i]->stock-$cantidad;
					break;
				}
			}
			return $arrayProductos;
		}

		 function VerificarIngresoProductoSQL()
		{
			$ProdBuscado = self::TraerUnProducto($this->codBarras); 
			$strRet;
			if($ProdBuscado!=null)
			{
				$strRet="producto Encontrado";
				
				$ProdBuscado->stock = $ProdBuscado->stock + $this->stock;
				$ProdBuscado->nombre=$this->nombre;
				$ProdBuscado->tipo=$this->tipo;
				$ProdBuscado->precio=$this->precio;
					
				$ProdBuscado->fecha_de_modificacion=self::ObtenerFecha();
				var_dump($ProdBuscado);
				$ProdBuscado->ModificarProductoParametros();
				$strRet.= " - Modificado";
			}
			else
			{	
				$strRet.= "Producto no existe, se insertara";
				$strRet.= $this->InsertarProducto();		
			}
			
			return $strRet;
		}
		public static function TraerUnProducto($codBarras) 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from producto where codBarras = $codBarras");
			$consulta->execute();
			$ProdBuscado= $consulta->fetchObject('producto');
			//var_dump($prodBuscado);
			if($ProdBuscado==null)
			{
				return null;
			}			
			return $ProdBuscado;						
		}

		public function ModificarProductoParametros()
	 	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update producto 
				set stock=:stock,
				nombre=:nombre,
				tipo=:tipo,
				precio=:precio,
				fecha_de_modificacion=:fecha_de_modificacion
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':stock',$this->stock, PDO::PARAM_STR);
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':tipo',$this->tipo, PDO::PARAM_STR);
			$consulta->bindValue(':precio',$this->precio, PDO::PARAM_STR);

			$consulta->bindValue(':fecha_de_modificacion',$this->fecha_de_modificacion, PDO::PARAM_STR);

			
			return $consulta->execute();
		 }





		public static function TraerTodoLosProductos($order="asc")
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from producto order by nombre ". $order);
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "producto");		
		}

		public static function MostrarDatos($resultado)
		{
			$table="<table><thead><tr><th>Codigo de barras</th><th>nombre</th><th>tipo</th><th>stock</th><th>precio</th><th>fecha_de_creacion<th>fecha_de_modificacion</th></th></tr></thead><tbody>";
			foreach($resultado as $fila)
    		{
          		$table.="<tr>";
          		$table.="<td>".$fila->codBarras ."</td>";
          		$table.="<td>".$fila->nombre."</td>";
          		$table.="<td>".$fila->tipo."</td>";
          		$table.="<td>".$fila->stock."</td>";
          		$table.="<td>".$fila->precio."</td>";
          		$table.="<td>".$fila->fecha_de_creacion."</td>";
          		$table.="<td>".$fila->fecha_de_modificacion."</td>";

          		$table.="</tr>";                           
   			}

			 $table.="</tbody></table>";

			 return $table;
		}
		public function InsertarProducto()
	 	{
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into producto (codBarras,nombre,tipo,stock,precio,fecha_de_creacion,fecha_de_modificacion)values(:codBarras,:nombre,:tipo, :stock,:precio,:fecha_de_creacion,:fecha_de_modificacion)");
				$consulta->bindValue(':codBarras',$this->codBarras, PDO::PARAM_STR);
				$consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
				$consulta->bindValue(':stock', $this->stock, PDO::PARAM_STR);
				$consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
				$consulta->bindValue(':fecha_de_creacion', $this->fecha_de_creacion, PDO::PARAM_STR);
				$consulta->bindValue(':fecha_de_modificacion',$this->fecha_de_modificacion , PDO::PARAM_STR);
				$consulta->execute();		
				return "Producto ingresado";
		}
		
	}


	
?>

