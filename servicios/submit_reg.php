<?php 

    $nombre_usuario=$_POST['nombre_usuario'];

    include("_conexion.php");

    if(!$con){
        die('Connect Error ('. mysqli_connect_errno() .')'. mysqli_connect_error());
        header('Location: ../register.php?e=1');
    }
    else{

        $consulta="SELECT * FROM usuarios where nombre_usuario='$nombre_usuario'";
        $resultado=mysqli_query($con,$consulta);
        
        //session_start();

            $nr=mysqli_num_rows($resultado);
            if($nr == 0){
                $contraseña=$_POST['contraseña'];
                $sql = "INSERT INTO usuarios (nombre_usuario, contraseña)
                values('$nombre_usuario',$contraseña)";   
                if($con->query($sql)){
                    $consulta="SELECT * FROM usuarios where nombre_usuario='$nombre_usuario' "; 
                    $resultado=mysqli_query($con,$consulta);
                    $row = mysqli_fetch_array($resultado);
                    session_start();
                    $_SESSION['id_usuario']=$row['id_usuario'];
                    $_SESSION['nombre_usuario']=$row['nombre_usuario'];
                    $_SESSION['contraseña']=$row['contraseña'];
                    header("Location: ../index.php"); 
                }
                else{
                    header("Location: register.php");
                }
            }
            else{
                header("Location: ../register.php?e=2");
            }
        
    }
    mysqli_close($con);
?>