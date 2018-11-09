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
			<!--Modal: #add_new_school_modal-->
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
							<form  action="{{ URL::to('schools')}}" method="POST" id="frm-insert_school" onsubmit="return validaCamposCreate();">
								<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
								{{ csrf_field() }}

								<div class="input-group">
									<!-- <label for="name">Nombre</label> -->
									<span class="input-group-addon" id="number">#</span>
									<input name="code" type="text" id="code" placeholder="Código de la escuela" class="form-control" aria-describedby="number"  />
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
			<!-- Fin del modal #add_new_school_modal -->

			<!-- Fin del modal #add_update_school_modal -->
				<div class="modal fade" id="update_school_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Agregar registro</h4>
							</div>
							<div class="modal-body">
								<form  action="{{ URL::to('school')}}" method="POST" id="frm-update_school" onsubmit="return validaCamposUpdate();">
									<input type="hidden" name="_method" value="PUT">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="input-group">
										<!-- <label for="name">Nombre</label> -->
										<span class="input-group-addon" id="number">#</span>
										<input name="code" type="text" id="update_code" placeholder="Código de la escuela" class="form-control" aria-describedby="number"/>
									</div>
										<br/>
									<div class="input-group">
										<!-- <label for="name">Nombre</label> -->
										<span class="input-group-addon"><i class="fa fa-bank "></i></span>
										<input name="name" type="text" id="update_name" placeholder="Nombre de la escuela" class="form-control"/>
									</div>
										<br/>
									<div  class="input-group ">
										<!-- <label for="affiliate_id">Nombre Afiliado</label> -->
										<span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
										<select name="level_id" id="update_level_id" class="form-control"></select>
									</div>
									<br/>

									<div class="input-group">
										<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
										<span class="input-group-addon" id="num">#</span>
										<select name="school_district_id" id="update_school_district_id" class="form-control"  aria-describedby="num"></select>
									</div>
									<br/>
									<div class="input-group">
										<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
										<span class="input-group-addon"><i class="fa fa-exchange"></i></span>
										<select name="area_id" id="update_area_id" class="form-control"></select>
									</div>
									<br/>
									<div class="input-group">
										<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
										<span class="input-group-addon"><i class="fa  fa-users"></i></span>
										<select name="classification_id" id="update_classification_id" class="form-control"></select>
									</div>
									<br/>
									<div class="input-group">
										<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
										<span class="input-group-addon"><i class="fa  fa-language"></i></span>
										<select name="modality_id" id="update_modality_id" class="form-control"></select>
									</div>
									<br/>
									<div class="input-group">
										<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
										<span class="input-group-addon"><i class="fa  fa-sun-o"></i></span>
										<select name="working_day_id" id="update_working_day_id" class="form-control"></select>
									</div>
									<br/>
									<div class="input-group">
										<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
										<select name="plan_id" id="update_plan_id" class="form-control"></select>
									</div>
									<br/>
									<div class="input-group">
										<!-- <label for="name">Nombre</label> -->
										<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
										<input name="address" type="text" id="update_address" placeholder="Dirección" class="form-control"/>
									</div>
										<br/>
											<input type="hidden" name="id" id="school_update_id"/>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
										<input type="submit" class="btn btn-success" value="Guardar" />
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Fin del modal #add_update_school_modal -->
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
				getLevelEdit();
				getDistrictEdit();
				getAreaEdit();
				getClassificationEdit();
				getModalityEdit();
				getWorkingDayEdit();
				getPlanEdit();

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

