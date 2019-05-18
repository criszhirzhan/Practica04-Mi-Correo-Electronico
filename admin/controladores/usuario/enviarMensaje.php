<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']===FALSE){
        header("Location: /PRACTICA04-MI-CORREO-ELECTRONICO/public/vista/login.html");
    }


 //incluir conexión a la base de datos
 include '../../config/conexionBD.php';
 $asunto = isset($_POST["asunto"]) ? mb_strtoupper(trim($_POST["asunto"]), 'UTF-8') : null;
 $remitente = isset($_POST["remitente"]) ? mb_strtoupper(trim($_POST["remitente"]), 'UTF-8') : null;
 $mensaje = isset($_POST["msg"]) ? mb_strtoupper(trim($_POST["msg"]), 'UTF-8') : null;
 
 $codD=buscarDestino($remitente);

 buscarDestino($remitente){
    $remitenteCod = "SELECT usu_codigo FROM usuario WHERE usu_correo=$remitente " ;

    return $remitente;
 }



 $sql = "INSERT INTO mensaje() VALUES (0,'$fecha', '$asunto', '$texto', '$_SESSION['codigo']', '$codD')";
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha enviado el mensaje correctamente!!!</p>";
 } else{
 echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
 }
 

 //cerrar la base de datos
 $conn->close();
 echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
 
?>