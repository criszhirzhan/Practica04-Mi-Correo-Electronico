
<?php
$codigo=$_GET['usu_codigo'];
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambiar Contraseña</title>
</head>

<body>
    <form id="formulario04" method="POST" action="../../../admin/vista/usuario/cambiarPaswordBD.php?usu_codigo=<?php $cod=$_GET['usu_codigo']; echo($cod); ?>" >
        <label for="ContraseñaAnt">Antigua Contraseña </label>
        <input type="password" id="antcontrasena" name="antcontrasena" value="" placeholder="Ingrese la contraseña antigua ..." />
        <br><br>
        <label for="NuContraseña">Nueva Contraseña</label>
        <input type="password" id="Nucontrasena" name="Nucontrasena" value="" placeholder="Ingrese nueva contraseña ..." />
        <br><br>
        <label for="NuCContraseña">Confirmar Contraseña</label>
        <input type="password" id="NuCcontrasena" name="NuCcontrasena" value="" placeholder="Confirme su contraseña ..." />
        <br><br>
        <input type="submit" id="cambiar" name="cambiar" value="Aceptar" />

    </form>

</body>

</html>