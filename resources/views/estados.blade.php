<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!--Imprime la vista que se enviara al correo-->


<div class="card" style="border: rgb(27, 138, 73) 5px solid; border-radius: 15px;">
    <div class="card-body "style="color: #000000">
        <br><br>
        <img src="public/img/logo.jpg" width="100px;"
        height="100px;">

<h2 class="card-title">PQRSD</h2>
<h3 class="card-subtitle mb-2 text-muted">Bienvenido {{auth()->user()->name}}
</h3>

<br>
<h3>Su solicitud con Radicado N° <b>{{$dat['nro_solicitud']}}</b> se encuentra en estado <b> {{$dat['estado']}}</b>, se enviara una notificacion pormedio de correo electronico del registro de solicitud con su respectivo estado y novedad.</h3>
<br>
<h3>Atentamente</h3>
<h3>Taller Bolivar</h3>

</div>
</div>

<span class="border border-primary"></span>

