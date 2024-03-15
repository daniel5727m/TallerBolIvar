@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           

            <div class="col-md-9">
                <div class="card">
                    <h5>seguimiento {{ $seguimiento->id }}</h5>
                    <div class="card-body">

                        <a href="{{ url('/seguimientos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/seguimientos/' . $seguimiento->id . '/edit') }}" title="Edit seguimiento"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('seguimientos' . '/' . $seguimiento->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete seguimiento" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-striped cell-border" style="width:100% ">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $seguimiento->id }}</td>
                                    </tr>
                                    <tr><th> Id Solicitudes </th><td> {{ $seguimiento->id_solicitudes }} </td></tr><tr><th> Nro Solicitud </th><td> {{ $seguimiento->nro_solicitud }} </td></tr><tr><th> Estado </th><td> {{ $seguimiento->estado }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
