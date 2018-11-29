<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" media="screen" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <title>Padrón de Afiliados</title>
    <style>
        body {
            /* Set "my-sec-counter" to 0 */
            counter-reset: my-sec-counter;
        }
        p::before {
            /* Increment "my-sec-counter" by 1 */
            counter-increment: my-sec-counter;
            content: counter(my-sec-counter);
        }
        table{width:100%;}
        thead {
            background-color: #BFC9CA;
        }

        
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Encabezado del padrón de afiliados -->
        <table>
            <tr>            
                <td>
                    <img src="{{ public_path('images/steg.jpg') }}" alt="STEG">
                </td>
                <td>
                    <center>
                        <h1>Padrón de Afiliados</h1>  
                        <h3>Sindicato de Trabajadores de la Educación de Guatemala</h3>
                        <h4>Sub seccional de Morales, Izabal</h4>
                    </center>
                </td>
                <td>
                    <img src="{{ public_path('images/anm.jpg') }}" alt="ANM"> 
                </td>
            </tr>
        </table>
        <!-- fin del encabezado del padrón de afiliados -->
        <table class="table table-condensed table-bordered">
            <thead >
                <tr>
                    <th>#</th>
                    <th>Afiliación</th>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>DPI</th>
                    <th>Profesión</th>
                    <th>Centro de Trabajo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($affiliates as $affiliate)
                <tr>
                    <td><p></p></td>
                    <td>{{$affiliate->number}}</td>
                    <td>{{$affiliate->names}} {{$affiliate->surnames}}</td>
                    <td>{{$affiliate->gender}}</td>
                    <td>{{$affiliate->dpi}}</td>
                    <td>{{$affiliate->title}}</td>
                    <td>{{$affiliate->school}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>