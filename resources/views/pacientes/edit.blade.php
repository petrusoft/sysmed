@extends('layouts.home')
@section('content') @auth
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Actualizar Paciente</h3>
            </div>
            <!-- /.box-header -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- form start -->
            <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                @method('PATCH')
                <div class="box-body">
                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input type="number" class="form-control" name="codigo" value="{{ old('codigo') ?? $paciente->codigo }}" placeholder="Ingrese el codigo">
                    </div>
                    <div class="form-group">
                        <label for="dni_id">Documento</label>
                        <select class="form-control" name="dni_id">
                            @foreach ($dnis as $dni)
                            <option value="{{ $dni->id }}" {{ (old('dni_id') ?? $paciente->dni_id) == $dni->id ? 'selected' : ''}}>{{ $dni->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numero">Numero</label>
                        <input type="number" class="form-control" name="numero" value="{{ old('numero') ?? $paciente->numero }}" placeholder="Ingrese el numero de documento">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{ old('nombre') ?? $paciente->nombre }}" placeholder="Ingrese el nombre">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" value="{{ old('telefono') ?? $paciente->telefono }}" placeholder="Ingrese el telefono">
                    </div>
                    <div lass="form-group">
                        <label for="imagen">Imagen</label><br>
                        <img src="{{ asset($paciente->imagen) }}" alt=""><br><br>
                        <input type="file" name="imagen" accept="image/jpeg">
                        <p class="help-block">Seleccione una imagen</p>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="eliminar"> Eliminar Imagen
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
    <!--/.colum (left) -->
</div>
<!--/.row -->
@endauth
@endsection
