@extends('theme.base')

@section('content')
    
<div class="clase container text-center">

@if (isset($persona))

<h1>EDITAR USUARIO</h1>
@else
<h1>CREAR USUARIO</h1>    

@endif

    
@if (isset($persona))

<form action="{{ route('persona.update', $persona) }}" method="POST">
    @method('PUT')
@else
<form action="{{ route('persona.store') }}" method="POST">
@endif


    @csrf
    <!--token para seguridad-->
    <div class="mb3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{old('nombre') ?? @$persona->nombre}}">
        @error('nombre')
            <p class="form-text text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control" value="{{old('apellido') ?? @$persona->apellido}}">
        @error('apellido')
            <p class="form-text text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" name="usuario" class="form-control" value="{{old('usuario') ?? @$persona->usuario}}">
        @error('usuario')
            <p class="form-text text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb3">
        <label for="password" class="form-label">Pass</label>
        <input type="text" name="password" class="form-control" value="{{old('password') ?? @$persona->password}}">
        @error('usuario')
            <p class="form-text text-danger">{{$message}}</p>
        @enderror
    </div>
    
        
@if (isset($persona))

<button type="submit" class="btn btn-success mt-2">Editar Usuario</button>
@else
<button type="submit" class="btn btn-success mt-2">Guardar Usuario</button>

@endif



</form>


</div>

@endsection