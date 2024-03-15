@extends('layouts.input')

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


        <div class="card" style="width: 60rem;">
                    <div class="card-body">
                            <h2 ><b>Crear nuevo costo Curvas</b> </h2>
                        <a href="{{ url('/costo_curvas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if (Session::has('flash_message'))
                            <div class="alert alert-success" role="alert">
                            {{Session::get('flash_message')}}
                            </div>
                        @endif

                        <form method="POST" action="{{ url('/costo_curvas') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                         <!--form method="POST" action="{{ route('solicitudEnviar') }}" enctype="multipart/form-data"-->
                         @method('PUT')

                            {{ csrf_field() }}

                            @include ('costo_curvas.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>

@endguest
@endsection
