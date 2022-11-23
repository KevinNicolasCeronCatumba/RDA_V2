@extends('layouts/contentNavbarLayout')

@section('title', 'Terrenos')

@section('content')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

        <h1>Terrenos</h1>
        <a href="{{ route('terrenos.create') }}"><i class="bi bi-plus-circle"></i>&nbsp;Agregar</a>
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
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Descripción</th>
                            <th>Extensión</th>
                            <th>Ter. Disp (%)</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th colspan="2">Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($terrenos as $t)
                           <tr>
                            <td>{{ $t -> id }}</td>
                            <td>{{ $t -> nomTer }}</td>
                            <td>{{ $t -> ciudadTer }}</td>
                            <td>{{ $t -> descTer }}</td>
                            <td>{{ $t -> extensionTer }}</td>
                            <td>{{ $t -> terDispTer }}</td>
                            <td>{{ $t -> tipTer }}</td>
                            <td>{{ $t -> estTer }}</td>
                            <td>

                              <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <a role="button" class="btn btn-outline-warning btn-sm" href="{{ route('terrenos.edit', $t ) }}"
                                onclick="return confirm('Estás seguro que quieres editar este usuario?');">
                                <i class="bi bi-pencil"></i></a>

                                <form action="{{ route('terrenos.destroy', $t ) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-outline-danger btn-sm" type="submit" onclick="borrar(event,' $t','terreno')"><i class="bi bi-trash"></i></button>
                              </form>

                              </div>
                            </td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>

                <script>
                    function borrar(e, cod, cont) {
                        e.preventDefault();
                        console.log(cont);

                        Swal.fire({
                        title: '¿Está seguro de eliminar este registro?',
                        text: "Está acción sera permanente",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si',
                        cancelButtonText: 'No'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                ruta = "{{ route('terrenos.destroy') "+ cod;
                                console.log(ruta)
                                Swal.fire({
                                    position: 'middle',
                                    icon: 'success',
                                    title: 'el registro a sido eliminado con exito'
                                    showConfirmButton: false,
                                    timer: 1500
                            })
                            } else {
                                Swal.fire(
                                    '¡Cancelado!',
                                    'Se ha cancelado la eliminación',
                                    'error'
                                );
                            }
                        })
                    }
                        
                </script>


@endsection
