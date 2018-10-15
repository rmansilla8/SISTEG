@extends('adminlte::page')

@section('title', 'Cuotas')

@section('content_header')
    <h1>
    Cuotas - <small>Listado de Cuotas</small>
    </h1>
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
<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de cuotas</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>

                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove" disabled>
                    <i class="fa fa-times"></i>
                </button>

            </div>
        </div>
        <div class="box-body">
            <!-- Cuerpo de la página -->
            <!-- se pueden colocar cualquier recurso como tablas, etc. -->

			<div class="row">
				<div class="col-md-12">
						<button style="margin-bottom:10px;" type="button" data-toggle="modal" data-target="#add_new_fee_modal" class="btn btn-success pull-right">
						<i class="fa fa-plus"></i> Nuevo Registro</button>
					<br/>
				</div>
			</div>

            <!-- Tabla -->
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

				<!--/ fin de la tabla-->
                </div>
			</div>

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            <!-- Aca se incluye aquellas acciones relacionadas con lo antes mostrado -->
            <!-- por ejemplo botones de facturación, exportar a excel/pdf o similares -->
        </div>
        <!-- /.box-footer-->

		<!--Área de los Modals-->
		<!--Modal: nuevo registro-->
        <div class="modal fade" id="add_new_fee_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
	                	<h4 class="modal-title" id="myModalLabel">Agregar registro</h4>

	            </div>
	            <div class="modal-body">

	 				<form  action="{{ URL::to('fees')}}" method="POST" id="frm-insert">
						{{ csrf_field() }}
	                	<!-- <div class="form-group">
	                    	<label for="affiliate_id">Número de Afiliado</label>
	                		<select name="affiliate_id" id="affiliate_id"></select>
						</div> -->
						<div class="form-group">
	                    	<label for="affiliate_id">Nombre Afiliado</label>
	                		<select name="affiliate_id" id="affiliate_id"></select>
						</div>

	                	<div class="form-group">
	                    	<label for="fee_type_id">Tipo de Cuota</label>
	                		<select name="fee_type_id" id="fee_type_id"></select>
						</div>

						<div class="form-group">
	                    	<label for="amount">Cantidad</label>
	                    	<input name="amount" type="text" id="amount" placeholder="Cantidad" class="form-control"/>
						</div>

						<div class="form-group">
	                    	<label for="date">Fecha</label>
	                    	<input name="date" type="date" id="date" placeholder="Name" class="form-control"/>
						</div>

						<div class="form-group">
							<strong>Descripción:</strong>
							<textarea id="detail" class="form-control" name="detail"></textarea>
						</div>

						<div class="modal-footer">
	                		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<input type="submit" class="btn btn-success" value="Guardar" />
						</div>
					</form>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- // Modal: nuevo registro -->

	<!-- Modal: Actualizar registro -->

	<div class="modal fade" id="update_fee_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel">Editar registro</h4>
	            </div>
					<div class="modal-body">
					<form  action="" method="POST" id="frm-update">

					<div class="form-group">
						<label for="update_affiliate_id">Afiliado</label>
						<input name="affiliate_name" type="text" id="update_affiliate" placeholder="Afiliado" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_fee_type_id">Tipo de cuota</label>
							<select name="fee_type_id" id="update_fee_type_id"></select>
					</div>

					<div class="form-group">
						<label for="update_amount">Cantidad</label>
						<input name="amount" type="text" id="update_amount" placeholder="Cantidad" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_date">Fecha</label>
						<input name="date" type="text" id="update_date" placeholder="Cantidad" class="form-control"/>
					</div>

					<div class="form-group">
						<strong>Detalle:</strong>
						<textarea id="update_detail" class="form-control" name="detail"></textarea>
					</div>

					<input name="id" type="hidden" id="update_id"  placeholder="" class=""/>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<input type="submit" class="btn btn-success" value="Actualizar" />
					</div>
				</form>
				</div>
	        </div>
	    </div>
	</div>
	<!-- // Modal: actualizar registro -->
@stop

<!--// Modals -->



@section('css')
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">-->

@stop

