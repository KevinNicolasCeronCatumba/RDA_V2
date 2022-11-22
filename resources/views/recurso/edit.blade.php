@extends('layouts/contentNavbarLayout')

@section('title', 'Recursos')

@section('content')

<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0 text-primary ">Editar recurso</h4>
      </div>
      <div class="card-body">

        <form method="POST" action="{{ route('recursos.update', $recurso) }}" >
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label class="form-label" for="nombre">Nombre</label>
              <div class="input-group input-group-merge">
                <span id="nombre" class="input-group-text"><i class="bx bx-user"></i></span>
                <input type="text" class="form-control" id="nomRec" name="nomRec" value="{{ old('nomRec', $recurso -> nomRec) }}"/>
              </div>
                <div class="form-text text-danger">{{ $errors->first('nomRec') }}</div>
            </div>


            <label class="form-label">Tipo</label>
            <select name="tipRec" class="form-select">
              <option value="">Elija el tipo de recurso</option>
              <option value="0" {{ $recurso -> tipRec == '0' ? 'selected' : '' }}>Herramienta</option>
              <option value="1" {{ $recurso -> tipRec == '1' ? 'selected' : '' }}>Insumo</option>
              <option value="2" {{ $recurso -> tipRec == '2' ? 'selected' : '' }}>Infraestructura</option>
              <option value="3" {{ $recurso -> tipRec == '3' ? 'selected' : '' }}>Tecnologia</option>
              <option value="4" {{ $recurso -> tipRec == '4' ? 'selected' : '' }}>Otro</option>
            </select>
            <div class="form-text text-danger">{{ $errors->first('tipRec') }}</div>

            <label class="form-label" for="descripcion">Uso</label>
            <select name="usoRec" class="form-select">
              <option value="">Elija el uso del recurso</option>
              <option value="0" {{ $recurso -> usoRec == '0' ? 'selected' : '' }}>Consumible</option>
              <option value="1" {{ $recurso -> usoRec == '1' ? 'selected' : '' }}>Recurso</option>
            </select>
            <div class="form-text text-danger">{{ $errors->first('usoRec') }}</div>

            <div class="mb-3">
              <label class="form-label" for="descripcion">Cantidad</label>
              <div class="input-group input-group-merge">
                <span id="descripcion" class="input-group-text"><i class="bx bxs-grid"></i></span>
                <input type="number" class="form-control" id="nomRec" name="cantRec" value="{{ old('cantRec', $recurso -> cantRec) }}"/>
              </div>
                <div class="form-text text-danger">{{ $errors->first('cantRec') }}</div>
            </div>

            <label class="form-label" for="descripcion">Estado</label>
            <select name="estRec" class="form-select">
              <option value="1" {{ $recurso -> estRec == '1' ? 'selected' : '' }}>Activo</option>
              <option value="0" {{ $recurso -> estRec == '0' ? 'selected' : '' }}>Inhabilitado</option>
            </select>
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
