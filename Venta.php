

<?php

/**
 * 
 */
class Venta 
{
	public $_usuarioID;
	public $_codBarras;
	public $_cantidad;
	public $_id;


	function __construct($_usuarioID,$_codBarras, $_cantidad)
	{	
		$this->_codBarras=$_codBarras;
		$this->_usuarioID=$_usuarioID;
		$this->_cantidad=$_cantidad;
		$this->_id= self::ObtieneIDProducto();
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

}

?>