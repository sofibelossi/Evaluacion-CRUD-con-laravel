@extends('layout');
@section('contenido')
<h2>Agregar karting</h2>
<form action="{{ route('kartings.store') }}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="mb-3">
    <label for="" class="form-label">Marca</label>
    <input type="text" class="form-control" name="marca">
    @error('marca')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
     <label for="" class="form-label">Modelo</label>
    <input type="text" class="form-control" name="modelo">
    @error('modelo')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3 ">
     <label for="" class="form-label">Año</label>
    <input type="number" class="form-control" name="anio">
    @error('anio')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3 ">
     <label for="" class="form-label">Tipo motor</label>
    <input type="text" class="form-control" name="tipo_motor">
     @error('tipo_motor')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
   <div class="mb-3 ">
     <label for="" class="form-label">Precio alquiler</label>
    <input type="text" class="form-control" name="precio_alquiler">
     @error('precio_alquiler')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
   <div class="mb-3 ">
     <label for="" class="form-label">Imagen</label>
    <input type="file" class="form-control" name="imagen">
    @error('imagen')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
@endsection