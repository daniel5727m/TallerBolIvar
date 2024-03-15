<!--Imprime la vista que se enviara al correo-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>       
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('css/default.css') }}" />

<!-- <p>{{$dat['cod_tipo_solicitud']}}</p>
<p>{{$dat['cod_estado_solicitud']}}</p>
<p>{{$dat['cod_inmueble']}}</p> -->
<div class="card" style="border: rgb(27, 138, 73) 5px solid; border-radius: 15px;">
    <div class="card-body "style="color: #000000">

    <img src="https://www.lonjadesantander.com/wp-content/uploads/2018/03/esteban_rios-300x300.jpg" width="200px;"
        height="200px;"style="align:left;">

<h2 class="card-title">PQRSD</h2>
<h3 class="card-subtitle mb-2 text-muted">Bienvenido {{auth()->user()->name}}
</h3> 
<h3>haz solicitado la solicitud de <b>{{$dat['nom_tipo_solicitud']}} en el Taller Bolivar</h3>
<br>
<h3>Su solicitud con Radicado N° <b>{{$dat['nro_solicitud']}}</b> se encuentra en estado <b> {{$dat['nom_estado_solicitud']}}</b>, se enviara una notificacion pormedio de correo electronico del registro de solicitud con su respectivo estado y novedad.</h3>
<br>
<h3>Atentamente</h3>
<h3>Taller Bolivar</h3>

</div>
</div> 


<style>
.card-body{
    justify-content:center;
    position: center;
    border: #31555E 3px solid;
    border-radius: .90rem;
    color: #31555E;
    border-top-color: red;
}
.card {
    margin: 0 auto; /* Added */
    float: none; /* Added */
    margin-bottom: 3px; /* Added */
    border-color: 599C9C;
    border-radius: .90rem;
    border: 3px solid;
    color: #0f501f;
    border-top-color: red;
}

.im {
    color: #0e0d0e;
}
div.card {
    margin: 0 auto; /* Added */
    float: none; /* Added */
    margin-bottom: 5px; /* Added */
    border-color: #31555E;
    border-radius: .90rem;
    border: 3px solid;
    color: 599C9C;
    border-top-color: red;
}
label{
    text-align:center;
    color: #141414;
}
 h5.card-title{
    text-align:center;   
 }
 button.btn
{

    /* background: linear-gradient(#31555E, #599C9C, #808080);  */
    background-color: 599C9C; 
    border-radius: .30rem; 
    width: 100%;
    color: #fff;
    position: center;
    margin: 0 auto; /* Added */
    float: none; /* Added */
}

img{
    width: 180px; height: 180px;
    display:block;
    margin:auto;
  }

  nav.navbar.navbar-expand-lg {
    background: linear-gradient(#31555E, #599C9C, #808080);   
  }

  div.card-header {
    background: linear-gradient(#31555E, #599C9C, #808080);   
    color: #31555E;
    border-radius: .40rem; 
    text-align:center;
  }
  a.nav-link{
    color: #fff;
  }
  a.nav-link.q{
    color: rgb(20, 20, 20);
  }

  a.navbar-brand{
    color: #fff;
    text-align:center;
    margin: 0;
  }
  p{
    color: rgb(17, 17, 17);
  }
  a.link-primary{
    text-align:center;
  }

  nav.main-header.navbar.navbar-expand {

    background: linear-gradient(#31555E, #599C9C, #808080);   
    margin: 0;
    
  }
  aside{
    
      background:  #fbfdfb ;   
      
  }
  a.brand-link{
    background: linear-gradient(#31555E, #599C9C, #808080);   
    display:block;
    margin:auto;
    color: #fff;
  }
  button.btn.btn-sm{
    width: 100%;
    color: #fff;
    position: center;
    
  }

  input.btn.btn-primary{
    width: 100%;
    color: #fff;
    position: center;
    background-color: #31555E; 
    
  }
  button#show_password.btn{
    width: 10%;
    color: #fff;
    position: center;
    background-color: #31555E; 

  }

  div.input-group-append{
   
    border-radius: 10px;
    border: 1px solid 599C9C;
    width: 100%;
    background-color: #31555E;
    color: rgb(105, 104, 104);
  }

  input.btn{
    width: 30%;
    color: #fff;
    position: center;
    text-align:center;
    background-color: #31555E; 
    display:block;
    margin:auto;
  }
  a.btn.btn-link{
    position: center;
    margin:auto;
    text-align:center;
  }

  ::placeholder {
    color: rgb(243, 23, 23);
    font-size: 1.5em;
    font-style: italic;
}
button.btn.btn-warning{
  width: 17%;
  color: #fff;
  position: center;
  background-color: #31555E; 
}

button.btn.btn-danger{
  width: 21%;
  color: #fff;
  position: center;
  background-color: #31555E; 
}
th{
  color: rgb(10, 10, 10);
}
td{
  color: rgb(10, 10, 10);
}
I.fas.fa-bars{
  color: rgb(255, 255, 255);
}
#text
{
  color: rgb(255, 255, 255);
}
div.card-header{
  color: rgb(8, 99, 53);
}
h2{
  color: rgb(17, 80, 36);
}

</style>

