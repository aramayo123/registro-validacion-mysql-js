<?php
    include("conexion.php");
    
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $cpassword = $_POST['password2'];
    $email = $_POST['correo'];
    $telefono = $_POST['telefono'];
    if($usuario !== '' && $nombre !== '' && $password !== '' && $cpassword !== '' && $email !== '' && $telefono !== ''){
        if($password === $cpassword){
            $password = hash('sha512',$password);
            $sql="SELECT * FROM usuarios WHERE email='$email'";
            $result=mysqli_query($conn,$sql);
            if(!$result->num_rows>0){
                $sql="SELECT * FROM usuarios WHERE usuario='$usuario'";
                $result=mysqli_query($conn,$sql);
                if(!$result->num_rows>0){
                    $sql="INSERT INTO usuarios (nombre,usuario,email,password) VALUES ('$nombre','$usuario','$email','$password')";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        echo json_encode('exito');
                        
                    }else{
                        echo json_encode('error5');
                    }
                }else{
                    echo json_encode('error4');
                }
            }else{
                echo json_encode('error3');
            }            
        }else{
            echo json_encode('error2');
        }
    }else{
        echo json_encode('error1');
    }
