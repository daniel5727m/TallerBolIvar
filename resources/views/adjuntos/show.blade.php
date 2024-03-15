@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           

        <div class="card" style="width: 60rem;">
  <div class="card-body">
                    <h2>Adjunto {{ $adjunto->id }}</h2>
                   
                        <a href="{{ url('/adjuntos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        
                        <br/>
                        <br/>

                        <table id="example" class="table table-bordered table-striped cell-border" style="width:100% ">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $adjunto->id }}</td>
                                    </tr>
                                    <tr><th> Id Solicitudes </th><td> {{ $adjunto->id_solicitudes }} </td></tr><tr><th> Nro Solicitud </th><td> {{ $adjunto->nro_solicitud }} </td></tr><tr><th> Cod Inmueble </th><td> {{ $adjunto->cod_inmueble }} </td></tr>
                                    <th>Acciones</th><td><a href="{{ url('/adjuntos/' . $adjunto->id . '/edit') }}" title="Edit adjunto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>

                                        <form method="POST" action="{{ url('adjuntos' . '/' . $adjunto->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete adjunto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form></td>
                                
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
