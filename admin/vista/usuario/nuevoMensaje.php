<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../config/styles/nuevoMensaje.css">
    <title>Contacto</title>

</head>

<body>

    <div class="volver">
        <a href="Index.html">Volver</a>
    </div>

    <form action="/my-handling-form-page" method="POST" action="../../../controladores/usuario/enviarMensaje.php" >
        <div>
            <label for="Asunto">Asunto:</label>
            <input  type="text" id="asunto" />
        </div>
        <div>
            <label for="Remitente">Remitente:</label>
            <input type="email" id="remitente" />
        </div>
        <div>
            <label for="msg">Mensaje:</label>
            <textarea class="mensaje" id="msg"></textarea>
        </div>

        <div class="button">
            <button type="submit">Enviar Mensaje</button>
        </div>
    </form>

</body>

</html>