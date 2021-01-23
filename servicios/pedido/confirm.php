<?php
	session_start();
	$respuesta=new stdClass();
	include('../_conexion.php');

	//$codigo_usuario=$_SESSION['id_usuario'];
	$dirusu=$_POST['dirusu'];
	$telusu=$_POST['telusu'];
	$tipopago=$_POST['tipopago'];

	if ($tipopago==1) {
		$estado=2;//por pagar
	}else{
		$estado=3;//pagado
	}

	$sql="UPDATE pedido SET direccion_pedido='$dirusu',telefono_pedido='$telusu',estado=$estado
	where estado=1";

	$resultado=mysqli_query($con,$sql);

	if ($resultado) {
		$respuesta->state=true; //pedido actualizado
		$respuesta->detail="pedido actualizado";
	}else{
		$respuesta->state=false;
		$respuesta->detail="No se pudo actualizar el pedido. Intente más tarde";
	}

	mysqli_close($con);

	//JSON
	header('Content-Type: application/json');
	echo json_encode($respuesta);

?>