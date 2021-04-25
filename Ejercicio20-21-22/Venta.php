

<?php

/**
 * 
 */
include_once "AccesoDatos.php";

class Venta 
{

	public $id_usuario;
	public $id_producto;
	public $cantidad;
	public $id;
	public $fecha_de_venta;


	function __construct()
	{

	}
	function __SetearObjetoVentas($id_usuario,$id_producto, $cantidad)
	{	
		$this->id_producto=$id_producto;
		$this->id_usuario=$id_usuario;
		$this->cantidad=$cantidad;
		//$this->_id= self::ObtieneIDProducto();
		$this->fecha_de_venta=self::ObtenerFecha();
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
	public function InsertarVenta()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into ventas (cantidad,fecha_de_venta,id_usuario,id_producto) value (:cantidad,:fecha_de_venta,:id_usuario, :id_producto)");
		$consulta->bindValue(':cantidad',$this->cantidad, PDO::PARAM_STR);
		$consulta->bindValue(':fecha_de_venta', $this->fecha_de_venta, PDO::PARAM_STR);
		$consulta->bindValue(':id_usuario', $this->id_usuario, PDO::PARAM_INT);
		$consulta->bindValue(':id_producto', $this->id_producto, PDO::PARAM_INT);
				
		$consulta->execute();		
		return "venta realizada";
	}


}

?>