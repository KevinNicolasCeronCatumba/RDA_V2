
  @extends('layouts/contentNavbarLayout')

  @section('title', 'Voluntarios')

  @section('content')

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="mb-0 text-primary ">Editar obervación</h4>
        </div>
        <div class="card-body">

        <form method="POST" action="{{ route('observaciones.update',  $observacione ->id ) }}" :observacione="$observacione">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label class="form-label" for="descripcion">Descripción</label>
              <div class="input-group input-group-merge">
                <span id="descripcion" class="input-group-text"><i class="bx bx-comment-detail"></i></span>
                <textarea  class="form-control" name="descripcion" rows="3"> {{ Request::old('descripcion', $observacione->descripcion ) }}</textarea>
              </div>
                <div class="form-text text-danger">{{ $errors->first('descripcion') }}</div>
            </div>


           <!-- <div class="mb-3">
              <select class="form-select" name="tipoObservacion" id="tipoObservacion" id="bs-validation-country">
                  <option value="" selected>Seleccione el tipo de observación</option>
                  <option value="evento" {{  $observacione->tipoObservacion == 'evento' ? 'selected' : '' }}>Evento</option>
                  <option value="logistica" {{ $observacione->tipoObservacion== 'logistica' ? 'selected' : '' }}>Logística</option>
                  <option value="voluntarios" {{ $observacione->tipoObservacion == 'voluntarios' ? 'selected' : '' }}>Voluntarios</option>
                  <option value="recursos" {{ $observacione->tipoObservacion == 'recursos' ? 'selected' : '' }}>Recursos</option>
                  <option value="terreno" {{ $observacione->tipoObservacion == 'terreno' ? 'selected' : '' }}>Terreno</option>
                </select>
                <div class="form-text text-danger">{{ $errors->first('tipoObservacion') }}</div>
              </div> <br>-->


                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection


