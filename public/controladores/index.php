<?php 

    include '../../config/verificar_sesion.php';
    include '../../config/conexionBD.php';

    //session_start();

    session_start();
    if (isset($_SESSION['id']))
        $id=$_SESSION['id'];

    $sqlUsuario = "SELECT * FROM usuario WHERE usu_id=$id";

    $resultUsuario=$conn->query($sqlUsuario);
    $rowUsuario= mysqli_fetch_assoc($resultUsuario);

    $nombres=$rowUsuario['usu_nombres'];
    $apellidos=$rowUsuario['usu_apellidos'];

?>

<!DOCTYPE html> 
<html> 
<head>     
    <meta charset="UTF-8"> 
    <title>Correo: <?php echo $nombres ?> <?php echo $apellidos ?> </title> 
    <link rel="stylesheet" href="../vista/styles/style.css" type="text/css"/>
</head> 
<body> 
     
    <h1> Identificado como: <?php echo $nombres ?> <?php echo $apellidos ?> </h1>
    <br>
    
    <table id="menu" style="width:50%"> 

        <tr> 
            <th><a href="index.php">Inicio</a></th>  
            <th>Nuevo Mensaje</th> 
            <th>Mensajes Enviados</th>
            <th>Mi Cuenta</th>
            <th><a href="logout.php">Cerrar Sesión</a></th>             
        </tr>

    </table>
    <br>
    <h2> Bandeja de Entrada </h2>

    <table style="width:100%"> 
        <tr> 
            <th>Fecha</th>  
            <th>Remitente</th> 
            <th>Asunto</th>             
        </tr> 
 
        <?php  

            //include '../../config/conexionBD.php';  

            $sqlMensajes = "SELECT * FROM mensaje WHERE usuario_usu_id_para = $id"; 
            $result = $conn->query($sqlMensajes);

            if ($result->num_rows > 0) { 
                 
                while($row = $result->fetch_assoc()) {                      
                    echo "<tr>";   
                        echo "<td>" . $row['men_fecha'] . "</td>";               
                        echo "<td>" . $row["usuario_usu_id_de"] . "</td>";
                        echo "<td>" . $row['men_titulo'] ."</td>";                                             
                    echo "</tr>";
                }

            } else { 

                echo "<tr>";                 
                echo "<td colspan='3'> Usted no ha recibito mensajes aun </td>";                 
                echo "</tr>"; 
 
            }
             
            $conn->close();     

        ?> 
    </table>     
 
</body> 
</html> 