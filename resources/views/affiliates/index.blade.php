@extends('adminlte::page')

@section('title', 'Afiliados')

@section('content_header')
    <h1>
    Afiliados - <small>Listado de Afiliados</small>
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
            <h3 class="box-title">Listado de Afiliados</h3>
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
				<!-- Botón que invoca el Modal #add_new_fee_modal para agregar registros -->
				<div class="col-xs-12">
						<button style="margin-bottom:10px;" type="button" data-toggle="modal" data-target="#add_new_affiliate_modal" class="btn btn-success pull-right">
						<i class="fa fa-plus"></i> Nuevo Registro</button>
					<br/>
				</div>
			</div>

            <!-- DataTable -->
			<div class="row">
                <div class="col-md-12">
                   <table id="tbl-affiliates" class="display responsive no-wrap" width="100%" >
					<thead>
						<tr >
							<th class="text-center">No.</th>
							<th data-priority="2" class="text-center">Afiliación</th>
							<th data-priority="1" class="text-center">Nombre</th>
							<th class="text-center">Género</th>
							<th class="text-center">DPI</th>
							<th class="text-center">Profesión</th>
							<th class="text-center">Centro de Trabajo</th>
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
        </div>

		<!-- Area de Modales -->
				<!-- Modal -->
	<div class="modal fade bd-example-modal-lg" id="add_new_affiliate_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
						<h4 class="js-title-step"></h4>
				</div>
				<div class="modal-body">
					<!-- Paso 1 del modal -->
					<div class="row hide" data-step="1" data-title="Afiliación - 1 de 3">
						<div class="container-fluid">
							<form  id="frm-insert_people" data-toggle="validator">
								<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
								{{ csrf_field() }}
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<div  class="input-group ">
											<span class="input-group-addon" id="snames">Nombres</span>
											<input name="names" id="names" class="form-control" placeholder="Ingrese los nombres" aria-describedby="snames"/>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" id="ssurnames">Apellidos</span>
											<input name="surnames" type="text" id="surnames" placeholder="Ingrese los apellidos" class="form-control" aria-describedby="ssurnames"/>
										</div>
										<br/>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
											<input type="email" name="email" id="email" class="form-control" placeholder="Ingrese el correo electrónico" data-error="El correo ingresado es invalido"/>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
											<input name="phone" type="text" id="phone" placeholder="Ingrese número telefónico" class="form-control"/>
										</div>
										<br/>
									</div>
								</div>
								<div class="well well-sm" style="background-color: #00a65a;"><span style="color:white;"><center><b>Residencia</b></center> </span></div>
								<div class="row ">
									<div class="col-sm-12 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" ><i class="fa fa-map"></i></span>
											<select name="department_id" id="department_id" class="form-control"></select>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" ><i class="fa fa-map-o"></i></span>
											<select name="municipality_id" id="municipality_id" class="form-control" ></select>
										</div>
										<br/>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-12">
										<div class="input-group">
											<span class="input-group-addon" ><i class="fa  fa-map-marker"></i></span>
											<input name="address" type="text" id="address" aria-describedby="addressHelp"placeholder="Ingrese dirección" class="form-control"/>
										</div>
										<small id="addressHelp" class="form-text text-muted">Aldea, caserío, barrio, colonia, entre otros.</small>
									</div>
								</div>
								<div class="well well-sm" style="background-color: #00a65a;"><span style="color:white;"><center><b>Datos complementarios</b></center> </span></div>
								<div class="row">
									<div class="col-sm-12 col-md-3">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											<input name="birthdate" type="date" id="birthdate" aria-describedby="birthdateHelp" placeholder="Fecha de nacimiento" class="form-control"/>
										</div>
										<small id="birthdateHelp" class="form-text text-muted">Fecha de nacimiento.</small>
										<br/>
									</div>
									<div class="col-sm-12 col-md-4">
										<div class="input-group">
											<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
											<span class="input-group-addon" id="sgender">Género</span>
											<select name="gender_id" id="gender_id" class="form-control" aria-describedby="sgender"></select>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-5">
										<div class="input-group">
											<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
											<span class="input-group-addon" id="scivil_state">Estado Civil</span>
											<select name="civil_state_id" id="civil_state_id" class="form-control" aria-describedby="scivil_state"></select>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>


					<!-- Paso 2 del modal -->
				<div class="row hide" data-step="2" data-title="Afiliación- 2 de 3">
					<!-- <div class="jumbotron jumbotron-fluid" style="background-color:#FFFF;"> -->
					<div class="container-fluid">
						<form   id="frm-insert_employees" data-toggle="validator">
							<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
							{{ csrf_field() }}
							<div class="well well-sm" style="background-color: #00a65a;"><span style="color:white;"><center><b>Datos de identificación</b></center> </span></div>
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<div  class="input-group ">
										<span class="input-group-addon" id="sdpi">DPI</span>
										<input name="dpi" id="dpi" alt="Documento personal de identificación" class="form-control" placeholder="Ingrese DPI" aria-describedby="sdpi"/>
									</div>
									<br/>
								</div>
								<div class="col-sm-12 col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="snit">NIT</span>
										<input name="nit" type="text" id="nit" placeholder="Ingrese NIT" class="form-control" aria-describedby="snit"/>
									</div>
									<br/>
								</div>
								<br/>
							</div>
							<div class="well well-sm" style="background-color: #00a65a;"><span style="color:white;"><center><b>Datos complementarios</b></center> </span></div>
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
										<input type="text" name="scale_register" id="scale_register" class="form-control" placeholder="Ingrese el registro escalafonario"/>
									</div>
									<br/>
								</div>
								<div class="col-sm-12 col-md-6">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-users"></i></span>
										<select name="ethnic_community_id" id="ethnic_community_id" class="form-control"></select>
									</div>
									<br/>
								</div>

							</div>
							<div class="well well-sm" style="background-color: #00a65a;"><span style="color:white;"><center><b>Información Académica</b></center> </span></div>
							<div class="row">
								<div class="col-sm-12 col-md-8">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
										<select name="title_id" id="title_id" class="form-control"></select>
									</div>
								</div>
								<div class="col-sm-12 col-md-4">
									<div class="input-group">
										<span class="input-group-addon" id="syear">Año</span>
										<input name="year_title" type="text" id="year_title" aria-describedby="yearHelp" placeholder="Ingrese los apellidos" class="form-control" aria-describedby="ssurnames"/>
									</div>
									<small id="yearHelp" class="form-text text-muted">Año en el que obtuvo el título.</small>
									<br/>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<div  class="input-group ">
										<span class="input-group-addon" id="sinstitution">Institución</span>
										<input name="institution" id="institution" class="form-control" aria-describedby="institutionHelp" placeholder="Institución donde obtuvo el titulo" aria-describedby="snames"/>
									</div>
									<small id="institutionHelp" class="form-text text-muted">Institución donde obtuvo el título.</small>
									<br/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

				<div class="row hide" data-step="3" data-title="Datos complementarios - 3 de 3">
					<div class='container-fluid'>
						<form id="frm-insert_schools">
							<div class="well well-sm" style="background-color: #00a65a;"><span style="color:white;"><center><b>Establecimiento</b></center> </span></div>
							<div class="row">
								<div class="col-sm-12 col-md-8">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
										<select name="school_id" id="school_id" class="form-control"></select>
									</div>
								</div>
								<div class="col-sm-12 col-md-4">
									<div class="input-group">
										<span class="input-group-addon" id="scontract"></span>
										<select name="contract_id" type="text" id="contract_id" aria-describedby="contractHelp" placeholder="Ingrese los apellidos" class="form-control" aria-describedby="ssurnames"></select>
									</div>
									<small id="contractHelp" class="form-text text-muted">Renglón presupuestario al que pertenece.</small>
									<br/>
								</div>
							</div>
							<div class='row'>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-addon" id="syear">Año</span>
										<input name="year_start" type="text" id="year_start" aria-describedby="yearSchoolHelp" placeholder="Ingrese el año" class="form-control" aria-describedby="ssurnames"/>
									</div>
									<small id="yearSchoolHelp" class="form-text text-muted">Año desde que labora en dicha escuela.</small>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-addon" id="swork_state">Estado</span>
										<select name="work_state_id" type="text" id="work_state_id" placeholder="Seleccione estado" class="form-control" aria-describedby="swork_state"></select>
									</div>
								</div>
								<div class="col-sm-12 col-md-4">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>
										<select name="employee_type_id" id="employee_type_id" class="form-control"></select>
									</div>
									<br/>
								</div>
							</div>
							<div class="well well-sm" style="background-color: #00a65a;"><span style="color:white;"><center><b>Idioma materno</b></center> </span></div>
							<div class="row">
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-addon" id="slanguage">Idioma</span>
										<select name="language_id" type="text" id="language_id" placeholder="Seleccione idioma" class="form-control" aria-describedby="slanguage"></select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-group">
										<span>Habla
											<input type="radio" id="speak" name="speak" aria-label="habla">
										</span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-group">
										<p>Entiende
											<input type="radio" id="understand" name="undestand" aria-label="entiende">
										</p>
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-group">
										<p>Lee
											<input type="radio" id="read" name="read" aria-label="lee">
										</p>
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-group">
										<p>Escribe
											<input type="radio" id="write" name="write" aria-label="escribe">
										</p>
									</div>
								</div>
							</div>

						</form>
						</div>
						</div>


				<div class="modal-footer">
					<button type="button" class="btn btn-default js-btn-step pull-left" data-orientation="cancel" data-dismiss="modal"></button>
					<button type="button" class="btn btn-warning js-btn-step" data-orientation="previous"></button>
					<button type="button" class="btn btn-success js-btn-step" data-orientation="next"></button>
				</div>
				</div>
			</div>
		</div>
	</div>



		<!-- Fin del Area de los Modales -->




	@stop

	@section('css')


	@stop

	@section('js')
