@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">costo_doblez {{ $costo_doblez->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/costo_doblez') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/costo_doblez/' . $costo_doblez->id . '/edit') }}" title="Edit costo_doblez"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('costo_doblez' . '/' . $costo_doblez->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete costo_doblez" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <!-- <div>
                        Precio de la soldadura: {{ costoSoldadura($hay_soldadura, $numero_soldadura) }}
                        </div> -->

                                          

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $costo_doblez->id }}</td>
                                    </tr>
                                    <tr><th> Diametro Tubo </th><td> {{ $costo_doblez->diametro_Tubo }} </td></tr><tr><th> Precio </th><td> {{ $costo_doblez->precio }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{ costoSoldadura($hay_soldadura, $numero_soldadura) }}