@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: -150px;">
<div class="row">
@if (Session::has('flash_message'))
                          <div class="alert alert-success" role="alert">
                          {{Session::get('flash_message')}}
                          </div>
                          @endif

                          @if (Session::has('message_error'))
                              <div class="alert alert-danger" role="alert">
                              {{Session::get('message_error')}}
                              </div>
                          @endif

      <div class="col-lg-6"  style="background-color:rgb(248, 246, 246)">

         <div class="card">

             <div class="card-body">
                   <h2  >PERFIL</h2>
                   <br>
        <div class="table-responsive">

        <table id="example2" class="table table-bordered table-striped cell-border" style="width:100% ">
                            <thead>
                                <tr>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($perfil as $item)
                                <tr> <td> <a href="{{ url('/roles/' . $item->id) }}">{{ $item->nombre_perfil }}</a> </td>
                               </tr>
                             @endforeach
                            </tbody>
                        </table>

                    </div>
                    <br>
                 </div>
                </div>
            </div>

            <div class="col-lg-6" style="background-color:rgb(252, 252, 252)">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/rol') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="table-responsive" style="overflow-x: hidden;">
                                <table id="example2" class="table table-bordered table-striped cell-border" style="width:100%">
                                    <thead>
                                        <tr>
                                            <h2>MENÚ {{$titulo_perfil}} </h2>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($opciones as $item)
                                        {{$marcado=''}}
                                        @foreach($perfil_opciones as $opcion)
                                        @php
                                        $id_perfil = $opcion->id_perfil;
                                        @endphp
                                        @if( $item->id==$opcion->id_menu)
                                        @php
                                        $marcado = "checked";
                                        @endphp
                                        @endif
                                        @endforeach
                                        <tr>
                                            <td> <input type="checkbox" name="{{$item->id}}" id="{{$item->id}}" value="1" onchange="javascript:showContent()" value="html"{{$marcado}}> <i class="{{$item->icono}}"></i>&nbsp;&nbsp;{{ $item->nombre }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                                <input type="hidden" id="id_perfil" name="id_perfil" value="{{$id_perfil}}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


@endsection

<script type="text/javascript">
    $(document).ready(function() {



$('.mi_checkbox').change(function() {
    //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
    var estatus = $(this).prop('checked') == true ? ACTIVO : 0;
    var id = $(this).data('id');
        console.log(estatus);
        window.location.reload();
    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'rol',

        data: {'estado': estado, 'id': id},
        success: function(data){
            $('#resp' + id).html(data.var);
            console.log(data.var)

        }
    });
})

});
</script>
