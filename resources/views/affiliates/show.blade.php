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
                <div class="col-md-2">
                    <p><strong>Estado:</strong>
					@if($affiliate->affiliate_state->description == 'Activo')
						<span class="label label-success">{{$affiliate->affiliate_state->description}}</span>
					@elseif($affiliate->affiliate_state->description== 'Inactivo')
						<span class="label label-danger">{{$affiliate->affiliate_state->description}}</span>
					@else
						<span class="label label-warning">{{$affiliate->affiliate_state->description}}</span>
					@endif
					</p>
                </div>
				<div class="col-md-4">
					<button type='button' id='EditStatus' class='edit btn btn-warning pull-left'><i class='fa fa-pencil-square-o'> </i> Actualizar estado de afiliación </button>
                </div>
            </div>
			<br/>
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
                    <button type='button' id='Edit' class='edit btn btn-warning pull-right'><i class='fa fa-pencil-square-o'> </i> Actualizar datos personales </button>
                </div>

                <div class='col-md-6'>

                    <div class="well well-sm"> Información Laboral</div>
                    <p><strong>DPI:</strong> {{$employee->dpi}} </p>
                    <p><strong>NIT:</strong> {{$employee->nit}} </p>
                    <p><strong>Registro Escalafonario:</strong> {{$employee->scale_register}} </p>
                    <p><strong>Comunidad étnica:</strong> {{$employee->ethnic_community->name}} </p>
                </div>

            </div>
<br/>
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
                    <div class="row">
                        <div class="col-md-12">
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
                                    <p><strong>Plan:</strong> {{$schools->school->plan->name}}</p>
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

        <!-- modales -->
        <!-- Modal Update Afiliado -->
	<div class="modal fade bd-example-modal-lg" id="update_affiliate_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
					<div class="row hide" data-step="1" data-title="Actualización">
						<div class="container-fluid">
							<form  id="frm-update_person" data-toggle="validator">
							<input type="hidden" name="_method" value="PUT">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
								{{ csrf_field() }}
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<div  class="input-group ">
											<span class="input-group-addon" id="states">Estado</span>
											<select name="affiliate_state_id" id="update_state" class="form-control" placeholder="Ingrese los nombres" aria-describedby="states"></select>
										</div>
										<br/>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<div  class="input-group ">
											<span class="input-group-addon" id="snames">Nombres</span>
											<input name="names" id="update_names" class="form-control" placeholder="Ingrese los nombres" aria-describedby="snames"/>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" id="ssurnames">Apellidos</span>
											<input name="surnames" type="text" id="update_surnames" placeholder="Ingrese los apellidos" class="form-control" aria-describedby="ssurnames"/>
										</div>
										<br/>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
											<input type="email" name="email" id="update_email" class="form-control" placeholder="Ingrese el correo electrónico" data-error="El correo ingresado es invalido"/>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
											<input name="phone" type="text" id="update_phone" placeholder="Ingrese número telefónico" class="form-control"/>
										</div>
										<br/>
									</div>
								</div>
								<div class="well well-sm" style="background-color: #00a65a;"><span style="color:white;"><center><b>Residencia</b></center> </span></div>
								<div class="row ">
									<div class="col-sm-12 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" ><i class="fa fa-map"></i></span>
											<select name="department_id" id="update_department_id" class="form-control"></select>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" ><i class="fa fa-map-o"></i></span>
											<select name="municipality_id" id="update_municipality_id" class="form-control" ></select>
										</div>
										<br/>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-12">
										<div class="input-group">
											<span class="input-group-addon" ><i class="fa  fa-map-marker"></i></span>
											<input name="address" type="text" id="update_address" aria-describedby="addressHelp"placeholder="Ingrese dirección" class="form-control"/>
										</div>
										<small id="addressHelp" class="form-text text-muted">Aldea, caserío, barrio, colonia, entre otros.</small>
									</div>
								</div>
								<div class="well well-sm" style="background-color: #00a65a;"><span style="color:white;"><center><b>Datos complementarios</b></center> </span></div>
								<div class="row">
									<div class="col-sm-12 col-md-3">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											<input name="birthdate" type="date" id="update_birthdate" aria-describedby="birthdateHelp" placeholder="Fecha de nacimiento" class="form-control"/>
										</div>
										<small id="birthdateHelp" class="form-text text-muted">Fecha de nacimiento.</small>
										<br/>
									</div>
									<div class="col-sm-12 col-md-4">
										<div class="input-group">
											<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
											<span class="input-group-addon" id="sgender">Género</span>
											<select name="gender_id" id="update_gender_id" class="form-control" aria-describedby="sgender"></select>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-4">
										<div class="input-group">
											<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
											<span class="input-group-addon" id="scivil_states">Estado Civil</span>
											<select name="civil_state_id" id="update_civil_states_id" class="form-control" aria-describedby="sgender"></select>
										</div>
                                </div>
								<input name="id" type="hidden" id="update_id" class="form-control"/>
							</div>
							</form>
						</div>
					</div>


					<!-- Paso 2 del modal -->
				<div class="row hide" data-step="2" data-title="Actualización">
					<div class="container-fluid">
						<form   id="frm-update_employee" data-toggle="validator">
							<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
							{{ csrf_field() }}
							<div class="well well-sm" style="background-color: #00a65a;"><span style="color:white;"><center><b>Datos de identificación</b></center> </span></div>
							    <div class="row">
								    <div class="col-sm-12 col-md-6">
									    <div  class="input-group ">
										    <span class="input-group-addon" id="sdpi">DPI</span>
										    <input name="dpi" id="update_dpi" alt="Documento personal de identificación" class="form-control" placeholder="Ingrese DPI" aria-describedby="sdpi"/>
									    </div>
									<br/>
								    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="snit">NIT</span>
                                            <input name="nit" type="text" id="update_nit" placeholder="Ingrese NIT" class="form-control" aria-describedby="snit"/>
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
										    <input type="text" name="scale_register" id="update_scale_register" class="form-control" placeholder="Ingrese el registro escalafonario"/>
								    	</div>
									    <br/>
								    </div>
								    <div class="col-sm-12 col-md-6">
									    <div class="input-group">
										    <span class="input-group-addon"><i class="fa fa-users"></i></span>
										    <select name="ethnic_community_id" id="update_ethnic_community_id" class="form-control"></select>
									    </div>
									    <br/>
								    </div>
							    </div>
                            </div>
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
	<!-- modal update state affiliate -->
	<div class="modal fade" id="update_status_affiliate_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel">Editar estado</h4>
	            </div>
					<div class="modal-body">
	 				<form  action="{{ URL::to('updateStatus')}}" method="POST" id="frm-status">
					<input type="hidden" name="_method" value="PUT">
    				<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list"></i></span>
							<select name="status" id="affiliate_state_id" placeholder="Estado"  class="form-control"></select>
	                	</div>
						<input type="text" name="id_affiliate" id="update_affiliateStatus_id"/>
						<input type="text" name="id_affiliate" id="hola"/>

						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="button" id="btnUpdate"  class="btn btn-primary">Actualizar</button>
					</div>
				</form>
				</div>
	        </div>
	    </div>
	</div>
    <!-- fin de modal -->

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
    $(document).ready(function(){
				/**Llena el DataTable */

				modalSteps();
				getDepartmentEdit();
				departmentMunicipality();
				getGenderEdit();
				getCivilStateEdit();
				getEthnicCommunityEdit();
				getAffiliateStateEdit();


			});

    function modalSteps(){
				$('#update_affiliate_modal').modalSteps({
					btnCancelHtml: "Cancel",
					btnPreviousHtml: "Previous",
					btnNextHtml: "Next",
					btnLastStepHtml: "Complete",
					disableNextButton: false,
					completeCallback: function() {
						update();
					},
					callbacks: {
						 '1':	callback1,
						// '2':	callback2,
						// '3':	callback3
					},
					getTitleAndStep: function() {}
				});
			}
			var callback1 = function (){
				catchDepartment();
			};

