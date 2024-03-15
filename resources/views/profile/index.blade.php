@extends('layouts.input')

@section('content')
@guest
    <div class="container">
        <div class="row">
            {{ __('Acceso incorrecto') }}
        </div>
    </div>
@else 
    <div class="container">
        <div class="row">
           
      
                    <h2 style="color:#31555E">Mi perfil</h2>
<br><br>
                    <br>
                    <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                        </div>
                    @endif
                    @if (Session::has('message_error'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('message_error')}}
                        </div>
                    @endif
                </div>
                    <div class="container">

                            <div class="row">
                            <div class="col-lg-6"  style="background-color:rgb(253, 252, 252)">
                                <h6 style="color:black">Información del perfil <br>
                                    Actualice la información de perfil, como su nombre y teléfono.</h6> 
                                
                            </div>
                            <div class="col-lg-6"  style="background-color:rgb(255, 253, 253)">
                            <div class="card" >
                                    <div class="card-body">
                                    <form method="POST" action="{{ route('perfil.update') }}">
                                    <label for="mypassword"> Nombre</label>
                                       
                                        @csrf
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                                        <label for="mypassword"> Telefono</label>
                                        <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ Auth::user()->telefono }}" required autocomplete="telefono">
                                        <br>
                                        <div class="form-group">
                                            <input class="btn " type="submit" value="Guardar">
                                        </div> 

                                    </form> 
                                    </div></div>
                            </div>
                            
                            </div>
                            </div>
                        </div>
                        
<br>
    <div class="container">

    <div class="row">
      <div class="col-lg-6"  style="background-color:rgb(255, 255, 255)">
       <br><br>
        <h6 style="color:black">Actualiza contraseña<br/>
        Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.</h6> 
       
      </div>
      <div class="col-lg-6"  style="background-color:rgb(255, 255, 255)">
      <div class="card" >
                                    <div class="card-body">
                                    <form method="POST" action="{{ route('perfil.updatePassword') }}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    <label for="mypassword">Contraseña Actual</label>
                                    <input type="password" name="mypassword" class="form-control">
                                    <div class="text-danger">{{$errors->first('mypassword')}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Nueva Contraseña</label>
                                        <div class="input-group-append">
                                            <input type="password" id="password" name="password" class="form-control">
                                            <button id="show_password" class="btn btn" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                        </div>
                                            <div class="text-danger">{{$errors->first('password')}}</div>
                                    </div>
                                    <div class="form-group">
                                    <label for="mypassword">Confirme Contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                    </div>

                             



                                    <!-- 
                                    Contraseña Actual<br>
                                        @csrf
                                        <input id="mypassword" type="password" class="form-control @error('password') is-invalid @enderror" name="mypassword" required autocomplete="new-password" title="6 caracteres mínimo, usando por lo menos una letra mayúscula, una letra minúscula y un número">
                                        Nueva Contraseña<br>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" title="6 caracteres mínimo, usando por lo menos una letra mayúscula, una letra minúscula y un número">
                                        Confirme Contraseña<br>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
-->
                                        <br>
                                        <div class="form-group">
                                            <input class="btn " type="submit" value="Guardar">
                                        </div> 
                                    </form> 
                                    
                                    </div></div>
                            </div>
                            
                            </div>
                        </div> 
                        <br><br>
                       
                        
                        <br/>
                        <br/>
                        

                    </div>
                </div>
            </div>
        </div>
   
@endguest
@endsection

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

