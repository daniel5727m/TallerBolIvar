<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/stilo.css') }}" />
<!-- Scrip para icono de visualizar contraseña -->
<meta  name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<br>
<img src='{{url("/img/logo.jpg")}}'>


<div class="container">

    <div class="row">
      <div class="col-lg-4"  style="background-color:rgb(252, 250, 250)">
      
      </div>
      <div class="col-lg-4"  style="background-color:rgb(248, 245, 245)">
        <div class="card" >
            <div class="card-body">
              <h5 class="card-title">Restablecer contraseña</h5>
              <h6 class="card-subtitle mb-2 text-muted">   
                    @if (session('status'))
                                  <div class="alert alert-success" role="alert">
                                      {{ session('status') }}
                                  </div>
                              @endif
          
                              <form method="POST" action="{{ route('password.email') }}">
                                  @csrf
          
                                  <div class="row">
                                     <div  >
                                      <label for="email" >{{ __('E-Mail ') }}</label>
                                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          
                                          @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                    <br>
                                  <div class="form-group row mb-0">
                                  
                                          <button type="submit" class="btn">
                                              {{ __('Enviar para restablecimiento de contraseña') }}
                                          </button>
                                      
                                  </div>
          
                                  <div class="row">
                              <div class="col-md-3 col-md-offset-9 text-right" >
                                  <div class="btn-group" role="group">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a class="btn btn-link" href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                                      <a class="btn btn-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                  </div>
                              </div>
                          </div>
          
                              </form></h6>
            </div>
          </div>
      </div>
      <div class="col-lg-4"  style="background-color:rgb(250, 249, 249)">
        
      </div>
    </div>
  </div> 
