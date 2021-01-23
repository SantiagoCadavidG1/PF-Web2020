<?php
	session_start();
	$respuesta = new stdClass();

	if(!isset($_SESSION['id_usuario'])){
		# se ingresa algo
		$respuesta->state=false;
		$respuesta->detail="No esta logueado";
		$respuesta->open_login=true;

	}else{
		include('../_conexion.php'); //include?
		$id_usuario = $_SESSION['id_usuario'];
		$codigo_producto = $_POST['codigo_producto'];
		
		$sql = "INSERT INTO pedido (id_usuario, codigo, fecha_pedido, estado, direccion_pedido, telefono_pedido)
		VALUES ($id_usuario, $codigo_producto, now(), 1, '','')";

		$resultado = mysqli_query($con, $sql);

		if($resultado){
			$respuesta->state=true;
			$respuesta->detail="Producto agregado al carrito de compras";
			
		}else{
			$respuesta->state=false;
			$respuesta->detail="No se pudo agregar el producto, intente más tarde";
			
		}
		mysqli_close($con);
	}

	//para ver como JSON
	header('Content-Type: application/json');
	echo json_encode($respuesta);
?>