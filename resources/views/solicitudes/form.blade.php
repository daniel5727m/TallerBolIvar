
<div class="form-group {{ $errors->has('tipo_trabajo') ? 'has-error' : ''}}">
    <div class="form-group {{ $errors->has('tipo_trabajo') ? 'has-error' : ''}} text-center">
        <label for="tipo_trabajo" class="control-label" style=" color: #31555e; margin-top: -25px; font-weight: bold; font-size: 22px;">{{ 'Tipo de Trabajo' }}</label>
    </div>
    <hr style="color: #cac6c6;">
    <div class="radio" style="margin-left: -40px;">
        <label style="color: #31555e;"><input id="c1" name="tipo_trabajo" type="radio" onchange="javascript:showContent()" value="Doblez" > Doblez</label>
        <label style="color: #31555e;"><input id="c2" name="tipo_trabajo" type="radio" onchange="javascript:showContent()" value="Curva" > Curva tipo arco</label>
        <label style="color: #31555e;"><input id="c3" name="tipo_trabajo" type="radio" onchange="javascript:showContent()" value="Escalera caracol" > Escalera caracol</label>
        <label style="color: #31555e;"><input id="c4" name="tipo_trabajo" type="radio" onchange="javascript:showContent()" value="ab" > Curva tipo AB</label>
    </div>

    {!! $errors->first('tipo_trabajo', '<p class="form-line">:message</p>') !!}
</div>
<hr style="color: #cac6c6;">
<div class="form-group {{ $errors->has('id_cliente') ? 'has-error' : ''}}">
    <label for="id_cliente" class="control-label">{{ 'Cliente' }}</label>
    <select name="id_cliente" class="form-control" id="id_cliente" required>
    @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}" >{{ $cliente->name }}</option>
    @endforeach
    </select>
    {!! $errors->first('id_cliente', '<p class="help-block">:message</p>') !!}
</div>

<!--INCIO DIAMETRO TUBO DIV -->
<div id="diametro_Tubo_div" style="display: none; width: 730px; margin-left: 0px;" class="form-group {{ $errors->has('diametro_Tubo') ? 'has-error' : ''}}">
    <label for="diametro_Tubo" class="control-label">{{ 'Diametro del tubo' }}</label>
    <select name="diametro_Tubo" class="form-control" id="diametro_Tubo" >
    @foreach ( $costo_doblezs as $doblez)
    <option value="{{ $doblez->diametro_Tubo }}" {{ (isset($solicitude->diametro_Tubo) && $solicitude->diametro_Tubo == $doblez->id) ? 'selected' : ''}}>{{ $doblez->diametro_Tubo }} (ø)</option>
         @endforeach

    </select>
    {!! $errors->first('diametro_Tubo', '<p class="help-block">:message</p>') !!}
</div>
<!--FIN DIAMETRO TUBO DIV -->

<!--INCIO DIAMETRO TUBO CUR -->
<div id="diametro_Tubo_curv" style="display: none;" class="form-group">
    <label for="diametro_Tubo_cur" class="control-label">{{ 'Diametro del tubo' }}</label>
    <select name="diametro_Tubo_cur" class="form-control" id="diametro_Tubo_cur" >
        @foreach ($costo_curvas as $cu)

        <option value="{{ $cu->id }}" {{ (isset($cu->diametro_Tubo) && $cu->diametro_Tubo == $cu->id) ? 'selected' : ''}}> {{ $cu->diametro_Tubo }} (ø)</option>

        @endforeach
    </select>
</div>

    </select>
</div>
<!--FIN DIAMETRO TUBO CUR -->

<!--INCIO DIAMETRO TUBO ESC -->
<div id="diametro_Tubo_escalera" style="display: none; width: 730px; margin-left: 20px; margin-top: -25px; margin-bottom: 30px;" class="form-group">
    <label for="diametro_Tubo_esc" class="control-label">{{ 'Diametro del tubo' }}</label>
    <select name="diametro_Tubo_esc" class="form-control" id="diametro_Tubo_esc" >
    @foreach ($costo_caracols as $ca)

    <option value="{{ $ca->diametro_Tubo }}" {{ (isset($ca->diametro_Tubo) && $ca->diametro_Tubo == $ca->id) ? 'selected' : ''}}> {{ $ca->diametro_Tubo }} (ø)</option>

    @endforeach
    </select>
