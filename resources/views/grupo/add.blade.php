@extends('layouts/contentNavbarLayout')

@section('title', 'Grupos')

@section('content')
<link rel="stylesheet"  href="{{ asset('css/style.css') }}">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.css">

<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.js"></script>



<div style="display: flex; justify-content: space-between; align-items: center; padding-top:2%;">
  <h4 class="float-left">
    <a type="button" class="btn btn-icon me-2 btn-outline-primary btn-sm"  href="{{ route('eventos.index')}}"><i class="bx bx-chevrons-left"></i></a>

    <span class="text-muted fw-light">Gestión de voluntarios /</span> Evento N°{{$evento->id}}
  </h4>

</div> <br> <br>

<div class="container">


  <div class="row">
    <div class="col-6">

      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="mb-0 "><b>Voluntarios en el evento</b></h3>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-hover table-sm">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>N.Documento</th>
                  <th>Tipo</th>

                  <th>acciones</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($grupo as $g)

                <tr >
                    <td>{{ $g-> nombre }}</td>
                    <td>{{ $g -> apellido }}</td>
                    <td>{{ $g -> numDoc }}</td>
                    <td>{{ $g -> tipoDoc}}</td>

                    <td>

                      <form action="{{ route('grupos.eliminar', $evento->id) }}" method="POST">
                        @csrf

                        <input type="hidden" name="voluntario" value="{{ $g -> id }}">
                        <button class="btn rounded-pill me-2 btn-outline-danger btn-sm" type="submit"><B>X</B></button>
                      </form>


                    </td>
                </tr>
                @endforeach

              </tbody>
            </table>

        </div>
        </div>
      </div>

    </div>



    <div class="col-6">

      <div class="card">
        <div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4 class="mb-0 ">Añadir voluntarios</h4>
						</div>

					</div>
				</div>

        <div class="card-body">
          <p>Elige el voluntario que deseas agregar al evento:</p><br>

          <div class="table-responsive">
            <table class="table table-hover table-sm" id="dataGru">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>N.Documento</th>
                  <th>Tipo</th>

                  <th>acciones</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($voluntarios as $voluntario)

                <tr >
                    <td>{{ $voluntario -> nombre }}</td>
                    <td>{{ $voluntario -> apellido }}</td>
                    <td>{{ $voluntario -> numDoc }}</td>
                    <td>{{ $voluntario -> tipoDoc}}</td>

                    <td>

                        <form action="{{ route('grupos.guardar', $evento->id) }}" method="POST">
                          @csrf
                          <input type="hidden" name="voluntario" value="{{ $voluntario -> id }}">
                          <button class="btn btn-outline-info btn-sm" type="submit">Agregar</button>
                        </form>

                      </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>

        </div>
      </div>


    </div>

  </div>
</div>

<script>
  var datat=document.querySelector("#dataGru");
  var dataTable=new DataTable("#dataGru",{
    perPage:10,
    sortable: true,
    labels: {
      placeholder: "Buscar",
      perPage: "{select}  Registros por página",
      noRows: "No se encontraron registros",
      info: "Mostrando {start} - {end} de {rows} registros",
  }
} ) ;
</script>



@endsection
