@extends('adminlte::page')

@section('title', 'Escuelas')

@section('content_header')
    <h1>
    Cuotas - <small>Listado de escuelas</small>
    </h1>
	<!--
		Migas de pan con icono
	 -->
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-bank"></i>  Escuelas</li>
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
        <h3 class="box-title">Listado de escuelas</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
            <!-- Cuerpo de la caja-->
		<div class="row">
			<!-- Botón que invoca el Modal #add_new_fee_modal para agregar registros -->
			<div class="col-xs-12">
					<button style="margin-bottom:10px;" type="button" data-toggle="modal" data-target="#add_new_school_modal" class="btn btn-success pull-right">
					<i class="fa fa-plus"></i> Nuevo Registro</button>
				<br/>
			</div>
		</div>

            <!-- DataTable -->
			<div class="row">
                <div class="col-md-12">
                   <table id="tbl-schools" class="display responsive no-wrap" width="100%" >
					<thead>
						<tr >
							<th class="text-center">No.</th>
							<th data-priority="2" class="text-center">Código</th>
							<th data-priority="1" class="text-center">Nombre</th>
							<th class="text-center">Nivel</th>
							<th class="text-center">Distrito escolar</th>
							<th class="text-center">Área</th>
							<th class="text-center">Clasificación</th>
							<th class="text-center">Modalidad</th>
							<th class="text-center">Jornada</th>
							<th class="text-center">Dirección</th>
							<th class="text-center">Plan</th>
							<th class="text-center">Acciones</th>
						</tr>
					</thead>
				</table>

				<!-- fin del DataTable-->
                </div>
			</div>

        </div>

        <!-- Fin de la caja -->
        <div class="box-footer">
            <!-- Comiezo del footer -->
        </div>
        <!-- fin del footer de la caja-->

		<!--Área de los Modals-->
			<!--Modal: #add_new_fee_modal-->
				<div class="modal fade" id="add_new_school_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Agregar registro</h4>
							</div>
						<div class="modal-body">
							<!--
								-Formulario del modal
								-onsubmit retorna la función que valida que ningún campo se encuentre vacío.
								-El nombre de los input y select deben ser igual nombre del campo en la BD.
							 -->
							<form  action="{{ URL::to('schools')}}" method="POST" id="frm-insert_school" >
								<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
								{{ csrf_field() }}

								<div class="input-group">
									<!-- <label for="name">Nombre</label> -->
									<span class="input-group-addon" id="number">#</span>
									<input name="code" type="text" id="code" placeholder="Código de la escuela" class="form-control" aria-describedby="number"/>
								</div>
									<br/>
								<div class="input-group">
									<!-- <label for="name">Nombre</label> -->
									<span class="input-group-addon"><i class="fa fa-bank "></i></span>
									<input name="name" type="text" id="name" placeholder="Nombre de la escuela" class="form-control"/>
								</div>
									<br/>
								<div  class="input-group ">
									<!-- <label for="affiliate_id">Nombre Afiliado</label> -->
									<span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
									<select name="level_id" id="level_id" class="form-control"></select>
								</div>
								<br/>

								<div class="input-group">
									<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
									<span class="input-group-addon" id="num">#</span>
									<select name="school_district_id" id="school_district_id" class="form-control"  aria-describedby="num"></select>
								</div>
								<br/>
								<div class="input-group">
									<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
									<span class="input-group-addon"><i class="fa fa-exchange"></i></span>
									<select name="area_id" id="area_id" class="form-control"></select>
								</div>
								<br/>
								<div class="input-group">
									<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
									<span class="input-group-addon"><i class="fa  fa-users"></i></span>
									<select name="classification_id" id="classification_id" class="form-control"></select>
								</div>
								<br/>
								<div class="input-group">
									<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
									<span class="input-group-addon"><i class="fa  fa-language"></i></span>
									<select name="modality_id" id="modality_id" class="form-control"></select>
								</div>
								<br/>
								<div class="input-group">
									<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
									<span class="input-group-addon"><i class="fa  fa-sun-o"></i></span>
									<select name="working_day_id" id="working_day_id" class="form-control"></select>
								</div>
								<br/>
								<div class="input-group">
									<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
									<span class="input-group-addon"><i class="fa fa-list"></i></span>
									<select name="plan_id" id="plan_id" class="form-control"></select>
								</div>
								<br/>
								<div class="input-group">
									<!-- <label for="name">Nombre</label> -->
									<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
									<input name="address" type="text" id="address" placeholder="Dirección" class="form-control"/>
								</div>
									<br/>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
									<input type="submit" class="btn btn-success" value="Guardar" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Fin del modal #add_new_fee_modal -->
@stop

<!--Fin del área de modales -->



@section('css')


@stop

@section('js')
   <script>
