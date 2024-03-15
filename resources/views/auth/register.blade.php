
<meta  name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    
    
          
      <form class="d-flex">
         <!-- Right Side Of Navbar -->
         <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                           
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                           
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                               
                            </li>
                        @endguest
                    </ul>
      </form>
    </div>
  </div>
</nav>
<br>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/stilo.css') }}" />
<!-- Scrip para icono de visualizar contraseña -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div >

    <div class="row">
      <div class="col-lg-4"  style="background-color:rgb(253, 252, 252)">
       
      </div>
      <div class="col-lg-4"  style="background-color:rgb(255, 254, 254)">
      <img src='{{url("/img/logo.jpg")}}'>
        <div class="card" >
            <div class="card-body ">
                <h5 class="card-title">Registrarme</h5>
      <br>
            

      <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class=" row">
                        <div >
                            <label for="name" >{{ __(' Nombre') }}</label>

                            
                                <input id="name" type="text" placeholder="*" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" row">
                        <div >
                            <label for="cedula" >{{ __('Cédula') }}</label>
 
                           
                                <input id="cedula" type="number" placeholder="*" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>
 
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" row">
                        <div >
                            <label for="telefono" >{{ __(' Telefono') }}</label>
 
                            
                                <input id="telefono" type="number"  placeholder="*"  class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
 
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                      <div  >
                              <label for="email" >{{ __('Correo') }}</label>
                                 <input id="email" type="email" placeholder="*"  class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                  @error('email')
                                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                 
           </div>
           </div>

                       
                        <!-- <div class="row">
                        <div >
                            <label for="password" >{{ __('* Contraseña') }}&nbsp;<span class="fa fa-eye-slash icon"onclick="mostrarPassword()"></span> </label>
 
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" title="6 caracteres mínimo, usando por lo menos una letra mayúscula, una letra minúscula y un número">
                                    
                                   
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                             
                            </div>
                        </div> -->

                        
                        <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <div class="input-group-append">
                                            <input type="password" id="password" placeholder="*" name="password" class="form-control" required autocomplete="current-password">
                                            <button id="show_password" class="btn btn" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                        </div>
                                            <div class="text-danger">{{$errors->first('password')}}</div>
                                    </div>
                     
              
                        <div class=" row">
                           <div >
                            <label for="password-confirm" >{{ __(' Confirmar Contraseña') }}</label>
                                <input id="password-confirm" type="password" placeholder="*"  class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                        </div>
                   
                    &nbsp;<div class="form-check">
                    &nbsp;&nbsp;&nbsp;<input class="form-check-input "  placeholder="*"  type="checkbox" value="1" name="terminos" id="terminos" required >
                            <label class="form-check-label" for="flexCheckDefault">
 
                              <!-- Button trigger modal -->
                                    
                                    <p data-bs-toggle="modal"  data-bs-target="#exampleModal"> <a href="#">Aceptar términos y condiciones</a></p>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Términos y condiciones</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <img src='{{url("/img/logo.jpg")}}'>
                                               <b> POLÍTICAS PARA EL TRATAMIENTO DE SU INFORMACIÓN PERSONAL –
Taller Bolivar</b>
<br>
<br>
<b><p>  TALLER BOLIVAR</b> en calidad de Responsable del Tratamiento de datos
personales solicita su autorización para realizar el tratamiento con la finalidad de adelantar
el proceso de registro en el aplicativo, prestar los servicios requeridos, dar respuesta
oportuna a su petición, enviar información a nuestros aliados comerciales y contactarle para
comunicar información relacionada con la solicitud que registre en este aplicativo en línea,
así como novedades de nuestros productos o servicios.
TALLER BOLIVAR también le informa que podrá ejercer sus
derechos a través del correo electrónico <b>servicios@tallerbolivar.com</b> , o directamente en nuestra
sede principal ubicada en la (Calle 36 No. 23 – 44). Igualmente, podrá consultar nuestras
políticas de privacidad y de tratamiento de la información personal en nuestra página web
<b> www.tallerbolivar.com</b>
Si usted da clic en “Acepto”, se entenderá autorizado el tratamiento de sus datos personales.</p>
        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <!--button type="button"type="submit" class="btn btn-primary">Save changes</button-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                            </label>
                        </div>
<br>
                        
                                <button type="submit" class="btn">
                                    {{ __('Registrar') }}
                                </button>                          
                                                               
                          
                        
                    </form>
         </div>

     </div>
 

      </div>
      <div class="col-lg-4"  >
       
      </div>
    </div>
  </div> 
<br><br>
             
<!-- Scrip para icono de visualizar contraseña -->


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
 

<br><br><br>



