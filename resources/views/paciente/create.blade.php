@extends('layouts.home')
@section('content')
@auth
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nuevo Paciente</h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <form role="form">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="codigo">Codigo</label>
                  <input type="number" class="form-control" id="codigo" placeholder="Ingrese el codigo">
                </div>
                <div class="form-group">
                  <label for="numero">Numero</label>
                  <input type="number" class="form-control" id="numero" placeholder="Ingrese el numero de documento">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre">
                </div>
                <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input type="text" class="form-control" id="telefono" placeholder="Ingrese el telefono">
                </div>
                <div lass="form-group">
                  <label for="imagen">Imagen</label>
                  <input type="file" id="imagen">
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
