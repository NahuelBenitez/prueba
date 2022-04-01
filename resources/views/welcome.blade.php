@extends('theme.base')

@section('content')
    
<div class="clase container text-center">
    <h1>PRUEBA CRUD WEBEXPORT</h1>
    <a href="{{route('profile.index') }}" class="btn btn-primary">Roles</a>
    <a href="{{route('persona.index') }}" class="btn btn-info text-light">Usuarios</a>
</div>

@endsection