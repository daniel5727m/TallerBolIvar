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
            contexto.arc(530,260,150,22,2*Math.PI);
            contexto.stroke();

            contexto.font = "45px Arial";

            contexto.fillText("Longitud: " + $l.toFixed(0) + "cm", +340, canvas.height-166);
            contexto.fillText("Radio: " + $h+ "cm", +338, canvas.height + 160);
            contexto.fillText("Altura: " + $Altura, +120, canvas.height -20);
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
            contexto.scale(1,1);

            var $x = 300;
            var $y = 125;

            if ($orientacion == "Mano derecha") {
                drawManoDerecha();
            } else {
                drawManoIzquierda();
            }
        }

        function drawManoDerecha() {
        var offsetX = -10; // Valor de desplazamiento hacia la derecha, puedes ajustarlo según tu necesidad
        var $x = 300 + offsetX; // Aumenta la coordenada X para mover hacia la derecha
        var $y = 125;
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
            contexto.font = "14px Arial";
    /*      contexto.fillText("Nombre: " + $cliente, 10, canvas.height - 240);
    */      contexto.fillText("Diametro escalera: " + $diametroEsc, 10, canvas.height - 190);
            contexto.fillText("Diametro Pasamanos s:" + $diametroEsc2, 10, canvas.height - 177);
            contexto.fillText("Numero de tubos: " + $numeroTubos, 10, canvas.height - 164);
            contexto.fillText("Numero de Curvas: " + $numeroCurvas, 10, canvas.height - 151);
            contexto.fillText("Numero de tubos2: " + $numeroTubossec, 10, canvas.height - 139);
            contexto.fillText("Numero de curvas2: " + $numeroCurvassec, 10, canvas.height - 126);
            contexto.fillText("Rcm: " + $r.toFixed(0) + "cm", 10, canvas.height - 114);
            contexto.fillText("Hcm: " + $h + "cm", 10, canvas.height - 102);
            contexto.fillText("Sentido: " + $orientacion , 10, canvas.height - 91);
            contexto.fillText("Contrahuella: " + $contrahuella + "cm", 10, canvas.height - 79);
            contexto.fillText("HipotenusaDos: " +hipotenusaDos.toFixed(0) + "cm", 10, canvas.height - 67);
        }

        function drawManoIzquierda() {
            var offsetX = 65; // Valor de desplazamiento hacia la izquierda, puedes ajustarlo según tu necesidad

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
            contexto.font = "14px Arial";
    /*      contexto.fillText("Nombre: " + $cliente, 10, canvas.height - 240);
    */      contexto.fillText("Diametro escalera: " + $diametroEsc, 10, canvas.height - 190);
            contexto.fillText("Diametro Pasamanos s:" + $diametroEsc2, 10, canvas.height - 177);
            contexto.fillText("Numero de tubos: " + $numeroTubos, 10, canvas.height - 164);
            contexto.fillText("Numero de Curvas: " + $numeroCurvas, 10, canvas.height - 151);
            contexto.fillText("Numero de tubos2: " + $numeroTubossec, 10, canvas.height - 139);
            contexto.fillText("Numero de curvas2: " + $numeroCurvassec, 10, canvas.height - 126);
            contexto.fillText("Rcm: " + $r.toFixed(0) + "cm", 10, canvas.height - 114);
            contexto.fillText("Hcm: " + $h + "cm", 10, canvas.height - 102);
            contexto.fillText("Sentido: " + $orientacion , 10, canvas.height - 91);
            contexto.fillText("Contrahuella: " + $contrahuella + "cm", 10, canvas.height - 79);
            contexto.fillText("HipotenusaDos: " +hipotenusaDos.toFixed(0) + "cm", 10, canvas.height - 67);
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
            contexto.scale(0.55,0.55);

            var centerX = canvas.width / 2;
            var centerY = canvas.height / 2;
            contexto.font = "25px Arial";

            contexto.moveTo(centerX - $l/2, centerY);
            contexto.lineTo(centerX + $l/2, centerY);
            contexto.quadraticCurveTo(centerX + $l/2 + $b, centerY, centerX + $l/2 + $b, centerY + $a);
            contexto.stroke();

            contexto.fillText("A: " + $a , 360, canvas.height - 170);
            contexto.fillText("B: " + $b + "cm", + 360, canvas.height - 140);
            contexto.fillText("Largo parte recta: " + $l + "cm", + 360, canvas.height - 110);
            contexto.fillText("Longitud Total: " + $longitudTotal + "cm", + 360, canvas.height - 80);
            contexto.fillText("Diametro: " + $diametro, + 360, canvas.height - 50);
            contexto.fillText("Numero de tubos: " + $numeroTubos, + 360, canvas.height - 20);
            contexto.fillText("Numero de Curvas: " + $numeroCurvas, + 360, canvas.height + 10);
        }
    }

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
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin-top: -150px;">
                    <div class="card" style="margin-top: -5px; width: 440px;">
                        <div class="card-header" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">Solicitud {{ $solicitude->id }}</div>

                        <div class="card-body">
                            <button class="btn btn-warning btn-sm" onclick="history.back()">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás
                            </button>

                            <form method="POST" action="{{ url('solicitudes' . '/' . $solicitude->id . '/true') }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete solicitude" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar
                                </button>
                            </form>

                            <a href="{{ url('/pruebas') }}/{{ $solicitude->id }}" title="Go to Turn" class="btn btn-danger btn-sm" style="width:140px" target="_blank">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> Turno
                            </a>


                            <!-- Agregar la gráfica aquí -->
                            <div>
                                <div class="table-responsive">
                                    <hr style="width: 100%; color: #bcbcc3; height: 1.5px;">
                                    <h2><b>{{ $solicitude->tipo_trabajo }}</b></h2>
                                    @if($solicitude->tipo_trabajo == 'Doblez')
                                    <br>
                                    <br>
                                        <iframe id="iframe_doblez" src="http://localhost/tallerBolivar3/resources/views/solicitudes/flechas2.blade.php" width="350" height="200" frameborder="2;"></iframe>
                                    </div>
                                        @else
                                        <hr style="width: 100%; color: #bcbcc3; margin-bottom: 5px">
                                        <div class="modal-body" style="overflow: hidden;">
                                            <canvas id="canvas" width="350" height="200"></canvas>
                                        </div>
                                    @endif
                                </div>
                            </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            {{-- <tr><th>TURNO</th><td>{{ $solicitude->id }}</td></tr> --}}
                                            <tr><th> Cliente </th><td> {{ $solicitude->name }} </td></tr>
                                            <tr><th> Tipo de trabajo </th><td> {{ $solicitude->tipo_trabajo }} </td></tr>
                                            <tr><th> Tipo de material </th><td> {{ $solicitude->tipo_material }} </td></tr>
                                            <tr><th> Espesor de tubo </th><td> {{ $solicitude->espesor }} </td></tr>

                                            @if ($solicitude->hay_soldadura == "si")
                                            <tr><th>¿Hay soldadura?</th><td>{{ $solicitude->hay_soldadura }}</td></tr>
                                            <tr><th>Número de soldaduras</th><td>{{ $solicitude->numero_soldadura }}</td></tr>
                                            @endif

                                            @if ($solicitude->hay_cortes == "si")
                                            <tr><th>¿Hay cortes?</th><td>{{ $solicitude->hay_cortes }}</td></tr>
                                            <tr><th>Número de cortes</th><td>{{ $solicitude->numero_cortes }}</td></tr>
                                            @endif

                                            {{-- @if( $solicitude->tipo_trabajo =='Curva' || $solicitude->tipo_trabajo =='ab')
                                            <tr><th> Longitud Tubo(cm) </th><td> {{ $solicitude->longitud_tubo }} </td></tr>
                                            @endif --}}

                                            <tr><th> Número de tubos </th><td> {{ $solicitude->numero_tubos }} </td></tr>

                                            @if( $solicitude->tipo_trabajo =='Doblez')
                                            <tr><th> Diametro del tubo </th><td> {{ $solicitude->diametro_Tubo }} </td></tr>
                                            <tr><th> Número de dobleces </th><td> {{ $solicitude->numero_dobleces }} </td></tr>
                                            @if (!empty($solicitude->angulos))
                                            <tr><th>Angulos</th><td>{{ $solicitude->angulos }}</td></tr>
                                            @endif

                                            {{-- <!-- <tr><th> Total Doblez </th><td> ${{($solicitude->costo_doblex, 0, ',', '.') }} </td></tr>
                                             --> --}}
                                            @endif

                                            <!-- @if( $solicitude->tipo_trabajo =='Doblez' || $solicitude->tipo_trabajo =='ab')

                                            @endif -->
                                            @if ($solicitude->plantilla == "si")
                                            <tr><th>¿Se entrega plantilla?</th><td>{{ $solicitude->plantilla }}</td></tr>
                                            @endif


                                            @if( $solicitude->tipo_trabajo =='Curva')

                                            <tr><th> Diametro del tubo curva </th><td> {{ $solicitude->diametro_Tubo_cur}} </td></tr>
                                            <tr><th> Número de curvas </th><td> {{ $solicitude->numero_curvas }} </td></tr>
                                            <tr><th> IPC </th><td> {{ $ipc }} </td></tr>
                                            <tr><th> Factor2 </th><td> {{ $factor }}</td></tr>
                                            <tr><th> factor </th><td> {{ $factor0 }} </td></tr>
                                            <tr><th> Ancho de la curva (cm)</th><td> {{ $solicitude->ancho }} </td></tr>
                                            <tr><th> Altura de la curva (cm)</th><td> {{ $solicitude->altura }} </td></tr>
                                            <tr><th> Hipotenusa </th><td> {{ intval($solicitude->hipotenusa) }} </td></tr>
                                            <tr><th> Angulo de la curva </th><td> {{ intval($solicitude->anguloCurva) }} </td></tr>
                                            <tr><th> Longitud del arco (cm) </th><td> {{ intval($solicitude->longitudArco) }} </td></tr>
                                            <tr><th> Radio de la curva (cm)</th><td> {{ intval($solicitude->radio) }} </td></tr>
                                          <!--   <tr><th> Costo curvas</th><td>${{ number_format($solicitude->costo_curvax, 0, ',', '.') }} </td></tr>
                                             -->

                                            @endif
                                            @if( $solicitude->tipo_trabajo =='Escalera caracol')
                                            <tr><th> Diametro del tubo curva </th><td> {{ $solicitude->diametro_Tubo_escdos}} </td></tr>
                                            <tr><th> Sentido </th><td> {{ $solicitude->sentido }} </td></tr>
                                            <tr><th> Huella (cm) </th><td> {{ $solicitude->huella }} </td></tr>
                                            <tr><th> Contra-Huella (cm) </th><td> {{ $solicitude->contrahuella }} </td></tr>
                                            <tr><th> Diametro Ext (cm) </th><td> {{ $solicitude->diaExt }} </td></tr>
                                            <tr><th> Diametro Int (cm) </th><td> {{ $solicitude->diaInt }} </td></tr>
                                            <tr><th> Ancho Peldaño (cm) </th><td> {{ $solicitude->anchoPel }} </td></tr>
                                            <tr><th> Hipotenusa-Dos (cm) </th><td> {{ intval($solicitude->hipotenusaDos) }} </td></tr>
                                            <tr><th> A1 </th><td> {{ intval($solicitude->a1) }} </td></tr>
                                            <tr><th> A1Dos (cm) </th><td> {{ intval($solicitude->A1Dos) }} </td></tr>
                                            <tr><th> Rcm (cm) </th><td> {{ intval($solicitude->Rcm) }} </td></tr>
                                            <tr><th> Hcm (cm) </th><td> {{ $solicitude->Hcm }} </td></tr>
                                            <tr><th> Confirmacion cero (cm) </th><td> {{ $solicitude->zero }} </td></tr>
                                            @if ($solicitude->hay_pasamanos == "si")
                                            <tr><th>Incluye Pasamanos Secundarios</th><td>{{ $solicitude->hay_pasamanos }}</td></tr>
                                            <tr><th>Número de pasamanos secundarios</th><td>{{ $solicitude->numero_pasamanos }}</td></tr>
                                            <tr><th>Diametros de tubos secundarios</th><td>{{ $solicitude->diametro_Tubo_escdos }}</td></tr>
                                            <tr><th>costo caracols</th><td>${{ $solicitude->costo_caracols, 0, ',', '.' }} </td></tr>

                                            @endif

                                           <!--  <tr><th> Costo pasamanos </th><td> ${{ number_format($solicitude->costo_pasamanos, 0, ',', '.') }} </td></tr>
                                            <tr><th> Costo segundo pasamanos </th><td> ${{ number_format($solicitude->preciodos, 0, ',', '.') }} </td></tr>
         -->

                                            @endif
                                            @if($solicitude->tipo_trabajo =='ab')
                                            <tr><th> Diametro AB </th><td> {{ $solicitude->diametro_Tubo_ab }} </td></tr>
                                            <tr><th> Largo Total </th><td> {{ $solicitude->largo_total }} </td></tr>
                                            <tr><th> Largo Parte Recta </th><td> {{ $solicitude->largo_parte_recta }} </td></tr>
                                            <tr><th> A (alto) </th><td> {{ $solicitude->a }} </td></tr>
                                            <tr><th> B (largo) </th><td> {{ $solicitude->b }} </td></tr>
                                           <!--  <tr><th> Costo AB (largo) </th><td> $($solicitude->totalCaracol, 0, ',', '.') }} </td></tr> -->

                                            @endif

                                            @if($solicitude->precio_total != null)
                                            <tr>
                                                <th> Precio Total </th>
                                                <td> ${{ number_format($solicitude->precio_total, 0, ',', '.') }} </td>
                                            </tr>
                                        @endif


                                        @if (!empty($solicitude->des_solicitud))
                                        <tr>
                                            <th>Observaciones</th>
                                            <td>{{ $solicitude->des_solicitud }}</td>
                                        </tr>
                                    @endif

        <tr>
        <tr><th> Estado </th><td> {{ $solicitude->estado }} </td></tr>
        <!--     <th>costo doblex</th>
            <td>
                @if ($solicitude->costo_doblex !== null)
                    ${{ number_format($solicitude->costo_doblex, 0, ',', '.') }}
                @else
                    -
                @endif
            </td> -->
        </tr>
        <tr>
           <!--  <th>costo curvas</th>
            <td>
                @if ($solicitude->costo_curvax !== null)
                    ${{ number_format($solicitude->costo_curvax, 0, ',', '.') }}
                @else
                    -
                @endif
            </td> -->
        </tr>
        <tr>
            <!-- <th>costo de pasamanos</th>
            <td>
                @if ($solicitude->costo_pasamanos !== null)
                    ${{ number_format($solicitude->costo_pasamanos, 0, ',', '.') }}
                @else
                    -
                @endif
            </td> -->
        </tr>
        <tr>
            <!-- <th>costo de pasamanos dos</th>
            <td>
                @if ($solicitude->preciodos !== null)
                    ${{ number_format($solicitude->preciodos, 0, ',', '.') }}
                @else
                    -
                @endif
            </td> -->
        </tr>
        <tr>
        <!--     <th>total caracol</th>
            <td>
                @if ($solicitude->preciodos !== null)
                    ${{ number_format($solicitude->preciodos, 0, '.', ',') }}
                @else
                    -
                @endif

            </td> -->
        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        {{-- <button class="btn btn-secondary" type="action" onclick="window.print()">
                                                <i class="fa fa-print"></i>
                        </button> --}}


                    </div>
               {{--      <div class="col-md-6">
                            <div class="card">
                                <h2><b> {{ $solicitude->tipo_trabajo }} </b> </h2>
                                @if($solicitude->tipo_trabajo=='Doblez')
                                    <iframe  id="iframe_doblez"  src="http://localhost/tallerBolivar3/resources/views/solicitudes/flechas.blade.php" width="500" height="400"  frameborder="2"></iframe>
                               @else
                                <div class="modal-body" >
                                    <canvas id="canvas" width="650" height="250">
                                    </canvas>

                                </div>
                                @endif
                            </div>
                    </div> --}}
                </div>
            </div>


        @endguest
        @endsection
                            </div>
                            <!-- Fin de la gráfica -->

                        </div>
                    </div>
                </div>


                            {{-- <a href="{{ route('solicitudes.edit', ['id' => $solicitude->id]) }}" title="Editar Solicitud" class="btn btn-warning btn-sm" style="width:100px">
                                <i class="fa fa-pencil"aria-hidden="true"></i> Editar
                            </a> --}}
