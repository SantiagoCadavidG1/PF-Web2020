<?php
	session_start();
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Mi sistema E-Commerce</title>
		<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/index.js"></script>

	</head>
	<body>
		<header>
			<div class="logo"><a href="index.php"><img src="assets/logo.png"></a></div>
			<div class="buscador">
				<input type="text" id="idbusqueda" placeholder="Buscar Productos">
				<button class="btn-main btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
			</div>
			<div class="options">
				<?php
				if(isset($_SESSION['id_usuario'])) {
					echo
					'<div class="item-option" title="pedidos"><a href="pedido.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a><p class="nombre">'.$_SESSION['nombre_usuario'].'</p></div>';
				}else{
				?>
					<div class="item-option" title="Registrate"><a href="register.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
					<div class="item-option" title="Ingresar"><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i></div>
				<?php
				}
				?>

				<div class="item-option" title="Mis compras">
					<a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
				</div>

				<?php
					if(isset($_SESSION['id_usuario'])) {
					echo '<div class="item-option"><a href="servicios/cerrar_sesion.php"><i class="fa fa-sign-out" aria-hidden="true"></i></div>';
					}
				?>

			</div>
		</header>
		<div class="contenidoPpal">
			<div class="contenidoPag">
				<div class="contenidoTitulo">Productos destacados</div>
				<div class="listaProductos" id="space-list">
				</div>
			</div>
		</div>
	</body>
</html>