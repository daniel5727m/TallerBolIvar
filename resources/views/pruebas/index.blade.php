@extends('layouts.app')

@section('content')
@guest
    <div class="container">
        <div class="row">
            {{ __('Acceso incorrecto') }}
        </div>
    </div>
@else
    <div class="container" style="padding-left:20px;">
        <div class="row">
            <style>
                input {
                    margin: 0 auto;
                    border-radius: 10px;
                    border: 1px solid 599C9C;
                    width: 300px;
                    background-color: #e9ece9;
                    color: rgb(105, 104, 104);
                }
            </style>

            <div class="card" style="margin-top: -165px;">
                <div class="card-body" style="margin-top: -8px;">
                    <h2 style="margin-top: 25px;"><b> Solicitudes</b></h2>
                    @if (Session::has('flash_message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('flash_message')}}
                        </div>
                    @endif

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped cell-border" style="width:100%">
                            <thead>
                                <tr class="the">
                                    <th>#</th>
                                    <th>Tipo Trabajo</th>
                                    <th>Cliente</th>
                                    <th>Tipo Material</th>
                                    <th>Espesor de tubo</th>
                                    <th>Fecha Creación</th>
                                    <th>Estado</th>
                                    <th>Precio Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($solicitudes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tipo_trabajo }}</td>
                                        <td>{{ $item->cliente }}<br>{{ $item->telefono }}</td>
                                        <td>{{ $item->tipo_material }}</td>
                                        <td>{{ $item->espesor }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->estado }}</td>
                                        <td class="precio-total" style="text-align: right;">
                                            @if ($item->precio_total !== null)
                                                ${{ number_format($item->precio_total, 0) }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/pruebas/' . $item->id) }}" title="Ver solicitud"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <form method="POST" action="{{ url('/solicitudes' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar solicitud" onclick="return confirm(&quot;Confirm delete?&quot;)" style="width: 30px;">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody id="total-row">
                                <tr style="background-color: #31555e; color: white;">
                                    <td colspan="7" style="text-align: center; font-weight: bold; font-size: larger; color: white;">TOTAL</td>
                                    <td style="font-weight: bold; color: white; text-align: right;">${{ number_format($sumaTotal, 0) }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest
@endsection
