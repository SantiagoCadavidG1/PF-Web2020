<?php
	include('../_conexion.php'); //para llamar al php que realiza la conexion con la base de datos

	$respuesta = new stdClass();

	$datos = [];
	$i=0;
	$sql = "select * from producto where estado=1";
	$resultado = mysqli_query($con,$sql);

	while($row=mysqli_fetch_array($resultado)){
		$obj = new stdClass();
		$obj->codigo=$row['codigo'];		
		$obj->nombre=$row['nombre'];
		$obj->descripcion=$row['descripcion'];
		$obj->precio=$row['precio'];
		$obj->imagen=$row['imagen'];
		$datos[$i]=$obj;
		$i++;

	}

	$respuesta->datos = $datos;
	mysqli_close($con);

	//para ver como JSON
	header('Content-Type: application/json');
	echo json_encode($respuesta);
?>