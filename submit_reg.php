<?php 

    $nombre_usuario=$_POST['nombre_usuario'];
    $contraseña=$_POST["contraseña"];

    include("conn_db.php");

    if(mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .')'. mysqli_connect_error());
    }
    else{
        $sql = "INSERT INTO usuarios (nombre_usuario, contraseña)
        values('$nombre_usuario',$contraseña)";
        if($conn->query($sql)){
            header("Location: index.php");
        }
        else{
            header("Location: register.php");
        }
    }

?>