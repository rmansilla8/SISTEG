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
            <!-- Aca se incluye todo el contenido de la pagina que se desea mostrar -->
            <!-- por ejemplo el index/tabla de algun recurso -->


            <p>
                <a href="@Url.Action("Create")" class="btn btn-success"> <i class="fa fa-plus" aria-hidden="true"></i> Crear</a>
            </p>
 <!-- por ejemplo el index/tabla de algun recurso -->
                <div class="container table-responsive">
                    <table id="tblFees" class="display table table-striped table-bordered text-center responsive no-wrap" width="100%"  >
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Afiliado</td>
                                <td>Tipo de Cuota</td>
                                <td>Cantidad</td>
                                <td>Fecha</td>
                                <td>Detalle</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($fees as $fee)
                            <tr>
                                <td>{{ $fee->id }}</td>
                                <td>{{ $fee->affiliate->employee->person->full_name }}</td>
                                <td>{{ $fee->fee_type->description }}</td>
                                <td>Q. {{ $fee->amount }}</td>
                                <td>{{ $fee->date }}</td>
                                <td>{{ $fee->detail }}</td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>

                                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                    <a class="btn btn-small btn-success fa  fa-exclamation-circle" href="{{ URL::to('fees/' . $fee->id) }}" alt="Mostrar"></a>

                                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                    <a class="btn btn-small btn-info fa fa-pencil" href="{{ URL::to('fees/' . $fee->id . '/edit') }}" alt="Editar"></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        <!-- /.box-body -->
        <div class="box-footer">
            <!-- Aca se incluye aquellas acciones relacionadas con lo antes mostrado -->
            <!-- por ejemplo botones de facturacion, exportar a excel/pdf o similares -->
        </div>
        <!-- /.box-footer-->
@stop

@section('css')
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link href="css/dataTables.responsive.css" rel="stylesheet" type="text/css" />
@stop

@section('js')
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
   <script src="js/dataTable.responsive.js" type="text/javascript"></script>
   <script>
        $(document).ready( function () {
            $('#tblFees').DataTable(
                {

                    "language":
                    {
                        "url":"//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    },
                     responsive:true,

                }
            );

        } );


    </script>

   <!-- <script type="text/javascript">
     $(function()
        {
            $("table").footable();
        });
    </script> -->


@stop
