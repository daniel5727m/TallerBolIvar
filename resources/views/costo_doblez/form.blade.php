<div class="form-group {{ $errors->has('diametro_Tubo') ? 'has-error' : ''}}">
    <label for="diametro_Tubo" class="control-label">{{ 'Diametro Tubo' }}</label>
    <select name="diametro_Tubo" class="form-control" id="diametro_Tubo" >
    @foreach (json_decode('{"3/4": "3/4", "1": "1", "1+1/4": "1+1/4", "1+1/2": "1+1/2","2": "2","2+1/2": "2+1/2","3": "3"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($costo_doblez->diametro_Tubo) && $costo_doblez->diametro_Tubo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('diametro_Tubo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('precio') ? 'has-error' : ''}}">
    <label for="precio" class="control-label">{{ 'Precio' }}</label>
    <input class="form-control" name="precio" type="number" id="precio" value="{{ isset($costo_doblez->precio) ? $costo_doblez->precio : ''}}" >
    {!! $errors->first ('precio', '<p class="help-block">:message</p>') !!}
</div>
                                   
                                

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
