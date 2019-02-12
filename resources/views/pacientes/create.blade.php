@extends('layouts.home')
@section('content') @auth
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Nuevo Paciente</h3>
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
            <form action="{{ route('pacientes.store') }}" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input type="number" class="form-control" name="codigo" placeholder="Ingrese el codigo">
                    </div>
                    <div class="form-group">
                        <label for="dni_id">Documento</label>
                        <select class="form-control" name="dni_id">
                            @foreach ($dnis as $dni)
                            <option value="{{ $dni->id }}">{{ $dni->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numero">Numero</label>
                        <input type="number" class="form-control" name="numero" placeholder="Ingrese el numero de documento">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Ingrese el telefono">
                    </div>
                    <div lass="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" accept="image/jpeg">
                        <p class="help-block">Seleccione una imagen</p>
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
