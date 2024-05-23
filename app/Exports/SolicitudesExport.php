<?php

namespace App\Exports;

use App\Models\Solicitude;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelType;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Events\AfterSheet;

class SolicitudesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    private $fileName = 'solicitudes.xlsx';
    private $writerType = ExcelType::XLSX;
    private $headers = [
        'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    ];
    private $tipo_trabajo;

    public function __construct($tipo_trabajo = null)
    {
        $this->tipo_trabajo = $tipo_trabajo;
    }

    public function collection(): Collection
    {
        $query = Solicitude::select('solicitudes.id', 'solicitudes.tipo_trabajo', 'solicitudes.tipo_material', 'solicitudes.espesor', 'solicitudes.created_at', 'solicitudes.estado', 'solicitudes.precio_total', 'users.name as cliente', 'users.telefono')
            ->leftJoin('users', 'solicitudes.id_cliente', '=', 'users.id');

        if ($this->tipo_trabajo) {
            $query->where('solicitudes.tipo_trabajo', $this->tipo_trabajo);
        }

        return $query->get()->map(function ($item) {
            $estado = '';

            switch ($item->estado) {
                case 'Cotización':
                    $estado = 'Cotización';
                    break;
                case 'Producción':
                    $estado = 'Producción';
                    break;
                case 'Entregado':
                    $estado = 'Entregado';
                    break;
                default:
                    $estado = $item->estado; // Asignar el estado directamente si no coincide con los casos anteriores
                    break;
            }

            return [
                'ID' => $item->id,
                'Tipo Trabajo' => $item->tipo_trabajo,
                'Cliente' => $item->cliente,
                'Contacto' => $item->telefono,
                'Tipo Material' => $item->tipo_material,
                'Espesor de tubo' => $item->espesor,
                'Fecha Creación' => Carbon::parse($item->created_at)->format('Y-m-d H:i:s'),
                'Estado' => $estado,
                'Precio Total' => $item->precio_total,
            ];
        });
    }

    public function headings(): array
    {
        return [
            '#',
            'Tipo Trabajo',
            'Cliente',
            'Contacto',
            'Tipo Material',
            'Espesor de tubo',
            'Fecha Creación',
            'Estado',
            'Precio Total',
        ];
    }

    public function toResponse($request): Response
    {
        return Excel::download($this, $this->fileName, $this->writerType, $this->headers);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:I1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                // Centrar el contenido de todas las celdas
                $event->sheet->getStyle('A1:I' . ($event->sheet->getHighestRow()))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            }
        ];
    }
}
?>
