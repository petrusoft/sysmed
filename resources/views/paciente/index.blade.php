@extends('layouts.home')
@section('content')
@auth
<div class="row">
    <div class="col-xs-12">
    <div class="box">
        <div class="box-header">

        <div class="col-xs-6">
            <h3 class="box-title">Pacientes</h3>
        </div>

        <div class="col-xs-6">
            <a href="{{ route('paciente.create') }}" class="btn btn-primary pull-right" role="button" aria-pressed="true">Nuevo</a>
        </div>

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">

        <div class="col-xs-6">
            <label>
            <select name="lista" aria-controls="" class="form-control input-sm">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            </label>
        </div>

        <div class="col-xs-6">
            <div class="box-tools pull-right">
            <div class="input-group input-group-sm" style="width: 200px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar">

                <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
            </div>
        </div>

        <table class="table table-hover">
            <tr>
            <th>Codigo</th>
            <th>Documento</th>
            <th>Numero</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th class="nosortable center">Acciones</th>
            </tr>
            @forelse ($pacientes as $paciente)
            <tr>
            <td>{{ $paciente->codigo }}</td>
            <td>{{ $paciente->dni->nombre }}</td>
            <td>{{ $paciente->numero }}</td>
            <td>{{ $paciente->nombre }}</td>
            <td>{{ $paciente->telefono }}</td>
            <td class="center">
                <div class="btn-group" role="group" aria-label="Acciones">
                <a data-original-title="Ver" href="{{ route('paciente.show', $paciente->id) }}" data-toggle="tooltip" title="" class="tooltips"><i class="fa fa-eye"></i></a>
                <a data-original-title="Editar" href="{{ route('paciente.edit', $paciente->id) }}" data-toggle="tooltip" title="" class="tooltips"><i class="fa fa-pencil"></i> </a>
                <a data-original-title="Eliminar" href="{{ route('paciente.destroy', $paciente->id) }}" data-toggle="tooltip" title="" class="tooltips ajax-delete"><i class="fa fa-trash-o"></i> </a>
                </div>
            </td>
            </tr>
            <tfoot>
                <tr>
                <td colspan="1" >{{ $pacientes->firstItem() }} al {{ $pacientes->lastItem() }} de {{ $pacientes->total() }} registros</td>
                <td colspan="6" class="text-center">{{ $pacientes->appends(['sort' => 'id'])->links() }}</td>
                </tr>
            </tfoot>
            @empty
            <tfoot>
            <tr>
                <th colspan="6" class="text-center">No existen registros!</th>
            </tr>
            </tfoot>
            @endforelse
        </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>
</div>
@endauth
@endsection
