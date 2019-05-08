<?php
$consulta=ConsultarUsuario($_GET['usu_codigo']);

function ConsultarUsuario($usu_codigo){
        include '../../../config/conexionBD.php';

    $sql="SELECT * from usuario WHERE usu_codigo='".$usu_codigo."' ";
    $result=$conn->query($sql);
    $filas=$result->fetch_assoc();

    return[
        $filas['usu_cedula'],
        $filas['usu_nombres'],
        $filas['usu_apellidos'],
        $filas['usu_direccion'],
        $filas['usu_telefono'],
        $filas['usu_fecha_nacimiento'],
        $filas['usu_correo'],
    
    ];

    $conn->close();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar</title>
</head>
<body>
        <form id="formulario02" method="POST" action="../../../admin/vista/usuario/modificarBD.php" >

            <label for="codigo">Codigo (*)</label>
            <input type="number" id="id" name="id" value="<?php echo $_GET['usu_codigo'] ?>"  required />
            <br>
            <br>
            <label for="cedula">Cedula (*)</label>
            <input type="text" id="cedula" name="cedula" value="<?php echo $consulta[0] ?>" maxlength="10" required />
            <br>
            <br>
            <label for="nombres">Nombres (*)</label>
            <input type="text" id="nombres" name="nombres" value="<?php echo $consulta[1] ?>" required />
            <br>
            <br>
            <label for="apellidos">Apelidos (*)</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $consulta[2] ?>"  required />
            <br>
            <br>
            <label for="direccion">Dirección (*)</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo $consulta[3] ?>" required />
            <br>
            <br>
            <label for="telefono">Teléfono (*)</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $consulta[4] ?>"  required />
            <br>
            <br>
            <label for="fecha">Fecha Nacimiento (*)</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $consulta[5] ?>"  required />
            <br>
            <br>
            <label for="correo">Correo electrónico (*)</label>
            <input type="email" id="correo" name="correo" value="<?php echo $consulta[6] ?>"  required />
            <br>
            <br>
            <input type="submit" id="crear" name="crear" value="Aceptar" />
            <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
        </form>
</body>
</html>