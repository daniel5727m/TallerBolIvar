<div class="form-group {{ $errors->has('peticion_api') ? 'has-error' : ''}}">
    <label for="peticion_api" class="control-label">{{ 'Peticion Api' }}</label>
    <input class="form-control" name="peticion_api" type="text" id="peticion_api" value="{{ isset($losg->peticion_api) ? $losg->peticion_api : ''}}" >
    {!! $errors->first('peticion_api', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('metodo_peticion') ? 'has-error' : ''}}">
    <label for="metodo_peticion" class="control-label">{{ 'Metodo Peticion' }}</label>
    <input class="form-control" name="metodo_peticion" type="text" id="metodo_peticion" value="{{ isset($losg->metodo_peticion) ? $losg->metodo_peticion : ''}}" >
    {!! $errors->first('metodo_peticion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="control-label">{{ 'Fecha' }}</label>
    <input class="form-control" name="fecha" type="date" id="fecha" value="{{ isset($losg->fecha) ? $losg->fecha : ''}}" >
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('peticion') ? 'has-error' : ''}}">
    <label for="peticion" class="control-label">{{ 'Peticion' }}</label>
    <textarea class="form-control" rows="5" name="peticion" type="textarea" id="peticion" >{{ isset($losg->peticion) ? $losg->peticion : ''}}</textarea>
    {!! $errors->first('peticion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('peticion') ? 'has-error' : ''}}">
    <label for="peticion" class="control-label">{{ 'Peticion' }}</label>
    <input class="form-control" name="peticion" type="text" id="peticion" value="{{ isset($losg->peticion) ? $losg->peticion : ''}}" >
    {!! $errors->first('peticion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('respuesta') ? 'has-error' : ''}}">
    <label for="respuesta" class="control-label">{{ 'Respuesta' }}</label>
    <textarea class="form-control" rows="5" name="respuesta" type="textarea" id="respuesta" >{{ isset($losg->respuesta) ? $losg->respuesta : ''}}</textarea>
    {!! $errors->first('respuesta', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('exito') ? 'has-error' : ''}}">
    <label for="exito" class="control-label">{{ 'Exito' }}</label>
    <input class="form-control" name="exito" type="text" id="exito" value="{{ isset($losg->exito) ? $losg->exito : ''}}" >
    {!! $errors->first('exito', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
