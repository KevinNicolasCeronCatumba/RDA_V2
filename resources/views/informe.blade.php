<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Evento</title>
</head>
<body>
    @foreach($evento as $e)
        <h1>Evento #{{ $e -> id}}</h1>
        <p>Información del evento:</p>
            <b>Fecha: </b>{{ $e -> fechaEve }}  <br>
            <b>Hora de Inicio: </b>{{ $e -> horaIniEve }} <br>
            <b>N° de Arboles: </b>{{ $e -> numArbEve }} <br>
            <b>Tipo de Evento: </b> {{ $e -> tipEve }} <br>

        <p><b>Ubicación:</b></p>

        <sapn>Terreno: </span>{{ $e -> Terreno -> nomTer }} <br>
        {{ $e -> Terreno -> descTer }} <br>
        Tipo: {{ $e -> Terreno -> tipTer }}

        <p><b>Encargado Lógistica:<b></p> 
        <b>Nombre: </b>{{ $e -> Usuario -> nombre." ". $e -> Usuario -> apellido }} 
        <b>Documento: </b>{{ $e -> Usuario -> tipo_doc. ": ". $e -> Usuario -> num_doc}}
        <b>Telefono: </b>{{ $e -> Usuario -> telefono }}
    @endforeach

    <h2>Recursos Asignados</h2>
    <h3>Herramientas</h3>
        @foreach($herramienta as $h)
          <b>{{ $h -> nomRec }}</b>
          <span>{{ $h -> cantidad }} Und.</span>
          <span>Uso: </span>{{ $h -> usoRec == 0 ? 'Consumible' : 'Recurso' }} <br>
        @endforeach
    <h3>Insumos</h3>
        @foreach($insumo as $i)
          <b>{{ $i -> nomRec }}</b>
          <span>{{ $i -> cantidad }} Und.</span>
          <span>Uso: </span>{{ $i -> usoRec == 0 ? 'Consumible' : 'Recurso' }} <br>
        @endforeach
    <h3>Infraestructura</h3>
        @foreach($infra as $in)
          <b>{{ $in -> nomRec }}</b>
          <span>{{ $in -> cantidad }} Und.</span>
          <span>Uso: </span>{{ $in -> usoRec == 0 ? 'Consumible' : 'Recurso' }} <br>
        @endforeach
    <h3>Tecnologia</h3>
        @foreach($tec as $t)
          <b>{{ $t -> nomRec }}</b>
          <span>{{ $t -> cantidad }} Und.</span>
          <span>Uso: </span>{{ $t -> usoRec == 0 ? 'Consumible' : 'Recurso' }} <br>
        @endforeach
    <h3>Otros</h3>
        @foreach($otros as $o)
          <b>{{ $o -> nomRec }}</b>
          <span>{{ $o -> cantidad }} Und.</span>
          <span>Uso: </span>{{ $o -> usoRec == 0 ? 'Consumible' : 'Recurso' }} <br>
        @endforeach
</body>
</html>