$('body').delegate(' #Edit', 'click', function(e){
				e.preventDefault();
				/**Se obtiene los datos de la fila donde se encuentra el botón
				   editar al que se le dio clic
				*/
				var vid = {{$affiliate->id}};
				var evid = {{$affiliate->employee->id}}
                //console.log(vid);
				// var $tr = $(this).closest('li').length ?
				// 	$(this).closest('li'):
				// 	$(this).closest('tr');
				// /**Los datos de la fila son pasados a la variable rowData */
    			// var rowData = $('#tblfees').DataTable().row($tr).data();
   				// console.log(rowData);
				// /**Se extrae de rowData el id del registro que se editará */
				// var vid = rowData.id;
				// console.log(vid);
				$.get('../affiliates/' + {{$affiliate->id}} + '/edit', {id:{{$affiliate->id}}}, function(data){
                   // console.log(data);
				// 	/**Se llenan los input con los datos de la ruta */

				 	$('#frm-update_person').find('#update_state').val(data.affiliate_state_id)
				 	$('#frm-update_person').find('#update_names').val(data.employee.person.names)
				 	$('#frm-update_person').find('#update_surnames').val(data.employee.person.surnames)
				 	$('#frm-update_person').find('#update_email').val(data.employee.person.email)
				 	$('#frm-update_person').find('#update_phone').val(data.employee.person.phone)
				 	$('#frm-update_person').find('#update_department_id').val(data.employee.person.municipality.department_id)
				 	$('#frm-update_person').find('#update_municipality_id').val(data.employee.person.municipality_id)
				 	$('#frm-update_person').find('#update_address').val(data.employee.person.address)
				 	$('#frm-update_person').find('#update_birthdate').val(data.employee.person.birthdate)
				 	$('#frm-update_person').find('#update_gender_id').val(data.employee.person.gender_id)
				 	$('#frm-update_person').find('#update_civil_states_id').val(data.employee.person.civil_state_id)
				 	$('#frm-update_employee').find('#update_dpi').val(data.employee.dpi)
				 	$('#frm-update_employee').find('#update_nit').val(data.employee.nit)
				 	$('#frm-update_employee').find('#update_scale_register').val(data.employee.scale_register)
				 	$('#frm-update_employee').find('#update_ethnic_community_id').val(data.employee.ethnic_community_id)
				 	$('#frm-update_person').find('#update_id').val(data.id)
				 	$('#update_affiliate_modal').modal('show');


				});
			});

            function getDepartmentEdit(){
 				//$('#update_fee_type_id').empty();
 				$.get('../get-departments', function(data){
 					$.each(data,	function(i, value){
 						if(value.id === {{$affiliate->id}} ){
 							$('#update_department_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
 						}
 						$('#update_department_id').append($('<option >', {value: value.id, text: `${value.name}`}));
 					});

 				});

 			}

			 function departmentMunicipality(){
				$("#update_department_id").change(function() {
					$('#update_municipality_id').empty();
					if($("#update_department_id").val() !== '0'){
						$('#update_municipality_id').prop('disabled', false);
						$id = $('#update_department_id').val();
						getMunicipalityEdit();
					}else{
						$('#update_municipality_id').prop('disabled', true);
					}
				});

			}

			//   $('#update_affiliate_modal').on('shown.bs.modal', function () {
			//  	catchDepartment();
			//  });
			function catchDepartment(){
				if($("#update_department_id").val() !== '0'){
					//$('#update_municipality_id').empty();
						$('#update_municipality_id').prop('disabled', false);
						$id = $('#update_department_id').val();
						getMunicipalityEdit();
					}
			}

			 function getMunicipalityEdit(){
 				//$('#update_fee_type_id').empty();

				// console.log($id);
 				$.get('../get-municipalities/'+ $id, function(data){
 					$.each(data,	function(i, value){
					//	console.log(value.id);
 						if(value.id === {{$affiliate->id}} ){
 							$('#update_municipality_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
 						}
 						$('#update_municipality_id').append($('<option >', {value: value.id, text: `${value.name}`}));
 					});
 				});
 			}

			 function getGenderEdit(){
 				$('#update_gender_id').empty();
 				$.get('../get-genders/', function(data){
 					$.each(data,	function(i, value){

 						// if(value.id === {{$affiliate->id}} ){

 						// 	$('#update_gender_id').append($('<option selected >', {value: value.id, text: `${value.description}`}));
 						// }
						 console.log({{$affiliate->id}});
 						$('#update_gender_id').append($('<option >', {value: value.id, text: `${value.description}`}));
 					});
 				});
 			}

			function getCivilStateEdit(){
 				$('#update_civil_states_id').empty();
 				$.get('../get-civil_states/', function(data){
 					$.each(data,	function(i, value){
						// console.log(value);
						// console.log({{$person->civil_state_id}})
 						// if(value.id ===  {{$affiliate->id}}  ){
 						// 	$('#update_civil_states_id').append($('<option selected >', {value: value.id, text: `${value.description}`}));
 						// }
 						$('#update_civil_states_id').append($('<option >', {value: value.id, text: `${value.description}`}));

 					});
 				});
 			}



			 function getEthnicCommunityEdit(){
 				$('#update_ethnic_community_id').empty();
 				$.get('../get-ethnic_communities/', function(data){
 					$.each(data,	function(i, value){
						//console.log(data);
 						// if(value.id == {{$affiliate->id}} ){
 						// 	$('#update_ethnic_community_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
 						// }
 						$('#update_ethnic_community_id').append($('<option >', {value: value.id, text: `${value.name}`}));
 					});
 				});
 			}

			 //-------------Actualizar afiliado-------------
			 	function update(){
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

				/**data se carga con el array de los datos del formulario #frm-update */
				var data 	= $('#frm-update_person, #frm-update_employee').serializeArray();
				console.log(data)
				/**Se pasa el valor del id del registro a actualiza cargado en #update_id a la variable id */
				var id 		= $('#update_id').val();
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type 	: 'post',
					url 	: '../people/' + id,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						/**Se actualiza el DataTable */
						window.location.reload();
						/**Se cierra el modal #update_fee_modal */
						$('#update_fee_modal').modal('hide');
						toastr["success"]("Persona guardada","Información")
					}
					});

				}
				function getAffiliateStateEdit(){
						//$('#update_affiliate_state_id').empty();
						$.get('../get-affiliates_states', function(data){
							$.each(data,	function(i, value){
								//console.log(data)
								// if(value.id === vid ){
								// 	$('#update_affiliate_state_id').append($('<option selected >', {value: value.id, text: `${value.description}`}));
								// }
								$('#update_state').append($('<option >', {value: value.id, text: `${value.description}`}));
							});
						});
					}



</script>



@stop