@extends('layouts/contentNavbarLayout')

@section('title', 'Grupos')

@section('content')

<h4 class="fw-bold py-3 mb-4">

  <a type="button" class="btn btn-icon me-2 btn-outline-primary btn-sm"  href="{{ route('eventos.index')}}"><i class="bx bx-chevrons-left"></i></a>
  <span class="text-muted fw-light">Toma de asistencia /</span> Evento N°{{$evento->id}}
</h4>

<div class="container">


  <div class="row">
    <div class="col-10">

      <div class="card">
        <h5 class="card-header">Voluntarios del evento</h5>
        <div class="card-body">
          @if ($grupo->count()>0)
            <div class="table-responsive">
              <table class="table table-hover table-striped table-borderless table-sm">
                <thead class="border-bottom ">
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>N.Documento</th>
                    <th>Tipo</th>

                    <th class="text-nowrap text-center">Asistencia</th>
                  </tr>
                </thead>
                <tbody>

                  <form action="{{ route('grupos.asi', $evento->id ) }}" method="POST">

                  @foreach ($grupo as $g)

                  <tr >

                      <td >{{ $g-> nombre }}</td>
                      <td >{{ $g -> apellido }}</td>
                      <td >{{ $g -> numDoc }}</td>
                      <td >{{ $g -> tipoDoc}}</td>
                      <td>

                        @csrf

                        <div class="form-check d-flex justify-content-center">
                          <input class="form-check-input" type="checkbox" name="checkbox[]" value="{{ $g->id }}"/>
                        </div>

                      </td>
                  </tr>


                  @endforeach

                  <button class="btn btn-primary btn-sm" type="submit">Guardar</button>

                </form>

                </tbody>
              </table>


          </div>

          @else

          <p>No exite la asistenica</p>

          @endif

        </div>
      </div>

    </div>

  </div>

</div>
@endsection
