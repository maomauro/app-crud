@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="row g-3" action="{{ url('/persona') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('persona.form', ['accion' => 'Crear'])
        </form>
    </div>
@endsection
