@extends('layouts/contentNavbarLayout')

@section('title', 'Voluntarios')

@section('content')

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">

        <div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
              <div class="float-left">
                <h1>Voluntario </h1>
              </div>

              <a href="{{ url()->previous() }}">Regresar</a>

              <div>
                <input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Voluntarios">
              </div>

              <a type="button" class="btn btn-outline-primary"  href="{{ route('voluntarios.create')}}"><i class="bi bi-plus-circle"></i> Agregar Voluntario</a>

					</div>

          @if ($message = Session::get('success'))

          <div class="alert alert-primary alert-dismissible" style="padding: 10px; margin:10px" role="alert">
            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">{{ $message }} </h6>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>

          @endif

				</div><br>

        <div class="card-body">

            <div class="table-responsive">
              <table class="table table-hover table-striped">
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



@endsection
