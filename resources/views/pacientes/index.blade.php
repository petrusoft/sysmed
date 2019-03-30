@extends('layouts.home')
@section('content') @auth
<div class="row">
    <div class="col-xs-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Opps!</strong> Something went wrong<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Pacientes</h3>
                <a href="{{ route('pacientes.create') }}" class="btn btn-primary pull-right" role="button" aria-pressed="true">Nuevo</a>
            </div>
            <div class="box-header">
                <label>Mostrar
                    <select name="lista" aria-controls="" class="input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>

                <div class="input-group input-group-sm pull-right" style="width: 200px;">
                    <input type="text" name="buscar" class="form-control " placeholder="Buscar">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

                <table class="table table-hover table-striped table-bordered table-condensed">
                    <tr>
                        <th>Codigo</th>
                        <th>Documento</th>
                        <th>Numero</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($pacientes as $paciente)
                    <tr>
                        <td style="vertical-align:middle">{{ $paciente->codigo }}</td>
                        <td style="vertical-align:middle">{{ $paciente->dni->nombre }}</td>
                        <td style="vertical-align:middle">{{ $paciente->numero }}</td>
                        <td style="vertical-align:middle">{{ $paciente->nombre }}</td>
                        <td style="vertical-align:middle">{{ $paciente->telefono }}</td>
                        <td style="vertical-align:middle"><img src="{{ asset($paciente->imagen) }}" alt=""></td>
                        <td>
                            <form id="delete" action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <a class="btn btn-info" href="{{ route('pacientes.show', $paciente->id) }}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary" href="{{ route('pacientes.edit', $paciente->id) }}"><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if ($pacientes->total() > 0)
                    <tfoot>
                        <tr>
                            <td>{{ $pacientes->firstItem() }} al {{ $pacientes->lastItem() }} de {{ $pacientes->total() }} registros</td>
                            <td colspan="6" class="text-center">{{ $pacientes->appends(['sort' => 'id'])->links() }}</td>
                        </tr>
                    </tfoot>
                    @else
                    <tfoot>
                        <tr>
                            <th colspan="6" class="text-center">No existen registros</th>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endauth
@endsection
