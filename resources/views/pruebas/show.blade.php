<script type="application/javascript">

function draw_curva() {
    var canvas = document.getElementById('canvas');
        var $l = Number('{{ $solicitude->longitudArco }}');
        var $h = Number('{{ $solicitude->radio}}');
        var $angulo = Number('{{ $solicitude->anguloCurva}}');
        var $cliente = ('{{ $solicitude->name }}');
        var $Altura = Number('{{ $solicitude->altura}}');
        var $Ancho = Number('{{ $solicitude->ancho}}');
        var $Turno = '{{ $solicitude->id }}';
        var $NumeroTubo = '{{ $solicitude->numero_tubos }}';
        var $NumeroCurvas = '{{ $solicitude->numero_curvas }}';
        var $TipoMaterial = '{{ $solicitude->tipo_material }}';
        var $diametro = ('{{ $solicitude->diametro_Tubo_cur }}');
if (canvas.getContext){
        var contexto  = canvas.getContext('2d');

        contexto.lineWidth = 4;

        contexto.scale(0.35,0.35);

        contexto.beginPath();
        contexto.arc(510,300,150,22,2*Math.PI);
        contexto.stroke();

        contexto.font = "55px Arial";

        contexto.fillText("Longitud: " + $l.toFixed(0) + "Cm", +330, canvas.height-135);
        contexto.fillText("Radio: " + $h+ "cm", +370, canvas.height +200);
        contexto.fillText("Altura: " + $Altura, +120, canvas.height +30);
    }
}

