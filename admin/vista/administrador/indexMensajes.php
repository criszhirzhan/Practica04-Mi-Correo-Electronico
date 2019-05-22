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
                    <li><a href="index.php">Usuarios</a></li>
                </ul>
            </div>

        </header>

        <br>
        <br>
        <h2 class="titulo"> Mensajes</h2>

        <br>
        <br>

        <br>
        <div class="containerMensajerR">

            <table style="width:100%">
                <tr>
                    <th>Fecha</th>
                    <th>Remitente</th>
                    <th>Asunto</th>
                    <th colspan="2">Opciones</th>
                </tr>
                <?php
                   
                    include '../../../config/conexionBD.php';
                    $sql = "SELECT * FROM mensaje   ORDER BY mensaje_fecha DESC " ;
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row["mensaje_fecha"] . "</td>";
                    $correODest = "SELECT * FROM usuario WHERE usu_codigo=".$row["mensaje_destino"].";" ;
                    $crreo = $conn->query($correODest);
                    $fila = $crreo->fetch_assoc();
                    echo " <td>" . $fila["usu_correo"] . "</td>";
                    echo " <td>" . $row['mensaje_asunto'] ."</td>";
                    echo " <td>" .'<a style="text-decoration: none; color:white " href="verMensaje.php?mensaje_codigo='.$row["mensaje_codigo"].'" > Ver </a>'. "</td>";
                    echo " <td>" .'<a style="text-decoration: none; color:white " href="../../../admin/controladores/administrador/eliminarMensaje.php?mensaje_codigo='.$row["mensaje_codigo"].'&delete=' . true .'" > Eliminar </a>'. "</td>";
                    echo "</tr>";

                    }

                    
                    } else {
                    echo "<tr>";
                    echo " <td colspan='7'> No existen mensajes </td>";
                    echo "</tr>";
                    }
                    $conn->close();
            ?>

            </table>

        </div>


    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <div class="piePagina">

        <footer>

            <address>

                Christian Daniel Zhirzhan Cabrera<br>
                Universidad Politecnica Salesiana<br>
            </address>
            <br>
            <p>&copy; Todos los derechos reservados</p>
        </footer>
    </div>
</body>

</html>