<div class="form-group {{ $errors->has('id_solicitudes') ? 'has-error' : ''}}">
    <label for="id_solicitudes" class="control-label">{{ 'Id Solicitudes' }}</label>
    <input class="form-control" name="id_solicitudes" type="number" id="id_solicitudes" value="{{ isset($seguimiento->id_solicitudes) ? $seguimiento->id_solicitudes : ''}}" >
    {!! $errors->first('id_solicitudes', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nro_solicitud') ? 'has-error' : ''}}">
    <label for="nro_solicitud" class="control-label">{{ 'Nro Solicitud' }}</label>
    <input class="form-control" name="nro_solicitud" type="number" id="nro_solicitud" value="{{ isset($seguimiento->nro_solicitud) ? $seguimiento->nro_solicitud : ''}}" >
    {!! $errors->first('nro_solicitud', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <input class="form-control" name="estado" type="text" id="estado" value="{{ isset($seguimiento->estado) ? $seguimiento->estado : ''}}" >
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('novedad') ? 'has-error' : ''}}">
    <label for="novedad" class="control-label">{{ 'Novedad' }}</label>
    <input class="form-control" name="novedad" type="text" id="novedad" value="{{ isset($seguimiento->novedad) ? $seguimiento->novedad : ''}}" >
    {!! $errors->first('novedad', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('comentario') ? 'has-error' : ''}}">
    <label for="comentario" class="control-label">{{ 'Comentario' }}</label>
    <input class="form-control" name="comentario" type="file" id="comentario" value="{{ isset($seguimiento->comentario) ? $seguimiento->comentario : ''}}" >
    {!! $errors->first('comentario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($seguimiento->user_id) ? $seguimiento->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
