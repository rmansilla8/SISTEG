@extends('adminlte::page')

@section('title', 'Registros contables')

@section('content_header')
    <h1>
    Registros contables - <small>Listado de registros</small>
    </h1>
	<!--
		Migas de pan con icono
	 -->
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-bank"></i>  Registros contables</li>
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
            <h3 class="box-title">Listado de Registros</h3>
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
				<!-- Botón que invoca el Modal #add_new_accounting_record_modal para agregar registros -->
				<div class="col-xs-12">
						<button style="margin-bottom:10px;" type="button" data-toggle="modal" data-target="#add_new_accounting_record_modal" class="btn btn-success pull-right">
						<i class="fa fa-plus"></i> Nuevo Registro</button>
					<br/>
				</div>
			</div>

            <!-- DataTable -->
			<div class="row">
                <div class="col-md-12">
                   <table id="tblAccountingRecords" class="display responsive no-wrap" width="100%" >
					<thead>
						<tr >
							<th class="text-center">No.</th>
							<th data-priority="1" class="text-center">Descripción</th>
							<th data-priority="2" class="text-center">Cantidad</th>
							<th class="text-center">Fecha</th>
							<th class="text-center">Tipo de Registro</th>
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
            <!-- Comienzo del footer -->
        </div>
        <!-- fin del footer de la caja-->

		<!--Área de los Modals-->
			<!--Modal: #add_new_accounting_record_modal-->
				<div class="modal fade" id="add_new_accounting_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
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
							<form  action="{{ URL::to('accounting_records')}}" method="POST" id="frm-insert" data-toggle="validator">
								<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
								{{ csrf_field() }}
								<div  class="input-group ">
									<!-- <label for="description">Descripción</label> -->
									<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
									<input name="description" id="description" placeholder="Ingrese descripción del registro" class="form-control"/>
								</div>
								<br/>

								<div class="input-group">
									<!-- <label for="amount">Cantidad</label> -->
									<span class="input-group-addon"><i class="fa fa-money"></i></span>
									<input name="amount" type="text" id="amount" placeholder="Ingrese la cantidad" class="form-control"/>
								</div>
								<br/>

								<div class="input-group">
									<!-- <label for="date">Fecha</label> -->
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input name="date" type="date" id="date" placeholder="Ingrese la fecha" class="form-control"/>
								</div>
								<br/>

								<div class="input-group">
									<!-- <label for="record_type_id">Tipo de registro</label> -->
									<span class="input-group-addon"><i class="fa fa-list"></i></span>
									<select name="record_type_id" id="record_type_id" placeholder="Name" class="form-control"/></select>
								</div>

								<div class="modal-footer">
									<button type="button" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
									<input type="submit" class="btn btn-success" value="Guardar" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Fin del modal #add_new_accounting_record_modal -->

			<!-- Modal: #update_accounting_record_modal -->
							<div class="modal fade" id="update_accounting_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel">Editar registro</h4>
										</div>
								<!--
								-Formulario del modal
								-onsubmit retorna la función que valida que ningún campo se encuentre vacío.
								 -->
											<div class="modal-body">
												<form  action="{{ URL::to('accounting_records')}}" method="POST" id="frm-update" data-toggle="validator">
													<input type="hidden" name="_method" value="PUT">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">

														<div class="input-group">
															<!-- <label for="update_description">Descripción</label> -->
															<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
															<input name="description" id="update_description" placeholder="Ingrese la descripción del registro" class="form-control"/>
														</div>
														<br/>

														<div class="input-group">
															<!-- <label for="update_amount">Cantidad</label> -->
															<span class="input-group-addon"><i class="fa fa-money"></i></span>
															<input name="amount" type="text" id="update_amount" placeholder="Ingrese la cantidad" class="form-control"/>
														</div>
														<br/>

														<div class="input-group">
															<!-- <label for="update_date">Fecha</label> -->
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															<input name="date" type="date" id="update_date" placeholder="Ingrese la fecha" class="form-control"/>
														</div>
														<br/>

														<div class="input-group">
															<!-- <label for="update_record_type_id">Tipo de registro</label> -->
															<span class="input-group-addon"><i class="fa fa-list"></i></span>
															<select name="record_type_id" id="update_record_type_id" class="form-control"></select>
														</div>
														<br/>

														<input name="id" type="hidden" id="update_id"  placeholder="" class=""/>

														<div class="modal-footer">
															<button type="button" id="cancelarUpdate" class="btn btn-default" data-dismiss="modal">Cancelar</button>
															<input type="submit" class="btn btn-success" value="Actualizar" />
														</div>
												</form>
											</div>
										</div>
									</div>
								</div>
				<!-- Fin del Modal #update_accounting_record_modal -->

				<!-- Modal: #show_accounting_record_modal -->
							<div class="modal fade" id="show_accounting_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										<h4 class="modal-title" id="myModalLabel">Mostrar registro</h4>
									</div>
										<div class="modal-body">
										<form  action="" method="POST" id="show">

											<div class="form-group">
												<label for="show_description">Afiliado</label>
												<input name="description" type="text" id="show_description" readonly="readonly" style="border: 0; background: transparent;" class="form-control""/>
											</div>

											<div class="form-group">
												<label for="update_amount">Cantidad</label>
												<input name="amount" type="text" id="show_amount" readonly="readonly" style="border: 0; background: transparent;" class="form-control""/>
											</div>

											<div class="form-group">
												<label for="update_date">Fecha</label>
												<input name="date" type="date" id="show_date" readonly="readonly" style="border: 0; background: transparent;" class="form-control""/>
											</div>

											<div class="form-group">
												<label for="show_record_type_id">Tipo de registro</label>
													<input name="record_type_id" type="text" id="show_record_type_id" readonly="readonly" style="border: 0; background: transparent;" class="form-control" "/>
											</div>

											<input name="id" type="hidden" id="show_id"  placeholder="" class=""/>

											<div class="modal-footer">
												<button type="button" id="cancelarUpdate" class="btn btn-default" data-dismiss="modal">Cancelar</button>
												<input type="submit" class="btn btn-success" value="Show" />
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
				<!-- Fin del modal #show_accounting_record_modal -->
