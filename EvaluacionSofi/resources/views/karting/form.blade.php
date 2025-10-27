@extends('layout');
@section('contenido')
<h2>{{ $karting->exists ? 'Editar karting' : 'Agregar karting'}}</h2>
<form action="{{$karting->exists ? route ('kartings.update', $karting->id) : route('kartings.store')}}" method="post">
    @csrf
    @if($karting->exists)
      @method ('PUT')
    @endif

    <div class="mb-3">
    <label for="" class="form-label">Marca</label>
    <input type="text" class="form-control" name="marca" value="{{ old('nombre', $karting->marca) }}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Modelo</label>
    <input type="text" class="form-control" name="modelo" value="{{ old('marca', $karting->modelo) }}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Anio</label>
    <input type="text" class="form-control" name="anio" value="{{ old('anio', $karting->anio) }}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Tipo motor</label>
    <input type="text" class="form-control" name="tipo_motor" value="{{ old('tipo_motor', $karting->tipo_motor) }}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio alquiler</label>
    <input type="text" class="form-control" name="precio_alquiler" value="{{ old('precio_alquiler', $karting->precio_alquiler) }}">
  </div>
  @if($karting->exists && $karting->imagen)
  <div class="mb-3">
    <label for="" class="form-label">Imagen</label> <br>
    <img src="{{ asset('imagenes/'.$karting->imagen) }}" alt="imagen actual">  
</div>
@endif
<div class="mb-3">
    <label for="imagen" class="form-label">Nueva Imagen</label>
    <input type="file" class="form-control" name="imagen">
  </div>
  <button type="submit" class="btn btn-primary">
    {{ $karting->exists ? 'Guardar cambios' : 'Agregar'}}
  </button>
</form>
@endsection