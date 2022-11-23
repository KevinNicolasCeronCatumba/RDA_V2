@extends('layouts/contentNavbarLayout')

@section('title', 'Eventos')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.js"></script>

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">

        <div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
              <div class="float-left">
                <h1>Eventos </h1>
              </div>


          <a type="button" class="btn btn-outline-primary"  href="{{ route('eventos.create') }}"><i class="bi bi-plus-circle"></i>&nbsp;Crear evento</a>

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

        <div class="divider divider-dotted" style="margin: 5%; margin-top: 1%; margin-bottom:1%">
          <div class="divider-text"></div>
        </div>
                    <table class="table table-hover table-striped" id="dataEv">
                        <thead>
                           <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Terreno</th>
                            <th>Hora Inicio</th>
                            <!--<th>Reporte</th>-->
                            <!--<th>N° arboles</th>-->
                            <th>Tipo</th>
                            <!--<th>Logistico</th>-->
                            <th>Estado</th>
                            <th colspan="4">Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($eventos as $e)
                           <tr>
                            <td>{{ $e -> id }}</td>
                            <td>{{ $e -> fechaEve }}</td>
                            <td>{{ $e -> Terreno -> nomTer }}</td>
                            <td>{{ $e -> horaIniEve }}</td>
                            <!--<td>{{ $e -> reporteEve }}</td>-->
                            <!--<td>{{ $e -> numArbEve }}</td>-->
                            <td>{{ $e -> tipEve }}</td>
                            <!--<td>{{ $e -> Usuario -> nombre }}</td>-->
                            <td>{{ $e -> estEve }}</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detalleEve{{ $e -> id}}">Detalles</button></td>

                            <td>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                              <a role="button" class="btn btn-outline-warning btn-sm" href="{{  route('eventos.edit', $e) }}"
                                  onclick="return confirm('Estás seguro que quieres editar este evento?');">
                                  <i class="bi bi-pencil"></i></a>


                              <form action="{{ route('eventos.destroy', $e ) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Estás seguro que quieres eliminar este evento?');"><i class="bi bi-trash"></i></button>
                              </form>

                              <a href="{{ route('descargarPDF', $e) }}" class="btn btn-outline-info btn-sm" target="_blank">Imprimir PDF</a></td>

                            </div></td>
                           </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="detalleEve{{ $e -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Evento N° {{ $e -> id}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <b>Fecha:</b> {{ $e -> fechaEve}}<br>
                                    <b>Terreno:</b>{{ $e -> Terreno -> nomTer }}<br>
                                    <b>Hora:</b>{{ $e -> horaIniEve }}<br>
                                    <b>N° Arboles:</b>{{ $e -> numArbEve}}<br>
                                    <b>Encargado de Logistica:</b>{{ $e -> Usuario -> nombre }}<br>
                                    <b>Estado:</b>{{ $e -> estEve}}<br>

                                </div>
                                <div class="modal-footer">
                                  <a role="button" class="btn btn-primary" href="{{ route('grupos.organize', Crypt::encrypt($e->id)) }}">
                                    Voluntarios</a>

                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                      <a role="button" class="btn btn-outline-primary" href="{{ route('grupos.asistencia', Crypt::encrypt($e->id)) }}">
                                          Asistencia</a>

                                    <div>

                                <a href="{{ url('detallerecursos', $e -> id)}}" class="btn btn-primary">Recursos</a>

                                <a href="{{ url('observaciones', $e -> id)}}" class="btn btn-primary">Observaciones</a>
                                </div>
                                </div>
                            </div>
                            </div>
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
                  var datat=document.querySelector("#dataEv");
                  var dataTable=new DataTable("#dataEv",{
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
