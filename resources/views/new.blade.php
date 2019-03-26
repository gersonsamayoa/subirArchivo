@extends('app')

@section('content')

<div class="container">

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Agregar archivos</div>
        <div class="panel-body">
          <form method="POST" action="/public/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="control-label">Nombres</label>
                <input type="text" class="form-control" name="nombres" required>
              </div>
     
             <div class="form-group">
                <label class="control-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" required>
            </div>

            <div class="form-group">
              <label class="control-label">Nuevo Archivo</label>

                <input type="file" class="form-control" name="file" required >

            </div>

            <div class="form-group">
                 <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection