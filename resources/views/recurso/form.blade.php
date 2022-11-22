@extends('layouts/contentNavbarLayout')

@section('title', 'Recursos')

@section('content')

<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0 text-primary ">Agregar recurso</h4>
      </div>
      <div class="card-body">

        <form method="POST" action="{{ route('recursos.store') }}" >
            @csrf
            <div class="mb-3">
              <label class="form-label" for="nombre">Nombre</label>
              <div class="input-group input-group-merge">
                <span id="nombre" class="input-group-text"><i class="bx bx-user"></i></span>
                <input type="text" class="form-control" id="nomRec" name="nomRec" value="{{ old('nombre') }}"/>
              </div>
                <div class="form-text text-danger">{{ $errors->first('nomRec') }}</div>
            </div>

            <label class="form-label">Tipo</label>
            <select name="tipRec" class="form-select">
              <option value="">Elija el tipo de recurso</option>
              <option value="0">Herramienta</option>
              <option value="1">Insumo</option>
              <option value="2">Infraestructura</option>
              <option value="3">Tecnología</option>
              <option value="4">Otro</option>
            </select>
            <div class="form-text text-danger">{{ $errors->first('tipRec') }}</div>

            <label class="form-label">Uso</label>
            <select name="usoRec" class="form-select">
              <option value="">Elija el uso del recurso</option>
              <option value="0">Consumible</option>
              <option value="1">Recurso</option>
            </select>
            <div class="form-text text-danger">{{ $errors->first('usoRec') }}</div>

            <div class="mb-3">
              <label class="form-label">Cantidad</label>
              <div class="input-group input-group-merge">
                <span id="descripcion" class="input-group-text"><i class="bx bxs-grid"></i></span>
                <input type="number" class="form-control" id="nomRec" name="cantRec" value="{{ old('cantRec') }}"/>
              </div>
                <div class="form-text text-danger">{{ $errors->first('cantRec') }}</div>
            </div>

            <label class="form-label">Estado</label>
            <select name="estRec" class="form-select">
              <option value="1">Activo</option>
              <option value="0">Inhabilitado</option>
            </select>
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
