@extends('layouts.app')
            
@section('content')
@guest
    <div class="container">
        <div class="row">
            {{ __('Acceso incorrecto') }}
        </div>
    </div>
@else 
<div class="card" style="width: 18rem;">
  <div class="card-body">

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
    <h5 >Log de Errores</h5>
                    
                  
                        <!--a href="{{ url('/logs/create') }}" class="btn btn-success btn-sm" title="Add New log">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a-->

                        <form method="GET" action="{{ url('/logs') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="{{ url('/logs') }}" class="btn btn-secondary" title="Mis solicitudes">
                                        <i class="bi bi-filter"></i> Limpiar
                                    </a>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-striped cell-border" style="width:100% ">
                                <thead>
                                    <tr>
                                        <th>No</th><th>Petición Api</th><th>Método Petición</th><th>Fecha Petición</th><!--th>Petición</th><th>Respuesta</th--><th>Estado</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td> <!-- $loop->iteration-->
                                        <td>{{ json_decode($item->peticion_api) }}</td><td>{{ $item->metodo_peticion }}</td><td>{{ $item->created_at }}</td>
                                        <!--td>{{ $item->peticion }}</td>
                                        <td>{{ $item->respuesta }}</td-->
                                        <td>{{ $item->exito }}</td>
                                        <td>
                                            <a href="{{ url('/logs/' . $item->id) }}" title="View log"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <!--a href="{{ url('/logs/' . $item->id . '/edit') }}" title="Edit log"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a-->

                                            <!--form method="POST" action="{{ url('/logs' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete log" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form-->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $logs->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest
@endsection


