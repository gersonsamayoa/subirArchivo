@extends('app')

@section('content')

<div class="container">

  <a href="{{route('formulario')}}" class="btn btn-primary pull-left" title="Subir"> <span class="glyphicon glyphicon-upload " aria-hidden="true"></span> Subir</a>

    <table class="table table-striped table-hover">
      <thead>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Archivos</th>
        <th><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Tiempo en Línea </th>
        <th>Acción</th>
      </thead>
      <tbody>
        @foreach($archivos as $archivo)
        <tr>
          <td>{{ $archivo->nombres }}</td>
          <td>{{$archivo->apellidos }}</td>
          <td>{{ $archivo->url }} </td>
          <td>{{ $archivo->created_at->diffForHumans()}}</td>
          <td><a href="{{ route('archivos.destroy', $archivo->id) }}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger glyphicon glyphicon-remove" title="Eliminar"></a>
              <a href="{{ route('archivos.descargar', $archivo->id) }}" class="btn btn-info glyphicon glyphicon-download-alt" title="Descargar"></a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>

</div>

@endsection