<script>

			$(document).ready(function(){
				/**Llena el DataTable */
				dataTableAffiliates();
				modalSteps();
				validar();


				//getMunicipalities();



				// getAffiliateStates()


				check();
			});

		function dataTableAffiliates()
			{
				/**
				 El DataTable se coloca en una variable
				 que se usara mas adelante para indexar los
				 registros.
				*/
				var t = $('#tbl-affiliates').DataTable({
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
							"url": 		'../get-all_affiliates',
							"type":		'GET',
							"dataSrc":	'affiliates',
						},
					/**Area que comprende las columnas y los datos que se mostrarán en el DataTable */
					"columns" : [
						{"data":	"id"},
						{"data":	"number"},
						{
							/**
							 * * Permite combinar el nombre de la persona en una sola columna.
							 */
							data: null,
							render: function ( data, type, row )
								{
									/**
									** data se carga con los campos donde se almacena el nombre.
									*/
									return data.names+'  '+data.surnames;
								},
							//editField: ['first_name', 'second_name', 'first_surname', 'second_surname']
						},
						{"data":	"gender"},
						{"data":	"dpi"},
						{"data":	"title"},
						{"data":	"school"},
						/**Contiene los botones de actualizar, mostrar y eliminar */
						{"defaultContent":
							"<div class='btn-group btn-group-xs'>"+
							"<button type='button' id='Show' class='show btn btn-info'><i class='fa fa-eye'></i></button>"+
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
			/**Permite que el modal contenga pasos */
			function modalSteps(){
				$('#add_new_affiliate_modal').modalSteps({
					btnCancelHtml: "Cancel",
					btnPreviousHtml: "Previous",
					btnNextHtml: "Next",
					btnLastStepHtml: "Complete",
					disableNextButton: false,
					completeCallback: function() {
						create();
					},
					callbacks: {
						'1':	callback1,
						'2':	callback2,
						'3':	callback3
					},
					getTitleAndStep: function() {}
				});
			}
			var callback1 = function (){
				getDepartments();
				departmentMunicipality();
				getGenders();
				getCivilStates();
			};
			var callback2 = function(){
				getEthnicCommunities();
				getTitles();
			}
			var callback3 = function(){
				getEmployeeTypes();
				getContracts();
				getWorkStates();
				getSchools();
				getLanguages();
			}


			function departmentMunicipality(){
				$('#municipality_id').prop('disabled', true);
				$("#department_id").change(function() {
					$('#municipality_id').empty();
					if($("#department_id").val() !== '0'){
						$('#municipality_id').prop('disabled', false);
						getMunicipalities();
					}else{
						$('#municipality_id').prop('disabled', true);
					}
				});

			}


			 function getDepartments(){
				 if($('#department_id').val()==null){
				$.get('get-departments', function(data){
					$('#department_id').append($('<option>', {value: '0', text: 'Seleccionar departamento'}));
						$.each(data,	function(i, value){
						$('#department_id').append($('<option>', {value: value.id, text: `${value.name}`}));
						});
					});
					}
			}


			function getMunicipalities(){
				$department=$('#department_id').val();
				$.get('get-municipalities/'+$department, function(data){
					$('#municipality_id').append($('<option>', {value: '', text: 'Seleccionar municipio'}));
					$.each(data,	function(i, value){
						$('#municipality_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

			function getGenders(){
				if($('#gender_id').val()==null){
				$.get('get-genders', function(data){
					$('#gender_id').append($('<option>', {value: '', text: 'Seleccionar género'}));
					$.each(data,	function(i, value){
						$('#gender_id').append($('<option>', {value: value.id, text: `${value.description}`}));
					});
				});
				}
			}

			function getCivilStates(){
				if($('#civil_state_id').val()==null){
				$.get('get-civil_states', function(data){
					$('#civil_state_id').append($('<option>', {value: '', text: 'Seleccionar estado civil'}));
					$.each(data,	function(i, value){
						$('#civil_state_id').append($('<option>', {value: value.id, text: `${value.description}`}));
					});
				});
				}
			}

			function getEmployeeTypes(){
				if($('#employee_id').val()==null){
				$.get('get-employee_types', function(data){
					$('#employee_type_id').append($('<option>', {value: '0', text: 'Seleccionar tipo de empleado'}));
						$.each(data,	function(i, value){
						$('#employee_type_id').append($('<option>', {value: value.id, text: `${value.description}`}));
						});
					});
				}
			}

			function getEthnicCommunities(){
				if($('#ethnic_community_id').val()==null){
				$.get('get-ethnic_communities', function(data){
					$('#ethnic_community_id').append($('<option>', {value: '0', text: 'Seleccionar comunidad étnica'}));
						$.each(data,	function(i, value){
						$('#ethnic_community_id').append($('<option>', {value: value.id, text: `${value.name}`}));
						});
					});
				}
			}

			function getTitles(){
				if($('#title_id').val()==null){
				$.get('get-titles', function(data){
					$('#title_id').append($('<option>', {value: '0', text: 'Seleccionar titulo que acredita'}));
						$.each(data,	function(i, value){
						$('#title_id').append($('<option>', {value: value.id, text: `${value.description}`}));
						});
					});
				}
			}

			function getWorkStates(){
				if($('#work_state_id').val()==null){
				$.get('get-work_states', function(data){
					$('#work_state_id').append($('<option>', {value: '0', text: 'Seleccionar estado laboral'}));
						$.each(data,	function(i, value){
						$('#work_state_id').append($('<option>', {value: value.id, text: `${value.description}`}));
						});
					});
				}
			}

			function getContracts(){
				if($('#contract_id').val()==null){
				$.get('get-contracts', function(data){
					$('#contract_id').append($('<option>', {value: '0', text: 'Seleccionar contrato'}));
						$.each(data,	function(i, value){
						$('#contract_id').append($('<option>', {value: value.id, text: `${value.description}`}));
						});
					});
				}
			}

			function getSchools(){
				if($('#school_id').val()==null){
				$.get('get-school', function(data){
					$('#school_id').append($('<option>', {value: '0', text: 'Seleccionar escuela'}));
						$.each(data,	function(i, value){
						$('#school_id').append($('<option>', {value: value.id, text: `${value.name}`}));
						});
					});
				}
			}

			function getLanguages(){
				if($('#language_id').val()==null){
				$.get('get-languages', function(data){
					$('#language_id').append($('<option>', {value: '0', text: 'Seleccionar idioma'}));
						$.each(data,	function(i, value){
						$('#language_id').append($('<option>', {value: value.id, text: `${value.name}`}));
						});
					});
				}
			}

			// function getAffiliateStates(){
			// 	$.get('get-affiliates_states', function(data){
			// 		// $('#affiliate_state_id').append($('<option>', {value: '0', text: 'Seleccionar estado de afiliado'}));
			// 			$.each(data,	function(i, value){
			// 				if(value.id === 7){
			// 			$('#affiliate_state_id').append($('<option>', {value: value.id, text: `${value.description}`}));
			// 			}
			// 			});
			// 		});
			// }




		function validar () {
			jQuery.validator.addMethod("lettersonly", function(value, element) {
				return this.optional(element) || /^[a-z\sÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/i.test(value);
			}, );
			jQuery.validator.addMethod("phone", function(value, element) {
				return this.optional(element) || /^[0-9/-]+$/i.test(value);
			}, );
			$('#frm-insert_people').validate({
				keyup: false,
				rules: {
					names: {
						required: 		true,
						lettersonly: 	true,
						minlength: 		3,
						maxlength: 		30,


					},
					surnames: {
						required: 		true,
						lettersonly: 	true,
						minlength: 		3,
						maxlength: 		30,

					},
					email: {
						email: 			true,

					},
					phone: {
						phone: 			true,
						minlength: 		8,
						maxlength: 		8,

					},

					department_id: {
						required: 		true
					},

					municipality_id: {
						required: 		true
					},

					address: {
						required: 		true,
						minlength: 		10,
					},
					birthdate:{
						required: 		true,
						date: 			true,
					},

					gender_id: {
						required:		true,
					},

					civil_state_id: {
						required: 		true,
					}
				},
				messages: {
					names: {
						required: 		function () {toastr.error('Por favor ingrese al menos un nombre')},
						lettersonly: 	function () {toastr.error('Los nombres solo pueden contener letras')},
						minlength: 		function () {toastr.error('Ingrese un nombre válido')},
						maxlength: 		function () {toastr.error('Ingrese un nombre válido')},

					},
					surnames: {
						required: 		function () {toastr.error('Por favor ingrese al menos un apellido')},
						lettersonly: 	function () {toastr.error('Los apellidos solo pueden contener letras')},
						minlength: 		function () {toastr.error('Ingrese un apellido válido')},
						maxlength: 		function () {toastr.error('Ingrese un apellido válido')},

					},
					email: {
						email: 			function () {toastr.error('Ingrese un correo electrónico válido')},
					},
					phone: {
						phone: 			function () {toastr.error('Ingrese un número de teléfono válido')},
						minlength: 		function () {toastr.error('El número de teléfono debe tener 8 dígitos')},
						maxlength: 		function () {toastr.error('El número de teléfono debe tener 8 dígitos')},

					},
					department_id: {
						required: 		function () {toastr.error('Debe elegir un departamento')},
					},
					municipality_id: {
						required: 		function () {toastr.error('Debe elegir un municipio')}
					},
					address: {
						required: 		function () {toastr.error('La dirección es requerida')},
						minlength: 		function () {toastr.error('Ingrese una dirección válida')},
					},
					birthdate: {
						required: 		function () {toastr.error('Debe ingresa fecha de nacimiento')},
						date: 			function () {toastr.error('Ingrese una fecha válida')}
					},
					gender_id: {
						required: 		function () {toastr.error('Debe elegir un género')}
					},
					civil_state_id: {
						required: 		function () {toastr.error('Debe elegir un estado civil')}
					}
				},
			});

			$('#frm-insert_employees').validate({
				keyup: false,
				rules: {
					dpi: {
						required: 		true,
						lettersonly: 	false,
						minlength: 		13,
						maxlength: 		13,


					},
					nit: {
						required: 		true,
						minlength: 		4,
						maxlength: 		10,

					},
					scale_register: {
						required: 		true,

					},
					ethnic_community_id: {
						required: 		true,

					},

					title_id: {
						required: 		true,
					},

					year_title: {
						required: 		true,
						minlength: 		4,
						maxlength: 		4,
					},

					institution: {
						required: 		true,
						minlength: 		6,
					},

				},
				messages: {
					dpi: {
						required: 		function () {toastr.error('Por favor ingrese DPI')},
						lettersonly: 	function () {toastr.error('el DPI no puede incluir letras')},
						minlength: 		function () {toastr.error('Ingrese un DPI válido')},
						maxlength: 		function () {toastr.error('Ingrese un DPI válido')},

					},
					nit: {
						required: 		function () {toastr.error('Por favor ingrese NIT')},
						minlength: 		function () {toastr.error('Ingrese un NIT válido')},
						maxlength: 		function () {toastr.error('Ingrese un NIT válido')},

					},
					scale_register: {
						required: 			function () {toastr.error('Ingrese el registro escalafonario')},
					},
					ethnic_community_id: {
						required: 			function () {toastr.error('Seleccione una comunidad étnica')},
					},
					title_id: {
						required: 		function () {toastr.error('Seleccione título académico')},
					},
					year_title: {
						required: 		function () {toastr.error('Ingrese año en que se obtuvo el título')},
						minlength:		function () {toastr.error('Ingrese un año válido')},
						maxlength: 		function () {toastr.error('Ingrese un año válido')},
					},
					institution: {
						required: 		function () {toastr.error('Ingrese institución donde se obtuvo el título')},
						minlength: 		function () {toastr.error('Ingrese una institución educativa válida')},
					},
				},
			});

			$('#frm-insert_schools').validate({
				keyup: false,
				rules: {
					school_id: {
						required: 		true,

					},
					contract_id: {
						required: 		true,

					},
					year_start: {
						required: 		true,
						minlength: 		4,
						maxlength: 		4,
					},
					work_state_id: {
						required: 		true,

					},

					employee_type_id: {
						required: 		true
					},

					language_id: {
						required: 		true

					},

				},
				messages: {
					school_id: {
						required: 		function () {toastr.error('Por favor seleccione una escuela')},

					},
					contract_id: {
						required: 		function () {toastr.error('Por seleccione tipo de contratación')},

					},
					year_start: {
						required: 			function () {toastr.error('Ingrese el año desde que inicio labores en el establecimiento')},
					},
					work_state_id: {
						required: 			function () {toastr.error('Seleccione situación laboral')},
					},
					employee_type_id: {
						required: 		function () {toastr.error('Seleccione tipo de empleado')},
					},
					language_id: {
						required: 		function () {toastr.error('Seleccione idioma materno')},

					},

				},
		});
		}




//-----------Crear persona --------
		function create(e){

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

				/**Se carga data con el array de datos del formulario #frm-insert */
				var data 	= $('#frm-insert_people, #frm-insert_employees, #frm-insert_schools').serializeArray();
				//var url 	= $(this).attr('action');
				//var post 	= $(this).attr('method');
				console.log(data)
				console.info(data);
				$.ajax({
				type 	: 'POST',
				url 	: '{{ URL::to('people')}}',
				data 	: data,
				dataType: 'json',
				success:function(data)
					{
						document.getElementById("frm-insert_people").reset();
						document.getElementById("frm-insert_employees").reset();
						document.getElementById("frm-insert_schools").reset();
						/**Se actualiza el DataTable */
						var tbl = $('#tbl-affiliates').DataTable();
						tbl.ajax.reload()
						//$('#add_new_affiliate_modal').modal('hide');
						toastr["success"]("Persona guardada","Información")

					}
				});

		}


			function check(){
					//We need to bind click handler as well
				//as FF sets button checked after mousedown, but before click
				$('input:radio').bind('click mousedown', (function() {
					//Capture radio button status within its handler scope,
					//so we do not use any global vars and every radio button keeps its own status.
					//This required to uncheck them later.
					//We need to store status separately as browser updates checked status before click handler called,
					//so radio button will always be checked.
					var isChecked;

					return function(event) {
						//console.log(event.type + ": " + this.checked);

						if(event.type == 'click') {
							//console.log(isChecked);

							if(isChecked) {
								//Uncheck and update status
								isChecked = this.checked = 0;
							} else {
								//Update status
								//Browser will check the button by itself
								isChecked = 1;

								//Do something else if radio button selected
								/*
								if(this.value == 'somevalue') {
									doSomething();
								} else {
									doSomethingElse();
								}
								*/
							}
					} else {
						//Get the right status before browser sets it
						//We need to use onmousedown event here, as it is the only cross-browser compatible event for radio buttons
						isChecked = this.checked;
					}
				}})());
			}

		$('body').delegate('#tbl-affiliates #Show', 'click', function(e){
		e.preventDefault();
			var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');;
    				var rowData = $('#tbl-affiliates').DataTable().row($tr).data();
   						//console.log(rowData);
					var vid = rowData.id;
					console.log(vid);
				$.get('affiliates/' + vid , {id:vid}, function(data){
					window.location.href = 'affiliates/' + vid;
		 });
	});
</script>


	@stop
