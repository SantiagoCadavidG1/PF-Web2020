<?php
	session_start();
	$id_usu =  $_SESSION['id_usuario'];
	include('../_conexion.php');
	$respuesta=new stdClass();

	function estado2texto($id){
		switch ($id) {
			case '1':
				return 'Por procesar';
				break;
			case '2':
				return 'Por pagar';
				break;
			case '3':
				return 'Por entregar';
				break;
			case '4':
				return 'En camino';
				break;			
			case '5':
				return 'Entregado';
				break;
			default:
				break;
		}
	}

	$datos=[];
	$i=0;

	$sql="	SELECT *,ped.estado estadoped from pedido AS ped
			inner join usuarios AS usu
			on ped.id_usuario=usu.id_usuario
			inner join producto AS pro
			on ped.codigo=pro.codigo
			
			where ped.id_usuario = usu.id_usuario and ped.codigo=pro.codigo";

	$resultado=mysqli_query($con,$sql);

	while($row=mysqli_fetch_array($resultado)){
		if($id_usu == $row['id_usuario'] ){
			
			$obj=new stdClass();
			$obj->codigo=$row['codigo'];
			//$obj->id_producto=$row['id_producto'];
			$obj->nombre=utf8_encode($row['nombre']);
			$obj->precio=$row['precio'];
			$obj->imagen=$row['imagen'];
			$obj->fecha_pedido=$row['fecha_pedido'];
			$obj->direccion_pedido=utf8_encode($row['direccion_pedido']);
			$obj->telefono_pedido=$row['telefono_pedido'];
			$obj->estado=$row['estadoped'];
			$obj->estadotext=estado2texto($row['estadoped']);
			$datos[$i]=$obj;
			$i++;
		}
	}

	$respuesta->datos=$datos;

	mysqli_close($con);

	//JSON
	header('Content-Type: application/json');
	echo json_encode($respuesta);
?>