function draw_triangulo_rectangulo() {
        var canvas = document.getElementById('canvas');
        var $turno = ('{{ $solicitude->id }}');
        var $cliente = ('{{ $solicitude->name }}');
        var $diametroEsc = ('{{ $solicitude->diametro_Tubo_esc }}');
        var $diametroEsc2 = ('{{ $solicitude->diametro_Tubo_escdos }}');
        var $numeroTubos = Number({{ $solicitude->numero_tubos }});
        var $numeroCurvas = Number({{ $solicitude->numero_curvas }});
        var $numeroTubossec = Number({{ $solicitude->numero_pasamanos_uno }});
        var $numeroCurvassec = Number({{ $solicitude->numero_pasamanos }});
        var $orientacion = ('{{ $solicitude->sentido }}');
        var $r = Number({{ $solicitude->Rcm}});
        var $h = Number({{ $solicitude->Hcm}});
        var hipotenusaDos = Number({{ $solicitude->hipotenusaDos}});
        var $contrahuella = Number({{ $solicitude->contrahuella}});


        if (canvas.getContext){
            var contexto  = canvas.getContext('2d');

            contexto.lineWidth = 2;
            contexto.scale(1.20,1.20);

            var $x = 300;
            var $y = 125;

            if ($orientacion == "Mano derecha") {
                drawManoDerecha();
            } else {
                drawManoIzquierda();
            }
        }

        function drawManoDerecha() {
            var offsetX = -9; // Valor de desplazamiento hacia la derecha, puedes ajustarlo según tu necesidad
            var $x = 300 + offsetX; // Aumenta la coordenada X para mover hacia la derecha
            var $y = 124;
            var $xf = $x - $contrahuella * 3.5;
            var $yf = $y;
            var $xr = $x - $contrahuella * 3.5;
            var $yr = $y - hipotenusaDos * 3.5;

            contexto.beginPath();
            contexto.moveTo($x, $y);
            contexto.lineTo($xf, $yf);
            contexto.lineTo($xr, $yr);
            contexto.closePath();
            contexto.stroke();
            contexto.font = "12.5px Arial";
            contexto.fillText("Diametro escalera: " + $diametroEsc, 10, canvas.height - 200);
            contexto.fillText("Diametro Pasamanos s:" + $diametroEsc2, 10, canvas.height - 188);
            contexto.fillText("Numero de tubos: " + $numeroTubos, 10, canvas.height - 176);
            contexto.fillText("Numero de Curvas: " + $numeroCurvas, 10, canvas.height - 164);
            contexto.fillText("Numero de tubos2: " + $numeroTubossec, 10, canvas.height - 153);
            contexto.fillText("Numero de curvas2: " + $numeroCurvassec, 10, canvas.height - 142);
            contexto.fillText("Rcm: " + $r.toFixed(0) + "cm", 10, canvas.height - 130);
            contexto.fillText("Hcm: " + $h + "cm", 10, canvas.height - 118);
            contexto.fillText("Sentido: " + $orientacion , 10, canvas.height - 106);
            contexto.fillText("Contrahuella: " + $contrahuella + "cm", 10, canvas.height - 94);
            contexto.fillText("HipotenusaDos: " +hipotenusaDos.toFixed(0) + "cm", 10, canvas.height - 82);
        }

        function drawManoIzquierda() {
        var offsetX = 80 // Valor de desplazamiento hacia la izquierda, puedes ajustarlo según tu necesidad
        var $xf = $x - offsetX + $contrahuella * 3.5;
        var $yf = $y;
        var $xr = $x - offsetX + $contrahuella * 3.5;
        var $yr = $y - hipotenusaDos * 3.5;

        contexto.beginPath();
        contexto.moveTo($x - offsetX, $y); // Mueve el punto inicial hacia la izquierda
        contexto.lineTo($xf, $yf);
        contexto.lineTo($xr, $yr);
        contexto.closePath();
        contexto.stroke();
        contexto.font = "12.5px Arial";
        contexto.fillText("Diametro escalera: " + $diametroEsc, 10, canvas.height - 200);
        contexto.fillText("Diametro Pasamanos s:" + $diametroEsc2, 10, canvas.height - 188);
        contexto.fillText("Numero de tubos: " + $numeroTubos, 10, canvas.height - 176);
        contexto.fillText("Numero de Curvas: " + $numeroCurvas, 10, canvas.height - 164);
        contexto.fillText("Numero de tubos2: " + $numeroTubossec, 10, canvas.height - 153);
        contexto.fillText("Numero de curvas2: " + $numeroCurvassec, 10, canvas.height - 142);
        contexto.fillText("Rcm: " + $r.toFixed(0) + "cm", 10, canvas.height - 130);
        contexto.fillText("Hcm: " + $h + "cm", 10, canvas.height - 118);
        contexto.fillText("Sentido: " + $orientacion , 10, canvas.height - 106);
        contexto.fillText("Contrahuella: " + $contrahuella + "cm", 10, canvas.height - 94);
        contexto.fillText("HipotenusaDos: " +hipotenusaDos.toFixed(0) + "cm", 10, canvas.height - 82);
        }
    }

    function draw_ab() {
        var canvas = document.getElementById('canvas');
        var $a = Number('{{ $solicitude->a }}');
        var $b = Number('{{ $solicitude->b }}');
        var $l = Number('{{ $solicitude->largo_parte_recta }}');
        var $cliente = '{{ $solicitude->name }}';
        var $diametro = ('{{ $solicitude->diametro_Tubo_ab }}');
        var $turno = ('{{ $solicitude->id }}');
        var $numeroTubos = Number({{ $solicitude->numero_tubos }});
        var $numeroCurvas = Number({{ $solicitude->numero_curvas }});
        var $longitudTotal = Number({{ $solicitude->largo_total }});


        if (canvas.getContext){
            var contexto  = canvas.getContext('2d');
            contexto.lineWidth = 2;
            contexto.scale(0.58,0.58);

            var centerX = canvas.width / 2;
            var centerY = canvas.height / 2;
            contexto.font = "25px Arial";

            contexto.moveTo(centerX - $l/2, centerY);
            contexto.lineTo(centerX + $l/2, centerY);
            contexto.quadraticCurveTo(centerX + $l/2 + $b, centerY, centerX + $l/2 + $b, centerY + $a);
            contexto.stroke();

            contexto.fillText("A: " + $a , 360, canvas.height - 160);
            contexto.fillText("B: " + $b + "cm", + 360, canvas.height - 130);
            contexto.fillText("Largo pte. recta: " + $l + "cm", + 360, canvas.height - 100);
            contexto.fillText("Longitud Total: " + $longitudTotal + "cm", + 360, canvas.height - 70);
            contexto.fillText("Diametro: " + $diametro, + 360, canvas.height - 40);
            contexto.fillText("Numero de tubos: " + $numeroTubos, + 360, canvas.height - 10);
            contexto.fillText("Numero de Curvas: " + $numeroCurvas, + 360, canvas.height + 20);
            /* contexto.fillText("Nombre: " + $cliente, 300, canvas.height + 10);
            contexto.fillText("Turno # " + $turno, +300, canvas.height + 40); */
        }
    }



      // window.onload=draw_ab;
      //window.onload=draw_curva;

        var tipo_trabajo= '{{ $solicitude->tipo_trabajo }}';
        var iframe_doblez = document.getElementById("iframe_doblez");
        if(tipo_trabajo == 'ab') {window.onload=draw_ab; iframe_doblez.style.display='none';}
        if(tipo_trabajo == 'Curva'){ window.onload=draw_curva; iframe_doblez.style.display='none';}
        if(tipo_trabajo == 'Escalera caracol'){ window.onload=draw_triangulo_rectangulo; iframe_doblez.style.display='none';}



    </script>

    @extends('layouts.app')

    @section('content')
    @guest
        <div class="container">
            <div class="row">
                {{ __('Acceso incorrecto') }}
            </div>
        </div>
    @else
                <div class="col-md-6" style="margin-top: -160px;">
                    <div class="card" style="margin-top: -5px; width: 440px;">
                        <a class="brand-link" style=" height: 60px; width: 435px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                            <div style="display: flex; justify-content: center; padding-right: 190px; padding-top: 3px; height: 1vh;">
                                <img src="http://127.0.0.1:8000/img/navegador.png" alt="" class="brand-image img-circle elevation-1">
                            </div>
                            <h5 style="color:rgb(252, 249, 249); text-align: center; font-size: 23px; margin-top: -4px; margin-bottom: 20px;">Taller Bolívar</h5>
                        </a>

                        <div class="card-body">
                            {{-- <button class="btn btn-warning btn-sm" onclick="history.back()" title="Regresar"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button>
                            <!-- <a href="{{ url('/solicitudes') }}" title="Back"><button class="btn btn-warning btn-sm"><i aria-hidden="true"></i> turno</button></a> -->
                            <form method="POST" action="{{ url('solicitudes' . '/' . $solicitude->id . '/true') }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Borrar" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                            </form>
                            <a href="{{ url('/solicitudes/reate') }}" title="Nueva solicitud" class="btn btn-danger btn-sm" style="width:140px">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> Crear nueva
                            </a>
                           <!--  <a href="{{ route('solicitudes.edit', ['id' => $solicitude->id]) }}" title="Editar Solicitud" class="btn btn-warning btn-sm" style="width:100px">
                                <i class="fa fa-pencil"aria-hidden="true"></i> Editar
                            </a> --> --}}
                        <div class="table-responsive" style="margin-top: -20px; width:400px">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th id="turno">
                                            <span style="font-weight: 900; padding-left: 50px;">TURNO</span>
                                        </th>
                                        <td id="nt">
                                            <span style="font-weight: 900; padding-right: 80px;">#{{ $solicitude->id }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive" style="margin-bottom: {{ $solicitude->tipo_trabajo == 'Doblez' ? '-45px' : 'auto' }}; margin-top: -25px;">
                            <br>
                            @if($solicitude->tipo_trabajo == 'Doblez')
                                <iframe id="iframe_doblez" src="http://localhost/tallerBolivar3/resources/views/solicitudes/flechas.blade.php" width="500" height="300" frameborder="2" style="width: 100%;"></iframe>
                            @else
                        <div class="table-responsive" style="margin-bottom: -60px; margin-top: -20px;">
                            <div class="modal-body" style="overflow: hidden;">
                                <canvas id="canvas" width="350" height="210"></canvas>
                            </div>
                            @endif
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th style="width: 35%"> Tipo de trabajo </th><td style="width: 20%"> {{ $solicitude->tipo_trabajo }} </td></tr>
                                    <!-- <tr><th> Tipo de material </th><td> {{ $solicitude->tipo_material }} </td></tr> -->
                                    <!-- <tr><th> Espesor </th><td> {{ $solicitude->espesor }} </td></tr> -->
                                    <!-- <tr><th> ¿Hay soldadura? </th><td> {{ $solicitude->hay_soldadura }} </td></tr> -->
                                    <!-- <tr><th> Número de soldaduras </th><td> {{ $solicitude->numero_soldadura }} </td></tr> -->
                                    <!-- <tr><th> ¿Hay cortes? </th><td> {{ $solicitude->hay_cortes }} </td></tr> -->
                                    <!-- <tr><th> Número de cortes </th><td> {{ $solicitude->numero_cortes }} </td></tr> -->
                                    <!-- <tr><th> ¿Se entrega plantilla? </th><td> {{ $solicitude->plantilla }} </td></tr> -->

                                    @if( $solicitude->tipo_trabajo =='Curva' || $solicitude->tipo_trabajo =='ab')

                                    @endif


                                    <tr><th> Número de tubos </th><td> {{ $solicitude->numero_tubos }} </td></tr>

                                    @if( $solicitude->tipo_trabajo =='Doblez')
                                    <tr><th> Diametro del tubo </th><td> {{ $solicitude->diametro_Tubo }} </td></tr>
                                    <tr><th> Número de dobleces </th><td> {{ $solicitude->numero_dobleces }} </td></tr>
                                    <tr><th> Angulos </th><td> {{ $solicitude->angulos }} </td></tr>
                                    @endif


                                    @if( $solicitude->tipo_trabajo =='Curva')

                                    <tr><th> Diametro del tubo curva </th><td> {{ $solicitude->diametro_Tubo_cur}} </td></tr>
                                    <tr><th> Número de curvas </th><td> {{ $solicitude->numero_curvas }} </td></tr>
                                    <!-- <tr><th> Ancho de la curva (cm)</th><td> {{ $solicitude->ancho }} </td></tr> -->
                                    <!-- <tr><th> Altura de la curva (cm)</th><td> {{ $solicitude->altura }} </td></tr> -->
                                    <!-- <tr><th> Longitud de arco (cm) </th><td> {{ $solicitude->largo }} </td></tr> -->
                                    <!-- <tr><th> hipotenusa </th><td> {{ number_format($solicitude->hipotenusa, 2) }} </td></tr> -->
                                    <!-- <tr><th> A1 </th><td> {{($solicitude->a1) }} </td></tr> -->
                                    <!-- <tr><th> Angulo de la curva </th><td> {{ number_format($solicitude->anguloCurva, 2) }} </td></tr> -->
                                    <!-- <tr><th> longitud del arco </th><td> {{ number_format($solicitude->longitudArco, 2) }} </td></tr> -->
                                   {{--  <tr><th> Radio de la curva (cm)</th><td> {{intval ($solicitude->radio) }} </td></tr> --}}
                                    <!-- <tr><th> Longitud Tubo </th><td> {{ $solicitude->longitud_tubo }} </td></tr> -->
                                    {{-- <tr><th> Longitud Tubo(cm) </th><td> {{ $solicitude->longitud_tubo }} </td></tr>
 --}}
                                    @endif

                                    @if( $solicitude->tipo_trabajo =='Escalera caracol')
                                    <tr><th> Diametro del tubo curva </th><td> {{ $solicitude->diametro_Tubo_esc}} </td></tr>
{{--                                <tr><th> sentido </th><td> {{ $solicitude->sentido }} </td></tr>
 --}}                               <tr><th> Huella (cm) </th><td> {{ intval ($solicitude->huella) }} </td></tr>
{{--                                <tr><th> Contra-Huella (cm) </th><td> {{ $solicitude->contrahuella }} </td></tr>
 --}}                               <!-- <tr><th> Diametro Ext (cm) </th><td> {{ $solicitude->diaExt }} </td></tr> -->
                                    <!-- <tr><th> Diametro Int (cm) </th><td> {{ $solicitude->diaInt }} </td></tr> -->
                                    <!-- <tr><th> Ancho Peldaño (cm) </th><td> {{ $solicitude->anchoPel }} </td></tr> -->
                                    <tr><th> Hipotenusa-Dos (cm) </th><td> {{ intval ($solicitude->hipotenusaDos) }} </td></tr>
                                    <tr><th> A1Dos (cm) </th><td> {{ intval ($solicitude->A1Dos) }} </td></tr>
                                   {{--  <tr><th> Rcm (cm) </th><td> {{ intval ($solicitude->Rcm) }} </td></tr>
                                    <tr><th> Hcm (cm) </th><td> {{ intval ($solicitude->Hcm) }} </td></tr> --}}
                                    <!-- <tr><th> Confirmacion cero (cm) </th><td> {{ $solicitude->zero }} </td></tr> -->
                                    <!-- <tr><th> Incluye Pasamanos Secundarios </th><td> {{ $solicitude->hay_pasamanos }} </td></tr> -->
                                   {{--  <tr><th> Número de pasamanos secundarios </th><td> {{ $solicitude->numero_pasamanos }} </td></tr> --}}
{{--                                     <tr><th> Diametros de tubos secundarios </th><td> {{ $solicitude->diametro_Tubo_escdos }} </td></tr>
 --}}

                                    @endif
                                    @if($solicitude->tipo_trabajo =='ab')
{{--                                <tr><th> Diametro AB </th><td> {{ $solicitude->diametro_Tubo_ab }} </td></tr>
 --}}                               {{-- <tr><th> Largo Total </th><td> {{ $solicitude->largo_total }} </td></tr>
                                    <tr><th> Largo Parte Recta </th><td> {{ $solicitude->largo_parte_recta }} </td></tr> --}}
                                    <tr><th> A (alto) </th><td> {{ $solicitude->a }} </td></tr>
                                    <tr><th> B (largo) </th><td> {{ $solicitude->b }} </td></tr>
                                    <tr><th> Numero de curvas AB </th><td> {{ $solicitude->numero_curvas }} </td></tr>
                                    @endif
				                    <!-- <tr><th> *Observaciones </th><td> {{ $solicitude->des_solicitud }} </td></tr>	 -->
				                    <!-- <tr><th> Precio Total </th><td> ${{ number_format($solicitude->precio_total) }} </td></tr> -->
                                    <!-- <tr><th> Estado </th><td> {{ $solicitude->estado }} </td></tr> -->
                                    <!-- <tr><th> precio soldadura </th><td> ${{ number_format($solicitude->precio_soldadura)}}</td></tr> -->
                                    <!-- <tr><th> precio cortes </th><td> ${{ number_format($solicitude->precio_cortes)}}</td></tr> -->
                                    <!-- <tr><th> costo doblex </th><td> ${{ ($solicitude->costo_doblex)}}</td></tr> -->
                                    <!-- <tr><th> costo curvax </th><td> ${{ ($solicitude->costo_curvax)}}</td></tr> -->
                                    <!-- <tr><th> costo de pasamanos </th><td> {{ $solicitude->costo_pasamanos }} </td></tr> -->
                                    <!-- <tr><th> costo de pasamanos dos </th><td> {{ $solicitude->preciodos }} </td></tr> -->
                                </tbody>
                            </table>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endguest
    @endsection
