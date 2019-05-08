<?php

ModificarUsuario(
        $_POST['id'],
        $_POST['cedula'],
        $_POST['nombres'],
        $_POST['apellidos'],
        $_POST['direccion'],
        $_POST['telefono'],
        $_POST['fechaNacimiento'],
        $_POST['correo'],
);

function ModificarUsuario ($id, $cedula, $nombres, $apellidos, $direccion, $telefono, $fechaNacimiento, $correo) {
        include '../../../config/conexionBD.php';
        date_default_timezone_set("America/Guayaquil");
        $fecha=date('Y-m-d H:i:s', time());
        $sql="UPDATE usuario SET usu_codigo='".$id."', usu_cedula='".$cedula."', usu_nombres='".$nombres."',
        usu_apellidos='".$apellidos."', usu_direccion='".$direccion."', usu_telefono='".$telefono."',
        usu_correo='".$correo."', usu_fecha_nacimiento='".$fechaNacimiento."', usu_fecha_modificacion='$fecha'  
        WHERE usu_codigo='".$id."'";
        $conn->query($sql);
        $conn->close();
       
}

?>