<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Crear</h1>

    <form action="/crear" method="post">
        @csrf
        Nombre <input type="text" name="nombre" id=""> <br>
        Apellido <input type="text" name="apellido" id=""> <br>
        <input type="submit" value="Enviar">

    </form>
</body>
</html>