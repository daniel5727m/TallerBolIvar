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
        $solicitudes = solicitude::where('tipo_trabajo', 'LIKE', "%$keyword%")
            //->orWhere('idturno', 'LIKE', "%$keyword%")
            ->orWhere('diametro_Tubo', 'LIKE', "%$keyword%")
            ->orWhere('diametro_Tubo_cur', 'LIKE', "%$keyword%")
            ->orWhere('diametro_Tubo_esc', 'LIKE', "%$keyword%")
            ->orWhere('diametro_Tubo_escdos', 'LIKE', "%$keyword%")
            ->orWhere('diametro_Tubo_ab', 'LIKE', "%$keyword%")
            ->orWhere('tipo_material', 'LIKE', "%$keyword%")
            ->orWhere('espesor', 'LIKE', "%$keyword%")
            ->orWhere('longitud_tubo', 'LIKE', "%$keyword%")
            ->orWhere('angulos', 'LIKE', "%$keyword%")
            ->orWhere('hay_soldadura', 'LIKE', "%$keyword%")
            ->orWhere('numero_soldadura', 'LIKE', "%$keyword%")
            ->orWhere('numero_tubos', 'LIKE', "%$keyword%")
            ->orWhere('numero_dobleces', 'LIKE', "%$keyword%")
            ->orWhere('numero_curvas', 'LIKE', "%$keyword%")
            ->orWhere('hay_cortes', 'LIKE', "%$keyword%")
            ->orWhere('numero_cortes', 'LIKE', "%$keyword%")
            ->orWhere('sentido', 'LIKE', "%$keyword%")
            ->orWhere('plantilla', 'LIKE', "%$keyword%")
            ->orWhere('ancho', 'LIKE', "%$keyword%")
            ->orWhere('altura', 'LIKE', "%$keyword%")
            ->orWhere('radio', 'LIKE', "%$keyword%")
            ->orWhere('largo', 'LIKE', "%$keyword%")
            ->orWhere('hay_pasamanos', 'LIKE', "%$keyword%")
            ->orWhere('numero_pasamanos', 'LIKE', "%$keyword%")
            ->orWhere('numero_pasamanos_uno', 'LIKE', "%$keyword%")
            ->orWhere('diametro_dos', 'LIKE', "%$keyword%")
            ->orWhere('largo_total', 'LIKE', "%$keyword%")
            ->orWhere('largo_parte_recta', 'LIKE', "%$keyword%")
            ->orWhere('a', 'LIKE', "%$keyword%")
            ->orWhere('b', 'LIKE', "%$keyword%")
            ->orWhere('estado', 'LIKE', "%$keyword%")
            ->orWhere('precio_soldadura', 'LIKE', "%$keyword%")
            ->orWhere('precio_cortes', 'LIKE', "%$keyword%")
            ->orWhere('costo_doblex', 'LIKE', "%$keyword%")
            ->orWhere('costo_curvax', 'LIKE', "%$keyword%")
            ->orWhere('precio_total', 'LIKE', "%$keyword%")
            ->orWhere('hipotenusa', 'LIKE', "%$keyword%")
            ->orWhere('anguloCurva', 'LIKE', "%$keyword%")
            ->orWhere('longitudArco', 'LIKE', "%$keyword%")
            ->orWhere('huella', 'LIKE', "%$keyword%")
            ->orWhere('contrahuella', 'LIKE', "%$keyword%")
            ->orWhere('diaExt', 'LIKE', "%$keyword%")
            ->orWhere('diaInt', 'LIKE', "%$keyword%")
            ->orWhere('anchoPel', 'LIKE', "%$keyword%")
            ->orWhere('hipotenusaDos', 'LIKE', "%$keyword%")
            ->orWhere('A1Dos', 'LIKE', "%$keyword%")
            ->orWhere('Rcm', 'LIKE', "%$keyword%")
            ->orWhere('Hcm', 'LIKE', "%$keyword%")
            ->orWhere('zero', 'LIKE', "%$keyword%")
            ->orWhere('costo_pasamanos', 'LIKE', "%$keyword%")
            ->orWhere(' preciodos', 'LIKE', "%$keyword%")
            ->orWhere(' totalCaracol', 'LIKE', "%$keyword%")
            ->orWhere(' totalCaracolTotal', 'LIKE', "%$keyword%")

            ->latest()->paginate($perPage);
    } else {
        $solicitudes = solicitude::latest()->paginate($perPage);
        $solicitudes = DB::select('SELECT s.*,u.name as cliente,u.telefono FROM solicitudes s
        left join  users u  on u.id=s.id_cliente
    order by s.id asc');
    }

    $sumaTotal = $query->sum('solicitudes.precio_total');
    return view('solicitudes.index', compact('solicitudes', 'sumaTotal', 'keyword', 'menu'));
}

    /**
     *
     * @return \Illuminate\View\View
     */

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
     public function createDos()
    {
        //$costo_doblezs=DB::select('SELECT * FROM costo_doblezs');
        //$costo_curvas=DB::select('SELECT * FROM costo_curvas');

       // return view('solicitudes.createDos',compact('menu','clientes','costo_curvas'));

    }


    /**
     *
     * @return \Illuminate\View\View
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            /* 'tipo_trabajo' => 'required',
            'largo_parte_recta' => 'required_if:tipo_trabajo,Escalera caracol',
            'ancho' => 'required_if:tipo_trabajo = Curva tipo arco',
            'altura' => 'required_if:tipo_trabajo = Curva tipo arco',
            'huella' => 'required_if:tipo_trabajo,Escalera caracol',
            'contrahuella' => 'required_if:tipo_trabajo,Escalera caracol',
            'diaExt' => 'required_if:tipo_trabajo,Doblez,Escalera caracol',
            'diaInt' => 'required_if:tipo_trabajo,Doblez,Escalera caracol',
            'anchoPel' => 'required_if:tipo_Escalera caracol', */

        ]);
        $request->validate([    'tipo_trabajo' => 'required',    'id_cliente' => 'required',    'hay_cortes' => 'required_if:tipo_trabajo,Doblez,Curva,Escalera caracol,ab',    'hay_soldadura' => 'required_if:tipo_trabajo,Doblez,Curva,Escalera caracol,ab',], [    'tipo_trabajo.required' => '¡Debe seleccionar un tipo de trabajo!.', 'hay_cortes.required_if' => '¡El campo ¿hay cortes? es obligatorio para este tipo de trabajo!',    'hay_soldadura.required_if' => '¡El campo ¿hay soldadura? es obligatorio para este tipo de trabajo!',]);
        //error_log((string)$request);
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

        return redirect('solicitudes')->with('flash_message', 'solicitude deleted!');
    }

    }

