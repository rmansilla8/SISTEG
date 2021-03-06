@extends('adminlte::page')

@section('title', 'Cuotas')

@section('content_header')
    <h1>
    Cuotas - <small>Listado de Cuotas</small>
    </h1>
	<!--
		Migas de pan con icono
	 -->
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-bank"></i>  Cuotas</li>
    </ol>

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
        <h3 class="box-title">Listado de cuotas </h3>
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
					<button style="margin-bottom:10px;" type="button" data-toggle="modal" data-target="#add_new_fee_modal" class="btn btn-success pull-right">
					<i class="fa fa-plus"></i> Nuevo Registro</button>
				<br/>
			</div>
		</div>

            <!-- DataTable -->
			<div class="row">
                <div class="col-md-12">
                   <table id="tblfees" class="display responsive no-wrap" width="100%" >
					<thead>
						<tr >
							<th class="text-center">No.</th>
							<th data-priority="2" class="text-center">Afiliación</th>
							<th data-priority="1" class="text-center">Nombre</th>
							<th class="text-center">Tipo de Cuota</th>
							<th class="text-center">Cantidad</th>
							<th class="text-center">Fecha</th>
							<th class="text-center">Detalle</th>
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
				<div class="modal fade" id="add_new_fee_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
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
							<form  action="{{ URL::to('fees')}}" method="POST" id="frm-insert" >
								<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
								{{ csrf_field() }}
								<div  class="input-group ">
									<!-- <label for="affiliate_id">Nombre Afiliado</label> -->
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<select name="affiliate_id" id="affiliate_id" class="form-control"></select>
								</div>
								<br/>

								<div class="input-group">
									<!-- <label for="fee_type_id">Tipo de Cuota</label> -->
									<span class="input-group-addon"><i class="fa fa-list"></i></span>
									<select name="fee_type_id" id="fee_type_id" class="form-control"></select>
								</div>
								<br/>

								<div class="input-group">
									<!-- <label for="amount">Cantidad</label> -->
									<span class="input-group-addon"><i class="fa fa-money"></i></span>
									<input type="text" data-mask="99.99" name="amount"  id="amount" placeholder="Cantidad" class="form-control"/>
								</div>
								<br/>

								<div class="input-group">
									<!-- <label for="date">Fecha</label> -->
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input name="date" type="date" id="date" placeholder="Fecha" class="form-control"/>
								</div>
								<br/>

								<div class="input-group">
									<!-- <strong>Descripción:</strong> -->
									<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
									<textarea id="detail" class="form-control" name="detail"></textarea>
								</div>
								<br/>

								<div class="modal-footer">
									<button type="button" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
									<input type="submit" class="btn btn-success" value="Guardar" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Fin del modal #add_new_fee_modal -->

			<!-- Modal: #update_fee_modal -->
							<div class="modal fade" id="update_fee_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
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
												<form  action="{{ URL::to('fees')}}" method="POST" id="frm-update" >
													<input type="hidden" name="_method" value="PUT">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">

														<div class="input-group">
															<!-- <label for="affiliate_id">Nombre Afiliado</label> -->
															<span class="input-group-addon"><i class="fa fa-user"></i></span>
															<select name="affiliate_id" id="update_affiliate_id" class="form-control"></select>
														</div>
														<br/>

														<div class="input-group">
															<!-- <label for="update_fee_type_id">Tipo de cuota</label> -->
															<span class="input-group-addon"><i class="fa fa-list"></i></span>
																<select name="fee_type_id" id="update_fee_type_id" class="form-control"></select>
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
															<!-- <strong>Detalle:</strong> -->
															<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
															<textarea id="update_detail" class="form-control" name="detail" placeholder="Ingrese el detalle" ></textarea>
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
				<!-- Fin del Modal #update_fee_modal -->
<!--Fin del área de modales -->

