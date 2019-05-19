<?php

    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE ) {
        header("Location: ../vista/login.html");
        //echo "mal";
    }

    include '../../config/conexionBD.php';
 
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null; 
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null; 
 
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' AND usu_password = MD5('$contrasena')"; 
    $sqlId = "SELECT 'usu_id' FROM usuario WHERE usu_correo='$usuario'";
    $sqlA = "SELECT * FROM usuario WHERE usu_correo = '$usuario' AND usu_password = MD5('$contrasena') AND usu_rol = 'admin'";
    $sqlU = "SELECT * FROM usuario WHERE usu_correo = '$usuario' AND usu_password = MD5('$contrasena') AND usu_rol = 'user'";
 
    $result = $conn->query($sql);
    $admin = $conn->query($sqlA);
    $user = $conn->query($sqlU);


    $result2=$conn->query($sql);
    while($row=mysqli_fetch_assoc($result2)){
        $id=$row['usu_id'];
    }




    if ($result->num_rows > 0 && $admin->num_rows > 0) {  
        session_start();
        $user = $user->fetch_assoc(); 
        $_SESSION['id']=$id;             
        $_SESSION['isLogged'] = TRUE;      
        header("Location: ../../admin/vista/index.html"); 
    } else if ($result->num_rows > 0 && $user->num_rows > 0) {
        session_start();
        $user = $user->fetch_assoc(); 
        $_SESSION['id']=$id;             
        $_SESSION['isLogged'] = TRUE;     
        header("Location: index.php");
    } else { 
        header("Location: ../vista/login.html");
        //echo "mal";
    } 
         
    $conn->close();
 
?> 