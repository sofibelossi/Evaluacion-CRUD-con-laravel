@extends('layout')
@section('contenido')
@php
    $sortField = $sortField ?? 'id';
    $sortDirection = $sortDirection ?? 'asc';
    $buscar = $buscar ?? '';
@endphp

<h1>Nuestros kartings</h1>

<div class="row">
    <div class="col-6">
<a href="{{ route('kartings.create') }}"  class="btn btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
</svg></a>
</div>
<div class="col-6">
    <form action="{{route('buscar')}}" method="get">
       
     <input type="text" placeholder="Buscar por marca, modelo o tipo de motor" class="form-control" name="buscar">
     <button type="submit" class="btn btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg></button>
    </form>
    </div>

</div>
<table class="table table-dark table-striped mt-4">
<thead>
    <tr>
        @php
                    $direction = request('direction', 'asc') === 'asc' ? 'desc' : 'asc';
                @endphp
        <th scope="col">
         <a href="{{ route('kartings.index', ['sort' => 'id', 'direction' => $sortField === 'id' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
            Id
            @if($sortField === 'id')
                    @if($sortDirection === 'asc') ▲ @else ▼ @endif
            @endif
        </a>    
        </th>
        <th scope="col">Marca</th>
        <th scope="col">Modelo</th>
        <th scope="col">Año</th>
        <th scope="col">Tipo motor</th>
        <th scope="col">
            <a href="{{route ('kartings.index', ['sort' => 'precio_alquiler', 'direction' => $sortField === 'precio_alquiler' && $sortDirection === 'asc' ? 'desc':'asc'])}}">
            Precio alquiler
            @if($sortField === 'precio_alquiler')
                    @if($sortDirection === 'asc') ▲ @else ▼ @endif
            @endif
            </a>
        </th>
        <th scope="col">Imagen</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
    @foreach($kartings as $karting)
    <tr>
        <td>{{$karting->id}}</td>
        <td>{{$karting->marca}}</td>
        <td>{{$karting->modelo}}</td>
        <td>{{$karting->anio}}</td>
        <td>{{$karting->tipo_motor}}</td>
        <td>{{$karting->precio_alquiler}}</td>
        <td><img src="{{asset('imagenes/'.$karting->imagen)}}" style="width: 100px; heigth: 100px;" ></td>
        <td>
            <form action="{{route ('kartings.destroy',$karting->id)}}" method="post" onsubmit="return confirm ('¿Estas seguro que deseas eliminar este karting?');">
            <a href="/kartings/{{$karting->id}}/edit" class="btn btn-success" style="width: 50px; heigth: 150px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
</svg></a>
            @csrf
            @method('DELETE')
            <button style="width: 50px; heigth: 150px;" type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
</svg></button>
            </form>
        </td>
    </tr>
    @endforeach

   
</tbody>
</table>
@endsection