</div>
<!--FIN DIAMETRO TUBO ESC -->

<!--INCIO DIAMETRO TUBO AB -->
<div id="diametro_Tubo_abs" style="display: none; width: 730px; margin-left: 20px; margin-top: -25px; margin-bottom: 30px;" class="form-group">
    <label for="diametro_Tubo_ab" class="control-label">{{ 'Diametro del tubo' }}</label>
    <select name="diametro_Tubo_ab" class="form-control" id="diametro_Tubo_ab" >
    @foreach ($costo_abs as $cc)

    <option value="{{ $cc->diametro_Tubo }}" {{ (isset($cc->diametro_Tubo) && $cc->diametro_Tubo == $cc->id) ? 'selected' : ''}}> {{ $cc->diametro_Tubo }} (ø)</option>

    @endforeach
    </select>
</div>
<!--FIN DIAMETRO TUBO AB -->

<div id="tipo_material" style="display: none; width: 730px; margin-top: -20px; margin-left: 20px;" class="form-group {{ $errors->has('tipo_material') ? 'has-error' : ''}}">
    <label for="tipo_material" class="control-label">{{ 'Tipo de material' }}</label>
    <select name="tipo_material" class="form-control" id="tipo_material" >
    @foreach (json_decode('{"Acero carbono": "Acero carbono", "Acero inoxidable": "Acero inoxidable ", "Acero galvanizado ": "Acero galvanizado "}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($solicitude->tipo_material) && $solicitude->tipo_material == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
    </select>
    {!! $errors->first('tipo_material', '<p class="help-block">:message</p>') !!}
</div>

<div id="espesor" style="display: none; width: 730px; margin-top: -10px; margin-left: 20px;" class="form-group {{ $errors->has('espesor') ? 'has-error' : ''}}">
    <label for="espesor" class="control-label">{{ 'Espesor de tubo' }}</label>
    <select name="espesor" class="form-control" id="espesor" >
        @foreach (json_decode('{
            "Calibre 22 (0.8mm)": "0.8mm (Calibre 22)",
            "Calibre 20 (1mm)": "1mm (Calibre 20)",
            "Calibre 18 (1.2mm)": "1.2mm (Calibre 18)",
            "Calibre 16 (1.5mm)": "1.5mm (Calibre 16)",
            "Calibre 14 (2mm)": "2mm (Calibre 14)",
            "Calibre 13 (2.5mm)": "2.5mm (Calibre 13)",
            "Calibre 12 (2.7mm)": "2.7mm (Calibre 12)",
            "Calibre 11 (3mm)": "3mm (Calibre 11)"
        }', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($solicitude->espesor) && $solicitude->espesor == $optionKey) ? 'selected' : ''}}>
                {{ $optionValue }}
            </option>
        @endforeach
</select>
    {!! $errors->first('espesor', '<p class="help-block">:message</p>') !!}
</div>

<div id=longitud_tubo style="display: none; width: 730px; margin-top: -10px; margin-left: 20px;" class="form-group {{ $errors->has('longitud_tubo') ? 'has-error' : ''}}">
    <label for="longitud_tubo" class="control-label">{{ 'Longitud del tubo(cm)' }}</label>
    <input class="form-control" name="longitud_tubo" type="number" id="longitud_tubo" value="{{ isset($solicitude->longitud_tubo) ? $solicitude->longitud_tubo : ''}}" min="0">
    {!! $errors->first('longitud_tubo', '<p class="help-block">:message</p>') !!}
</div>

<div id="numero_pasamanos_uno" style="display: none; width: 730px; margin-left: 20px" class="form-group {{ $errors->has('numero_pasamanos_uno') ? 'has-error' : ''}}">
    <label for="numero_pasamanos_uno" class="control-label">{{ 'Número de curvas escalera' }}</label>
    <input class="form-control" name="numero_pasamanos_uno" type="number" id="numero_pasamanos_uno" value="{{ isset($solicitude->numero_pasamanos_uno) ? $solicitude->numero_pasamanos_uno : ''}}" min="0">
    {!! $errors->first('numero_pasamanos_uno', '<p class="help-block">:message</p>') !!}
</div>

 <div id="hay_soldadura" style="display: none; width: 730px; margin-left: 120px;" class="form-group {{ $errors->has('hay_sol|dadura') ? 'has-error' : ''}}" >
    <label for="hay_soldadura" class="control-label">{{ '¿Hay soldadura?' }}</label>
    <div class="radio">
    <label><input id="c5" name="hay_soldadura" type="radio" onchange="javascript:showContent()" value="si"> Si</label>
    <label><input id="c6" name="hay_soldadura" type="radio" onchange="javascript:showContent()" value="no"> No</label>
</div>
    {!! $errors->first('hay_soldadura', '<p class="help-block">:message</p>') !!}
</div>

<div id="numero_soldadura" style="display: none; width: 730px; margin-left: 20px" class="form-group {{ $errors->has('numero_soldadura') ? 'has-error' : ''}}">
    <label for="numero_soldadura" class="control-label">{{ 'Número de soldadura' }}</label>
    <input class="form-control" name="numero_soldadura" type="number" id="numero_soldadura" value="{{ isset($solicitude->numero_soldadura) ? $solicitude->numero_soldadura : ''}}" min="0">
    {!! $errors->first('numero_soldadura', '<p class="help-block">:message</p>') !!}
</div>


<div id="hay_cortes" style="display: none; width: 730px; margin-left: 120px" class="form-group {{ $errors->has('hay_cortes') ? 'has-error' : ''}}">
    <label for="hay_cortes" class="control-label">{{ '¿Hay cortes?' }}</label>
    <div class="radio">
    <label><input id="c9" name="hay_cortes" type="radio" onchange="javascript:showContent()" value="si"> Si</label>
    <label><input id="c10" name="hay_cortes" type="radio" onchange="javascript:showContent()" value="no"> No</label>
</div>

<div id="numero_cortes" style="display: none; width: 730px; margin-left: -100px;" class="form-group {{ $errors->has('numero_cortes') ? 'has-error' : ''}}">
    <label for="numero_cortes" class="control-label">{{ 'Cantidad de cortes' }}</label>
    <input class="form-control" name="numero_cortes" type="number" id="numero_cortes" value="{{ isset($solicitude->numero_cortes) ? $solicitude->numero_cortes : ''}}" min="0">
    {!! $errors->first('numero_cortes', '<p class="help-block">:message</p>') !!}
</div>

<div id="numero_tubos" style="display: none; width: 730px; margin-left: -100px" class="form-group {{ $errors->has('numero_tubos') ? 'has-error' : ''}}">
    <label for="numero_tubos" class="control-label">{{ 'Cantidad de tubos' }}</label>
    <span>(Dato informativo)</span>
    <input class="form-control" name="numero_tubos" type="number" id="numero_tubos" value="{{ isset($solicitude->numero_tubos) ? $solicitude->numero_tubos : ''}}" min="0">
    {!! $errors->first('numero_tubos', '<p class="help-block">:message</p>') !!}
</div>

<div id="sentido" style="display: none; width: 730px; margin-left: -100px">
    <label for="sentido" class="form-control">{{ 'Sentido' }}</label>
    @foreach (json_decode('{"Mano derecha": "Mano derecha", "Mano izquierda": "Mano izquierda"}', true) as $optionKey => $optionValue)
        <input type="radio" name="sentido" value="{{ $optionKey }}" id="{{ $optionKey }}" {{ (isset($solicitude->sentido) && $solicitude->sentido == $optionKey) ? 'checked' : '' }}>
        <label for="{{ $optionKey }}">{{ $optionValue }}</label>
    @endforeach
</div>

<div id="numero_dobleces_div" style="display: none; width: 730px; margin-left: -100px" class="form-group {{ $errors->has('numero_dobleces') ? 'has-error' : ''}}">
    <label for="numero_dobleces" class="control-label" >{{ 'Cantidad de dobleces' }}</label>
    <input class="form-control" name="numero_dobleces" type="number" id="numero_dobleces" value="{{ isset($solicitude->numero_dobleces) ? $solicitude->numero_dobleces : ''}}" min="0">
    {!! $errors->first('numero_dobleces', '<p class="help-block">:message</p>') !!}
</div>

<div id="angulos" style="display: none; width: 730px; margin-left: -100px" class="form-group {{ $errors->has('angulos') ? 'has-error' : ''}}">
    <label for="angulos" class="control-label">{{ 'Angulos (medidas de angulo 10°,20°,30°,40°)' }}</label>
    <span>(Dato informativo)</span>
    <input class="form-control" name="angulos" type="text" id="angulos" value="{{ isset($solicitude->angulos) ? $solicitude->angulos : ''}}" >
    {!! $errors->first('angulos', '<p class="help-block">:message</p>') !!}
</div>

<div id="numero_curvas_div" style="display: none; width: 730px; margin-left: -100px"  class="form-group {{ $errors->has('numero_curvas') ? 'has-error' : ''}}">
    <label for="numero_curvas" class="control-label">{{ 'Número de curvas' }}</label>
    <input class="form-control" name="numero_curvas" type="number" id="numero_curvas" value="{{ isset($solicitude->numero_curvas) ? $solicitude->numero_curvas : ''}}" min="0">
    {!! $errors->first('numero_curvas', '<p class="help-block">:message</p>') !!}
</div>

<div id="plantilla" style="display: none; width: 730px; margin-left: -100px" class="form-group {{ $errors->has('plantilla') ? 'has-error' : ''}}">
    <label for="plantilla" class="control-label">{{ '¿Se entrega Plantilla?' }}</label>
    <div class="radio">
    <label><input name="plantilla" type="radio" value="si" {{ (isset($solicitude) && 1 == $solicitude->plantilla) ? 'checked' : '' }}> Si</label>
</div>
<div class="radio">
    <label><input name="plantilla" type="radio" value="no" @if (isset($solicitude)) {{ (0 == $solicitude->plantilla) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('plantilla', '<p class="help-block">:message</p>') !!}
</div>

<div id="ancho" style="display: none; width: 730px; margin-left: -100px" class="form-group {{ $errors->has('ancho') ? 'has-error' : ''}}">
    <label for="ancho" class="control-label">{{ 'Ancho de la curva (cm)' }}</label>
    <input class="form-control" name="ancho" type="number" id="ancho" value="{{ isset($solicitude->ancho) ? $solicitude->ancho : ''}}" min="0">
    {!! $errors->first('ancho', '<p class="help-block">:message</p>') !!}
</div>

<div id="altura" style="display: none; width: 730px; margin-left: -100px {{ $errors->has('altura') ? 'has-error' : ''}}">
    <label for="altura" class="control-label">{{ 'Alto de la curva (cm)' }}</label>
    <input class="form-control" name="altura" type="number" id="altura" value="{{ isset($solicitude->altura) ? $solicitude->altura : ''}}" min="0">
    {!! $errors->first('altura', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div id="hay_pasamanos" style="display: none; width: 730px; margin-left: 20px" class="form-group {{ $errors->has('hay_pasamanos') ? 'has-error' : ''}}">
    <label for="hay_pasamanos" class="control-label">{{ '¿Hay pasamanos secundarios?' }}</label>
    <div class="radio">
    <label><input id="c7" name="hay_pasamanos" type="radio" onchange="javascript:showContent()" value="si"> Si</label>
    <label><input id="c8" name="hay_pasamanos" type="radio" onchange="javascript:showContent()" value="no"> No</label>

</div>
    {!! $errors->first('hay_pasamanos', '<p class="help-block">:message</p>') !!}
</div>
<br>
<div id="numero_pasamanos" style="display: none; width: 730px; margin-left: 20px; margin-top: -25px; margin-bottom: 30px;" class="form-group {{ $errors->has('numero_pasamanos') ? 'has-error' : ''}}">
    <label for="numero_pasamanos" class="control-label">{{ 'Número de pasamanos secundarios' }}</label>
    <input class="form-control" name="numero_pasamanos" type="number" id="numero_pasamanos" value="{{ isset($solicitude->numero_pasamanos) ? $solicitude->numero_pasamanos : ''}}" min="0">
    {!! $errors->first('numero_pasamanos', '<p class="help-block">:message</p>') !!}
</div>
<br>
<!--INCIO DIAMETRO TUBO ESC DOS -->
<div id="diametro_Tubo_escalerados" style="display: none; width: 730px; margin-left: 20px; margin-top: -25px; margin-bottom: 30px;" class="form-group">
    <label for="diametro_Tubo_escdos" class="control-label">{{ 'Diametro del tubo' }}</label>
    <select name="diametro_Tubo_escdos" class="form-control" id="diametro_Tubo_escdos" >
    @foreach ($costo_caracols as $ed)

    <option value="{{ $ed->diametro_Tubo }}" {{ (isset($ed->diametro_Tubo) && $ed->diametro_Tubo == $ed->id) ? 'selected' : ''}}> {{ $ed->diametro_Tubo }} (ø)</option>

    @endforeach
    </select>
</div>
<!--FIN DIAMETRO TUBO ESC DOS -->

<!-- FIN DIAMETRO TUBO  -->

<div id="huella" style="display: none; width: 730px; margin-left: 20px" class="form-group {{ $errors->has('huella') ? 'has-error' : ''}}" >
    <label for="huella" class="control-label">{{ 'Huella (cm)' }}</label>
    <input class="form-control" name="huella" type="number" id="huella" value="{{ isset($solicitude->huella) ? $solicitude->huella : ''}}" step="0.01" min="0">
    {!! $errors->first('huella', '<p class="help-block">:message</p>') !!}
</div>

<div id="contrahuella" style="display: none; width: 730px; margin-left: 20px" class="form-group {{ $errors->has('contrahuella') ? 'has-error' : ''}}">
    <label for="contrahuella" class="control-label">{{ 'Contrahuella (cm)' }}</label>
    <input class="form-control" name="contrahuella" type="number" id="contrahuella" value="{{ isset($solicitude->contrahuella) ? $solicitude->contrahuella : ''}}" step="0.01" min="0">
    {!! $errors->first('contrahuella', '<p class="help-block">:message</p>') !!}
</div>

<div id="diaExt" style="display: none; width: 730px; margin-left: 20px" class="form-group {{ $errors->has('diaExt') ? 'has-error' : ''}}">
    <label for="diaExt" class="control-label">{{ 'Diametro ext (cm)' }}</label>
    <input class="form-control" name="diaExt" type="number" id="diaExt" value="{{ isset($solicitude->diaExt) ? $solicitude->diaExt : ''}}" step="0.01" min="0">
    {!! $errors->first('diaExt', '<p class="help-block">:message</p>') !!}
</div>

 <div id="diaInt" style="display: none; width: 730px; margin-left: 20px" class="form-group {{ $errors->has('diaInt') ? 'has-error' : ''}}">
    <label for="diaInt" class="control-label">{{ 'Diametro int (cm)' }}</label>
    <input class="form-control" name="diaInt" type="number" id="diaInt" value="{{ isset($solicitude->diaInt) ? $solicitude->diaInt : ''}}" step="0.01" min="0">
    {!! $errors->first('diaInt', '<p class="help-block">:message</p>') !!}
</div>

 <div id="anchoPel" style="display: none; width: 730px; margin-left: 20px" class="form-group {{ $errors->has('anchoPel') ? 'has-error' : ''}}">
    <label for="anchoPel" class="control-label">{{ 'Ancho peldaño (cm)' }}</label>
    <input class="form-control" name="anchoPel" type="number" id="anchoPel" value="{{ isset($solicitude->anchoPel) ? $solicitude->anchoPel : ''}}" step="0.01" min="0">
    {!! $errors->first('anchoPel', '<p class="help-block">:message</p>') !!}
</div>

<div id="ab_div" style="display: none;">
    <div class="form-group {{ $errors->has('largo_total') ? 'has-error' : ''}}" style="width: 730px; margin-left: 20px;">
        <label for="largo_total" class="control-label">{{ 'Longitud Total (cm)' }}</label>
        <input class="form-control" name="largo_total" type="number" id="largo_total" value="{{ isset($solicitude->largo_total) ? $solicitude->largo_total : ''}}" min="0">
        {!! $errors->first('largo_total', '<p class="help-block">:message</p>') !!}
    </div>

<div class="form-group {{ $errors->has('largo_parte_recta') ? 'has-error' : ''}}" style="width: 730px; margin-left: 20px;">
    <label for="largo_parte_recta" class="control-label">{{ 'Longitud Parte Recta (cm)' }}</label>
    <input class="form-control" name="largo_parte_recta" type="number" id="largo_parte_recta" value="{{ isset($solicitude->largo_parte_recta) ? $solicitude->largo_parte_recta : ''}}" min="0">
    {!! $errors->first('largo_parte_recta', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('a') ? 'has-error' : ''}}" style="width: 730px; margin-left: 20px;">
    <label for="a" class="control-label">{{ 'A (Alto/cm)' }}</label>
    <input class="form-control" name="a" type="number" id="a" value="{{ isset($solicitude->a) ? $solicitude->a : ''}}" min="0">
    {!! $errors->first('a', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('b') ? 'has-error' : ''}}" style="width: 730px; margin-left: 20px;">
    <label for="b" class="control-label">{{ 'B (Largo/cm)' }}</label>
    <input class="form-control" name="b" type="number" id="b" value="{{ isset($solicitude->b) ? $solicitude->b : ''}}" min="0">
    {!! $errors->first('b', '<p class="help-block">:message</p>') !!}
</div>

</div>
<div id=des_solicitud style="display: none; width: 730px; margin-left: 20px" class="form-group {{ $errors->has('des_solicitud') ? 'has-error' : ''}}">
    <label for="des_solicitud" class="control-label">{{ 'Observaciones' }}</label>
    <textarea class="form-control" rows="5" name="des_solicitud" type="textarea" id="des_solicitud" value="{{ isset($solicitude->des_solicitud) ? $solicitude->des_solicitud : ''}}"> </textarea>
    {!! $errors->first('des_solicitud', '<p class="help-block">:message</p>') !!}
</div>

<div id="estado" style="display: none; width: 730px; margin-left: 20px" class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="control-label">{{ 'Estado' }}</label>
    <select name="estado" class="form-control" id="estado" >
    @foreach (json_decode('{"Cotizacion": "Cotizacion", "Solicitado": "Solicitado" }', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($solicitude->estado) && $solicitude->estado == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
</div>

 <div class="form-group">
     <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Crear' }}"> <!--
     <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}"> -->
</div>


<script type="text/javascript">
    function showContent() {

        check1 = document.getElementById("c1");
        check2 = document.getElementById("c2");
        check3 = document.getElementById("c3");
        check4 = document.getElementById("c4");
        check5 = document.getElementById("c5");
        check6 = document.getElementById("c6");
        check7 = document.getElementById("c7");
        check8 = document.getElementById("c8");
        check9 = document.getElementById("c9");
        check10 = document.getElementById("c10");

        diametro_Tubo_div = document.getElementById("diametro_Tubo_div");
        diametro_Tubo_curv = document.getElementById("diametro_Tubo_curv");
        diametro_Tubo_escalera = document.getElementById("diametro_Tubo_escalera");
        diametro_Tubo_escalerados = document.getElementById("diametro_Tubo_escalerados");
        diametro_Tubo_abs = document.getElementById("diametro_Tubo_abs");
        diametro_dos = document.getElementById("diametro_dos");
        longitud_tubo = document.getElementById("longitud_tubo");
        sentido = document.getElementById("sentido");
        //tamaño_tubo_div = document.getElementById("tamaño_tubo_div");
        numero_dobleces_div = document.getElementById("numero_dobleces_div");
        hay_cortes = document.getElementById("hay_cortes");
        numero_cortes = document.getElementById("numero_cortes");
        numero_curvas_div = document.getElementById("numero_curvas_div");
        ancho = document.getElementById("ancho");
        altura = document.getElementById("altura");
        //incluye_pasamanos_secundarios_div = document.getElementById("incluye_pasamanos_secundarios_div");
        ab_div = document.getElementById("ab_div");
        des_solicitud = document.getElementById("des_solicitud");
        espesor = document.getElementById("espesor");
        tipo_material = document.getElementById("tipo_material");
        numero_soldadura = document.getElementById("numero_soldadura");
        hay_soldadura = document.getElementById("hay_soldadura");
        hay_pasamanos = document.getElementById("hay_pasamanos");
        huella = document.getElementById("huella");
        contrahuella = document.getElementById("contrahuella");
        diaExt = document.getElementById("diaExt");
        diaInt = document.getElementById("diaInt");
        anchoPel = document.getElementById("anchoPel");
        numero_pasamanos = document.getElementById("numero_pasamanos");
        numero_pasamanos_uno = document.getElementById("numero_pasamanos_uno");
        numero_tubos = document.getElementById("numero_tubos");
        plantilla = document.getElementById("plantilla");
        estado = document.getElementById("estado");
        angulos = document.getElementById("angulos");
        //huella = document.getElementById("huella");


        if (check1.checked) {
            diametro_Tubo_div.style.display='block';
            diametro_Tubo_curv.style.display='none';
            diametro_Tubo_escalera.style.display='none';
            diametro_Tubo_abs.style.display='none';
            huella.style.display='none';
            contrahuella.style.display='none';
            diaExt.style.display='none';
            diaInt.style.display='none';
            anchoPel.style.display='none';
            //tamaño_tubo_div.style.display='none';
            longitud_tubo.style.display='block';
            numero_dobleces_div.style.display='';
            numero_curvas_div.style.display='none';
            ancho.style.display='none';
            altura.style.display='none';
            //incluye_pasamanos_secundarios_div.style.display='none';
            hay_pasamanos.style.display='none';
            ab_div.style.display='none';
            des_solicitud.style.display='block';
            espesor.style.display='block'
            tipo_material.style.display='block';
            hay_soldadura.style.display='block';
            hay_cortes.style.display='block';
            numero_tubos.style.display='block';
            sentido.style.display='none';
            plantilla.style.display='block';
            estado.style.display='block';
            angulos.style.display='block';
            numero_pasamanos_uno.style.display='none';

            if (check5.checked) {
            numero_soldadura.style.display='block';
            }
            else if (check6.checked) {
            numero_soldadura.style.display='none';
            }

            if(check7.checked){
                diametro_Tubo_escalerados.style.display='none';
                numero_pasamanos.style.display='none';

            }
            else if(check8.checked){
                diametro_Tubo_escalerados.style.display='none';
                numero_pasamanos.style.display='none';
            }

            if(check9.checked){
                numero_cortes.style.display='block';
            }
            else if(check10.checked){
                numero_cortes.style.display='none';
            }

        }
        else if (check2.checked) {
            diametro_Tubo_div.style.display='none';
            diametro_Tubo_curv.style.display='block';
            diametro_Tubo_escalera.style.display='none';
            diametro_Tubo_abs.style.display='none';
            //tamaño_tubo_div.style.display='block';
            longitud_tubo.style.display='none';
            numero_dobleces_div.style.display='none';
            //numero_cortes_div.style.display='none';
            numero_curvas_div.style.display='block';
            ancho.style.display='block';
            altura.style.display='block';
            //incluye_pasamanos_secundarios_div.style.display='none';
            hay_pasamanos.style.display='none';
            ab_div.style.display='none';
            des_solicitud.style.display='block';
            espesor.style.display='block';
            tipo_material.style.display='block';
            hay_soldadura.style.display='block';
            hay_cortes.style.display='block';
            numero_tubos.style.display='block';
            sentido.style.display='none';
            plantilla.style.display='block';
            estado.style.display='block';
            angulos.style.display='none';
            huella.style.display='none';
            contrahuella.style.display='none';
            diaExt.style.display='none';
            diaInt.style.display='none';
            anchoPel.style.display='none';
            numero_pasamanos_uno.style.display='none';

            if (check5.checked) {
            numero_soldadura.style.display='block';
            }
            else if (check6.checked) {
            numero_soldadura.style.display='none';
            }

            if(check7.checked){
                diametro_Tubo_escalerados.style.display='none';
                numero_pasamanos.style.display='none';
            }
            else if(check8.checked){
                diametro_Tubo_escalerados.style.display='none';
                numero_pasamanos.style.display='none';
            }

            if(check9.checked){
                numero_cortes.style.display='block';
            }
            else if(check10.checked){
                numero_cortes.style.display='none';
            }

        }
        else if (check3.checked) {
            diametro_Tubo_div.style.display='none';
            diametro_Tubo_curv.style.display='none';
            diametro_Tubo_escalera.style.display='block';
            diametro_Tubo_abs.style.display='none';
            huella.style.display='block';
            contrahuella.style.display='block';
            diaExt.style.display='block';
            diaInt.style.display='block';
            anchoPel.style.display='block';
            //tamaño_tubo_div.style.display='none';
            longitud_tubo.style.display='none';
            numero_dobleces_div.style.display='none';
            //numero_cortes_div.style.display='none';
            numero_curvas_div.style.display='none';
            ancho.style.display='none';
            altura.style.display='none';
            //incluye_pasamanos_secundarios_div.style.display='block';
            hay_pasamanos.style.display='block';
            ab_div.style.display='none';
            des_solicitud.style.display='block';
            espesor.style.display='block';
            tipo_material.style.display='block';
            hay_soldadura.style.display='block';
            hay_cortes.style.display='block';
            numero_tubos.style.display='block';
            sentido.style.display='block';
            plantilla.style.display='block';
            estado.style.display='block';
            angulos.style.display='none';
            numero_pasamanos_uno.style.display='block';

            if (check5.checked) {
            numero_soldadura.style.display='block';
            }
            else if (check6.checked) {
            numero_soldadura.style.display='none';
            }

            if (check7.checked){
                diametro_Tubo_escalerados.style.display='block';
                numero_pasamanos.style.display='block';
                //diametro_dos.style.display='block';
            }
            else if (check8.checked){
                diametro_Tubo_escalerados.style.display='none';
                numero_pasamanos.style.display='none';
                //diametro_dos.style.display='none';
            }

            if(check9.checked){
                numero_cortes.style.display='block';
            }
            else if(check10.checked){
                numero_cortes.style.display='none';
            }


        }
        else if (check4.checked) {
            diametro_Tubo_div.style.display='none';
            diametro_Tubo_curv.style.display='none';
            diametro_Tubo_escalera.style.display='none';
            diametro_Tubo_escalerados.style.display='none';
            diametro_Tubo_abs.style.display='block';
            huella.style.display='none';
            contrahuella.style.display='none';
            diaExt.style.display='none';
            diaInt.style.display='none';
            anchoPel.style.display='none';
            //tamaño_tubo_div.style.display='block';
            longitud_tubo.style.display='none';
            numero_dobleces_div.style.display='none';
            //numero_cortes_div.style.display='block';
            numero_curvas_div.style.display='block';
            ancho.style.display='none';
            altura.style.display='none';
            //incluye_pasamanos_secundarios_div.style.display='none';
            hay_pasamanos.style.display='none';
            ab_div.style.display='block';
            des_solicitud.style.display='block';
            espesor.style.display='block';
            tipo_material.style.display='block';
            hay_soldadura.style.display='block';
            hay_cortes.style.display='block';
            numero_tubos.style.display='block';
            sentido.style.display='none';
            plantilla.style.display='block';
            estado.style.display='block';
            angulos.style.display='none';
            numero_pasamanos_uno.style.display='none';

            if (check5.checked) {
            numero_soldadura.style.display='block';
            }
            else if (check6.checked) {
            numero_soldadura.style.display='none';
            }

            if(check7.checked){
                diametro_Tubo_escalerados.style.display='none';
                numero_pasamanos.style.display='none';
            }
            else if(check8.checked){
                diametro_Tubo_escalerados.style.display='none';
                numero_pasamanos.style.display='none';
            }

            if(check9.checked){
                numero_cortes.style.display='block';
            }
            else if(check10.checked){
                numero_cortes.style.display='none';
            }

        }

    }
</script>



