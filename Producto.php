<?php
		
	class Producto 
	{
		public $_codBarras;
		public $_nombre;
		public $_tipo;
		public $_stock;
		public $_precio;
		public $_id;
		
		function __construct($_codBarras,$_nombre,$_tipo,$_stock,$_precio)
		{
			$this->_codBarras=$_codBarras;
			$this->_nombre=$_nombre;
			$this->_tipo=$_tipo;
			$this->_stock=$_stock;
			$this->_precio=$_precio;
			
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

		 function Validar($path){
		 	$srtRet;
		 	$Agregar=false;
		 	$ArrayProductos=Usuario::LeerJson($path);

		 	if(!empty($ArrayProductos))
		 	{
		 		$Existe=false;
			 	for($i=0;$i<count($ArrayProductos);$i++)
				{
					if($ArrayProductos[$i]->_codBarras!=$this->_codBarras)
					{
						$Existe=false;
					}
					else if($ArrayProductos[$i]->_codBarras==$this->_codBarras)
					{
						$Existe=true;
						break;
					}
				}

				if($Existe==false)
				{		
					$this->_id = self::ObtieneIDProducto();
						
					$srtRet= "<br>Ingresado.<br>";
					$Agregar=true;			
				}
				else if($Existe==true)
				{
					$ArrayProductos[$i]->_stock=$ArrayProductos[$i]->_stock+$this->_stock;
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
		 	Usuario::AddToJson($ArrayProductos,$path,$dato);
			
			return $srtRet;
		
		}
		static function ExisteProductoStock($_CodBarras,$arrayProductos,$_cantidad)
		{
			if(!empty($arrayProductos))
			{
				for($i=0;$i<count($arrayProductos);$i++)
				{
					if($arrayProductos[$i]->_codBarras==$_CodBarras && $arrayProductos[$i]->_stock>$_cantidad)
					{
						return true;
					}
				}
			}		
			return false;
		}
		static function ActualizarStock($arrayProductos,$_codBarras,$_cantidad)
		{
			for($i=0;$i<count($arrayProductos);$i++)
			{
				if($arrayProductos[$i]->_codBarras==$_codBarras)
				{
					$arrayProductos[$i]->_stock=$arrayProductos[$i]->_stock-$_cantidad;
					break;
				}
			}
			return $arrayProductos;
		}
		
		
	}


	
?>

