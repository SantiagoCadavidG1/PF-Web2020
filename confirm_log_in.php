<?php 

    $nombre_usuario=$_POST['nombre_usuario'];
    $contraseña=$_POST["contraseña"];

    include("conn_db.php");

    if(!$conn){
        die('Connect Error ('. mysqli_connect_errno() .')'. mysqli_connect_error());
    }
    else{
        
        $consulta="SELECT * FROM usuarios where nombre_usuario='$nombre_usuario' and contraseña='$contraseña'";
        $resultado=mysqli_query($conn,$consulta);
        $nr=mysqli_num_rows($resultado);

        if($nr == 1){
            echo "Bienvenido:".$nombre_usuario;
        }
        else{
            header("Location: login.php");
        }

    }

?>
