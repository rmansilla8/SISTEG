@extends('adminlte::page')

@section('title', 'Afiliaci[on')

@section('content_header')
    <h1>
    Afiliación - <small>Registro de datos</small>
    </h1>
	<!--
		Migas de pan con icono
	 -->
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-users"></i>  Afiliados</li>
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
            <h3 class="box-title">Registro de nuevo Afiliado</h3>
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
            <!-- Cuerpo de la caja-->


                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Datos personales</div>
                                <div class="panel-body">
                                    <form  action="{{ URL::to('affiliates')}}" method="POST" id="frm-insert" onsubmit="return validateDataCreate();">
                                    <!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
                                    {{ csrf_field() }}
                                    <div  class="input-group ">
                                        <!-- <label for="affiliate_id">Nombre Afiliado</label> -->
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="names" id="names" class="form-control" placeholder="Ingrese los nombres"/>
                                    </div>
                                    <br/>

                                     <div class="input-group">
                                        <!-- <label for="amount">Cantidad</label> -->
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="surnames" type="text" id="surnames" placeholder="Ingrese los apellidos" class="form-control"/>
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <!-- <label for="fee_type_id">Tipo de Cuota</label> -->
                                        <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                        <input name="email" id="email" class="form-control" placeholder="Ingrese el correo electrónico"/>
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <!-- <label for="amount">Cantidad</label> -->
                                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                        <input name="phone" type="text" id="phone" placeholder="Ingrese número telefónico" class="form-control"/>
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <!-- <label for="fee_type_id">Tipo de Cuota</label> -->
                                        <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                        <select name="department" id="department" class="form-control"></select>
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <!-- <label for="fee_type_id">Tipo de Cuota</label> -->
                                        <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                        <select name="municipalities" id="municipalities" class="form-control"></select>
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <!-- <label for="fee_type_id">Tipo de Cuota</label> -->
                                        <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                        <select name="gender_id" id="gender_id" class="form-control"></select>
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <!-- <label for="date">Fecha</label> -->
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input name="birthdate" type="date" id="birthdate" placeholder="Name" class="form-control"/>
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <!-- <label for="fee_type_id">Tipo de Cuota</label> -->
                                        <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                        <select name="civil_state_id" id="civil_state_id" class="form-control"></select>
                                    </div>
                                    <br/>

                                    </form>


                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Datos de empleado</div>
                                <div class="panel-body">
                                    Panel Content
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Datos de lugar de trabajo </div>
                                <div class="panel-body">
                                    Panel Content
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Datos académicos</div>
                                <div class="panel-body">
                                    Panel Content
                                </div>
                            </div>
                        </div>
                    </div>






            </div>
        <!-- Fin de la caja -->
        <div class="box-footer">
            <!-- Comiezo del footer -->
        </div>
		<!-- fin del footer de la caja-->
	@stop

	@section('css')


	@stop

    @section('js')

    @stop