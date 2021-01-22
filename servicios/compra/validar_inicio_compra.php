<?php
	session_start();
	$respuesta = new stdClass();

	if(!isset($_SESSION['codigousuario'])){
		# se ingresa algo
		$respuesta->state=false;
		$respuesta->detail="No esta logueado";
		$respuesta->open_login=true;

	}else{
		$respuesta->state=true;
		$respuesta->detail="Esta logueado";
		$respuesta->open_login=false;
	}


	//mysqli_close($con);

	//para ver como JSON
	header('Content-Type: application/json');
	echo json_encode($respuesta);
?>