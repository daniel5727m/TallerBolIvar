<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/stilo.css') }}" />
<!-- Scrip para icono de visualizar contraseña -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Navbar -->
  <nav class="main-header navbar-fixed navbar navbar-expand ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>


    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

 <!-- Right Side Of Navbar -->
 <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <!-- <a class="dropdown-item" href="{{ url('/perfil') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('perfil-form').submit();">
                                        {{ __('Mi perfil') }}
                                    </a>

                                    <form id="perfil-form" action="{{ url('/perfil') }}" method="GET" class="d-none">
                                        @csrf
                                    </form> -->

                                    <a class="dropdown-item" href="{{ url('/perfil') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('perfil-form').submit();">
                                        <i class="fas fa-user-circle"></i> {{ __('Mi perfil') }}
                                    </a>

                                    <form id="perfil-form" action="{{ url('/perfil') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         <i class="fas fa-sign-out-alt"></i> {{ __('Salir') }}
                                         <!-- Botón de imprimir -->
<a id="boton-imprimir" class="dropdown-item btn btn-secondary" style="display: none;" onclick="window.print()">
    <i class="fa fa-print"></i> Imprimir
</a>

<!-- Script JavaScript para mostrar el botón de imprimir -->
<script>
    // Obtener la parte final de la URL actual
    var url = window.location.href;
    var partesURL = url.split('/');
    var ultimoSegmento = partesURL[partesURL.length - 1];

    // Verificar si el último segmento es un número
    var numero = parseInt(ultimoSegmento);
    if (!isNaN(numero) && partesURL[partesURL.length - 2] === 'pruebas') {
        // Mostrar el botón de imprimir si el último segmento es un número y la penúltima parte es 'pruebas'
        document.getElementById('boton-imprimir').style.display = 'block';
    }
</script>

                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                        @endguest
                    </ul>







    </ul>
  </nav>
  <!-- /.navbar -->