@stop

<!--Fin del área de modales -->



@section('css')
		<style>	
			.help-block {
			display: run-in;
			color: #ff0000;
			}
			input.error {
			border:1px dotted red;
			}
			.modal-header{
					border-radius: 15px;
			}
			.modal-content{
			border-radius: 15px;
			}
		</style>

@stop

@section('js')
   <script>
/**
 **Se invocan las funciones que llenan el DataTable y los input, select, etc.
 */
			$(document).ready(function(){

				/**Llena el DataTable */
				dataTableAccountingRecords();
				/**Llena el select #record_type_id del modal #add_new_accounting_record_modal */
				getRecordType();
				/**Llena el select #affiliate_id del modal #add_new_accounting_record_modal */
				getRecordTypeEdit();
				/**Contiene maskaras para inputs */
				validar();
				var validator;
				var validatorUpdate;


			});

			$("#cancelar").on("click",function(e){
				e.preventDefault();
				validator.resetForm();
				$('#frm-insert').trigger("reset");

			});
			$("#cancelar").on("click",function(e){
				e.preventDefault();
				validator.resetForm();
				$('#frm-update').trigger("reset");

			});
			/**Inicio del DataTable de accounting_records */
			function dataTableAccountingRecords()
			{

				/**
				 El DataTable se coloca en una variable
				 que se usara mas adelante para indexar los
				 registros.
				*/
				var t = $('#tblAccountingRecords').DataTable({
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
							},
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
							"url": 		'../get-accounting_records',
							"type":		'GET',
							"dataSrc":	'accounting_records',
						},
					/**Area que comprende las columnas y los datos que se mostrarán en el DataTable */
					"columns" : [
						{"data":	"id"},
						{"data":	"description"},
						{"data":	"amount"},
						{"data":	"date"},
						{"data":	"rdescription"},
						/**Contiene los botones de actualizar, mostrar y eliminar */
						{"defaultContent":
							"<div class='btn-group btn-group-xs'>"+
							"<button type='button' id='Show' class='show btn btn-info'><i class='fa fa-eye'></i></button>"+
							"<button type='button' id='Edit' class='edit btn btn-warning'><i class='fa fa-pencil-square-o'></i></button>"+
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
			  * Esta función llena  el tbody #tbl-accounting_records con los datos de
			  * la tabla accounting_records, además contiene los botones de editar y eliminar.
			  */
			// function getFees(){
			// 	$("#tbl-fees").empty();
			// 	$.get('get-fees', function(data){
			// 		$.each(data,	function(i, value){
			// 			var fila = $('<tr />');
			// 			fila.append($('<td />', {
			// 				text : value.id
			// 			})).append($('<td />', {
			// 				text : value.affiliate.number
			// 			})).append($('<td />', {
			// 				text : value.fee_type.description
			// 			})).append($('<td />', {
			// 				text : value.amount
			// 				})).append($('<td />', {
			// 				text : value.date
			// 			})).append($('<td />', {
			// 				text : value.detail
			// 			})).append($('<td />', {
			// 				html : '<a class="btn btn-sm btn-warning" href="" id="edit" data-id=' + value.id + ' >' +
			// 						'<i class="fa fa-edit"></i> Editar</a>' +
			// 						' <a  class="btn btn-sm btn-danger" href="" id="del" data-id=' + value.id + ' >' +
			// 						'<i class="fa fa-trash"></i> Eliminar</a>'
			// 			}).css('width','172px'));
			// 			$("#tbl-fees").append(fila);
			// 		});
			// 	});
			// }

			/*
			 * Permite cargar la lista de tipos de cuota.
			 */
			function getRecordType(){
			$.get('get-record_types', function(data){
				$('#record_type_id').append($('<option>', {value: '', text: 'Seleccione el tipo de registro'}));
					$.each(data,	function(i, value){
					$('#record_type_id').append($('<option>', {value: value.id, text: `${value.description}`}));
					});
				});
			}

			//-------------Eliminar Diente-------------
	/*se creo esta función para que al dar click al botón eliminar muestre uns alerta con
	 mensajes para que el usuario de click a la opción aceptar o cancelar */

		$('body').delegate('#tblAccountingRecords #Delete', 'click', function(e){
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
			text: "¿Desea eliminar el registro contable?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Si, eliminar!',
			cancelButtonText: 'No, cancelar!',
			reverseButtons: true
			// Se recoge el valor si se dio Click al botón eliminar
		}).then((result) =>{
			console.log(result);
				if (result.value) {
					var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');
    				var rowData = $('#tblAccountingRecords').DataTable().row($tr).data();
   						console.log(rowData)
					var vid = rowData.id;
                        console.log(vid)
					var v_token = "{{csrf_token()}}";
					var parametros = {_method: 'DELETE', _token: v_token};
					$.ajax({
						type  : "POST",
						url	  : "accounting_records/" + vid + "",
						data  : parametros,
						// Se elimina el Dato seleccionado
						success: function(data){
						$(vid).remove();
						//Se actualizan los datos en el DataTable
						var $t = $('#tblAccountingRecords').DataTable();
						$t.ajax.reload();
						}
					});
					//Se muestra un mensaje de que el dato se elimino correctamente
					swalWithBootstrapButtons({
						title:"Eliminado",
						text: "¡El registro contable se eliminó correctamente!",
						type: "success"
					});
					// En caso de que el usuario seleccione el botón cancelar se muestra un mensaje de operación cancelada
				} else if(
					result.dismiss === swal.DismissReason.cancel){
					swalWithBootstrapButtons({
						title:"Cancelada",
						text: "¡Operación cancelada!",
						type: "error"

						});
				}
			});
		});



			//-------------Editar cuotas-------------

			$('body').delegate('#tblAccountingRecords #Edit', 'click', function(e){
				e.preventDefault();
				/**Se obtiene los datos de la fila donde se encuentra el botón
				   editar al que se le dio clic
				*/
				var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');
				/**Los datos de la fila son pasados a la variable rowData */
    			var rowData = $('#tblAccountingRecords').DataTable().row($tr).data();
   				console.log(rowData);
				/**Se extrae de rowData el id del registro que se editará */
				var vid = rowData.id;
				console.log(vid);
				$.get('accounting_records/' + vid + '/edit', {id:vid}, function(data){
					/**Se llenan los input con los datos de la ruta */
					$('#frm-update').find('#update_description').val(data.description)
					$('#frm-update').find('#update_amount').val(data.amount)
					$('#frm-update').find('#update_date').val(data.date)
					$('#frm-update').find('#update_record_type_id').val(data.record_type_id)
					$('#frm-update').find('#update_id').val(data.id)
					$('#update_accounting_record_modal').modal('show');
				});
			});
			/**Llena el select #update_record_type del modal #update_accounting_record_modal */
			function getRecordTypeEdit(vid){
 				$('#update_record_type_id').empty();
 				$.get('get-record_types', function(data){
 					$.each(data,	function(i, value){
 						if(value.id === vid ){
 							$('#update_record_type_id').append($('<option selected >', {value: value.id, text: `${value.description}`}));
 						}
 						$('#update_record_type_id').append($('<option >', {value: value.id, text: `${value.description}`}));
 					});
 				});
 			}


			//-------------Actualizar cuotas-------------

				$('#frm-update').on('submit', function(e){
				e.preventDefault();
				/**data se carga con el array de los datos del formulario #frm-update */
				var data 	= $('#frm-update').serializeArray();
				/**Se pasa el valor del id del registro a actualiza cargado en #update_id a la variable id */
				var id 		= $('#update_id').val();
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type 	: 'post',
					url 	: 'accounting_records/' + id,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						/**Se actualiza el DataTable */
						var $t = $('#tblAccountingRecords').DataTable();
						$t.ajax.reload();
						/**Se cierra el modal #update_accounting_record_modal */
						$('#update_accounting_record_modal').modal('hide');
					}
					});
				});


			//-----------Mostrar cuotas---------
			$('body').delegate('#tblAccountingRecords #Show', 'click', function(e){
				e.preventDefault();
				var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');
    			var rowData = $('#tblAccountingRecords').DataTable().row($tr).data();
   				console.log(rowData);
				var vid = rowData.id;
				console.log(vid);
				//$.get('accounting_records/' + vid + '/edit', {id:vid}, function(data){
					$('#show').find('#show_description').val(rowData.description)
					$('#show').find('#show_amount').val(rowData.amount)
					$('#show').find('#show_date').val(rowData.date)
					$('#show').find('#show_record_type_id').val(rowData.rdescription)
					$('#show').find('#show_id').val(rowData.id)
					$('#show_accounting_record_modal').modal('show');
				});
			//});


			//-----------Crear cuota --------
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('#frm-insert').on('submit', function(e){
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
						document.getElementById("frm-insert").reset();
						/**Se actualiza el DataTable */
						var tbl = $('#tblAccountingRecords').DataTable();
						tbl.ajax.reload()
						$('#add_new_accounting_record_modal').modal('hide');
						toastr["success"]("Cuota guardada","Información")

					}
				});


			});
