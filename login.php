<!DOCTYPE html>
	<html>
	<head>
		<title>Mi sistema E-Commerce</title>
		<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<style type="text/css">
			form{
				max-width: 460px;
				width: calc(100% - 40px);
				padding: 20px;
				background: #fff;
				border-radius: 5px;
				margin: auto;
			}
			h1{
				margin: 5px 0;
			}
			form input{
				padding: 7px 10px;
				width: calc(100% - 22px);
				margin-bottom: 10px;
			}
			form button{
				padding: 10px 15px;
				width: calc(100%);
				background: var(--main-red);
				border: none;
				color: #fff;
			}
			form p{
				margin: 0;
				margin-bottom: 5px;
				color: var(--main-red);
				font-size: 14px;
			}
		</style>

	</head>
	<body>
		<header>
			<div class="logo"><a href="index.php"><img src="assets/logo.png"></a></div>
		</header>
		<div class="contenidoPpal">
			<div class="contenidoPag">
		        
		        <form method="post" action="confirm_log_in.php">
		        	<h1>Log in: </h1>
		            <label>Nombre de usuario: <input type="text" name="nombre_usuario"></label> <br>
		            <label>Contraseña: <input type="password" name="contraseña"></label> <br>
		            <button type="submit" value="submit">Ingresar</button>
		        </form>
				</div>
			</div>
		</div>
	</body>
</html>