@extends('layouts.input')

@section('content')
<div class="container">
        <div class="row">
           
        <style>
    input{
               
    margin: 0 auto;
    border-radius: 10px;
    border: 1px solid 599C9C;
    width: 300px;
    background-color: #e9ece9;
    color: rgb(105, 104, 104);
    
    }     


       
         </style>  
              
        <div class="card" style="width: 100rem;">
                <div class="card-body">
                    
                    <h2><b> Editar costo AB #{{ $costo_ab->id }}</b> </h2>
                    <div class="card-body">
                        <a href="{{ url('/costo_ab') }}" title="Atras"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/costo_ab/' . $costo_ab->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('costo_ab.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
            </div>
        </div>
    </div>
@endsection

             
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