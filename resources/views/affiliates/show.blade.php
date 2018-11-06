@extends('adminlte::page')

@section('title', 'Afiliados')

@section('content_header')
    <h1>
        Afiliados - <small>Información de afiliado</small>
    </h1>
	<!--
		Migas de pan con icono
	 -->
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-bank"></i>  Afiliados</li>
    </ol>
	<style type="text/css">

    </style>
@stop
@section('content')
@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif
	<!--
		Comienzo de la caja donde se mostrará el datatable
	 -->
<div class="box">
		<!-- Encabezado de la caja -->
        <div class="box-header with-border">
            <h3 class="box-title">Afiliado</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>

                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove" disabled>
                    <i class="fa fa-times"></i>
                </button> -->

            </div>
       	</div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Número de Afiliación:</strong> {{$affiliate->number}}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Estado:</strong> {{$affiliate->affiliate_state->description}}</p>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <div class="well well-sm"> Información Personal</div>
                    <p><strong>Nombre:</strong>  {{$person->names}} {{$person->surnames}}</p>
                    <p><strong>Email:</strong>   {{$person->email}} </p>
                    <p><strong>Teléfono:</strong> {{$person->phone}} </p>
                    <p><strong>Residencia:</strong> {{$person->address}}, {{$person->municipality->name}}, {{$person->municipality->department->name}} </p>
                    <p><strong>Genero:</strong> {{$person->gender->description}} </p>
                    <p><strong>Estado Civil:</strong> {{$person->civil_state->description}} </p>
                    <p><strong>Fecha de Nacimiento:</strong> <input type="date" value="{{$person->birthdate}}" readonly="readonly" style="border: 0; background: transparent;"/> </p>
                </div>
                <div class='col-md-6'>
                    <div class="well well-sm"> Información Laboral</div>
                    <p><strong>DPI:</strong> {{$employee->dpi}} </p>
                    <p><strong>NIT:</strong> {{$employee->nit}} </p>
                    <p><strong>Registro Escalafonario:</strong> {{$employee->scale_register}} </p>
                    <p><strong>Comunidad étnica:</strong> {{$employee->ethnic_community->name}} </p>
                </div>
            </div>

            <div class='row '>
                <div class='col-md-6'>
                <div class="well well-sm"> Información Académica</div>
                    @foreach($employee_title as $titles)
                    <div class="row">
                        <div class="col-md-8">
                            <p><strong>Titulo:</strong> {{$titles->title->description}}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Año:</strong> {{$titles->year_title}}</p>
                        </div>
                    </div>
                        <p><strong>Institución:</strong> {{$titles->institution}}</p>
                        <hr>
                    @endforeach
                </div>
                <div class="col-md-6 ">
                <div class="well well-sm"> Historial Laboral</div>
                    <div class="row row-height">
                        <div class="col-md-12 right">
                        @foreach($employee_school as $schools)
                            <div class="row">
                                <div class="col-md-8">
                                    <p><strong>Escuela:</strong> {{$schools->school->name}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Estado:</strong> {{$schools->work_state->description}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Contrato:</strong> {{$schools->contract->number}} {{$schools->contract->description}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Puesto:</strong> {{$schools->employee_type->description}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Inicio a laborar:</strong> {{$schools->year_start}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Código:</strong>{{$schools->school->code}} </p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Distrito Escolar:</strong> {{$schools->school->school_district->code}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Nivel:</strong> {{$schools->school->level->description}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Area:</strong> {{$schools->school->area->name}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Clasificación:</strong> {{$schools->school->classification->description}} </p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Modalidad:</strong> {{$schools->school->modality->description}} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Jornada:</strong>  {{$schools->school->working_day->description}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Plan:</strong> </p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Dirección:</strong> {{$schools->school->address}}, {{$schools->school->school_district->municipality->name}}, {{$schools->school->school_district->municipality->department->name}}</p>
                                </div>
                            </div>
                           <hr class="my-4">
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="well well-sm"> <center>Idiomas</center></div>
                @foreach($language_domain as $languages)
                    <div class ="row">
                        <div class="col-md-4">
                        <p><strong>Idioma:</strong> {{$languages->language->name}}</p>
                        </div>
                        <div class="col-md-2">
                            <p><strong>Entiende:</strong>
                            @if ($languages->understand == 1)
                                Si
                            @else
                                No
                            @endif
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p><strong>Habla:</strong>
                            @if ($languages->speak == 1)
                                Si
                            @else
                                No
                            @endif
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p><strong>Lee:</strong>
                            @if ($languages->read == 1)
                                Si
                            @else
                                No
                            @endif
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p><strong>Escribe:</strong>
                            @if ($languages->write == 1)
                                Si
                            @else
                                No
                            @endif
                            </p>
                        </div>

                    </div>
                    <hr class="my-4">
            @endforeach
                </div>
            </div>

        </div>

        <!-- Fin de la caja -->
        <div class="box-footer">
            <!-- Comienzo del footer -->
        </div>
        <!-- fin del footer de la caja-->

@stop


@section('css')


@stop

@section('js')
   <script>

    </script>



@stop