<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Menu;

use App\Http\Requests;

use App\Models\solicitude;
use App\Models\prueba;
use App\Models\variable;
use App\Models\costo_doblez;
use App\Models\costo_caracol;
use App\Models\costo_ab;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Auth;

class pruebasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $solicitudes = solicitude::where('tipo_trabajo', 'LIKE', "%$keyword%")
                //->orWhere('idturno', 'LIKE', "%$keyword%")
                ->orWhere('diametro_Tubo', 'LIKE', "%$keyword%")
                ->orWhere('tipo_material', 'LIKE', "%$keyword%")
                ->orWhere('espesor', 'LIKE', "%$keyword%")
                ->orWhere('longitud_tubo', 'LIKE', "%$keyword%")
                ->orWhere('hay_soldadura', 'LIKE', "%$keyword%")
                ->orWhere('numero_soldadura', 'LIKE', "%$keyword%")
                ->orWhere('numero_tubos', 'LIKE', "%$keyword%")
                ->orWhere('numero_dobleces', 'LIKE', "%$keyword%")
                ->orWhere('numero_curvas', 'LIKE', "%$keyword%")
                ->orWhere('numero_cortes', 'LIKE', "%$keyword%")
                ->orWhere('plantilla', 'LIKE', "%$keyword%")
                ->orWhere('ancho', 'LIKE', "%$keyword%")
                ->orWhere('altura', 'LIKE', "%$keyword%")
                ->orWhere('radio', 'LIKE', "%$keyword%")
                ->orWhere('largo', 'LIKE', "%$keyword%")
                ->orWhere('incluye_pasamanos_secundarios', 'LIKE', "%$keyword%")
                ->orWhere('largo_total', 'LIKE', "%$keyword%")
                ->orWhere('largo_parte_recta', 'LIKE', "%$keyword%")
                ->orWhere('a', 'LIKE', "%$keyword%")
                ->orWhere('b', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $solicitudes = solicitude::latest()->paginate($perPage);
            $solicitudes = DB::select('SELECT s.*,u.name as cliente,u.telefono FROM solicitudes s
            left join  users u  on u.id=s.id_cliente
        order by s.id asc');
        }

        return view('pruebas.index', compact('solicitudes','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  

        $clientes = DB::select('SELECT m.* FROM users m
        WHERE m.id_perfil=4 order by m.name');// el numero (4) conecta con los perfiles y me permite ver a los 
        //estan almacenados 
        return view('pruebas.create',compact('menu','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        

        $requestData = $request->all();
        $variable = variable::findOrFail(1);
       
        if($requestData['tipo_trabajo']=='Doblez'){
            $objeto = new costo_doblezController();
            $costo = $objeto->diametoTubo($request['diametro_Tubo']); 
            
            $requestData['precio_unitario']=($costo[0]->precio+($costo[0]->precio*$variable['valor'])/100);
            $requestData['precio_total']=($costo[0]->precio+($costo[0]->precio*$variable['valor'])/100)*$requestData['numero_tubos'];
        }
        if($requestData['tipo_trabajo']=='Escalera caracol'){
            $objeto = new costo_caracolController();
            $costo = $objeto->diametoTubo($request['diametro_Tubo']); 

            $requestData['precio_unitario']=($costo[0]->precio+($costo[0]->precio*$variable['valor'])/100);
            $requestData['precio_total']=($costo[0]->precio+($costo[0]->precio*$variable['valor'])/100)*$requestData['numero_tubos'];
        }
        if($requestData['tipo_trabajo']=='ab'){
            $objeto = new costo_abController();
            $costo = $objeto->diametoTubo($request['diametro_Tubo']); 

            $requestData['precio_unitario']=($costo[0]->precio+($costo[0]->precio*$variable['valor'])/100);
            $requestData['precio_total']=($costo[0]->precio+($costo[0]->precio*$variable['valor'])/100)*$requestData['numero_tubos'];
        }

if($requestData['tipo_trabajo']=='Curva'){
            $objeto = new costo_abController();
            $costo = $objeto->diametoTubo($request['diametro_Tubo']); 

            $requestData['precio_unitario']=($costo[0]->precio+($costo[0]->precio*$variable['valor'])/100);
            $requestData['precio_total']=$requestData['precio_unitario'];
        }
        $requestData['radio']=200;
	$requestData['largo']=370.92;
        
        solicitude::create($requestData);
        return redirect('solicitudes')->with('flash_message', 'solicitud adicionada!');
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

        $solicitude = solicitude::findOrFail($id);

        $user=users::findOrFail($solicitude['id_cliente']);
        $solicitude['name']=$user['name'];
        
        return view('pruebas.show', compact('solicitude','menu'));        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
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

     
    /*  public function pruebas($id)
     {
         $solicitude = Solicitude::findOrFail($id);
         $solicitude->tipo_trabajo = "Trabajo de prueba";
         return view('pruebas.pruebas2', compact('solicitude'));
     } */

   /*   public function duplicate($id)
     {
         $objeto = new MenuController();
         $menu = $objeto->misPerfiles(); 
         $solicitude = solicitude::findOrFail($id);
         return view('solicitudes.show', compact('solicitude','menu'));
     }
 */
    public function destroy($id)
    {
        solicitude::destroy($id);

        return redirect('solicitudes')->with('flash_message', 'solicitude deleted!');
    }
}
