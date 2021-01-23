<?php 

//1: Error de conexion
//2: error de usuario 
//3: error de contraseña
    $nombre_usuario=$_POST['nombre_usuario'];
    //$contraseña=$_POST["contraseña"];

    include('_conexion.php');

    if(!$con){
        die('Connect Error ('. mysqli_connect_errno() .')'. mysqli_connect_error());
    }
    else{
        
        $consulta="SELECT * FROM usuarios where nombre_usuario='$nombre_usuario' "; 
        $resultado=mysqli_query($con,$consulta);
        

        //session_start();
        if($resultado){
            $row = mysqli_fetch_array($resultado);
            $nr=mysqli_num_rows($resultado);
            if($nr == 1){
                $contraseña=$_POST['contraseña'];
                if($row['contraseña'] != $contraseña){
                    header("Location: ../login.php?e=3");
                }else{
                    session_start();
                    $_SESSION['id_usuario']=$row['id_usuario'];
                    $_SESSION['nombre_usuario']=$row['nombre_usuario'];
                    $_SESSION['contraseña']=$row['contraseña'];
                    header("Location: ../index.php");    
                }
            }
            else{
                header("Location: ../login.php?e=2");
            }
        }else{
            header('Location: ../login.php?e=1');
        }


    }
    mysqli_close($con);
?>