/**
 **Se invocan las funciones que llenan el DataTable y los input, select, etc.
 */
			$(document).ready(function(){
				/**Llena el DataTable */
				dataTableFees();
				getLevel();
				getDistrict();
				getArea();
				getClassification();
				getModality();
				getWorkingDay();
				getPlan();

			});
			/**Inicio del DataTable de fees */
			function dataTableFees()
			{
				/**
				 El DataTable se coloca en una variable
				 que se usara mas adelante para indexar los
				 registros.
				*/
				var t = $('#tbl-schools').DataTable({
					/**Procesamiento del lado del servidor */
					"serverside":	true,
					/**Ajusta el tamaño de las celdas */
					"autoWidth": 	true,
					/**Vuelve al DataTable adaptable al tamaño de la ventana */
					"responsive":	true,
					/**Permite asignar opciones deseadas a colunas especificas */
					"columnDefs":
						[
							/**Permite aumentar la prioridad de una columna */
							{ responsivePriority: 1, targets: 0 },
							{ responsivePriority: 2, targets: -2 },
							{
								/**Desactiva la búsqueda y el orden en la columna mas a la izquierda */
								"searchable": false,
								"orderable": false,
								"targets": 0
							}
						],
					/**Ordena la indexación de la primera columna de forma ascendente */
					"order": [[ 1, 'asc' ]],
					//"fixedColumns":	true,
					/**Traduce el DataTable a través de la CDN al español */
					"language":
						{
							"url":"//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
						},
					/**Se configura de donde se obtendrán los datos del DataTable */
					"ajax":
						{
							"url": 		'../get-schools',
							"type":		'GET',
							"dataSrc":	'schools',
						},
					/**Area que comprende las columnas y los datos que se mostrarán en el DataTable */
					"columns" : [
						{"data":	"id"},
						{"data":	"code"},
						{"data":	"name"},
						{"data":	"level.description"},
						{"data":	"school_district.code"},
						{"data":	"area.name"},
						{"data":	"classification.description"},
						{"data":	"modality.description"},
						{"data":	"working_day.description"},
						{"data":	"address"},
						{"data":	"plan.name"},
						/**Contiene los botones de actualizar, mostrar y eliminar */
						{"defaultContent":
							"<div class='btn-group btn-group-xs'>"+
							"<button type='button' id='Show' class='show btn btn-info'><i class='fa fa-eye'></i></button>"+
							"<button type='button' id='Edit' class='edit btn btn-warning'><i class='fa fa-pencil-square-o'></i></button>"+
							"<button type='button' id='Delete' class='delete btn btn-danger'><i class='fa fa-trash-o'></i></button>"+
							"</div>"
						}
					]

				});
				/**Se indexan los registros en el DataTable */
				t.on( 'order.dt search.dt', function () {
						t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
							cell.innerHTML = i+1;
						} );
				} ).draw();
			}

			/*
			 * Permite cargar la lista de niveles.
			 */
			function getLevel(){
			$.get('get-levels', function(data){
				$('#level_id').append($('<option>', {value: '', text: 'Seleccionar nivel'}));
					$.each(data,	function(i, value){
					$('#level_id').append($('<option>', {value: value.id, text: `${value.description}`}));
					});
				});
			}
			/*
			 * Permite cargar la lista de distritos.
			 */
			function getDistrict(){
			$.get('get-districts', function(data){
				$('#school_district_id').append($('<option>', {value: '', text: 'Seleccionar distrito'}));
					$.each(data,	function(i, value){
					$('#school_district_id').append($('<option>', {value: value.id, text: `${value.code}`}));
					});
				});
			}
			/*
			 * Permite cargar la lista de áreas.
			 */
			function getArea(){
			$.get('get-areas', function(data){
				$('#area_id').append($('<option>', {value: '', text: 'Seleccionar area'}));
					$.each(data,	function(i, value){
					$('#area_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}
			/*
			 * Permite cargar la lista de clasificaciones.
			 */
			function getClassification(){
			$.get('get-classifications', function(data){
				$('#classification_id').append($('<option>', {value: '', text: 'Seleccionar clasificación'}));
					$.each(data,	function(i, value){
					$('#classification_id').append($('<option>', {value: value.id, text: `${value.description}`}));
					});
				});
			}
			/*
			 * Permite cargar la lista de modalidades.
			 */
			function getModality(){
			$.get('get-modalities', function(data){
				$('#modality_id').append($('<option>', {value: '', text: 'Seleccionar modalidad'}));
					$.each(data,	function(i, value){
					$('#modality_id').append($('<option>', {value: value.id, text: `${value.description}`}));
					});
				});
			}
			/*
			 * Permite cargar la lista de jornadas.
			 */
			function getWorkingDay(){
			$.get('get-working_days', function(data){
				$('#working_day_id').append($('<option>', {value: '', text: 'Seleccionar jornada'}));
					$.each(data,	function(i, value){
					$('#working_day_id').append($('<option>', {value: value.id, text: `${value.description}`}));
					});
				});
			}
			/*
			 * Permite cargar la lista de planes.
			 */
			function getPlan(){
			$.get('get-plans', function(data){
				$('#plan_id').append($('<option>', {value: '', text: 'Seleccionar plan'}));
					$.each(data,	function(i, value){
					$('#plan_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}


			//-----------Crear escuela --------
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('#frm-insert_school').on('submit', function(e){
				e.preventDefault();
				/**Se carga data con el array de datos del formulario #frm-insert */
				var data 	= $(this).serializeArray();
				var url 	= $(this).attr('action');
				var post 	= $(this).attr('method');
				console.log(data);
				console.info(data);
				$.ajax({
					type 	: post,
					url 	: url,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						/**Se actualiza el DataTable */
						var tbl = $('#tbl-schools').DataTable();
						tbl.ajax.reload()
						$('#add_new_school_modal').modal('hide');
						toastr["success"]("Escuela guardada","Información")

					}
				});


			});
</script>
@stop
