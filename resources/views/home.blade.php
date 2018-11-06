@extends('adminlte::page')

@section('title', 'SISTEG')

@section('content_header')

@stop

@section('content')
   <!-- <div class="jumbotron"> -->
<div class="container">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
            <img src="{{asset('../images/dinero.jpg')}}" alt="Equipo">
                <div class="carousel-caption">
                    Cuotas.
                </div>
            </div>

            <div class="item">
            <img src="{{asset('../images/contabilidad.jpg')}}" alt="Equipo">
                <div class="carousel-caption">
                    Registros contables.
                </div>
            </div>

            <div class="item">
            <img src="{{asset('../images/afiliados.jpg')}}" alt="Equipo">
                <div class="carousel-caption">
                    Afiliados.
                </div>
            </div>

        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> <!--FIN DEL CARRUSEL -->

    <div class="row">
        <div class="col-md-6">
            <h2>STEG</h2>
            <p align="justify">
            Sindicato de Trabajadores de la Educación de Guatemala.
            </p>
        </div>

        <div class="col-md-6">
            <h2>SISTEG</h2>
            <p align="justify">
            Sistema para la administración de afiliados y control de cuotas voluntarias.
            </p>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop