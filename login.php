<?php
include_once("conexion.php");
session_start();
$usuario = @$_POST['usuario'];
$password = @$_POST['pass'];

if(empty($usuario) || empty($password)){
header("Location: index.php");
exit();
}

$result= $con->query("SELECT * from cliente where   usuario = '$usuario' and clave = md5('$password') and estatus = 0");
if($row = mysqli_fetch_array($result)){
        $_SESSION['logueado'] = true;
        $_SESSION['pass'] = $password;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['id']=$row['idcl'];
        $_SESSION['nombre'] = $row['nombre'];
        header("Location: administrador.php");
    }else{
$result1= $con->query("SELECT * from cliente where   usuario = '$usuario' and estatus = 1");    
        if($row = mysqli_fetch_array($result1)){ 
            $clavemd5 = $row[5];
            $password = md5($password);
            if ($clavemd5 == $password) {
                 $_SESSION['logueado'] = true;
                 $_SESSION['pass'] = $password;
                $_SESSION['usuario'] = $usuario;
                $_SESSION['id']=$row['idcl'];
                $_SESSION['nombre'] = $row['nombre'];
                header("Location: cliente.php");
            }else{
                echo "<script>
                    alert('ERROR :verifique su contraseña ');
                    window.location= 'login1.php'
                </script>";
            }          
        }else{
             echo "<script>
                    alert('ERROR :verifique sus datos de acceso');
                    window.location= 'login1.php'
               </script>";
           exit();
        }
    }
?>