/**Función que valida que no existan campos vacíos en el modal #add_new_accounting_record_modal */


/**Función que valida que no existan campos vacíos en el modal #update_accounting_record_modal */
function validar() {
			jQuery.validator.addMethod("lettersonly", function(value, element) {
				return this.optional(element) || /^[a-z\sÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/i.test(value);
			}, );
			jQuery.validator.addMethod("phone", function(value, element) {
				return this.optional(element) || /^[0-9/-]+$/i.test(value);
			}, );
			validator = $('#frm-insert').validate({
				keyup: true,
				rules: {
					description: {
						required: 		true,
					},
					amount: {
						required: 		true,
						number:			true,

					},
					date: {
						required: 		true,

					},

					record_type_id: {
						required: 		true
					},
				},
				debug: true,
				errorClass: 'help-block',
				validClass: 'success',
				errorElement: "span",
				highlight: function(element, errorClass, validClass){
					if (!$(element).hasClass('novalidation')) {
           			 	$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        			}
				},
				unhighlight: function(element, errorClass, validClass){
					if (!$(element).hasClass('novalidation')) {
           				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        			}
				},
				errorPlacement: function (error, element) {
					if (element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					}
					else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
						error.insertAfter(element.parent().parent());
					}
					else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
						error.appendTo(element.parent().parent());
					}
					else {
						error.insertAfter(element);
					}
				},
				messages: {
					description: {
						required: 		'Por favor, ingrese la descripción del registro contable',
					},
					amount: {
						required: 		'Por favor, ingrese el monto de la cuota voluntaria',
						number:			'Se aceptan solo números',
					},
					date: {
						required:		'Por favor, ingrese una fecha',

					},
					record_type_id: {
						required: 		'Por favor, seleccione el tipo de registro contable',
					},
				},
			});

			validatorUpdate = $('#frm-update').validate({
				keyup: true,
				rules: {
					description: {
						required: 		true,
					},
					amount: {
						required: 		true,
						number:			true,

					},
					date: {
						required: 		true,

					},

					record_type_id: {
						required: 		true
					},
				},
				debug: true,
				errorClass: 'help-block',
				validClass: 'success',
				errorElement: "span",
				highlight: function(element, errorClass, validClass){
					if (!$(element).hasClass('novalidation')) {
           			 	$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        			}
				},
				unhighlight: function(element, errorClass, validClass){
					if (!$(element).hasClass('novalidation')) {
           				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        			}
				},
				errorPlacement: function (error, element) {
					if (element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					}
					else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
						error.insertAfter(element.parent().parent());
					}
					else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
						error.appendTo(element.parent().parent());
					}
					else {
						error.insertAfter(element);
					}
				},
				messages: {
					description: {
						required: 		'Por favor, ingrese la descripción del registro contable',
					},
					amount: {
						required: 		'Por favor, ingrese el monto de la cuota voluntaria',
						number:			'Se aceptan solo números',
					},
					date: {
						required:		'Por favor, ingrese una fecha',

					},
					record_type_id: {
						required: 		'Por favor, seleccione el tipo de registro contable',
					},
				},
			});

		}

/**Máscara para el input de monto */
// function mask(){
// 	$('#amount').mask('00.00', {reverse: true});
// 	$('#update_amount').mask('00.00', {reverse: true});
// }



    </script>



@stop
