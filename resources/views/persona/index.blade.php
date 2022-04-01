@extends('theme.base')

@section('content')
    
<div class="clase container text-center">
    <h1>Listado de Usuarios</h1>
    <a href="{{route('persona.create')}}" class="btn btn-primary">Crear Usuario</a>

    @if (Session::has('mensaje'))
        <div class="alert alert-info">
            {{Session::get('mensaje') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <th>id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>ROL</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @forelse ($personas as $detalle)
                
            <tr>
                <td>{{$detalle->id}}</td>
                <td>{{$detalle->nombre}}</td>
                <td>{{$detalle->apellido}}</td>
                <td>{{$detalle->usuario}}</td>
                <td>{{$detalle->idRol}}</td>
                
                <td>
                    <a href="{{ route('persona.edit', $detalle)}}" class="btn btn-warning">Editar Usuario</a>
                    <form action="{{ route('persona.destroy', $detalle)}}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Estas seguro de elimninar este Usuario?')">Eliminar</button>

                    </form>
                </td>
            </tr>
            @empty
                
            <tr>
                <td colspan="6">No Hay Registros</td>
            </tr>
            @endforelse
           
        </tbody>

    </table>

    @if ($personas->count())
    {{$personas->links() }}    
    @endif
    

</div>

@endsection