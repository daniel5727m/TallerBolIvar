<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            <!-- Inmobiliaria Esteban Ríos -->
            Taller Bolivar
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
                    <a href="{{url('/solicitudes/create/QUE')}}">
                        PQRSD
                    </a>
                   
                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{url('/solicitudes/create/MAN')}}">
                        Mantenimiento
                    </a>
                   
                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{url('/solicitudes/create/DES')}}">
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
</div>

