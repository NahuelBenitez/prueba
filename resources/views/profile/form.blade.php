@extends('theme.base')

@section('content')
    
<div class="clase container text-center">

@if (isset($profile))

<h1>EDITAR ROL</h1>
@else
<h1>CREAR ROL</h1>    

@endif

    
@if (isset($profile))

<form action="{{ route('profile.update', $profile) }}" method="POST">
    @method('PUT')
@else
<form action="{{ route('profile.store') }}" method="POST">
@endif


    @csrf
    <!--token para seguridad-->
    <div class="mb3">
        <label for="nombre" class="form-label">Nombre del Rol</label>
        <input type="text" name="nombreRol" class="form-control" value="{{old('nombreRol') ?? @$profile->nombreRol}}">
        @error('nombreRol')
            <p class="form-text text-danger">{{$message}}</p>
        @enderror
    </div>

        
@if (isset($profile))

<button type="submit" class="btn btn-success mt-2">Editar Rol</button>
@else
<button type="submit" class="btn btn-success mt-2">Guardar Rol</button>

@endif



</form>


</div>

@endsection