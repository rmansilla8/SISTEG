<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" media="screen" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <style>
        table{width:100%;}
    </style>
    <title>Cuota Voluntaria</title>
</head>
<body>
    <div class="container-fluid">
        <table >
            <tr>            
                <td>
                    <img src="{{ public_path('images/steg.jpg') }}" alt="STEG">
                </td>
                <td>
                    <center>
                        <h1></h1>  
                        <h3>Sindicato de Trabajadores de la Educación de Guatemala</h3>
                        <h4>Sub seccional de Morales, Izabal</h4>
                    </center>
                </td>
                <td>
                    <img src="{{ public_path('images/anm.jpg') }}" alt="ANM"> 
                </td>
            </tr>
            <tr>
            <td colspan="3"><br/><p align="right"><font size="5">Comprobante de cuota voluntaria  # {{ str_pad ($fee->id, 7, '0', STR_PAD_LEFT) }}</font></p></td>
            </tr>
            <tr>
                <td><strong><p align="left">Afiliado</p></strong></td>
                <td colspan="2"><p>{{$fee->names}} {{$fee->surnames}}</p></td>
            </tr>
            <tr>
                <td><strong><p align="left"> Número de afiliación</p></strong></td>
                <td colspan="2">{{$fee->number}}</td>
            </tr>
            <tr>
                <td><strong><p align="left"> Tipo de cuota</p></strong></td>
                <td colspan="2">{{$fee->descripcion}}</td>
            </tr>
            <tr>
                <td><strong><p align="left"> Cantidad</p></strong></td>
                <td colspan="2">Q.&nbsp;{{$fee->amount}}</td>
            </tr>
            <tr>
                <td colspan="3"><strong><p align="center"> Detalle</p></strong></td>
            </tr>
            <tr>
                <td style="border:1px solid #000000;" colspan="3" height="200"><strong><p align="center"> {{$fee->detail}}</p></strong></td>
            </tr>

        </table>
    </div>
</body>
</html>