@stop



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
				dataTableFees();
				/**Llena el select #fee_type_id del modal #add_new_fee_modal */
				getFeeType();
				/**Llena el select #affiliate_id del modal #add_new_fee_modal */
				getAffiliate();
				/**Llena el select #update_fee_type_id del modal #update_fee_modal */
				getFeeEdit();
				/**Llena el select #update_affiliate_id del modal #update_fee_modal */
				getAffiliateEdit();
				/**Contiene maskaras para inputs */
				// mask();
				validar();
				var validator;
				var validatorUpdate;

			});
			$("#cancelar").on("click",function(e){
				e.preventDefault();
				validator.resetForm();
				$('#frm-insert').trigger("reset");
			});
			$("#cancelarUpdate").on("click",function(e){
				e.preventDefault();
				validatorUpdate.resetForm();
				$('#frm-update').trigger("reset");
			});

			/**Inicio del DataTable de fees */
			function dataTableFees()
			{
				/**
				 El DataTable se coloca en una variable
				 que se usara mas adelante para indexar los
				 registros.
				*/
				var t = $('#tblfees').DataTable({
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
							"url": 		'../get-fees',
							"type":		'GET',
							"dataSrc":	'fees',
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
						{"data":	"description"},
						{"data":	"amount"},
						{"data":	"date"},
						{"data":	"detail"},
						/**Contiene los botones de actualizar, mostrar y eliminar */
						{"defaultContent":
							"<div class='btn-group btn-group-xs'>"+
							"<button type='button' id='Show' class='show btn btn-info'><i class='fa fa-eye' title='Mostrar'></i></button>"+
							"<button type='button' id='Edit' class='edit btn btn-warning' title='Editar'><i class='fa fa-pencil-square-o'></i></button>"+
							"<button type='button' id='pdf' class='btn btn-danger' title='PDF' data-id='id'><i class='fa fa-file-pdf-o'></i></button>"+
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
			  * Esta función llena  el tbody #tbl-fees con los datos de
			  * la tabla fees, además contiene los botones de editar y eliminar.
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
			function getFeeType(){
			$.get('get-fee_types', function(data){
				$('#fee_type_id').append($('<option>', {value: '', text: 'Seleccionar tipo de cuota'}));
					$.each(data,	function(i, value){
					$('#fee_type_id').append($('<option>', {value: value.id, text: `${value.description}`}));
					});
				});
			}
			/*
			 * Permite cargar la lista de afiliados.
			 */
			function getAffiliate(){
			$.get('get-affiliates', function(data){
				$('#affiliate_id').append($('<option>', {value: '', text: 'Seleccionar afiliado'}));
					$.each(data,	function(i, value){
					$('#affiliate_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}


			//-------------Eliminar Diente-------------
	/*se creo esta función para que al dar click al botón eliminar muestre uns alerta con
	 mensajes para que el usuario de click a la opción aceptar o cancelar */

		$('body').delegate('#tblfees #Delete', 'click', function(e){
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
			text: "¿Desea eliminar la cuota voluntaria?",
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
    				var rowData = $('#tblfees').DataTable().row($tr).data();
   						console.log(rowData)
					var vid = rowData.id;
					var v_token = "{{csrf_token()}}";
					var parametros = {_method: 'DELETE', _token: v_token};
					$.ajax({
						type  : "POST",
						url	  : "fees/" + vid + "",
						data  : parametros,
						// Se elimina el Dato seleccionado
						success: function(data){
						$(vid).remove();
						//Se actualizan los datos en el DataTable
						var $t = $('#tblfees').DataTable();
						$t.ajax.reload();
						}
					});
					//Se muestra un mensaje de que el dato se elimino correctamente
					swalWithBootstrapButtons({
						title:"Eliminado",
						text: "¡La cuota voluntaria se eliminó correctamente!",
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

			$('body').delegate('#tblfees #Edit', 'click', function(e){
				e.preventDefault();
				/**Se obtiene los datos de la fila donde se encuentra el botón
				   editar al que se le dio clic
				*/
				var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');
				/**Los datos de la fila son pasados a la variable rowData */
    			var rowData = $('#tblfees').DataTable().row($tr).data();
   				console.log(rowData);
				/**Se extrae de rowData el id del registro que se editará */
				var vid = rowData.id;
				console.log(vid);
				$.get('fees/' + vid + '/edit', {id:vid}, function(data){
					/**Se llenan los input con los datos de la ruta */
					$('#frm-update').find('#update_affiliate_id').val(data.affiliate_id)
					$('#frm-update').find('#update_fee_type_id').val(data.fee_type_id)
					$('#frm-update').find('#update_amount').val(data.amount)
					$('#frm-update').find('#update_date').val(data.date)
					$('#frm-update').find('#update_detail').val(data.detail)
					$('#frm-update').find('#update_id').val(data.id)
					$('#update_fee_modal').modal('show');
				});
			});
			/**Llena el select #update_fee_type del modal #update_fee_modal */
			function getFeeEdit(vid){
 				$('#update_fee_type_id').empty();
 				$.get('get-fee_types', function(data){
 					$.each(data,	function(i, value){
 						console.info(value);
 						if(value.id === vid ){
 							$('#update_fee_type_id').append($('<option selected >', {value: value.id, text: `${value.description}`}));
 						}
 						$('#update_fee_type_id').append($('<option >', {value: value.id, text: `${value.description}`}));
 					});
 				});
 			}
			/**Llena el select #update_affiliate_id del modal #update_fee_modal */
			function getAffiliateEdit(vid){
 				$('#update_affiliate_id').empty();
 				$.get('get-affiliates', function(data){
 					$.each(data,	function(i, value){
 						console.info(value);
 						if(value.id === vid ){
 							$('#update_affiliate_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
 						}
 						$('#update_affiliate_id').append($('<option >', {value: value.id, text: `${value.name}`}));
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
					url 	: 'fees/' + id,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						/**Se actualiza el DataTable */
						var $t = $('#tblfees').DataTable();
						$t.ajax.reload();
						/**Se cierra el modal #update_fee_modal */
						$('#update_fee_modal').modal('hide');
					}
					});
				});


			//-----------Mostrar cuotas---------
			$('body').delegate('#tblfees #Show', 'click', function(e){
				e.preventDefault();
				var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');
    			var rowData = $('#tblfees').DataTable().row($tr).data();
   				console.log(rowData);
				var vid = rowData.id;
				console.log(vid);
				//$.get('fees/' + vid + '/edit', {id:vid}, function(data){
					$('#show').find('#show_affiliate').val(rowData.names+' '+rowData.surnames)
					$('#show').find('#show_fee_type_id').val(rowData.description)
					$('#show').find('#show_amount').val(rowData.amount)
					$('#show').find('#show_date').val(rowData.date)
					$('#show').find('#show_detail').val(rowData.detail)
					$('#show').find('#show_id').val(rowData.id)
					$('#show_fee_modal').modal('show');
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
						/**Se actualiza el DataTable */
						var tbl = $('#tblfees').DataTable();
						tbl.ajax.reload()
						$('#add_new_fee_modal').modal('hide');
						//toastr["success"]("Cuota guardada","Información")
						console.log(data)
						var last_id = data.id;
						const swalWithBootstrapButtons = swal.mixin({
							confirmButtonClass: 'btn btn-success',
							cancelButtonClass: 'btn btn-danger',
							buttonsStyling: false,
						})
					//Muestra el mensaje de la alerta y activa el botón cancelar
					swalWithBootstrapButtons({
						title: 'Cuota voluntaria guardada',
						text: "¿Desea imprimir el comprobante?",
						type: 'success',
						showCancelButton: true,
						confirmButtonText: 'Si, Imprimir!',
						cancelButtonText: 'No, cancelar!',
						reverseButtons: true
						// Se recoge el valor si se dio Click al botón eliminar
					}).then((result) =>{
						//console.log(result);
							if (result.value) {
								window.open( 'pdf/' + last_id );
								
								//Se muestra un mensaje de que el dato se elimino correctamente
								swalWithBootstrapButtons({
									title:"Comprobante! ",
									text: "Generando el comprobante!",
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

					}
				});


			});


/**Función que valida que no existan campos vacíos en el modal #update_fee_modal */
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
					affiliate_id: {
						required: 		true,
					},
					fee_type_id: {
						required: 		true,
					},
					amount: {
						required: 		true,
						number:			true,

					},
					date: {
						required: 		true,

					},

					detail: {
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
					affiliate_id: {
						required: 		'Por favor, seleccione un afiliado',
					},
					fee_type_id: {
						required: 		'Por favor, seleccione un tipo de cuota',
					},
					amount: {
						required: 		'Por favor, ingrese el monto de la cuota voluntaria',
						number:			'Se aceptan solo números',
					},
					date: {
						required:		'Por favor, ingrese una fecha',

					},
					detail: {
						required: 		'Por favor, ingrese el detalle de la cuota voluntaria',
					},
				},
			});

			validatorUpdate = $('#frm-update').validate({
				keyup: true,
				rules: {
					affiliate_id: {
						required: 		true,
					},
					fee_type_id: {
						required: 		true,
					},
					amount: {
						required: 		true,
						number:			true,

					},
					date: {
						required: 		true,

					},

					detail: {
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
					affiliate_id: {
						required: 		'Por favor, seleccione un afiliado',
					},
					fee_type_id: {
						required: 		'Por favor, seleccione un tipo de cuota',
					},
					amount: {
						required: 		'Por favor, ingrese el monto de la cuota voluntaria',
						number:			'Se aceptan solo números',
					},
					date: {
						required:		'Por favor, ingrese una fecha',

					},
					detail: {
						required: 		'Por favor, ingrese el detalle de la cuota voluntaria',
					},
				},
			});

		}


/**Máscara para el input de monto */
// function mask(){
// 	$('#amount').mask('00.00', {reverse: true});
// 	$('#update_amount').mask('00.00', {reverse: true});
// }



//--------- Se creo para poder mostrar el detalle de una fila


$('body').delegate('#tblfees #Show', 'click', function(e){
		e.preventDefault();
			var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');;
    				var rowData = $('#tblfees').DataTable().row($tr).data();
   						//console.log(rowData);
					var vid = rowData.id;
					console.log(vid);
				$.get('fees/' + vid , {id:vid}, function(data){
					window.location.href = 'fees/' + vid;
		 });
	});

	$('body').delegate('#tblfees #pdf', 'click', function(e){
          e.preventDefault();
            var $tr = $(this).closest('li').length ?
                $(this).closest('li'):
                $(this).closest('tr');;
                  var rowData = $('#tblfees').DataTable().row($tr).data();
                    //console.log(rowData);
                var vid = rowData.id;
                console.log(vid);
              //$.get('plans/' + vid +'/edit', {id:vid}, function(data){
                window.location.href = 'pdf/' + vid;
          // });
        });

		


    </script>




@stop