@section('js')
   <script>

			$(document).ready(function(){

				datatables1();
				getFeeType();
				getAffiliate();
				//getFees();
			});

			function datatables1()
			{
				var t = $('#tblfees').DataTable({



					"autoWidth": 	true,
					"responsive":	true,
					"columnDefs":
						[
							{ responsivePriority: 1, targets: 0 },
							{ responsivePriority: 2, targets: -2 },
							{
								"searchable": false,
								"orderable": false,
								"targets": 0
							}
						],

					"order": [[ 1, 'asc' ]],
					"fixedColumns":	true,

					"language":
						{
							"url":"//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
						},

					"ajax":
						{
							"url": 		'../get-fees',
							"type":		'GET',
							"dataSrc":	'fees',
						},
					"columns" : [
						{"data":	"id"},
						{"data":	"number"},
						{
							/**
							 * * Permite combinar el nombre de la persona en una sola columna.
							 *
							 */
							data: null,
							render: function ( data, type, row )
								{
									/**
									** data se carga con los campos donde se almacena el nombre.
									*/
									return data.first_name+'  '+data.second_name+'  '+data.first_surname+'  '+data.second_surname;
								},
							//editField: ['first_name', 'second_name', 'first_surname', 'second_surname']
						},
						{"data":	"description"},
						{"data":	"amount"},
						{"data":	"date"},
						{"data":	"detail"},
						{"defaultContent":
							"<div class='btn-group btn-group-xs'>"+
							"<button type='button' id='Show' class='show btn btn-info'><i class='fa fa-eye'></i></button>"+
							"<button type='button' id='Edit' class='edit btn btn-warning'><i class='fa fa-pencil-square-o'></i></button>"+
							"<button type='button' id='Delete' class='delete btn btn-danger'><i class='fa fa-trash-o'></i></button>"+
							"</div>"
						}


					]

				});
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
					$.each(data,	function(i, value){
					$('#affiliate_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}


			//-------------Eliminar cuotas-------------//

				/*
				 * Esta función permite eliminar una cuota a través del botón
				 * eliminar
				 */



				$('body').delegate('#tbl-fees #del', 'click', function(e){
					e.preventDefault();
					swal({
						title: 'Está seguro de realizar esta acción?',
						text: "Si continua esta cuota será eliminada!",
						type: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Sí, deseo eliminarla!'
						})
						.then((willDelete) => {
						if (willDelete) {
							var id = $(this).data('id');

							$.post('{{route("fees.destroy", '+ id +' )}}', {id:id}, function(data){
								$(+id).remove();

							});
							getFees();
							swal("La cuota se eliminó correctamente!", {
							icon: "success",
							});
						} else {
							swal("¡Operación cancelada por el usuario!");
						}
					});
				});

			//-------------Editar cuotas-------------

			$('body').delegate('#tblfees #Edit', 'click', function(e){
				e.preventDefault();
				var $tr = $(this).closest('tr');
    			var rowData = $('#tblfees').DataTable().row($tr).data();
   				console.log(rowData);
				var vid = rowData.id;
				console.log(vid);

				$.get('fees/' + vid + '/edit', {id:vid}, function(data){
					$('#update_fee_modal').find('#update_affiliate').val(data.affiliate_id)
					$('#update_fee_modal').find('#update_fee_type_id').val(data.fee_type_id)
					$('#update_fee_modal').find('#update_amount').val(data.amount)
					$('#update_fee_modal').find('#update_date').val(data.date)
					$('#update_fee_modal').find('#update_detail').val(data.detail)
					$('#update_fee_modal').find('#update_id').val(data.id)
					$('#update_fee_modal').modal('show');
				});
			});

			//-------------Actualizar cuotas-------------

				$('#update_fee_modal').on('submit', function(e){
				e.preventDefault();
				var data 	= $(this).serialize();
				var id 		= $('#update_id').val();
				$.ajax({
					type 	: 'put',
					url 	: 'fees/' + id,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						$('#update_fee_modal').modal('hide');
						getFees();
					}
					});
				});


			//-----------Crear cuota --------
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('#frm-insert').on('submit', function(e){
				e.preventDefault();
				var data 	= $(this).serialize();
				var url 	= $(this).attr('action');
				var post 	= $(this).attr('method');
				console.info(data);
				$.ajax({
					type 	: post,
					url 	: url,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						var tbl = $('#tblfees').DataTable();
						tbl.ajax.reload()
						$('#add_new_fee_modal').modal('hide');
						getFees();
						toastr["success"]("Cuota guardada","Información")

						// $.toastr.info({
						// 	heading: 'Information',
						// 	text: '¡Cuota creada exitosamente!',
						// 	icon: 'info',
						// 	position: 'top-right',
						// 	loader: true,        // Change it to false to disable loader
						// 	loaderBg: '#9EC600'  // To change the background
						// });
					}
				});


			});





    </script>



@stop
