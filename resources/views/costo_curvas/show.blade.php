@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">costo_curva {{ $costo_curva->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/costo_curvas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/costo_curvas/' . $costo_curva->id . '/edit') }}" title="Edit costo_curva"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('costo_curvas' . '/' . $costo_curva->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete costo_curva" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $costo_curva->id }}</td>
                                    </tr>
                                    <tr><th> Tipo </th><td> {{ $costo_curva->tipo }} </td></tr><tr><th> Diametro Tubo </th><td> {{ $costo_curva->diametro_Tubo }} </td></tr><tr><th> Radio Curvatura </th><td> {{ $costo_curva->radio_Curvatura }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
