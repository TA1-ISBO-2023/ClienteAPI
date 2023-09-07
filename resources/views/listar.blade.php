<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Personas</h1>

    @if(session("creado"))
        <b>Persona creada.</b> <br><br>
    @endif 
    <a href="/crear">Crear Persona</a> <br> <br>

    <table>
        <tr>
            <thead>
                Nombre
            </thead>
            <thead>
                Apellido
            </thead>
            <thead>
                Fecha de Creación
            </thead>
        </tr>
    
        @foreach($personas as $p)

        <tr>
            <td>
                {{ $p['nombre']}}
            </td>
            <td>
                {{ $p['apellido']}}

            </td>
            <td>
                {{ $p['created_at']}}
            </td>

            <td>
                <a href="/persona/{{ $p['id'] }}">Ver detalles</a>
            </td>

            <td>
                <a href="/eliminar/{{ $p['id'] }}">Eliminar</a>
            </td>

        </tr>

        @endforeach

    </table>

</body>
</html>