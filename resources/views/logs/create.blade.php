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
         

            <div class="col-md-9">
                <div class="card">
                    <h5>Create New log</h5>
                    <div class="card-body">
                        <a href="{{ url('/logs') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/logs') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('logs.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest
@endsection
