@extends('layout');
@section('contenido')
<h1>Registro de usuario</h1>
<form action="{{route ('register')}}" method="post">
@csrf
<label placeholder="Nombre"></label>
<input type="text" name="name" value="{{ old('name') }}">
 @error('name')
                <small class="font-bold text-danger">{{ $message }}</small>
 @enderror
 <label placeholder="Email"></label>
<input type="email" name="email" value="{{ old('email') }}">
 @error('email')
    <small class="font-bold text-danger">{{ $message }}</small>
 @enderror
 <label placeholder="Contraseña"></label>
<input type="password" name="password" >
 @error('password')
    <small class="font-bold text-danger">{{ $message }}</small>
 @enderror
 <label placeholder="Confirmar contraseña"></label>
<input type="password" name="password_confirmation" value="{{ old('email') }}">
 @error('password_confirmation')
    <small class="font-bold text-danger">{{ $message }}</small>
 @enderror
 <button type="submit">Registrar</button>
</form>
@endsection