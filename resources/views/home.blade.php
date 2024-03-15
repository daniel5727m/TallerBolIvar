@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
<div class="card" style="width: 50rem;">
<div class="card-body text-center">
            <img src='{{url("/img/logo.jpg")}}' width="150" height="150" />
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <h5><strong>{{ __('!Bienvenid@!') }}</strong></h5> <h5>{{ Auth::user()->name }}</h5>

                </div>
            </div>
        </div>
        </div>
        </div>
@endsection
