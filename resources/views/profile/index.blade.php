@extends('theme.base')

@section('content')
    
<div class="clase container text-center">
    <h1>Listado de Roles</h1>
    <a href="{{route('profile.create')}}" class="btn btn-primary">Crear Rol</a>

    @if (Session::has('mensaje'))
        <div class="alert alert-info">
            {{Session::get('mensaje') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <th>id</th>
            <th>Nombre Rol</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @forelse ($profiles as $detalle)
                
            <tr>
                <td>{{$detalle->id}}</td>
                <td>{{$detalle->nombreRol}}</td>
                
                <td>
                    <a href="{{ route('profile.edit', $detalle)}}" class="btn btn-warning">Editar Rol</a>
                    <form action="{{ route('profile.destroy', $detalle)}}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Estas seguro de elimninar este Rol?')">Eliminar</button>

                    </form>
                </td>
            </tr>
            @empty
                
            <tr>
                <td colspan="3">No Hay Registros</td>
            </tr>
            @endforelse
           
        </tbody>

    </table>

    @if ($profiles->count())
    {{$profiles->links() }}    
    @endif
    

</div>

@endsection