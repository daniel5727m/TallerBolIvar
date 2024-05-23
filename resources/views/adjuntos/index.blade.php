@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


        <div class="card" style="width: 70rem;">
                <div class="card-body">
                    <h2>Adjuntos</h2>

                        <a href="{{ url('/adjuntos/create') }}" class="btn btn-success btn-sm" title="Add New adjunto">
                            <i class="fa fa-plus" aria-hidden="true"></i>Nuevo
                        </a>

                        <!-- <form method="GET" action="{{ url('/adjuntos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form> -->

                        <br/>
                        <br/>

                        <table id="example" class="table table-bordered table-striped cell-border" style="width:100% ">    <thead>
                                    <tr>
                                        <th>#</th><th>Id Solicitudes</th><th>Nro Solicitud</th><th>Cod Inmueble</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($adjuntos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->id_solicitudes }}</td><td>{{ $item->nro_solicitud }}</td><td>{{ $item->cod_inmueble }}</td>
                                        <td>
                                            <a href="{{ url('/adjuntos/' . $item->id) }}" title="View adjunto"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/adjuntos/' . $item->id . '/edit') }}" title="Edit adjunto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>

                                            <form method="POST" action="{{ url('/adjuntos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete adjunto" onclick="return confirm(&quot;¿Confirmar borrar??&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $adjuntos->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>

        </div>
    </div>
@endsection
