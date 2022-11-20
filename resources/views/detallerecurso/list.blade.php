@extends('layouts/contentNavbarLayout')

@section('title', 'DetalleRecursos')

@section('content')

  <link rel="stylesheet"  href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.js"></script>  

      <h1>Asignar Recursos</h1>

      <div class="row">
            <div class="col-lg-7 mb-4 order-0">
                <div class="card text-center">
                  <div class="col-sm-12">
                    <div class="card-body">
                      <h3>Recursos Disponibles</h3>
                        <div class="mb-3">
                        <form method="post" action="{{ route('detallerecursos.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!--<label class="form-label">Tipo Recurso</label>
                        <select name="recurso" class="form-select">
                              @foreach($recursos as $r)
                                <option value="{{ $r -> tipRec }}">{{ $r -> tipRec == 0 ? 'Herramienta' : ($r -> tipRec == 1 ? 'Insumo' : 
                                    ($r -> tipRec == 2 ? 'Infraestructura' : ($r -> tipRec == 3 ? 'Tecnología' : 'Error' ))) }}</option>
                              @endforeach
                        </select>-->

                        <table class="table-responsive table-hover" id="dataRec">
                          <thead>
                            <tr>
                              <th>Nombre</th>
                              <th>Tipo</th>
                              <th>Uso</th>
                              <th style="text-align: center">Agregar</th>
                            </tr>
                          </thead>
                          <tbody style="text-align: left;">
                            @foreach($recursos as $r)
                            <tr>
                               <td>{{ $r -> nomRec }}</td>               
                               <td>{{ $r -> tipRec == 0 ? 'Herramienta' : ($r -> tipRec == 1 ? 'Insumo' : 
                                    ($r -> tipRec == 2 ? 'Infraestructura' : ($r -> tipRec == 3 ? 'Tecnología' : 
                                    ($r -> tipRec == 4 ? 'Otro' : 'Error' )))) }}</td>
                               <td>{{ $r -> usoRec == 0 ? 'Consumible' : 'Recurso' }} </td>
                               <td style="text-align: center"><input type="radio" class="form-check-input" name="recurso" value="{{ $r -> id }}"></td>
                            </tr>
                            @endforeach
                            <div class="form-text text-danger">{{ $errors->first('recurso') }}</div>
                          </tbody>
                        </table>

                        <input type="hidden" name="evento" value="{{ $evento -> id }}">

                        <div class="mb-3 row">
                          <label class="col-md-2 col-form-label">Cantidad</label>
                          <div class="col-md-10">
                            <div class="input-group input-group-merge">
                            <span id="descripcion" class="input-group-text"><i class="bx bxs-grid"></i></span>  
                            <input type="number" class="form-control" name="cantidad"/>
                            </div>
                          </div>
                          <div class="form-text text-danger">{{ $errors->first('cantidad') }}</div>
                        </div>
                          <button type="submit" class="btn btn-success" value="Registrar">Agregar</button>
                        </form>
                      </div>    
                    </div>
                  </div>
                </div>
            </div>
            
            <div class="col-lg-5 mb-4 order-0">
                <div class="card" style="height: 500px">
                  <div class="col-sm-12">
                    <div class="card-body">
                      <h4>Recursos Asignados</h4>
                      <p>( Evento #{{ $evento -> id }} )</p>
                      <div id="card-overflow">

                        <h5>Herramientas</h5>
                          <table class="table table-borderless">
                            @foreach($herramienta as $h)
                              <tr>
                                <td><li>{{ $h -> nomRec }} </li></td>
                                <td>{{ $h -> cantidad }} Und.</td>
                                <td><form action="{{ route('detallerecursos.destroy', $h -> id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro que quieres eliminar este recurso?');"><i class="bi bi-trash"></i></button>
                                </form></td>
                              </tr>
                            @endforeach
                          </table>
                        
                      <h5>Insumos:</h5>
                      <table class="table table-borderless">
                            @foreach($insumo as $i)
                              <tr>
                                <td><li>{{ $i -> nomRec }} </li></td>
                                <td>{{ $i -> cantidad }} Und.</td>
                                <td><form action="{{ route('detallerecursos.destroy', $i -> id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro que quieres eliminar este recurso?');"><i class="bi bi-trash"></i></button>
                                </form></td>
                              </tr>
                            @endforeach
                          </table>

                      <h5>Infraestructura:</h5>
                      <table class="table table-borderless">
                            @foreach($infra as $in)
                              <tr>
                                <td><li>{{ $in -> nomRec }} </li></td>
                                <td>{{ $in -> cantidad }} Und.</td>
                                <td><form action="{{ route('detallerecursos.destroy', $in -> id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro que quieres eliminar este recurso?');"><i class="bi bi-trash"></i></button>
                                </form></td>
                              </tr>
                            @endforeach
                          </table>
                      
                      <h5>Tecnologia:</h5>
                      <table class="table table-borderless">
                            @foreach($tec as $t)
                              <tr>
                                <td><li>{{ $t -> nomRec }} </li></td>
                                <td>{{ $t -> cantidad }} Und.</td>
                                <td><form action="{{ route('detallerecursos.destroy', $t -> id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro que quieres eliminar este recurso?');"><i class="bi bi-trash"></i></button>
                                </form></td>
                              </tr>
                            @endforeach
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
      </div>

      <script>
        var datat=document.querySelector("#dataRec"); 
        var dataTable=new DataTable("#dataRec",{ 
        perPage:5,
        PerPageSelect:[5, 10, 20],
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
