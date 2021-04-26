

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

	public static function TraerTodoVentasCantidades($CantMin,$CantMax)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 

		$string="select * from ventas where cantidad between " .$CantMin." and ".$CantMax;
		$consulta =$objetoAccesoDato->RetornarConsulta($string);
		
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "venta");		
	}

	public static function MostrarDatos($resultado)
	{
		$table="<table><thead><tr><th>fecha de venta</th><th>id_producto</th><th>id_usuario</th><th>Cantidad</th></tr></thead><tbody>";
		foreach($resultado as $fila)
    	{
         	$table.="<tr>";
        	$table.="<td>".$fila->fecha_de_venta ."</td>";
          	$table.="<td>".$fila->id_producto."</td>";
          	$table.="<td>".$fila->id_usuario."</td>";
          	$table.="<td>".$fila->cantidad."</td>";
          	
          	$table.="</tr>";                           
   		}

		$table.="</tbody></table>";

		 return $table;
	}

	public static function TraerVentasEntreFechas($fecha1,$fecha2)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 

		$string="select * from ventas where fecha_de_venta between '" .$fecha1."' and '".$fecha2."'";
		//var_dump($string);
		$consulta =$objetoAccesoDato->RetornarConsulta($string);
		
		$consulta->execute();			
		 return $consulta->fetchAll(PDO::FETCH_CLASS, "venta");
			
	}
	public static function MostrarcantidadVentasEntreFechas($resultado)
	{
		 $Ret=0;
		foreach($resultado as $fila)
    	{
			$Ret=$Ret+$fila->cantidad;
			//var_dump($Ret);
    	}
    	return "Entre las fechas ingresadas se ha vendido la cantidad de  ".$Ret . " productos.";	
	}



	public static function TraerTodoVentasLimit($limit)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 

		$string="SELECT  *
				FROM ventas
				INNER JOIN producto
				ON producto.id=ventas.id_producto
				order by ventas.fecha_de_venta limit " . $limit;
		//$string="select * from ventas limit ". $limit;
		$consulta =$objetoAccesoDato->RetornarConsulta($string);
		
		$consulta->execute();			
		$ProductosVendidos= $consulta->fetchAll(PDO::FETCH_CLASS, "producto");
		$table="<table><thead><tr><th>Codigo de barras</th></tr></thead><tbody>";
		foreach($ProductosVendidos as $fila)
    		{
          		$table.="<tr>";
          		$table.="<td>".$fila->codBarras ."</td>";
          		$table.="<tr>";
          	}
          	 $table.="</tbody></table>";

			 return $table;		
	}
	
	
	public static function TraerTodoVentas()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		
		$string = "select (select  nombre from usuario where usuario.id=ventas.id_usuario) as usuario,
					(select  nombre from producto where producto.id=ventas.id_producto) as producto,
					id_usuario,id_producto
					from ventas";
		

		$consulta =$objetoAccesoDato->RetornarConsulta($string);
		
		$consulta->execute();			
		$DatosVentas= $consulta->fetchAll(PDO::FETCH_CLASS, "venta");		
		$table="<table><thead><tr><th>Usuario nombre</th><th>Producto nombre</th><th></th></tr></thead><tbody>";
		foreach($DatosVentas as $fila)
    	{
          	$table.="<tr>";
          	$table.="<td>".$fila->usuario ."</td>";
          	$table.="<td>".$fila->producto ."</td>";
          	$table.="<tr>";
        }
        $table.="</tbody></table>";

		 return $table;
	}

	

	public static function TraerTodoVentasMonto()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		
		$string = "select TRUNCATE((select precio from producto where producto.id=ventas.id_producto)* ventas.cantidad , 2) as monto , id from ventas";
		

		$consulta =$objetoAccesoDato->RetornarConsulta($string);
		
		$consulta->execute();			
		$DatosVentas= $consulta->fetchAll(PDO::FETCH_CLASS, "venta");	
		$table="<table><thead><tr><th>id Venta</th><th>Monto</th><th></th></tr></thead><tbody>";
		foreach($DatosVentas as $fila)
    	{
          	$table.="<tr>";
          	$table.="<td>".$fila->id ."</td>";
          	$table.="<td>".$fila->monto ."</td>";
          	$table.="<tr>";
        }
        $table.="</tbody></table>";

		 return $table;	
	}
	

	public static function TraerTodoVentasPorUsuarioyProducto($usuarioid,$productoid)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		
		$string = "select * from ventas where id_producto= ".$productoid." and id_usuario= ".$usuarioid;
		//var_dump($string);

		$consulta =$objetoAccesoDato->RetornarConsulta($string);
		
		$consulta->execute();			
		$retorno= $consulta->fetchAll(PDO::FETCH_CLASS, "venta");
		var_dump($retorno);
		$cant=0;
		foreach($retorno as $fila)
    	{
    		$cant=$cant+$fila->cantidad;
    	}

		return "Se vendieron ".	$cant. "productos id:".$productoid. " del usuarioid: ".$usuarioid;	
	}

	public static function TraerTodoVentasPorLocalidadUsuario($localidad)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		
		//$string = "select * from ventas where id_producto= ".$productoid." and id_usuario= ".$usuarioid;
		//var_dump($string);
		$string ="select (select codBarras from producto where producto.id=ventas.id_producto) as codBarras from ventas
		where id_usuario in (select id from usuario where localidad= '".$localidad."')";
		var_dump($string);
		$consulta =$objetoAccesoDato->RetornarConsulta($string);
		
		$consulta->execute();			
		$retorno= $consulta->fetchAll(PDO::FETCH_CLASS, "venta");
		var_dump($retorno);
		
		$table="<table><thead><tr><th>Codigo de barras</th></tr></thead><tbody>";
		foreach($retorno as $fila)
    		{
          		$table.="<tr>";
          		$table.="<td>".$fila->codBarras ."</td>";
          		$table.="<tr>";
          	}
          	 $table.="</tbody></table>";

	    return $table;
		
	}


}

?>