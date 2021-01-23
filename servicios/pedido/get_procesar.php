<?php
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
		default:
			break;
	}
}

$datos=[];
$i=0;
$sql="	SELECT *, ped.estado estado_pedido from pedido ped
		inner join producto pro
		on ped.codigo=pro.codigo
		where ped.estado=1";

$resultado=mysqli_query($con,$sql);


while($row=mysqli_fetch_array($resultado)){
	$obj=new stdClass();
	$obj->id_pedido=$row['id_pedido'];
	$obj->codigo=$row['codigo'];
	$obj->nombre=utf8_encode($row['nombre']);
	$obj->precio=$row['precio'];
	$obj->imagen=$row['imagen'];
	$obj->fecha_pedido=$row['fecha_pedido'];
	$obj->direccion_pedido=utf8_encode($row['direccion_pedido']);
	$obj->telefono_pedido=$row['telefono_pedido'];
	$obj->estado=estado2texto($row['estado_pedido']);
	$datos[$i]=$obj;
	$i++;
}
$respuesta->datos=$datos;

mysqli_close($con);


header('Content-Type: application/json');
echo json_encode($respuesta);