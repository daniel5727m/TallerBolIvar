@extends('layouts.app')

@section('content')
@guest
    <div class="container">
        <div class="row">
            {{ __('Acceso incorrecto') }}
        </div>
    </div>
@else 
<script type="text/javascript">
        function mostrar(variable){
            if(variable=="I") {
                    document.getElementById('valorIF').style.display="block";
                    document.getElementById('valorT').style.display="none";
                    document.getElementById("valorIF").required = true;
            }else{
                    document.getElementById('valorT').style.display="inline";
            }
        }
</script>
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

    <div class="container">
        <div class="row">
           
        <div class="card" style="width: 100rem;">
                <div class="card-body">
                    <h2>Configuración de plataforma</h2>
                    <div class="card-body">
                        <br/>
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert" id="msj">
                        {{Session::get('message')}}
                        </div>
                    @endif
                    @if (Session::has('message_error'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('message_error')}}
                        </div>
                    @endif
                        <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped cell-border" style="width:100% "> 
                                <thead>
                                    <tr>
                                        <th>No</th><th>Descripción</th><th>Valor</th><th >Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($plataforma as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ $item->valor }}</td>
                                        <td>
                                            <button class="btn btn-info" data-toggle="modal" data-target="#modal-{{ $item->id }}" onclick="mostrar('{{ $item->variable }}')" data-whatever="@mdo"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Actualizar</button>                                                                                 
                                        </td>
                                    </tr>
                            <!--Ventana Modal para Actualizar--->
                              @include('plataforma.modalUpdate')
                                @endforeach
                                </tbody>
                            </table>                            
                        </div>
                    </div>
                </div>
            </div>
      
            </div>
            </div>
@endguest
@endsection