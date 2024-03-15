<div class="form-group {{ $errors->has('nro_solicitud') ? 'has-error' : ''}}">
    <label for="nro_solicitud" class="control-label">{{ 'Nro Solicitud' }}</label>
    <input class="form-control" name="nro_solicitud" type="number" id="nro_solicitud" value="{{ isset($solicitude->nro_solicitud) ? $solicitude->nro_solicitud : ''}}" >
    {!! $errors->first('nro_solicitud', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cod_tipo_solicitud') ? 'has-error' : ''}}">
    <label for="cod_tipo_solicitud" class="control-label">{{ 'Cod Tipo Solicitud' }}</label>
    <input class="form-control" name="cod_tipo_solicitud" type="text" id="cod_tipo_solicitud" value="{{ isset($solicitude->cod_tipo_solicitud) ? $solicitude->cod_tipo_solicitud : ''}}" >
    {!! $errors->first('cod_tipo_solicitud', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
