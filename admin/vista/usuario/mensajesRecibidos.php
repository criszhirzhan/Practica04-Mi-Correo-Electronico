
<?php
   
   session_start();
   if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']===FALSE){
       header("Location: /PRACTICA04-MI-CORREO-ELECTRONICO/public/vista/login.html");
   }
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../config/styles/menuH.css">
    <link rel="stylesheet" href="../../../config/styles/mensajesR.css">
    <title>Document</title>
</head>

<body>
    <div class="contenedor">

        <header>


            <div class="menu">
                <ul>
                    <li><a href="">Inicio</a></li>
                    <li><a href="../usuario/nuevoMensaje.php">Nuevo Mensaje</a></li>
                    <li><a href="../usuario/mensajesEnviados.php">Mensajes Enviados</a></li>
                    <li><a href="">Mi cuenta</a></li>
                    <li><img class="perfil1" src="../../../config/fotos/perfil.jpg" alt="../"></li>
                </ul>
            </div>

        </header>

        <h2 class="titulo"> Mensajes Recibidos</h2>

        <div class="containerMensajerR">
            <table style="width:100%">
                <tr>
                    <th>Fecha</th>
                    <th>Remitente</th>
                    <th>Asunto</th>
                    <th></th>
                </tr>

                <?php
                   
                   include '../../../config/conexionBD.php';
                   $codigoRemitente=$_SESSION['codigo'];
                   $sql = "SELECT * FROM mensaje  WHERE mensaje_destino='$codigoRemitente' ORDER BY mensaje_fecha DESC " ;
                   $result = $conn->query($sql);

                   if ($result->num_rows > 0) {

                   while($row = $result->fetch_assoc()) {
                   echo "<tr>";
                   echo " <td>" . $row["mensaje_fecha"] . "</td>";
                   $correODest = "SELECT * FROM usuario WHERE usu_codigo=".$row["mensaje_remitente"].";" ;
                   $crreo = $conn->query($correODest);
                   $fila = $crreo->fetch_assoc();
                   echo " <td>" . $fila["usu_correo"] . "</td>";
                   echo " <td>" . $row['mensaje_asunto'] ."</td>";
                   echo " <td>" .'<a href="../../../admin/vista/usuario/eliminar.php" > Ver </a>'. "</td>";
                   echo "</tr>";

                   }


                   } else {
                   echo "<tr>";
                   echo " <td colspan='7'> No existen mensajes  </td>";
                   echo "</tr>";
                   }
                   $conn->close();
           ?>

            </table>

        </div>


    </div>
</body>

</html>