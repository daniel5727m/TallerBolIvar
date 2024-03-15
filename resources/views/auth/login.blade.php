
<br>
<meta  name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/stilo.css') }}" />
<!-- Scrip para icono de visualizar contraseña -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="container">

    <div class="row">
      <div class="col-lg-4"  style="background-color:rgb(253, 252, 252)">

      </div>
      <div class="col-lg-4"  style="background-color:rgb(255, 254, 254)">
        <img src='{{url("/img/logo.jpg")}}'>
        <div class="card" style="width: 400px; margin:-30px; margin-top:10px">
            <div class="card-body ">
                <h5 class="card-title">Ingreso</h5>
      <br>
             <form method="POST" action="{{ route('login') }}">
                 @csrf

         <!-- input correo ekectronico -->

         <div class="row">
             <div  >
                <label for="email" >{{ __('Correo') }}</label>
                  <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                             @enderror

           </div>
           </div>

                 <!-- finl inptu correo electronico -->

             <!-- Inico contraseña -->
             <!-- <div class="row">
                 <div  >
                 <div class="input-group">

                 <label for="password" >{{ __('Contraseña') }} &nbsp;<span class="fa fa-eye-slash icon"onclick="mostrarPassword()"></span></label>
                     <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


                     @error('password')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                 </div>
                </div> -->

                <br>

                                 <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <div class="input-group-append">
                                            <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
                                            <button id="show_password" class="btn btn" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                        </div>
                                            <div class="text-danger">{{$errors->first('password')}}</div>
                                    </div>


              <!-- fin input contraseña -->



                 <!-- <div class="form-group row">
                     <div class="col-md-6 offset-md-4">
                         <div class="form-check">
                             <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                             <label class="form-check-label" for="remember">
                                 {{ __('Recordarme') }}
                             </label>
                         </div>
                     </div>
                 </div> -->
<br>

                         <button type="submit" class="btn ">
                             {{ __('Ingresar') }}
                         </button>

                 <div class="row">
                    <div class="col-md-3 col-md-offset-9 text-right" >
                        <div class="btn-group" role="group">
                            &nbsp;&nbsp;&nbsp;<a class="btn btn-link" href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                            @if (Route::has('password.request'))
                             <a class="btn btn-link" href="{{ route('password.request') }}">
                                 {{ __('Olvidó su contraseña?') }}
                             </a>
                         @endif
                        </div>
                    </div>
                </div>

             </form>

         </div>

     </div>


      </div>
      <div class="col-lg-4"  >

      </div>
    </div>
  </div>
<br><br>



<script type="text/javascript">

function mostrarPassword(){
        var cambio = document.getElementById("password");
        if(cambio.type == "password"){
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

        }else{
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }
</script>