/**Función que valida que no existan campos vacíos en el modal #add_new_fee_modal */
function validaCamposCreate(){

		var code	 			= $("#code").val();
		var name 	 			= $("#name").val();
		var level 	 	 		= $("#level_id").val();
		var district			= $("#school_district_id").val();
		var area				= $("#area_id").val();
		var classification	 	= $("#classification_id").val();
		var modality	 		= $("#modality_id").val();
		var working	 			= $("#working_day_id").val();
		var address				= $("#address").val();
		var plan				= $("#plan_id").val();
		//validamos campos
		if($.trim(code) == ""){
		toastr.error("No ha ingresado el código","Aviso!");
			return false;
		}
		if($.trim(name) == ""){
		toastr.error("No ha ingresado un nombre","Aviso!");
			return false;
		}
		if($.trim(level) == ""){
		toastr.error("No ha seleccionado el nivel","Aviso!");
			return false;
		}
		if($.trim(district) == ""){
		toastr.error("No ha seleccionado el distrito","Aviso!");
			return false;
		}

		if($.trim(area) == ""){
		toastr.error("No ha seleccionado el área","Aviso!");
			return false;
		}

		if($.trim(classification) == ""){
		toastr.error("No ha seleccionado la clasificación","Aviso!");
			return false;
		}

		if($.trim(modality) == ""){
		toastr.error("No ha seleccionado la modalidad","Aviso!");
			return false;
		}
		if($.trim(working) == ""){
		toastr.error("No ha seleccionado la jornada","Aviso!");
			return false;
		}
		if($.trim(address) == ""){
		toastr.error("No ha ingresado la dirección","Aviso!");
			return false;
		}
		if($.trim(plan) == ""){
		toastr.error("No ha seleccionado el plan","Aviso!");
			return false;
		}


	}

 		//Esta función se utiliza para cargar los datos del dropdown list de tipo de niveles
			function getLevelEdit(vid){
				$('#update_level_id').empty();
				$.get('../get-levels', function(data){
					$.each(data,	function(i, value){
						//console.info(value);
						if(value.id === vid ){
							$('#update_level_id').append($('<option selected >', {value: value.id, text: `${value.description}`}));
						}
						$('#update_level_id').append($('<option >', {value: value.id, text: `${value.description}`}));
					});
				});
			}
			//Esta función se utiliza para cargar los datos del dropdown list de tipo de distritos escolares
			function getDistrictEdit(vid){
				$('#update_school_district_id').empty();
				$.get('../get-districts', function(data){
					$.each(data,	function(i, value){
						//console.info(value);
						if(value.id === vid ){
							$('#update_school_district_id').append($('<option selected >', {value: value.id, text: `${value.code}`}));
						}
						$('#update_school_district_id').append($('<option >', {value: value.id, text: `${value.code}`}));
					});
				});
			}
			//Esta función se utiliza para cargar los datos del dropdown list de tipo de distritos escolares
			function getAreaEdit(vid){
				$('#update_area_id').empty();
				$.get('../get-areas', function(data){
					$.each(data,	function(i, value){
						//console.info(value);
						if(value.id === vid ){
							$('#update_area_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_area_id').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}
				//Esta función se utiliza para cargar los datos del dropdown list de tipo de clasificación escolar
				function getClassificationEdit(vid){
				$('#update_classification_id').empty();
				$.get('../get-classifications', function(data){
					$.each(data,	function(i, value){
						//console.info(value);
						if(value.id === vid ){
							$('#update_classification_id').append($('<option selected >', {value: value.id, text: `${value.description}`}));
						}
						$('#update_classification_id').append($('<option >', {value: value.id, text: `${value.description}`}));
					});
				});
			}
				//Esta función se utiliza para cargar los datos del dropdown list de tipo de clasificación escolar
				function getModalityEdit(vid){
				$('#update_modality_id').empty();
				$.get('../get-modalities', function(data){
					$.each(data,	function(i, value){
						//console.info(value);
						if(value.id === vid ){
							$('#update_modality_id').append($('<option selected >', {value: value.id, text: `${value.description}`}));
						}
						$('#update_modality_id').append($('<option >', {value: value.id, text: `${value.description}`}));
					});
				});
			}
				//Esta función se utiliza para cargar los datos del dropdown list de tipo de jornadas
				function getWorkingDayEdit(vid){
				$('#update_working_day_id').empty();
				$.get('../get-working_days', function(data){
					$.each(data,	function(i, value){
						//console.info(value);
						if(value.id === vid ){
							$('#update_working_day_id').append($('<option selected >', {value: value.id, text: `${value.description}`}));
						}
						$('#update_working_day_id').append($('<option >', {value: value.id, text: `${value.description}`}));
					});
				});
			}
			//Esta función se utiliza para cargar los datos del dropdown list de tipo de jornadas
				function getPlanEdit(vid){
				$('#update_plan_id').empty();
				$.get('../get-plans', function(data){
					$.each(data,	function(i, value){
						//console.info(value);
						if(value.id === vid ){
							$('#update_plan_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_plan_id').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}
//-------------Editar School-------------

	$('body').delegate('#tbl-schools #Edit', 'click', function(e){
		e.preventDefault();
			var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');
    				var rowData = $('#tbl-schools').DataTable().row($tr).data();
   						console.log(rowData);
					var vid = rowData.id;
		$.get('schools/' + vid + '/edit', {id:vid}, function(data){

			$('#frm-update_school').find('#update_code').val(data.code)
			$('#frm-update_school').find('#update_name').val(data.name)
			$('#frm-update_school').find('#update_level_id').val(data.level_id)
			$('#frm-update_school').find('#update_school_district_id').val(data.school_district_id)
			$('#frm-update_school').find('#update_area_id').val(data.area_id)
			$('#frm-update_school').find('#update_classification_id').val(data.classification_id)
			$('#frm-update_school').find('#update_modality_id').val(data.modality_id)
			$('#frm-update_school').find('#update_working_day_id').val(data.working_day_id)
			$('#frm-update_school').find('#update_address').val(data.address)
			$('#frm-update_school').find('#update_plan_id').val(data.plan_id)
			$('#frm-update_school').find('#school_update_id').val(data.id)
			$('#update_school_modal').modal('show');
		});
	});

	//-------------Actualizar escuela-------------

				$('#frm-update_school').on('submit', function(e){
				e.preventDefault();
				/**data se carga con el array de los datos del formulario #frm-update */
				var data 	= $('#frm-update_school').serializeArray();
				/**Se pasa el valor del id del registro a actualiza cargado en #update_id a la variable id */
				var id 		= $('#school_update_id').val();
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type 	: 'post',
					url 	: 'schools/' + id,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						/**Se actualiza el DataTable */
						var $t = $('#tbl-schools').DataTable();
						$t.ajax.reload();
						/**Se cierra el modal #update_fee_modal */
						$('#update_school_modal').modal('hide');
					}
					});
				});


/**Función que valida que no existan campos vacíos en el modal #update_fee_modal */
function validaCamposUpdate(){

		var code	 			= $("#update_code").val();
		var name 	 			= $("#update_name").val();
		var level 	 	 		= $("#update_level_id").val();
		var district			= $("#update_school_district_id").val();
		var area				= $("#update_area_id").val();
		var classification	 	= $("#update_classification_id").val();
		var modality	 		= $("#update_modality_id").val();
		var working	 			= $("#update_working_day_id").val();
		var address				= $("#update_address").val();
		var plan				= $("#update_plan_id").val();
		//validamos campos
		if($.trim(code) == ""){
		toastr.error("No ha ingresado el código","Aviso!");
			return false;
		}
		if($.trim(name) == ""){
		toastr.error("No ha ingresado un nombre","Aviso!");
			return false;
		}
		if($.trim(level) == ""){
		toastr.error("No ha seleccionado el nivel","Aviso!");
			return false;
		}
		if($.trim(district) == ""){
		toastr.error("No ha seleccionado el distrito","Aviso!");
			return false;
		}

		if($.trim(area) == ""){
		toastr.error("No ha seleccionado el área","Aviso!");
			return false;
		}

		if($.trim(classification) == ""){
		toastr.error("No ha seleccionado la clasificación","Aviso!");
			return false;
		}

		if($.trim(modality) == ""){
		toastr.error("No ha seleccionado la modalidad","Aviso!");
			return false;
		}
		if($.trim(working) == ""){
		toastr.error("No ha seleccionado la jornada","Aviso!");
			return false;
		}
		if($.trim(address) == ""){
		toastr.error("No ha ingresado la dirección","Aviso!");
			return false;
		}
		if($.trim(plan) == ""){
		toastr.error("No ha seleccionado el plan","Aviso!");
			return false;
		}


	}

	//-------------Eliminar Diente-------------

	/*se creo esta función para que al dar click al botón eliminar muestre uns alerta con
	 mensajes para que el usuario de click a la opción aceptar o cancelar */

$('body').delegate('#tbl-schools #Delete', 'click', function(e){
		e.preventDefault();
		// Crea los botones para que el usuario decida
		const swalWithBootstrapButtons = swal.mixin({
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger',
			buttonsStyling: false,
		})
		//Muestra el mensaje de la alerta y activa el botón cancelar
		swalWithBootstrapButtons({
			title: 'Eliminar',
			text: "¿Realmente desea eliminar el registro?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Si, eliminar!',
			cancelButtonText: 'No, cancelar!',
			reverseButtons: true
			// Se recoge el valor si se dio Click al botón eliminar
		}).then((result) =>{
			//console.log(result);
				if (result.value) {
					var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');
    				var rowData = $('#tbl-schools').DataTable().row($tr).data();
   						//console.log(rowData)
					var vid = rowData.id;
					var v_token = "{{csrf_token()}}";
					var parametros = {_method: 'DELETE', _token: v_token};
					$.ajax({
						type  : "POST",
						url	  : "schools/" + vid + "",
						data  : parametros,

						// Se elimina el Dato seleccionado
						success: function(data){
						$(vid).remove();

						//Se actualizan los datos en el DataTable
						var $t = $('#tbl-schools').DataTable();
						$t.ajax.reload();
						}
					});
					//Se muestra un mensaje de que el dato se elimino correctamente
					swalWithBootstrapButtons({
						title:"Poof! ",
						text: "Escuela se eliminó correctamente!",
						type: "success",
					});
					// En caso de que el usuario seleccione el botón cancelar se muestra un mensaje de operación cancelada
				} else if(
					result.dismiss === swal.DismissReason.cancel){
					swalWithBootstrapButtons({
						title	:"Cancelado",
						text	:"¡Operación cancelada por el usuario!",
						type	:"error",
					});
				}
			});
		});

</script>
@stop
