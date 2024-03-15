@extends('layouts.app')

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
            

        <div class="card" style="width: 100rem;">
              <div class="card-body">
                     <h2 >  Losg {{ $log->id }}</h2>
<br><br>
                        <a href="{{ url('/logs') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <!--a href="{{ url('/logs/' . $log->id . '/edit') }}" title="Edit log"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a-->

                        <!--form method="POST" action="{{ url('logs' . '/' . $log->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete log" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form-->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-striped cell-border" style="width:100% ">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $log->id }}</td>
                                    </tr>
                                    <tr><th> Petición Api </th><td> {{ json_decode($log->peticion_api) }} </td></tr><tr><th> Método Petición </th><td> {{ $log->metodo_peticion }} </td></tr>
                                    <tr><th> Fecha petición </th><td> {{ $log->created_at }} </td></tr><tr><th> Petición </th><td> {{ $log->peticion }} </td></tr><tr><th> Respuesta</th><td> {{ $log->respuesta }} </td></tr>
                                    <tr><th> Estado </th><td> {{ $log->exito?'Enviado':'Fallo' }} </td></tr>
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
