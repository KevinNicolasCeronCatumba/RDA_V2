@extends('layouts/contentNavbarLayout')

@section('title', 'Voluntarios')

@section('content')

@section('content')

<link rel="stylesheet"  href="{{ asset('css/style.css') }}">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.js"></script>




<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">

        <div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
              <div class="float-left">
                <h1>Voluntarios </h1>
              </div>

              <!--<a href="{{ url()->previous() }}">Regresar</a>-->


              <a type="button" class="btn btn-outline-primary"  href="{{ route('voluntarios.create')}}"><i class="bi bi-plus-circle"></i> Agregar Voluntario</a>

					</div>

          @if ($message = Session::get('success'))

            <script>
              const Toast = Swal.mixin({ toast: true, position: 'bottom-end', showConfirmButton: false, timer: 3000, timerProgressBar: true,
              didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
              })

              Toast.fire({ icon: 'success', title: '{{ $message }}' })
            </script>

          @endif

				</div>

        <div class="divider divider-dotted" style="margin: 5%; margin-top: -2%; margin-bottom:0%">
          <div class="divider-text"></div>
        </div>

        <div class="card-body">

            <div class="table-responsive">
              <table class="table table-hover table-striped" id="dataVo">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo de Doc</th>
                    <th>telefono</th>
                    <th>correo</th>
                    <th>Num Documento</th>
                    <th>acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($voluntarios as $voluntario)

                  <tr >
                      <td>{{ $voluntario -> id }}</td>
                      <td>{{ $voluntario -> nombre }}</td>
                      <td>{{ $voluntario -> apellido }}</td>
                      <td>{{ $voluntario -> tipoDoc}}</td>
                      <td>{{ $voluntario -> numDoc }}</td>
                      <td>{{ $voluntario -> correo }}</td>
                      <td>{{ $voluntario -> telefono }}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                          <a role="button" class="btn btn-outline-warning btn-sm" href="{{ route('voluntarios.edit', $voluntario) }}"
                              onclick="return confirm('Estás seguro que quieres editar este voluntario?');">
                              <i class="bi bi-pencil"></i></a>


                          <form action="{{ route('voluntarios.destroy', $voluntario) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Estás seguro que quieres eliminar este voluntario?');"><i class="bi bi-trash"></i></button>
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
</div>

<script>
  var datat=document.querySelector("#dataVo");
  var dataTable=new DataTable("#dataVo",{
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
