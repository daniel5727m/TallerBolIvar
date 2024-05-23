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
                                        <td>
                                            <select name="estado" onchange="handleEstadoChange(event, {{ $item->id }})">
                                                <option value="Cotización" {{ $item->estado === 'Cotización' ? 'selected' : '' }}>Cotización</option>
                                                <option value="Producción" {{ $item->estado === 'Producción' ? 'selected' : '' }}>Producción</option>
                                                <option value="Entregado" {{ $item->estado === 'Entregado' ? 'selected' : '' }}>Entregado</option>
                                            </select>
                                        </td>
                                        <td class="precio-total" style="text-align: right;">
                                            @if ($item->precio_total !== null)
                                                ${{ number_format($item->precio_total, 0) }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/solicitudes/' . $item->id) }}" title="Ver solicitud"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
               // Iterar sobre cada solicitud para verificar y establecer el estado guardado
               @foreach($solicitudes as $item)
                   let estado_{{ $item->id }} = localStorage.getItem('estado_{{ $item->id }}');
                   if (estado_{{ $item->id }}) {
                       document.querySelector('#row{{ $item->id }} select[name="estado"]').value = estado_{{ $item->id }};
                   }
               @endforeach
           });

           function copyToClipboard(elementId) {
       var rowData = $('#' + elementId).closest('tr').find('td').map(function() {
           if ($(this).find('select').length) {
               return $(this).find('select').val(); // Obtener solo el valor seleccionado del <select>
           }
           return $(this).text().trim(); // Quitar espacios en blanco adicionales
       }).get();

       var organizedData = rowData.slice(0, 3).join('\t') + '\t' + rowData.slice(3).join('\t');
       navigator.clipboard.writeText(organizedData)
           .then(() => {
               console.log('Texto copiado al portapapeles');
           })
           .catch(err => {
               console.error('Error al copiar el texto: ', err);
           });

       var textarea = document.createElement("textarea");
       textarea.textContent = organizedData;
       document.body.appendChild(textarea);

       textarea.select();
       document.execCommand('copy');

       document.body.removeChild(textarea);

       alert("Contenido copiado al portapapeles");
   }

   function copyAllToClipboard() {
       let rows = document.querySelectorAll('#example tbody tr');
       let textToCopy = ''; // Inicializar el texto vacío

       rows.forEach((row) => {
           let cells = row.querySelectorAll('td');
           let rowData = [];

           cells.forEach((cell, cellIndex) => {
               if (cell.querySelector('select')) {
                   rowData.push(cell.querySelector('select').value); // Obtener solo el valor seleccionado del <select>
               } else {
                   let cellText = cell.innerText.trim().replace(/\n/g, ' ');
                   if (cellIndex === cells.length - 1) { // Última columna (Precio Total)
                       cellText = cellText.replace(/\$/g, '').replace(/,/g, ''); // Remover símbolos de dólar y comas
                       // Si la celda de precio está vacía, mantenerla vacía
                       if (cellText === '') {
                           cellText = ''; // No agregar ningún espacio
                       } else {
                           cellText = ' ' + cellText; // Agregar un espacio al principio del precio
                       }
                   }
                   rowData.push(cellText);
               }
           });

           // Agregar espacios adicionales entre las celdas para que el ancho sea uniforme
           let formattedRowData = rowData.map((cellText, index) => {
               // No agregar espacio al principio del precio
               if (index === rowData.length - 3) {
                   return cellText.padStart(20); // PadStart para agregar espacios al principio de la celda
               } else {
                   return cellText.padEnd(20); // PadEnd para agregar espacios al final de la celda
               }
           });

           // Concatenar los datos de la fila
           let rowText = formattedRowData.join('\t');
           textToCopy += rowText + '\n'; // Añadir la fila a textToCopy
       });

       // Crear un elemento temporal para copiar el texto
       let tempElement = document.createElement('textarea');
       tempElement.style.position = 'absolute';
       tempElement.style.left = '-9999px';
       tempElement.value = textToCopy;
       document.body.appendChild(tempElement);
       tempElement.select();
       document.execCommand('copy');
       document.body.removeChild(tempElement);

       alert('Todas las solicitudes han sido copiadas al portapapeles');
   }

   // Función para agregar espacios a la derecha de cada celda para alinearlas uniformemente
   function padText(text, length) {
       return text + ' '.repeat(length - text.length);
   }

   function updateEstado(selectElement, solicitudId) {
       let nuevoEstado = selectElement.value;
       localStorage.setItem('estado_' + solicitudId, nuevoEstado);

       // Aquí puedes añadir código para enviar el nuevo estado al servidor si es necesario
   }
       </script>
@endguest
@endsection

