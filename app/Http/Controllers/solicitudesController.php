<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Menu;

use App\Http\Requests;
use App\Models\solicitude;
use App\Models\variable;
use App\Models\costo_doblez;
use App\Models\costo_curva;
use App\Models\costo_caracol;
use App\Models\costo_ab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use App\Exports\SolicitudesExport;
use App\Http\Controllers\SolicitudesController;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;


class solicitudesController extends Controller
 {
        private $factor; // Variable para almacenar el factor

        /**
         * @return void
         */
        public function __construct()
        {
            // Calcular el factor al crear una instancia del controlador
            $this->factor = $this->calcularFactor();
        }

        /**
         * @return float
         */
        private function calcularFactor()
{
    // Obtener el valor del factor
    $factor0 = Variable::where('nombre', 'factor0')->value('valor');

    // Obteniendo el valor de IPC desde la base de datos
    $ipcStr = Variable::where('nombre', 'ipc')->value('valor');

    // Removiendo el signo de porcentaje y convirtiendo a float
    $ipc = (float) rtrim($ipcStr, '%');

    // Calculando el factor
    $factor = $factor0 * (1 + ($ipc / 100)); // Convirtiendo el porcentaje a decimal

    // Actualizar el valor de $this->factor en la instancia actual del controlador
    $this->factor = $factor;

    // Actualizar o crear la variable "factor" en la base de datos
    Variable::updateOrCreate(
        ['nombre' => 'factor'],
        ['valor' => $factor]
    );

    // Devolver el valor del factor calculado
    return $factor;
}

    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
{
    // Obtener los perfiles del menú
    $objeto = new MenuController();
    $menu = $objeto->misPerfiles();

    // Obtener el término de búsqueda del formulario
    $keyword = $request->get('search');
    $perPage = 25;

    // Consulta para obtener las solicitudes junto con la información del cliente asociado
    $query = DB::table('solicitudes')
                ->select('solicitudes.*', 'users.name as cliente', 'users.telefono')
                ->leftJoin('users', 'solicitudes.id_cliente', '=', 'users.id');

    // Aplicar filtro de búsqueda si se proporciona
    if (!empty($keyword)) {
        $query->where(function($q) use ($keyword) {
            // Filtrar por tipo de trabajo y otros campos de la tabla 'solicitudes' y 'users'
            $q->whereRaw('solicitudes.tipo_trabajo LIKE ?', ["%$keyword%"])
                ->orWhere('solicitudes.diametro_Tubo', 'LIKE', "%$keyword%")
                ->orWhere('users.name', 'LIKE', "%$keyword%")
                ->orWhere('users.telefono', 'LIKE', "%$keyword%");
        });
    }

    // Obtener las solicitudes paginadas directamente en la consulta
    $solicitudes = $query->latest()->paginate($perPage);

    // Calcular la suma total de los precios totales de las solicitudes
    // Podrías considerar una consulta separada para optimizar el rendimiento
    $sumaTotal = $query->sum('solicitudes.precio_total');

    // Retornar la vista con los datos necesarios
    return view('solicitudes.index', compact('solicitudes', 'menu', 'sumaTotal', 'keyword'));
}
    /**
     *
     * @return \Illuminate\View\View
     */

     public function exportar($tipo_trabajo = null)
     {
         return (new SolicitudesExport($tipo_trabajo))->toResponse(request());
     }

    public function create()
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();

        $costo_doblezs=DB::select('SELECT * FROM costo_doblezs');
        $costo_curvas=DB::select('SELECT * FROM costo_curvas');
        $costo_caracols=DB::select('SELECT * FROM costo_caracols');
        $costo_abs=DB::select('SELECT * FROM costo_abs');
       //var_dump($costo_curvas);
        $clientes = DB::select('SELECT m.* FROM users m
        WHERE m.id_perfil=4 order by m.name');
        //$this->createDos();
        return view('solicitudes.create',compact('menu','clientes','costo_doblezs','costo_curvas','costo_caracols','costo_abs'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_trabajo' => 'required',
            'id_cliente' => 'required',
            'hay_cortes' => 'required_if:tipo_trabajo,Doblez,Curva,Escalera caracol,ab',
            'hay_soldadura' => 'required_if:tipo_trabajo,Doblez,Curva,Escalera caracol,ab',
            'numero_dobleces' => 'required_if:tipo_trabajo,Doblez',
            'numero_tubos' => 'required_if:tipo_trabajo,Doblez',
            'ancho' => 'required_if:tipo_trabajo,Curva',
            'altura' => 'required_if:tipo_trabajo,Curva',
            'huella' => 'required_if:tipo_trabajo,Escalera caracol',
            'contrahuella' => 'required_if:tipo_trabajo,Escalera caracol',
            'diaExt' => 'required_if:tipo_trabajo,Escalera caracol',
            'diaInt' => 'required_if:tipo_trabajo,Escalera caracol',
            'anchoPel' => 'required_if:tipo_trabajo,Escalera caracol',
            // Las nuevas validaciones para 'ab' solo se aplican cuando el tipo de trabajo es 'ab'
            'diametro_Tubo_ab' => 'required_if:tipo_trabajo,ab',
            'largo_total' => 'required_if:tipo_trabajo,ab',
            'largo_parte_recta' => 'required_if:tipo_trabajo,ab',
            'a' => 'required_if:tipo_trabajo,ab',
            'b' => 'required_if:tipo_trabajo,ab',
        ], [
            'tipo_trabajo.required' => '¡Debe seleccionar un tipo de trabajo!',
            'id_cliente.required' => '¡El campo ID cliente es obligatorio!',
            'hay_cortes.required_if' => '¡El campo ¿hay cortes? es obligatorio para este tipo de trabajo!',
            'hay_soldadura.required_if' => '¡El campo ¿hay soldadura? es obligatorio para este tipo de trabajo!',
            'numero_dobleces.required_if' => '¡El campo "Cantidad de dobleces" es obligatorio para el tipo de trabajo "doblez"!',
            'numero_tubos.required_if' => '¡El campo "Cantidad de tubos" es obligatorio para el tipo de trabajo "doblez"!',
            'ancho.required_if' => '¡El campo "ancho" es obligatorio para el tipo de trabajo "Curva"!',
            'altura.required_if' => '¡El campo "altura" es obligatorio para el tipo de trabajo "Curva"!',
            'huella.required_if' => '¡El campo "huella" es obligatorio para el tipo de trabajo "Escalera caracol"!',
            'contrahuella.required_if' => '¡El campo "contrahuella" es obligatorio para el tipo de trabajo "Escalera caracol"!',
            'diaExt.required_if' => '¡El campo "Diametro Ext (cm)" es obligatorio para el tipo de trabajo "Escalera caracol"!',
            'diaInt.required_if' => '¡El campo "Diametro Int (cm)" es obligatorio para el tipo de trabajo "Escalera caracol"!',
            'anchoPel.required_if' => '¡El campo "Ancho Peldaño (cm)" es obligatorio para el tipo de trabajo "Escalera caracol"!',
            'diametro_Tubo_ab.required_if' => '¡El campo "Diametro AB" es obligatorio para el tipo de trabajo "ab"!',
            'largo_total.required_if' => '¡El campo "Largo Total" es obligatorio para el tipo de trabajo "ab"!',
            'largo_parte_recta.required_if' => '¡El campo "Largo Parte Recta" es obligatorio para el tipo de trabajo "ab"!',
            'a.required_if' => '¡El campo "A (alto)" es obligatorio para el tipo de trabajo "ab"!',
            'b.required_if' => '¡El campo "B (largo)" es obligatorio para el tipo de trabajo "ab"!',
        ]);

        $requestData = $request->all();
        $variable = variable::findOrFail(1);
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();
        $clientes = DB::select('SELECT m.* FROM users m
        WHERE m.id_perfil=4 order by m.name');
        $costo_doblezs=DB::select('SELECT * FROM costo_doblezs');
        $costo_curvas=DB::select('SELECT * FROM costo_curvas');
        $costo_caracols=DB::select('SELECT * FROM costo_caracols');
        $costo_abs=DB::select('SELECT * FROM costo_abs');

        if($requestData['tipo_trabajo']=='Doblez'){
            $hay_soldadura = $requestData['hay_soldadura'];
            $numero_soldadura = $requestData['numero_soldadura'];
            $valorsoldadura = DB::table('variables')->where('nombre', 'valorSoldadura')->value('valor');

            if($hay_soldadura == "si"){
                $preciosoldadura = $valorsoldadura * $numero_soldadura;

            } else {
                $preciosoldadura = 0;
            }

            $requestData['precio_soldadura']= $preciosoldadura;

             //INICIO HAY CORTES
              $hay_cortes = $requestData['hay_cortes'];
              $numero_cortes = $requestData['numero_cortes'];
              $valorcortes = DB::table('variables')->where('nombre', 'valorCortes')->value('valor');
              // Obtener el valor del factor

               if($hay_cortes == "si"){
                  $preciocortes = $valorcortes * $numero_cortes;

              } else {
                  $preciocortes = 0;
              }

              $requestData['precio_cortes']= $preciocortes;
              //FIN HAY CORTES

              $numero_dobleces= $requestData['numero_dobleces'];
              $idDoblez = $request['diametro_Tubo'];

              $costo = DB::table('costo_doblezs')->where('diametro_Tubo',$idDoblez)->first();
              $factor = $this->calcularFactor();

              $prec = 0;
              if($costo){
                $prec =  $costo->precio;
              }
              $costo_doblex = $factor*($numero_dobleces*$prec);

              $requestData['costo_doblex']= $costo_doblex;

              $precio_total = $preciocortes + $preciosoldadura + $costo_doblex;
            // Aproximar al mayor siempre
              $precio_total = ceil($precio_total);

              $requestData['precio_total'] = $precio_total;

                // Llamada para actualizar el archivo Excel
                $this->updateExcel($solicitude);

               solicitude::create($requestData);
               return redirect('solicitudes')->with('flash_message', '¡Solicitud adicionada!');

        }

        if($requestData['tipo_trabajo']=='Escalera caracol'){
            //INICIO HAY SOLDADURA
            $hay_soldadura = $requestData['hay_soldadura'];
            $numero_soldadura = $requestData['numero_soldadura'];
            $valorsoldadura = DB::table('variables')->where('nombre', 'valorSoldadura')->value('valor');

            if($hay_soldadura == "si"){
                 $preciosoldadura = $valorsoldadura * $numero_soldadura;

             } else {
                 $preciosoldadura = 0;
             }

             $requestData['precio_soldadura']= $preciosoldadura;
            //FIN HAY SOLDADURA

            //INICIO HAY CORTES
               $hay_cortes = $requestData['hay_cortes'];
               $numero_cortes = $requestData['numero_cortes'];
               $valorcortes = DB::table('variables')->where('nombre', 'valorCortes')->value('valor');

                if($hay_cortes == "si"){
                   $preciocortes = $valorcortes * $numero_cortes;

               } else {
                   $preciocortes = 0;
               }

               $requestData['precio_cortes']= $preciocortes;
               //FIN HAY CORTES


            //INICIO DE HIPOTENUSA DOS
            $huella= $requestData['huella'];
            $contrahuella= $requestData['contrahuella'];
            $hipotenusaDos = pow((pow($huella,2) + pow($contrahuella,2)),(1/2));
            $requestData['hipotenusaDos']= $hipotenusaDos;
            //FIN HIPOTENUSA DOS

            //INICIO FACTOR A1-DOS
            if ($hipotenusaDos != 0 && $huella != 0) {
                $A1Dos = $hipotenusaDos / $huella;
                $requestData['A1Dos'] = $A1Dos;
             } else {
                // En caso de que la hipotenusa2 o la huella sean cero o no válidos, se puede asignar un valor predeterminado a $A1Dos, como cero o uno
                $A1Dos = 0; // o 1, dependiendo de lo que sea más apropiado para la aplicación
                $requestData['A1Dos'] = $A1Dos;
             }
            //FIN FACTOR A1-DOS

            //INICIO R
            $diaExt= $requestData['diaExt'];
            $Rcm = $diaExt * $A1Dos / 2;
            $requestData['Rcm']= $Rcm;
            //FIN R

            //INICIO H
            $Hcm = $diaExt;
            $requestData['Hcm']= $Hcm;
            //FIN H

            //INICIO ZERO
            $anchoPel= $requestData['anchoPel'];
            $diaInt= $requestData['diaInt'];
            $zero = $diaExt - ((2 * $anchoPel) + $diaInt);
            $requestData['zero']= $zero;
            //FIN ZERO

            $numero_pasamanos_uno= $requestData['numero_pasamanos_uno'];
            $idCaracol = $request['diametro_Tubo_esc'];

            $costo = DB::table('costo_caracols')->where('diametro_Tubo', $idCaracol)->first();
            $factor = $this->calcularFactor();

            $prec = 0;
            if($costo){
                $prec = $costo->precio;

                }
                $costo_pasamanos = $factor*($numero_pasamanos_uno*$prec);

                $requestData['costo_pasamanos']= $costo_pasamanos;

            //HAY PASAMANOS SECUNDARIOS ?
            if (isset($requestData['hay_pasamanos']) && ($requestData['hay_pasamanos'] == 'sí' || $requestData['hay_pasamanos'] == 'no')) {
                $hay_pasamanos = $requestData['hay_pasamanos'];
             } else {
                // Si el valor de $hay_pasamanos no ha sido seleccionado o no es una opción válida, se puede asignar un valor predeterminado, como "no"
                $hay_pasamanos = 'no';
             }
            $idCaracoldos = $request['diametro_Tubo_escdos'];
            $numero_pasamanos = $request['numero_pasamanos'];

            $costo = DB::table('costo_caracols')->where('diametro_Tubo', $idCaracoldos)->first();
            $factor = $this->calcularFactor();

                $prec = 0;
                if($costo){
                    $prec = $costo->precio;

                }
                $preciodos = $factor*($numero_pasamanos*$prec);

                $requestData['preciodos']= $preciodos;

            /* if($hay_pasamanos == "si"){
                $preciodos = $preciodos;
            }else {
                $preciodos = 0;
            } */

            //INICIO SUMA TOTAL DE ESCALERA CARACOL

            $precio_total = ($preciosoldadura+$preciocortes+$costo_pasamanos+$preciodos);
            $requestData['precio_total']= $precio_total;
            //FIN SUMA TOTAL DE ESCALERA CARACOL

            solicitude::create($requestData);
            return redirect('solicitudes')->with('flash_message', 'solicitud adicionada!');


        }
        if($requestData['tipo_trabajo']=='ab'){

             //INICIO HAY SOLDADURA
             $hay_soldadura = $requestData['hay_soldadura'];
             $numero_soldadura = $requestData['numero_soldadura'];
             $valorsoldadura = DB::table('variables')->where('nombre', 'valorSoldar')->value('valor');

             if($hay_soldadura == "si"){
                 $preciosoldadura = $valorsoldadura * $numero_soldadura;

             } else {
                 $preciosoldadura = 0;
             }

             $requestData['precio_soldadura']= $preciosoldadura;

              //INICIO HAY CORTES
               $hay_cortes = $requestData['hay_cortes'];
               $numero_cortes = $requestData['numero_cortes'];
               $valorcortes = DB::table('variables')->where('nombre', 'valorCortes')->value('valor');

                if($hay_cortes == "si"){
                   $preciocortes = $valorcortes * $numero_cortes;

               } else {
                   $preciocortes = 0;
               }

               $requestData['precio_cortes']= $preciocortes;
               //FIN HAY CORTES

               $numero_curvas= $requestData['numero_curvas'];
               $idAb = $request['diametro_Tubo_ab'];

               $costo = DB::table('costo_abs')->where('diametro_Tubo',$idAb)->first();
               $factor = $this->calcularFactor();

                $prec = 0;
                if($costo){
                    $prec =  $costo->precio;

                }
                $costo_doblex = $factor*($numero_curvas*$prec);

                $requestData['costo_doblex']= $costo_doblex;

                $precio_total = $preciocortes + $preciosoldadura + $costo_doblex;
                $requestData['precio_total']= $precio_total;

            solicitude::create($requestData);
            return redirect('solicitudes')->with('flash_message', 'solicitud adicionada!');

        }

        if($requestData['tipo_trabajo']=='Curva'){

             //INICIO HAY SOLDADURA
             $hay_soldadura = $requestData['hay_soldadura'];
             $numero_soldadura = $requestData['numero_soldadura'];
             $valorsoldadura = DB::table('variables')->where('nombre', 'valorSoldadura')->value('valor');

             if($hay_soldadura == "si"){
                 $preciosoldadura = $valorsoldadura * $numero_soldadura;

             } else {
                 $preciosoldadura = 0;
             }

             $requestData['precio_soldadura']= $preciosoldadura;

              //INICIO HAY CORTES
               $hay_cortes = $requestData['hay_cortes'];
               $numero_cortes = $requestData['numero_cortes'];
               $valorcortes = DB::table('variables')->where('nombre', 'valorCortes')->value('valor');

                if($hay_cortes == "si"){
                   $preciocortes = $valorcortes * $numero_cortes;

               } else {
                   $preciocortes = 0;
               }

               $requestData['precio_cortes']= $preciocortes;
               //FIN HAY CORTES

               //NUMERO DE CURVAS
                $numero_curvas = $requestData['numero_curvas'];
                //echo($numero_curvas);
                $idCurva = $request['diametro_Tubo_cur'];
                //echo()
                //echo($idCurva);
                $costo = DB::table('costo_curvas')->where('id', $idCurva)->first();

                $prec = 0;
                if($costo){
                    //echo($precio);
                    $prec = $costo->precio;
                    $diametro_Tubo_cur = $costo->diametro_Tubo; // Asignar el valor de diametro_Tubo_cur
                    $requestData['diametro_Tubo_cur'] = $diametro_Tubo_cur; // Asignar el valor de diametro_Tubo_cur a la solicitud

                }
                //echo($precio);
                //echo($prec);
                $costo_curvax = ($numero_curvas*$prec);

                $requestData['costo_curvax'] = $costo_curvax;

                // INICIO CALCULO DE LA HIPOTENUSA
                $altura= $requestData['altura'];
                $ancho= $requestData['ancho'];

                $hipotenusa = sqrt(pow($altura, 2) + pow($ancho/2, 2));
                $requestData['hipotenusa']= $hipotenusa;
                // FIN CALCULO DE LA HIPOTENUSA

                // INICIO CALCULO DE CONSTANTE A1
                if (empty($altura)) {
                    echo "El campo está vacío";
                 } else {
                    $hipotenusa= $requestData['hipotenusa'];
                    $a1 = ($altura / $hipotenusa) * 2;
                    $requestData['a1']= $a1;
                 }
                //FIN CALCULO DE CONSTANTE A1

                // INICIO CALCULO DE RADIO
                if ($hipotenusa != 0 && $a1 != 0) {
                    $radio = ($hipotenusa / $a1);
                    $radio = round($radio, 2);
                    $requestData['radio'] = $radio;
                 } else {
                    // En caso de que la hipotenusa o $a1 sean cero o no válidos, se puede asignar un valor predeterminado al radio, como cero o uno
                    $radio = 0; // o 1, dependiendo de lo que sea más apropiado para la aplicación
                    $requestData['radio'] = $radio;
                 }
                // FIN CALCULO DE RADIO

                // INICIO CALCULO ANGULO CURVA
                if ($ancho != 0 && $radio != 0) {
                    $anguloCurva = rad2deg(asin(($ancho / 2) / $radio)) * 2;
                    $requestData['anguloCurva'] = $anguloCurva;
                 } else {
                    // En caso de que el ancho o el radio sean cero o no válidos, se puede asignar un valor predeterminado al ángulo de curva, como cero o uno
                    $anguloCurva = 0; // o 1, dependiendo de lo que sea más apropiado para la aplicación
                    $requestData['anguloCurva'] = $anguloCurva;
                 }
                // FIN CALCULO ANGULO CURVA


                //INICIO CALCULO LONGITUD DE ARCO
                $longitudArco = $anguloCurva * $radio * (M_PI / 180);
                $requestData['longitudArco']= $longitudArco;
                //FIN CALCULO LONGITUD DE ARCO

                //borrar

                function calcularResultado($longitudArco, $radio, $factor, $diametro_Tubo_cur)
                {
                    $resultado = 0;

                    // Función para convertir pulgadas a milímetros
                    function convertirPulgadasAMilimetros($diametro_Tubo_cur) {
                        // Verificar si $diametro_Tubo_cur es numérico
                        if (is_numeric($diametro_Tubo_cur)) {
                            // Convertir pulgadas a milímetros (1 pulgada = 25.4 milímetros)
                            return $diametro_Tubo_cur * 25.4;
                        } else {
                            // Si $diametro_Tubo_cur no es numérico, intentar evaluarlo como una expresión matemática
                            $resultado = @eval("return $diametro_Tubo_cur;");
                            if ($resultado === false) {
                                return "Error: El valor de entrada no es numérico o no se puede evaluar como una expresión matemática válida";
                            } else {
                                return $resultado * 25.4;
                            }
                        }
                    }

                    // Convertir el diámetro del tubo de pulgadas a milímetros
                    $diametro_Tubo_cur = convertirPulgadasAMilimetros($diametro_Tubo_cur);

                    if (is_numeric($diametro_Tubo_cur)) {
                        if ($longitudArco <= 2) {
                            $resultado = ($radio <= 1.5)
                                ? ((12.378 * $factor * pow($diametro_Tubo_cur, 2)) - (132.51 * $factor * $diametro_Tubo_cur) + (12792 * $factor))
                                : (
                                    ($radio > 1.5 && $radio <= 2.5)
                                        ? ((0.9728 * $factor * pow($diametro_Tubo_cur, 2)) + (261.05 * $factor * $diametro_Tubo_cur) + (8474.9 * $factor))
                                        : (
                                            ($radio >= 2.5)
                                                ? ((2.0553 * $factor * pow($diametro_Tubo_cur, 2)) + (85.258 * $factor * $diametro_Tubo_cur) + (9568.9 * $factor))
                                                : "No aplica"
                                        )
                                );
                        } elseif ($longitudArco > 2 && $longitudArco <= 4) {
                            $resultado = ($radio <= 1.5)
                                ? ((12.378 * $factor * pow($diametro_Tubo_cur, 2)) - (132.51 * $factor * $diametro_Tubo_cur) + (12792 * $factor))
                                : (
                                    ($radio > 1.5 && $radio <= 2.5)
                                        ? ((0.9728 * $factor * pow($diametro_Tubo_cur, 2)) + (261.05 * $factor * $diametro_Tubo_cur) + (8474.9 * $factor))
                                        : (
                                            ($radio >= 2.5)
                                                ? ((2.0553 * $factor * pow($diametro_Tubo_cur, 2)) + (85.258 * $factor * $diametro_Tubo_cur) + (9568.9 * $factor))
                                                : "No aplica"
                                        )
                                );
                        } elseif ($longitudArco > 4) {
                            $resultado = ($radio <= 1.5)
                                ? ((12.378 * $factor * pow($diametro_Tubo_cur, 2)) - (132.51 * $factor * $diametro_Tubo_cur) + (12792 * $factor))
                                : (
                                    ($radio > 1.5 && $radio <= 2.5)
                                        ? ((0.9728 * $factor * pow($diametro_Tubo_cur, 2)) + (261.05 * $factor * $diametro_Tubo_cur) + (8474.9 * $factor))
                                        : (
                                            ($radio >= 2.5)
                                                ? ((2.0553 * $factor * pow($diametro_Tubo_cur, 2)) + (85.258 * $factor * $diametro_Tubo_cur) + (9568.9 * $factor))
                                                : "No aplica"
                                        )
                                );
                            $resultado += 2000;
                        }
                    } else {
                        // Manejar el caso en que $diametro_Tubo_cur no sea numérico
                        $resultado = "No aplica";
                    }

                    if (is_numeric($resultado)) {
                        return ceil($resultado / 500) * 500;
                    } else {
                        return $resultado;
                    }
                }
        // Llamada al método calcularFactor() para obtener el valor de $factor
        $factor = $this->calcularFactor();

        // Llamada a la función calcularResultado() con $factor como argumento
        $resultadoFinal = calcularResultado($longitudArco, $radio, $factor, $diametro_Tubo_cur);


        // Convertir las variables a números si es posible
        $preciocortes = is_numeric($preciocortes) ? $preciocortes : 0;
        $preciosoldadura = is_numeric($preciosoldadura) ? $preciosoldadura : 0;
        $resultadoFinal = is_numeric($resultadoFinal) ? $resultadoFinal : 0;

        // Realizar la suma
        $precio_total = $preciocortes + $preciosoldadura + $resultadoFinal;
        $requestData['precio_total'] = $precio_total;

                        solicitude::create($requestData);
                        return redirect('solicitudes')->with('flash_message', 'solicitud adicionada!');
                }

                    }
            /**
             * Display the specified resource.
             *
             * @param  int  $id
             *
             * @return \Illuminate\View\View
             */
        public function show($id)
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();

        // Obtener el IPC del año actual de la tabla variables
        $ipc = DB::table('variables')->where('nombre', 'ipc')->value('valor');
        $factor0 = DB::table('variables')->where('nombre', 'factor0')->value('valor');

        // Obtener el factor actual de la tabla variables
        $factor = DB::table('variables')->where('nombre', 'factor')->value('valor');

        $solicitude = solicitude::findOrFail($id);

        $user = users::findOrFail($solicitude['id_cliente']);
        $solicitude['name'] = $user['name'];

        return view('solicitudes.show', compact('solicitude', 'menu', 'ipc', 'factor0', 'factor'));
    }

        public function edit($id)
        {
            $solicitude = solicitude::findOrFail($id);

            return view('solicitudes.edit', compact('solicitude'));
        }

        public function exportExcel($id)
        {
            $solicitud = Solicitude::findOrFail($id);
            return Excel::download(new SolicitudesExport($solicitud), 'solicitud_'.$id.'.xlsx');
        }

        public function updateEstadoRedirect(Request $request, Solicitude $solicitude)
        {
            $solicitude->estado = $request->estado;
            $solicitude->save();

            return redirect()->route('solicitudes.show', $solicitude);
        }



    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $solicitude = solicitude::findOrFail($id);
        $solicitude->update($requestData);

        return redirect('solicitudes')->with('flash_message', 'solicitude updated!');
    }

    private function updateExcel()
    {
        $filePath = storage_path('app/public/Solicitudes.xlsx');

        if (file_exists($filePath)) {
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
        } else {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Añadir encabezados si el archivo no existe
            $sheet->setCellValue('A1', 'ID');
            $sheet->setCellValue('B1', 'Tipo Trabajo');
            $sheet->setCellValue('C1', 'Tipo Material');
            $sheet->setCellValue('D1', 'Espesor de tubo');
            $sheet->setCellValue('E1', 'Fecha Creación');
            $sheet->setCellValue('F1', 'Estado');
            $sheet->setCellValue('G1', 'Precio Total');
            $sheet->setCellValue('H1', 'Cliente');
            $sheet->setCellValue('I1', 'Teléfono');
        }

        // Obtener la última fila con datos
        $lastRow = $sheet->getHighestRow();

        // Obtener los datos del cliente
        $cliente = DB::table('users')->find($solicitude->id_cliente);

        // Añadir los datos de la nueva solicitud
        $sheet->setCellValue('A' . ($lastRow + 1), $solicitude->id);
        $sheet->setCellValue('B' . ($lastRow + 1), $solicitude->tipo_trabajo);
        $sheet->setCellValue('C' . ($lastRow + 1), $solicitude->tipo_material);
        $sheet->setCellValue('D' . ($lastRow + 1), $solicitude->espesor);
        $sheet->setCellValue('E' . ($lastRow + 1), Carbon::parse($solicitude->created_at)->format('Y-m-d H:i:s'));
        $sheet->setCellValue('F' . ($lastRow + 1), $solicitude->estado);
        $sheet->setCellValue('G' . ($lastRow + 1), $solicitude->precio_total);
        $sheet->setCellValue('H' . ($lastRow + 1), $cliente->name);
        $sheet->setCellValue('I' . ($lastRow + 1), $cliente->telefono);

        // Guardar el archivo Excel
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        solicitude::destroy($id);

        return redirect('solicitudes')->with('flash_message', '¡La solicitud ha sido eliminada!');
    }

    }
