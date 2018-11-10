<<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="main.js"></script>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Afiliado</th>
                <th>Tipo de Cuota</th>
                <th>Cantidad</th>
                <th>Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fee as $value)
                <tr>
                    <td>{{ $value->fecha }}</td>
                    <td>{{ $value->names }} {{ $value->surnames }}</td>
                    <td>{{ $value->descripcion }}</td>
                    <td>{{ $value->cuota }}</td>
                    <td>{{ $value->detalle }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>