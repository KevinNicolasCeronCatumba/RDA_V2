@extends('layouts/contentNavbarLayout')

@section('title', 'Eventos')

@section('content')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

        <h1>Eventos</h1>
        <a href="{{ route('eventos.create') }}"><i class="bi bi-plus-circle"></i>&nbsp;Agregar</a>
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

        <hr class="my-5">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
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
                            <th colspan="3">Acciones</th>
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
                            <td><a href="{{ route('eventos.edit', $e ) }}">Modificar</a></td>
                            
                            <td><form action="{{ route('eventos.destroy', $e ) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro que quieres eliminar este evento?');">Eliminar</button>
                            </form></td>

                            <td><a href="{{ route('descargarPDF', $e) }}" target="_blank">Imprimir PDF</a></td>
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
                                <button type="button" class="btn btn-primary">Voluntarios</button>

                                <a href="{{ url('detallerecursos', $e -> id)}}" class="btn btn-primary">Recursos</a>

                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                            </div>
                           @endforeach 
                        </tbody>
                    </table>
                </div>
<li class="list-group-item list-group-item-primary"><a href="../index">Inicio</a></li>
    <script>
        console.log("${cliented}");
        var datat = document.querySelector("#table");
        var dataTable = new DataTable("#table", {
            perPage: 10,
            labels: {
                placeholder: "Busca por un campo...",
                perPage: "{select} registros por página",
                noRows: "No se encontraron registros",
                info: "Mostrando {start} a {end} de {rows} registros",
            }
        });

        <li class="list-group-item list-group-item-primary"><a href="index">Agregar Voluntario</a></li>
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
@endsection
