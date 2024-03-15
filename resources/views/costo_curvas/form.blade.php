<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    <label for="tipo" class="control-label">{{ 'Tipo' }}</label>
    <select name="tipo" class="form-control" id="tipo" required>
        <option value="Tubería de Agua negra" {{ (isset($costo_curva->tipo) && $costo_curva->tipo == 'Tubería de Agua negra') ? 'selected' : ''}} >Tubería de Agua negra</option>
        <option value="Tubería galvanizada" {{ (isset($costo_curva->tipo) && $costo_curva->tipo == 'Tubería galvanizada') ? 'selected' : ''}} >Tubería galvanizada</option>
        <option value="Tubería inoxidable" {{ (isset($costo_curva->tipo) && $costo_curva->tipo == 'Tubería inoxidable') ? 'selected' : ''}} >Tubería inoxidable</option>
    </select>
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('diametro_Tubo') ? 'has-error' : ''}}">
    <label for="diametro_Tubo" class="control-label">{{ 'Diametro Tubo' }}</label>
    <select name="diametro_Tubo" class="form-control" id="diametro_Tubo" >
    @foreach (json_decode('{"1": "1", "1/2": "1/2", "1+1/2": "1+1/2", "1+1/4": "1+1/4", "2": "2","2+1/2": "2+1/2","3": "3", "3/4": "3/4", "3/8": "3/8", "4": "4" }', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($costo_curva->diametro_Tubo) && $costo_curva->diametro_Tubo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('diametro_Tubo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('radio_Curvatura') ? 'has-error' : ''}}">
    <label for="radio_Curvatura" class="control-label">{{ 'Radio Curvatura' }}</label>
    <select name="radio_Curvatura" class="form-control" id="radio_Curvatura" >
    @foreach (json_decode('{"0,5-1": "0,5-1","1-1,5": "1-1,5", "1,5-2": "1,5-2", "2-2,5": "2-2,5", "2,5-3": "2,5-3","3-3,5": "3-3,5","3,5-4": "3,5-4","4-4,5": "4-4,5","4,5-5": "4,5-5","5-6": "5-6","6-7": "6-7","7-8": "7-8","8-9": "8-9","9-10": "9-10","10-15": "10-15","15-20": "15-20","20": "20"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($costo_curva->radio_Curvatura) && $costo_curva->radio_Curvatura == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('radio_Curvatura', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('precio') ? 'has-error' : ''}}">
    <label for="precio" class="control-label">{{ 'Precio' }}</label>
    <input class="form-control" name="precio" type="number" id="precio" value="{{ isset($costo_curva->precio) ? $costo_curva->precio : ''}}" >
    {!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
