@extends('layouts/contentNavbarLayout')

@section('title', 'Voluntarios')

@section('content')

<div class="container">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style1">
      <li class="breadcrumb-item">
        <a href="{{ route('voluntarios.index') }}">Lista voluntarios</a>
      </li>
      <li class="breadcrumb-item active">Registro</li>
    </ol>
  </nav>


  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">

          <div class="divider divider-dotted divider-primary" style="margin: 5%; margin-top: 0%; margin-bottom:0%">
            <div class="divider-text text-primary">Nuevo voluntario</div>
          </div>

          <div class="card-body">

            <form method="POST" action="{{ route('voluntarios.store') }}">
                @csrf

              <div class="row g-2">
                <div class="col mb-0">
                  <label class="form-label" for="nombre">Nombre</label>
                  <div class="input-group input-group-merge">
                    <span id="nombre" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" aria-describedby="nombre" />
                  </div>
                    <div class="form-text text-danger">{{ $errors->first('nombre') }}</div>
                </div>


                <div class="col mb-0">
                  <label class="form-label" for="apellido">Apellido</label>
                  <div class="input-group input-group-merge">
                    <span id="apellido" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}"  />
                  </div>
                    <div class="form-text text-danger">{{ $errors->first('apellido') }}</div>
                </div>
              </div><br>


              <div class="row g-2">
                <div class="col mb-0">
                  <label class="form-label" for="Nomdoc">Número de documento</label>
                  <div class="input-group input-group-merge">
                    <span id="Nomdoc" class="input-group-text"><i class="bx bxs-user-detail"></i></span>
                    <input type="number" class="form-control" id="numDoc" name="numDoc" value="{{ old('numDoc') }}"  />
                  </div>
                    <div class="form-text text-danger">{{ $errors->first('numDoc') }}</div>
                </div>

                <div class="col mb-0 form-group">
                  <label class="form-label" for="Nomdoc">Tipo de documento</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoDoc" id="inlineRadio1" value="TI" {{ old('tipoDoc') == 'TI' ? 'checked':'' }}  >
                        <label class="form-check-label" for="inlineRadio1">TI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoDoc" id="inlineRadio2" value="CC" {{ old('tipoDoc') == 'CC' ? 'checked':'' }}  >
                        <label class="form-check-label" for="inlineRadio2">CC</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoDoc" id="inlineRadio3" value="CE" {{ old('tipoDoc') == 'CE' ? 'checked':'' }} >
                        <label class="form-check-label" for="inlineRadio3">CE</label>
                    </div>
                        <div class="form-text text-danger">{{ $errors->first('tipoDoc') }}</div>
                </div>
              </div><br>

              <div class="row g-2">
                <div class="col mb-0">
                  <label class="form-label" for="correo">Correo</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                    <input type="text" for="correo" class="form-control" id="correo" name="correo" value="{{ old('correo') }}"/>
                    <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                  </div>
                  <div class="form-text text-danger">{{ $errors->first('correo') }}</div>
                </div>

                <div class="col mb-0">
                  <label class="form-label" for="telefono">Teléfono</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-phone"></i></span>
                    <input type="number" for="telefono" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}"/>
                  </div>
                  <div class="form-text text-danger">{{ $errors->first('telefono') }}</div>
                </div>
              </div><br><br>
              <center>
                    <button type="submit" class="btn btn-primary">Guardar</button></center>
              </form>
          </div>

        </div>
      </div>

    </div>

  </div>

</div>

@endsection
