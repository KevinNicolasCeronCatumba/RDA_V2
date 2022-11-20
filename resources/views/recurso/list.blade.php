@extends('layouts/contentNavbarLayout')

@section('title', 'Recursos')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

  <div class="row">
    <div class="col-lg-10 order-0">
      <h1>Recursos</h1>
    </div>
    <div class="col-lg-2 order-0">
      <a type="button" class="btn btn-outline-success" href="{{ route('recursos.create')}}"><i class="bi bi-plus-circle"></i>&nbsp;Agregar</a>
    </div>
  </div>

    @if ($message = Session::get('success'))
        <script>
            const Toast = Swal.mixin({ toast: true, position: 'bottom-end', showConfirmButton: false, timer: 3000, timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)}
            })
            Toast.fire({ icon: 'success', title: '{{ $message }}' })
        </script>
    @endif

    <div class="card">
    <div class="table-responsive">
      <table class="table table-hover table-striped" id="dataRec">
        <thead>
          <tr>
            <!--<th>Id</th>-->
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Uso</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($recursos as $r)

          <tr >
              <!--<td>{{ $r -> id }}</td>-->
              <td>{{ $r -> nomRec }}</td>

              <td>{{ $r -> tipRec == 0 ? 'Herramienta' : ($r -> tipRec == 1 ? 'Insumo' : 
                    ($r -> tipRec == 2 ? 'Infraestructura' : ($r -> tipRec == 3 ? 'Tecnología' : 
                    ($r -> tipRec == 4 ? 'Otro' : 'Error' )))) }}</td>
                
              <td>{{ $r -> usoRec == 0 ? 'Consumible' : 'Recurso' }}</td>
              
              <td>{{ $r -> cantRec }} und</td>

              <td>{{ $r -> estRec == 0 ? 'Inhabilitado' : 'Activo' }}</td>
          
              <td>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                  <a role="button" class="btn btn-outline-warning btn-sm" href="{{ route('recursos.edit', $r) }}"
                      onclick="return confirm('Estás seguro que quieres editar este recurso?');">
                      <i class="bi bi-pencil"></i></a>

                      &nbsp;&nbsp;
                  <form action="{{ route('recursos.destroy', $r) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Estás seguro que quieres eliminar este recurso?');"><i class="bi bi-trash"></i></button>
                  </form>
                <div>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <script>

    var datat=document.querySelector("#dataRec"); 
    var dataTable=new DataTable("#dataRec",{ 
      perPage:10,
      PerPageSelect:[5,10,20],
      labels: {
          placeholder: "Buscar",
          perPage: "{select}  Registros por página",
          noRows: "No se encontraron registros",
          info: "Mostrando {start} - {end} de {rows} registros",
      }
    } ) ;

</script>

@endsection
