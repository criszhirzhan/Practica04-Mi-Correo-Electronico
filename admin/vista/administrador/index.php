 <?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']===FALSE){
    header("Location: /PRACTICA04-MI-CORREO-ELECTRONICO/public/vista/login.html");
}
?>

 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../../config/styles/index.css">
     <title>Gestión de usuarios</title>
 </head>

 <body>

     <div class="contenedor">

         <header>
             <input type="checkbox" id="btn_menu">
             <label for="btn_menu"><img class="menuIm" src="../../config/images/immenu.png" alt=""></label>

             <div class="menu">
                 <ul>
                     <li><a href="../../../admin/vista/usuario/cerrarSesion.php">Cerrar Sesion</a></li>
                 </ul>
             </div>

         </header>

         <table style="width:100%">
             <tr>
                 <th>Codigo</th>
                 <th>Cedula</th>
                 <th>Nombres</th>
                 <th>Apellidos</th>
                 <th>Dirección</th>
                 <th>Telefono</th>
                 <th>Correo</th>
                 <th>Fecha Nacimiento</th>
                 <th>Foto</th>
                 <th>Eliminar</th>
                 <th>Modificar</th>
                 <th>Cambiar Contraseña</th>
             </tr>
             <?php
                    include '../../../config/conexionBD.php';
                    $sql = "SELECT * FROM usuario WHERE usu_eliminado='N' AND usu_tipo_user='user' " ;
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row["usu_codigo"] . "</td>";
                    echo " <td>" . $row["usu_cedula"] . "</td>";
                    echo " <td>" . $row['usu_nombres'] ."</td>";
                    echo " <td>" . $row['usu_apellidos'] . "</td>";
                    echo " <td>" . $row['usu_direccion'] . "</td>";
                    echo " <td>" . $row['usu_telefono'] . "</td>";
                    echo " <td>" . $row['usu_correo'] . "</td>";
                    echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                    echo " <td><img class='perfil' src='../".$row["usu_foto"]."' ></td>";
                    echo " <td>" .'<a href="../../../admin/vista/usuario/eliminar.php?usu_codigo='.$row["usu_codigo"]. '&delete=' . true .'" > Eliminar </a>'. "</td>";
                    echo " <td>" .'<a href="../administrador/modificar.php?usu_codigo='.$row["usu_codigo"].'" > Modificar </a>'. "</td>";
                    echo " <td>" .'<a href="../administrador/cambiarPasword.php?usu_codigo='.$row["usu_codigo"].'" > Cambiar Contraseña </a>'. "</td>";
                    echo "</tr>";

                    }

                    

                    } else {
                    echo "<tr>";
                    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
                    echo "</tr>";
                    }
                    $conn->close();
            ?>
         </table>

     </div>

 </body>

 </html>