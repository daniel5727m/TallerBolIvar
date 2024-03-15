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
           
        <a href="{{ url('/solicitudes_seguimiento_admin') }}" title="Atras"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
          
            <div class="col-md-6">
                </br></br>
                <div class="card">
                    <!--div class="card-header">No Solicitud: {{ $solicitude->nro_solicitud }}</div-->
                    <div class="card-body">

                        
                        <!--a href="{{ url('/solicitudes/' . $solicitude->id . '/edit') }}" title="Edit solicitude"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a-->

                        <!-- form method="POST" action="{{ url('solicitudes' . '/' . $solicitude->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar solicitud" onclick="return confirm(&quot;Seguro que quiere eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form -->
                        <br/>
                        <br/>

                        <div >
                        <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-striped cell-border" style="width:100% ">
                                <tbody>
                                    <tr>
                                    <th> Cédula </br> Nombre </br> Teléfono </br> Correo </th><td> {{ $user->cedula }} </br> {{ $user->name }} </br> {{ $user->telefono }} </br> {{ $user->email }} </td>
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

        <div class="row">
            

            
            <!-- div class="col-md-6">
                <div class="card">
                    <h2><b> Registrar novedad</b></h2>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/seguimientos') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            @method('PUT')
                            {{ csrf_field() }}
                            <input class="form-control" name="id_solicitudes" type="hidden" id="id_solicitudes" value="{{ $solicitude->id }}" >
                            <input class="form-control" name="nro_solicitud" type="hidden" id="nro_solicitud" value="{{ $solicitude->nro_solicitud }}" >
                            <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ Auth::user()->id }}" >
                            
                            <div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
                                <label for="estado" class="control-label">{{ '*Estado' }}</label>
                                
                                <select name="estado" class="form-control" id="estado" required>
                                    < option value="ASIGNADO" >ASIGNADO</option >
                                    <option value="EN TRAMITE" >EN TRAMITE</option>
                                    <option value="CERRADO" >CERRADO</option>
                                </select>
                                {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('novedad') ? 'has-error' : ''}}">
                                <label for="novedad" class="control-label">{{ '*Novedad' }}</label>
                                <input class="form-control" rows="5" name="novedad" type="textarea" id="novedad" required>{{ isset($solicitude->novedad) ? $solicitude->novedad : ''}}</input>
                                {!! $errors->first('novedad', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('comentario') ? 'has-error' : ''}}">
                                <label for="comentario" class="control-label">{{ '*Comentario' }}</label>
                                <textarea class="form-control" rows="5" name="comentario" type="textarea" id="comentario" required>{{ isset($solicitude->comentario) ? $solicitude->comentario : ''}}</textarea>
                                {!! $errors->first('comentario', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Crear">
                            </div>
                        </form>
                    </div>
                </div>
            </div-->
<br>
            <div class="table-responsive">
            <table id="example2" class="table table-bordered table-striped cell-border" style="width:100% ">
                                <thead>
                                    <tr>
                                        <th>Fecha</th><th>Código etapa</th><th>Nombre etapa</th><th >Funcionario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--
                                    <tr>
                                        <td> {{ $solicitude->fecha_solicitud }} </td>
                                        <td> {{ $solicitude->nom_estado_solicitud }} </td>                                    
                                        <td> {{ $solicitude->motivo_solicitud }} </td>
                                        <td> </td>
                                    </tr>
                                    @foreach($seguimiento as $item)
                                    <tr>
                                        <td> {{ $item->created_at }} </td>
                                        <td> {{ $item->estado }} </td>                                    
                                        <td> {{ $item->novedad }} </td>
                                        <td> {{ $item->comentario }} </td>
                                    </tr>
                                    @endforeach
                                    -->
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


        </div>
    </div>
@endguest
@endsection

