
<br>
<!-- CSS only -->
<meta  name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/stilo.css') }}" />
<!-- Scrip para icono de visualizar contraseña -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="card" style="width: 30rem;">
            <div class="card-body ">
                <div >{{ __('Restablecer contraseña') }}</div>
<br>
                    <form method="POST" action="{{ route('resetPassword.updatePasswordReset') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

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
           <br>
                        <!-- ACTUALIZAR CONTRASEÑA -->
                       
                                    {{csrf_field()}}
                                    
                                    <div class="form-group">
                                        <label for="password">Nueva Contraseña</label>
                                        <div class="input-group-append">
                                            <input type="password" id="password" name="password" class="form-control">
                                            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                        </div>
                                            <div class="text-danger">{{$errors->first('password')}}</div>
                                    </div>
                                    <div class="form-group">
                                    <label for="mypassword">Confirme Contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                    <br>
                                      
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Restablecer contraseña') }}
                                            </button>
                                        </div>
                                    </div>
                                                           
                    </form>
                </div>
            </div>
        </div>
   


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
