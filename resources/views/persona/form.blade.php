<h4 class="mb-3">{{ $accion }} Persona</h4>

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<hr />

<div class="col-md-4">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ isset($persona->nombre) ? $persona->nombre : old('nombre') }}" >
</div>

<div class="col-md-4">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" name="apellido" id="apellido"
        value="{{ isset($persona->apellido) ? $persona->apellido : old('apellido') }}" >
</div>

<div class="col-md-4">
    <label for="tipoIdentificacion" class="form-label">Tipo de Identificación</label>
    <select class="form-select" name="tipoIdentificacion" id="tipoIdentificacion" >
        <option selected disabled value="">Elegir...</option>
        <option value="RC" {{ isset($persona->tipoIdentificacion) ? $persona->tipoIdentificacion == 'RC' ? 'selected' : '' : '' }}>Registro civil</option>
        <option value="TI" {{ isset($persona->tipoIdentificacion) ? $persona->tipoIdentificacion == 'TI' ? 'selected' : '' : '' }}>Tarjeta de identidad</option>
        <option value="CC" {{ isset($persona->tipoIdentificacion) ? $persona->tipoIdentificacion == 'CC' ? 'selected' : '' : '' }}>Cédula de ciudadanía</option>
        <option value="TE" {{ isset($persona->tipoIdentificacion) ? $persona->tipoIdentificacion == 'TE' ? 'selected' : '' : '' }}>Tarjeta de extranjería</option>
        <option value="CE" {{ isset($persona->tipoIdentificacion) ? $persona->tipoIdentificacion == 'CE' ? 'selected' : '' : '' }}>Cédula de extranjería</option>
        <option value="NT" {{ isset($persona->tipoIdentificacion) ? $persona->tipoIdentificacion == 'NT' ? 'selected' : '' : '' }}>Nit</option>
    </select>
</div>

<div class="col-md-3">
    <label for="identificacion" class="form-label">Identificación</label>
    <input type="text" class="form-control" name="identificacion" id="identificacion"
        value="{{ isset($persona->identificacion) ? $persona->identificacion : old('identificacion') }}" >
</div>

<div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <div class="input-group">
        <span class="input-group-text" id="inputGroupEmail">@</span>
        <input type="text" class="form-control" name="email"
            value="{{ isset($persona->email) ? $persona->email : old('email') }}" id="email"
            aria-describedby="inputGroupEmail" >
    </div>
</div>

<div class="col-md-3">
    <label for="pais" class="form-label">Pais</label>
    <select class="form-select" name="pais" id="pais" >
        <option selected disabled value="">Elegir...</option>
        <option value="COL" {{ isset($persona->pais) ? $persona->pais == 'COL' ? 'selected' : '' : '' }}>Colombia</option>
        <option value="VEN" {{ isset($persona->pais) ? $persona->pais == 'VEN' ? 'selected' : '' : '' }}>Venezuela</option>
        <option value="PER" {{ isset($persona->pais) ? $persona->pais == 'PER' ? 'selected' : '' : '' }}>Peru</option>
        <option value="ECU" {{ isset($persona->pais) ? $persona->pais == 'ECU' ? 'selected' : '' : '' }}>Ecuador</option>
        <option value="CHI" {{ isset($persona->pais) ? $persona->pais == 'CHI' ? 'selected' : '' : '' }}>Chile</option>
        <option value="URU" {{ isset($persona->pais) ? $persona->pais == 'URU' ? 'selected' : '' : '' }}>Uruguay</option>
        <option value="PAR" {{ isset($persona->pais) ? $persona->pais == 'PAR' ? 'selected' : '' : '' }}>Paraguay</option>
    </select>
</div>

<div class="col-md-6">
    <label for="direccion" class="form-label">Dirección</label>
    <input type="text" class="form-control" name="direccion" id="direccion"
        value="{{ isset($persona->direccion) ? $persona->direccion : old('direccion') }}" >
</div>

<div class="col-md-3">
    <label for="celular" class="form-label">celular</label>
    <input type="text" class="form-control" name="celular" id="celular"
        value="{{ isset($persona->celular) ? $persona->celular : old('celular') }}" >
</div>

<div class="col-md-3">
    <label for="categoriaId" class="form-label">Categoria</label>
    <select class="form-select" name="categoriaId" id="categoriaId" >
        <option selected disabled value="">Elegir...</option>
        @foreach($categorias as $categoria)
        <option value=" {{ $categoria->id }} " {{ isset($persona->categoriaId) ? $persona->categoriaId == $categoria->id ? 'selected' : '' : '' }} > {{ $categoria->categoria }} </option>
        @endforeach
    </select>
</div>

<div class="col-12">
    <button class="btn btn-success" type="submit">{{ $accion }}</button>
    <a class="btn btn-primary" href="{{ url('persona/') }}">Regresar</a>
</div>
