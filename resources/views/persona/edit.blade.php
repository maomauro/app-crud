@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="row g-3" action="{{ url('/persona/' . $persona->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('persona.form', ['accion' => 'Editar'])
        </form>
    </div>
@endsection
