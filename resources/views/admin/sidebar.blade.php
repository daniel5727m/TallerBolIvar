<!-- <div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Inmobiliaria Esteban Ríos
        </div>

        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/solicitudes') }}">
                        Mis Solicitudes
                    </a>

                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{url('/solicitudes/create')}}">
                        PQRSD
                    </a>

                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="">
                        Mantenimiento
                    </a>

                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="">
                        Desocupaciones
                    </a>

                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/logs') }}">
                        Log de errores
                    </a>

                </li>
            </ul>
        </div>
    </div>
</div> -->

  <aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <img src='{{url("/img/navegador.png")}}' alt="" class="brand-image img-circle elevation-1" >
        <h5 style="color:rgb(252, 249, 249)">Taller Bolívar</h5>
    </a>

<br>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      @foreach($menu as $m)
               @if($m-> menu_id ==0)

              <p>
                &nbsp;&nbsp;<b> {{$m->nombre}}</b>

              </p>
          @else
            <a  href="{{ url($m->url) }}" class="nav-link">

              <p>
              &nbsp; &nbsp;<i class="{{$m->icono}}"></i>&nbsp; &nbsp;&nbsp;&nbsp;{{$m->nombre}}
                <!-- <span class="right badge badge-danger">{{$m->orden}}</span> -->
              </p>
            </a>
          @endif
          @endforeach
          <br><br><br>    <br><br><br>
      </div>
      <br><br>
    <!-- /.sidebar -->
  </aside><br><br><br><br>
