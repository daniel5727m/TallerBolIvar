@extends('layouts.input')

@section('content')
@guest
    <div class="container">
        <div class="row">
            {{ __('Acceso incorrecto') }}
        </div>
    </div>
@else
    <div class="flex-container" style="padding-left:5px;">
        <div class="row">
            <div class="card" style="width: 50rem; margin-top: -130px;">
                <div class="card-body">
                    <h2><b>Nueva Solicitud</b></h2>
                    <br>
                    <br>

                    @if ($errors->any())
                        <div id="alertas" class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                            <center><p style="font-size: 1.2em; font-weight: bold; margin-top: 10px;">¡Por favor, refresca la página para continuar o presiona el botón!</p></center>
                            <button id="inicio" class="btn btn-primary">Volver al inicio</button>
                        </div>
                    @else
                        @if (Session::has('flash_message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ url('/solicitudes') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            @method('PUT')
                            {{ csrf_field() }}

                            @include('solicitudes.form', ['formMode' => 'create'])
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endguest

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Manejar evento de clic en el botón de volver al inicio
        document.getElementById("inicio").addEventListener("click", function() {
            // Redirigir al usuario de nuevo a la página de creación de solicitudes
            window.location.href = "/solicitudes/create";
        });
    });
</script>
@endsection
