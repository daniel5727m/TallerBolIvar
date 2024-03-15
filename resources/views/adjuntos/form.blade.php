<div class="form-group {{ $errors->has('id_solicitudes') ? 'has-error' : ''}}">
    <label for="id_solicitudes" class="control-label">{{ 'Id Solicitudes' }}</label>
    <input class="form-control" name="id_solicitudes" type="number" id="id_solicitudes" value="{{ isset($adjunto->id_solicitudes) ? $adjunto->id_solicitudes : ''}}" >
    {!! $errors->first('id_solicitudes', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nro_solicitud') ? 'has-error' : ''}}">
    <label for="nro_solicitud" class="control-label">{{ 'Nro Solicitud' }}</label>
    <input class="form-control" name="nro_solicitud" type="number" id="nro_solicitud" value="{{ isset($adjunto->nro_solicitud) ? $adjunto->nro_solicitud : ''}}" >
    {!! $errors->first('nro_solicitud', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cod_inmueble') ? 'has-error' : ''}}">
    <label for="cod_inmueble" class="control-label">{{ 'Cod Inmueble' }}</label>
    <input class="form-control" name="cod_inmueble" type="text" id="cod_inmueble" value="{{ isset($adjunto->cod_inmueble) ? $adjunto->cod_inmueble : ''}}" >
    {!! $errors->first('cod_inmueble', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre_archivo') ? 'has-error' : ''}}">
    <label for="nombre_archivo" class="control-label">{{ 'Nombre Archivo' }}</label>
    <input class="form-control" name="nombre_archivo" type="text" id="nombre_archivo" value="{{ isset($adjunto->nombre_archivo) ? $adjunto->nombre_archivo : ''}}" >
    {!! $errors->first('nombre_archivo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ruta_archivo') ? 'has-error' : ''}}">
    <label for="ruta_archivo" class="control-label">{{ 'Ruta Archivo' }}</label>
    <input class="form-control" name="ruta_archivo[]" type="file" id="ruta_archivo" value="{{ isset($adjunto->ruta_archivo) ? $adjunto->ruta_archivo : ''}}" multiple>
    {!! $errors->first('ruta_archivo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('orden') ? 'has-error' : ''}}">
    <label for="orden" class="control-label">{{ 'Orden' }}</label>
    <input class="form-control" name="orden" type="number" id="orden" value="{{ isset($adjunto->orden) ? $adjunto->orden : ''}}" >
    {!! $errors->first('orden', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($adjunto->user_id) ? $adjunto->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
