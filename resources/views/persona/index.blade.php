@extends('layouts.app')
@section('content')
    <div class="container">
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible false show" role="alert">
                <strong>{{ Session::get('mensaje') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ url('persona/create') }}" class="btn btn-success">Crear Persona</a>
        <hr />
        <table class="table table-responsive table-striped">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>TIPO ID</th>
                    <th>IDENTIFICACION</th>
                    <th>EMAIL</th>
                    <th>PAIS</th>
                    <th>DIRECCION</th>
                    <th>CELULAR</th>
                    <th>CATEGORIA</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($personas as $persona)
                    <tr>
                        <td>{{ $persona->id }}</td>
                        <td>{{ $persona->nombre }}</td>
                        <td>{{ $persona->apellido }}</td>
                        <td>{{ $persona->tipoIdentificacion }}</td>
                        <td>{{ $persona->identificacion }}</td>
                        <td>{{ $persona->email }}</td>
                        <td>{{ $persona->pais }}</td>
                        <td>{{ $persona->direccion }}</td>
                        <td>{{ $persona->celular }}</td>
                        <td>{{ $persona->categoria }}</td>
                        <td>
                            <a href="{{ url('/persona/' . $persona->id . '/edit') }}" class="btn btn-warning">Editar</a>
                            |
                            <form action="{{ url('/persona/' . $persona->id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit"
                                    onclick="return confirm('¿Desea borrar el registro ' + {{ $persona->id }} + ' ?')"
                                    value="Borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $personas->links() !!}
    </div>
@endsection
