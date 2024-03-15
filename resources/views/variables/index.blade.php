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

        <style>
    input{

    margin: 0 auto;
    border-radius: 10px;
    border: 1px solid 599C9C;
    width: 300px;
    background-color: #e9ece9;
    color: rgb(105, 104, 104);

    }
         </style>

              <div class="card" style="width: 100rem; margin-top: -150px;">
                <div class="card-body">
                <h2 ><b> Variables </b></h2>
                        <br><br>
                        @if (Session::has('flash_message'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('flash_message')}}
                        </div>
                    @endif

                        <!-- a href="{{ url('/variables/create') }}" title="Editar usuario" title="Adicionar nuevo usuario"><button class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar </button></a -->

                        <!-- <form method="GET" action="{{ url('/solicitudes') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="{{ url('/solicitudes') }}" class="btn btn-secondary" title="Mis solicitudes">
                                        <i class="bi bi-filter"></i> Limpiar
                                    </a>
                                </span>

                            </div>
                        </form> -->

                        <br/>
                        <br/>
                        <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped cell-border" style="width:100% ">
                                <thead>
                                    <tr>
                                    <th>#</th><th>Nombre</th><th>Descripcion</th><th>Valor</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($variables as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td><td>{{ $item->descripcion }}</td><td>{{ $item->valor }}</td>
                                        <td>
                                            <a href="{{ url('/variables/' . $item->id . '/edit') }}" title="Editar variables"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>

                                            <!-- form method="POST" action="{{ url('/solicitudes' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar solicitud" onclick="return confirm(&quot;Está seguro de eliminar esta solicitud?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $variables->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest
@endsection
