@extends('adminlte::page')
@section('title', 'SISTEG')

@section('content_header')
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-offset-4">
                <a hrf="#" class="btn btn-success glyphicon glyphicon-arrow-left" onclick="history.back()" name="volver atrás" value="volver atrás"></a>
            </div>
        </div>
        <div class="col-md-4">
                <center><h4><b>Cuota voluntaria</b></h4></center>
        </div>
  <div class="col-md-4">

  </div>

</div>
@stop

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
    @endif

@section('content')
<div class="container">
    <div class="panel-group">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading"><b>Detalles de la cuota</b></div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <form id="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <input type="hidden" id="fee_id" value="{{$fee->id}}"/>
                                        <p><strong>Fecha:</strong> {{ $fee->fecha }}</p>
                                        <p><strong>Afiliado:</strong> {{ $fee->names }} {{ $fee->surnames }}</p>
                                        <p><strong>Tipo de cuota:</strong> {{ $fee->descripcion }}</p>
                                        <p><strong>Cantidad:</strong> {{ $fee->cuota }}</p>
                                        <p><strong>Detalles:</strong> {{ $fee->detalle }}</p>
                                        </div>
                                    </div>
                                </form>
                    <!-- <a target="_blank" href="{{ URL::to('../fees-pdf')}}" type="hidden" id="fee_id" value="{{$fee->id}}"  class="btn btn-primary">Generar PDF  <i class='fa fa-file-pdf-o'></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	<!-- Modal - Actualizar registro -->

	<div class="modal fade" id="update_patient_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel">Editar registro</h4>
	            </div>
					<div class="modal-body">
	 				<form  action="{{ URL::to('patients')}}" method="POST" id="frm-update_patient">
            <input type="hidden" name="_method" value="PUT"/>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group">
                <label for="names">Nombres</label>
                <input name="names" type="text" id="update_names" placeholder="Nombres" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="surnames">Apellidos</label>
                <input name="surnames" id="update_surnames" placeholder="Apellidos" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="gender_id">Género</label>
                <select name="gender_id" id="update_gender_id" class="form-control"></select>
              </div>
              <div class="form-group">
                <label for="birth_date">Fecha nacimiento</label>
                <input name="birth_date" type="date" id="update_birth_date"class="form-control"/>
              </div>
              <div class="form-group">
                <label for="phone_number">Teléfono</label>
                <input name="phone_number" id="update_phone_number"class="form-control"/>
              </div>
              <div class="form-group">
                <label for="location_id">Localidad</label>
                <select name="location_id" id="update_location_id"class="form-control"></select>
              </div>
              <div class="form-group">
                <label for="address">Dirección</label>
                <input name="address"id="update_address"class="form-control"/>
              </div>
              <div class="form-group">
                <label for="department_id">Departamento</label>
                <select name="department_id" id="update_department_id"class="form-control"></select>
              </div>
               <div class="form-group">
                <label for="municipality_id">Municipio</label>
                <select name="municipality_id"  id="update_municipality_id"class="form-control"></select>
              </div>
              <input type="hidden" name="id" id="update_patient_id"/>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-success" value="Actualizar" />
              </div>
          </form>
				</div>
	    </div>
	  </div>
	</div>
	<!-- // Modal actualizar registro -->



@stop

@push('js')
  <script>


  </script>
@endpush