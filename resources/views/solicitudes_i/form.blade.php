<!--div class="form-group {{ $errors->has('nro_solicitud') ? 'has-error' : ''}}">
    <label  for="nro_solicitud" class="control-label">{{ 'Nro Solicitud' }}</label>
    <input  class="form-control" name="nro_solicitud" type="number" id="nro_solicitud" value="{{ isset($solicitude->nro_solicitud) ? $solicitude->nro_solicitud : ''}}" >
    {!! $errors->first('nro_solicitud', '<p class="help-block">:message</p>') !!}
</div-->
<div class="form-group {{ $errors->has('fecha_solicitud') ? 'has-error' : ''}}">
    <label for="fecha_solicitud" class="control-label">{{ 'Fecha Solicitud' }}</label>
    <label for="fecha_solicitud" class="control-label">{{ date('Y-m-d h:i:s')}}</label>
    <!-- input class="form-control" name="fecha_solicitud" type="date" id="fecha_solicitud" value="{{ isset($solicitude->fecha_solicitud) ? $solicitude->fecha_solicitud : date('d/m/Y')}}" -->
    {!! $errors->first('fecha_solicitud', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('cod_inmueble') ? 'has-error' : ''}}">       
    <label for="cod_inmueble_txt" class="control-label">{{ 'Nota: El código del inmueble lo encuentra en la parte superior izquierda del contrato de arrendamiento/mandato o en la factura del mes' }}</label>
    <label for="cod_inmueble" class="control-label">{{ '*Código del inmueble' }}</label>
    <!--input class="form-control" name="cod_inmueble" type="text" id="cod_inmueble" value="{{ isset($solicitude->cod_inmueble) ? $solicitude->cod_inmueble : ''}}" -->
   
    <select name="cod_inmueble" class="form-control" id="cod_inmueble" required title="El código del inmueble lo encuentra en la parte superior izquierda del contrato de arrendamiento/mandato o en la factura del mes">
        <option value="" >Seleccionar</option>
    @foreach ($data_inmueble as $inmueble)
        <option value="{{ $inmueble->cod_inmueble }}" {{ (isset($solicitude->cod_inmueble) && $solicitude->cod_inmueble == $inmueble->cod_inmueble) ? 'selected' : ''}}>{{ $inmueble->cod_inmueble }} -  {{ $inmueble->cod_cliente_propietario }}</option>
      
    @endforeach
    </select>
    {!! $errors->first('cod_inmueble', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('cod_tipo_solicitud') ? 'has-error' : ''}}">
    <label for="cod_tipo_solicitud" class="control-label">{{ '*Tipo de solicitud' }}</label>
    <!-- input class="form-control" name="cod_tipo_solicitud" type="text" id="cod_tipo_solicitud" value="{{ isset($solicitude->cod_tipo_solicitud) ? $solicitude->cod_tipo_solicitud : ''}}" -->
    <select name="cod_tipo_solicitud" class="form-control" id="cod_tipo_solicitud" required>
    @foreach ($tipo_solicitudes_data as $tipo_solicitud) 
        @if(($formMode == 'create' && $tipo_solicitud->cod_tipo_solicitud==$tipo_sol) || ( $formMode == 'edit' && isset($solicitude->cod_tipo_solicitud) && $solicitude->cod_tipo_solicitud == $tipo_solicitud->cod_tipo_solicitud) )
        <option value="{{ $tipo_solicitud->cod_tipo_solicitud }}" >{{ $tipo_solicitud->nom_tipo_solicitud }}</option>
        @endif
    @endforeach
    </select>
    {!! $errors->first('cod_tipo_solicitud', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group {{ $errors->has('tipo_solicitante') ? 'has-error' : ''}}">
    <label for="tipo_solicitante" class="control-label">{{ '*Tipo solicitante' }}</label>
    <!--input class="form-control" name="tipo_solicitante" type="text" id="tipo_solicitante" value="{{ isset($solicitude->tipo_solicitante) ? $solicitude->tipo_solicitante : ''}}" -->
   
    <select name="tipo_solicitante" class="form-control" id="tipo_solicitante" required>
        <option value="ARRENDATARIO" {{ (isset($solicitude->tipo_solicitante) && $solicitude->tipo_solicitante == 'ARRENDATARIO') ? 'selected' : ''}} >ARRENDATARIO</option>
        <option value="PROPIETARIO" {{ (isset($solicitude->tipo_solicitante) && $solicitude->tipo_solicitante == 'PROPIETARIO') ? 'selected' : ''}} >PROPIETARIO</option>
        @if($tipo_sol=='MAN' || (isset($solicitude->tipo_solicitante) && $solicitude->tipo_solicitante == 'TERCERO'))
            <option value="TERCERO" {{ (isset($solicitude->tipo_solicitante) && $solicitude->tipo_solicitante == 'TERCERO') ? 'selected' : ''}} >TERCERO</option>
        @endif
    </select>
    {!! $errors->first('tipo_solicitante', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('motivo_solicitud') ? 'has-error' : ''}}">
    <label for="motivo_solicitud" class="control-label">{{ '*Motivo de solicitud' }}</label>
    <!--input class="form-control" rows="5" name="motivo_solicitud" type="textarea" id="motivo_solicitud" value="{{ isset($solicitude->motivo_solicitud) ? $solicitude->motivo_solicitud : ''}}" required ></input-->
    <select name="motivo_solicitud" class="form-control" id="motivo_solicitud" required >
        <option value="" >Seleccionar</option>
    @foreach ($motivos as $motivo)
        @if(($formMode == 'create' && $motivo->cod_tipo_solicitud==$tipo_sol) || ( $formMode == 'edit' && isset($solicitude->motivo_solicitud) && $solicitude->motivo_solicitud == $motivo->nombre) )
        <option value="{{ $motivo->nombre }}" {{ (isset($solicitude->motivo_solicitud) && $solicitude->motivo_solicitud == $motivo->nombre) ? 'selected' : ''}}>{{ $motivo->nombre }}</option>
        @endif
      
    @endforeach
    </select>
    {!! $errors->first('motivo_solicitud', '<p class="help-block">:message</p>') !!}
</div>



<!--div class="form-group {{ $errors->has('nom_tipo_solicitud') ? 'has-error' : ''}}">
    <label for="nom_tipo_solicitud" class="control-label">{{ 'Nom Tipo Solicitud' }}</label>
    <input class="form-control" name="nom_tipo_solicitud" type="text" id="nom_tipo_solicitud" value="{{ isset($solicitude->nom_tipo_solicitud) ? $solicitude->nom_tipo_solicitud : ''}}" >
    {!! $errors->first('nom_tipo_solicitud', '<p class="help-block">:message</p>') !!}
</div-->

<div class="form-group {{ $errors->has('des_solicitud') ? 'has-error' : ''}}">
    <label for="des_solicitud" class="control-label">{{ '*Descripción solicitud' }}</label>
    <textarea class="form-control" rows="5" name="des_solicitud" type="textarea" id="des_solicitud" required>{{ isset($solicitude->des_solicitud) ? $solicitude->des_solicitud : ''}}</textarea>
    {!! $errors->first('des_solicitud', '<p class="help-block">:message</p>') !!}
</div>
@if($tipo_sol=='MAN')
<div class="form-group {{ $errors->has('fecha_agendamiento') ? 'has-error' : ''}}">       
    <label for="fecha_agendamiento_txt" class="control-label">{{ 'Nota: Agendamiento de visita, El horario de atención es de 8:00am a 12:30pm y de 1:30pm a 5:00pm de lunes a viernes y sábado de 8:00am a 12:00m. El horario que usted escoja se ajustará a la disponibilidad del personal de la Inmobiliaria.
' }}</label>
    <label for="fecha_agendamiento" class="control-label">{{ 'Agendamiento de visita' }}</label>
   <input class="form-control" name="fecha_agendamiento" type="datetime-local" id="fecha_agendamiento" >
    {!! $errors->first('fecha_agendamiento', '<p class="help-block">:message</p>') !!}
</div>
@endif
<div class="form-group {{ $errors->has('cod_estado_solicitud') ? 'has-error' : ''}}">
    <!-- label for="cod_estado_solicitud" class="control-label">{{ 'Cod Estado Solicitud' }}</label-->
    <input class="form-control" name="cod_estado_solicitud" type="hidden" id="cod_estado_solicitud" value="{{ isset($solicitude->cod_estado_solicitud) ? $solicitude->cod_estado_solicitud : 'RAD'}}" >
    {!! $errors->first('cod_estado_solicitud', '<p class="help-block">:message</p>') !!}
</div>
<!--div class="form-group {{ $errors->has('nom_estado_solicitud') ? 'has-error' : ''}}">
    <label for="nom_estado_solicitud" class="control-label">{{ 'Nom Estado Solicitud' }}</label>
    <input class="form-control" name="nom_estado_solicitud" type="text" id="nom_estado_solicitud" value="{{ isset($solicitude->nom_estado_solicitud) ? $solicitude->nom_estado_solicitud : ''}}" >
    {!! $errors->first('nom_estado_solicitud', '<p class="help-block">:message</p>') !!}
</div-->
<div class="form-group {{ $errors->has('ruta_archivo') ? 'has-error' : ''}}">
    <label for="ruta_archivo" class="control-label">{{ 'Cargar archivos' }}</label>
    <input class="form-control" name="ruta_archivo[]" type="file" id="ruta_archivo" value="{{ isset($adjunto->ruta_archivo) ? $adjunto->ruta_archivo : ''}}" multiple>
    {!! $errors->first('ruta_archivo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>

