@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
         
            <div class="card" style="width: 60rem;">
              <div class="card-body">
                     <h5>losg {{ $losg->id }}</h5>
                   

                        <a href="{{ url('/losgs') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/losgs/' . $losg->id . '/edit') }}" title="Edit losg"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                        <form method="POST" action="{{ url('losgs' . '/' . $losg->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete losg" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-striped cell-border" style="width:100% ">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $losg->id }}</td>
                                    </tr>
                                    <tr><th> Peticion Api </th><td> {{ $losg->peticion_api }} </td></tr><tr><th> Metodo Peticion </th><td> {{ $losg->metodo_peticion }} </td></tr><tr><th> Fecha </th><td> {{ $losg->fecha }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
