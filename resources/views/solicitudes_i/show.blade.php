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
           
        <a href="{{ url('/solicitudes') }}" title="Atras"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
          
            <div class="col-md-6">
                </br></br>
                <div class="card">
                    <!--div class="card-header">No Solicitud: {{ $solicitude->nro_solicitud }}</div-->
                    <div class="card-body">

                        
                        <!--a href="{{ url('/solicitudes/' . $solicitude->id . '/edit') }}" title="Edit solicitude"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a-->

                        <!--form method="POST" action="{{ url('solicitudes' . '/' . $solicitude->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar solicitud" onclick="return confirm(&quot;Seguro que quiere eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form-->
                        <br/>
                        <br/>

                        <div >
                        <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-striped cell-border" style="width:100% ">
                              
                        <tbody>
                                    <tr>
                                        <th> Cédula </th><td> {{ Auth::user()->cedula }} </td>
                                    </tr>
                                    <tr>
                                        <th> Nombre </th><td> {{ Auth::user()->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Teléfono </th><td> {{ Auth::user()->telefono }} </td>
                                    </tr>
                                    <tr>
                                        <th> Correo </th><td> {{ Auth::user()->email }} </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h2><b> No Solicitud: {{ $solicitude->nro_solicitud }}</b> </h2>
                    <div class="card-body">

                        
                        <!--a href="{{ url('/solicitudes/' . $solicitude->id . '/edit') }}" title="Edit solicitude"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a-->

                        <!--form method="POST" action="{{ url('solicitudes' . '/' . $solicitude->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar solicitud" onclick="return confirm(&quot;Seguro que quiere eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form-->
                        <br/>
                        <br/>
<br>
                       <br><br>
                       <div class="table-responsive">
                       <table id="example2" class="table table-bordered table-striped cell-border" style="width:100% ">
                                <tbody>
                                    <tr>
                                        <th> Código del inmueble </br> Tipo de solicitud </br> Estado </br> Fecha solicitud </th>
                                        <td> {{ $solicitude->cod_inmueble }} <br> {{ $solicitude->nom_tipo_solicitud }} <br> {{ $solicitude->nom_estado_solicitud }} <br> {{ $solicitude->fecha_solicitud }} </td>
                                    </tr>
                                    <tr>
                                        <th> Tipo solicitante </br> Sugerencia agendamiento de visita </th><td> {{ $solicitude->tipo_solicitante }} <br> {{ $solicitude->fecha_agendamiento }} </td>
                                    </tr>
                                    <tr>
                                        <th> Motivo de solicitud </th><td> {{ $solicitude->motivo_solicitud }} </td>
                                    </tr>
                                    <tr>
                                        <th> Descripción </th><td> {{ $solicitude->des_solicitud }} </td>
                                    </tr>
                                    <!-- tr>
                                        <th> Documentos adjuntos </th><td> {{ $solicitude->fecha_agendamiento }} </td>
                                    </tr -->
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
           <br><br>
           <br><br>
           <br><br>
           </div>
           <table id="example2" class="table table-bordered table-striped cell-border" style="width:100% ">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                        <th>Novedad</th>
                                        <th >Comentario</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                @foreach($datos_etapas as $item)
                                    <tr>
                                        <td> {{ $item['fecha_tramite'] }} </td>
                                        <td> {{ $item['cod_etapa'] }} </td>
                                        <td> {{ $item['nom_etapa'] }} </td>                                    
                                        <td> {{ $item['nom_usuario_ejecuta'] }} </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        </div>
<br><br><br>


        </div>
    </div>
@endguest
@endsection

