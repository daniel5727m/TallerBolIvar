<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NuwweController;
use App\Http\Controllers\Menu;
use App\Http\Requests;
use App\Models\solicitude;
use App\Models\adjunto;
use App\Models\seguimiento;
use App\Models\log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\FormMail;
use App\Models\User;

class solicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        /*$menu= Menu::orderBy('id', 'ASC')->get();*/
        
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  
        

        $keyword = $request->get('search');
        $perPage = 25;
        $user_id = Auth::id();
        if (!empty($keyword)) {
            $solicitudes = solicitude::where('nro_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('cod_tipo_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('nom_tipo_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('fecha_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('des_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('cod_estado_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('nom_estado_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('cod_inmueble', 'LIKE', "%$keyword%")
                ->orWhere('motivo_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('tipo_solicitante', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $solicitudes = solicitude::where('user_id', '=',$user_id )
            ->latest('nro_solicitud')
            ->paginate($perPage);

        }
        
        return view('solicitudes.index', compact('solicitudes','menu'));
    }

    
    public function index_seguimiento(Request $request)
    {
       
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  

        $keyword = $request->get('search');
        $perPage = 25;
        $user_id = Auth::id();
        if (!empty($keyword)) {
            $solicitudes = solicitude::where('nro_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('cod_tipo_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('nom_tipo_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('fecha_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('des_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('cod_estado_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('nom_estado_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('cod_inmueble', 'LIKE', "%$keyword%")
                ->orWhere('motivo_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('tipo_solicitante', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
                
        } else {
                        
            /*$solicitudes = DB::select('SELECT 
            s.id, s.created_at,s.updated_at, s.nro_solicitud, s.cod_tipo_solicitud, s.nom_tipo_solicitud,s.fecha_solicitud,s.des_solicitud,s.cod_estado_solicitud,s.nom_estado_solicitud,s.cod_inmueble,s.tipo_solicitante,s.motivo_solicitud,s.user_id,s.fecha_agendamiento,u.name
            FROM solicitudes s
            JOIN 
            users u ON s.user_id=u.id');*/
           
            $solicitudes = DB::table('solicitudes as s')
                ->join('users as u', 's.user_id', '=', 'u.id')
                ->select('s.id', 's.created_at', 's.updated_at', 's.nro_solicitud', 's.cod_tipo_solicitud', 's.nom_tipo_solicitud','s.fecha_solicitud','s.des_solicitud','s.cod_estado_solicitud','s.nom_estado_solicitud','s.cod_inmueble','s.tipo_solicitante','s.motivo_solicitud','s.user_id','s.fecha_agendamiento','u.name')
                ->latest('s.nro_solicitud')->paginate($perPage);

        }
        

        
        return view('solicitudes.index_seguimiento', compact('solicitudes','menu'));
    }

    public function index_seguimiento_admin(Request $request)
    {
       
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  

        $keyword = $request->get('search');
        $perPage = 25;
        $user_id = Auth::id();
        if (!empty($keyword)) {
            $solicitudes = solicitude::where('nro_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('cod_tipo_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('nom_tipo_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('fecha_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('des_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('cod_estado_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('nom_estado_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('cod_inmueble', 'LIKE', "%$keyword%")
                ->orWhere('motivo_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('tipo_solicitante', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
                
        } else {
                        
            /*$solicitudes = DB::select('SELECT 
            s.id, s.created_at,s.updated_at, s.nro_solicitud, s.cod_tipo_solicitud, s.nom_tipo_solicitud,s.fecha_solicitud,s.des_solicitud,s.cod_estado_solicitud,s.nom_estado_solicitud,s.cod_inmueble,s.tipo_solicitante,s.motivo_solicitud,s.user_id,s.fecha_agendamiento,u.name
            FROM solicitudes s
            JOIN 
            users u ON s.user_id=u.id');*/
           
            $solicitudes = DB::table('solicitudes as s')
                ->join('users as u', 's.user_id', '=', 'u.id')
                ->select('s.id', 's.created_at', 's.updated_at', 's.nro_solicitud', 's.cod_tipo_solicitud', 's.nom_tipo_solicitud','s.fecha_solicitud','s.des_solicitud','s.cod_estado_solicitud','s.nom_estado_solicitud','s.cod_inmueble','s.tipo_solicitante','s.motivo_solicitud','s.user_id','s.fecha_agendamiento','u.name')
                ->latest('s.nro_solicitud')->paginate($perPage);

        }
        

        
        return view('solicitudes.index_seguimiento_admin', compact('solicitudes','menu'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($tipo_solicitud)
    { 
        
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  

        $tipo_sol=$tipo_solicitud;
        $objeto = new NuwweController();
        $tipo_solicitudes_data = $objeto->tiposolicitud();  
        $cedula_user= Auth::user()->cedula;    
        $data_inmueble = $objeto->inmueblesPropietario($cedula_user);
        $motivos =DB::table('motivos')->select('cod_tipo_solicitud','nombre')->where('cod_tipo_solicitud', '=',$tipo_sol)->latest('nombre')->paginate(52);

        return view('solicitudes.create',compact('data_inmueble','tipo_solicitudes_data','tipo_sol','menu','motivos'));
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
        /* Guardar solicitud en sistema */
        $user_id = Auth::id();
        $usuario=auth()->user()->email;
        $requestData = $request->all();   
        $requestData['user_id'] = $user_id;  
        $res_solicitud= solicitude::create($requestData);

               
        /* Enviar Solicitud a Nuwwe */
        $objeto = new NuwweController();
        $respuesta = $objeto->solicitudEnviar($request);  
        
        $respuesta_api=$respuesta['respuesta'];
        if($respuesta['exito']==1)$exito='Enviado'; else $exito='Fallo';
        $requestDataLog=(['peticion_api' => json_encode($respuesta['peticion_api']),
            'metodo_peticion' => $respuesta['metodo_peticion'],
            'fecha' => date('Y-m-d'), 
            'peticion' => json_encode($requestData), 
            'respuesta' => json_encode($respuesta['respuesta']), 
            'exito' => $exito,           
        ]);

        /**Guardar en log resultado de envio y respuesta de api solicitud nuwwe  */
        log::create($requestDataLog);
        
        /**Si la respuesta fue exitosa actualiza los datos de api nuwwe solicitud a sistema */
        if($respuesta['exito']){
           
            $msg = $respuesta_api->msg;

            $solicitud = solicitude::findOrFail($res_solicitud['id']);           
            $solicitud->nro_solicitud=$respuesta_api->datos->nro_solicitud;
            $solicitud->nom_estado_solicitud=$respuesta_api->datos->nom_estado_solicitud;
            $solicitud->nom_tipo_solicitud=$respuesta_api->datos->nom_tipo_solicitud;
            $solicitud->fecha_solicitud=$respuesta_api->datos->fecha_solicitud;                
            $solicitud->save();

        }
        $usuario=auth()->user()->email;
        // $responsable = DB::table('usuarios')
        // ->select('email')
        // ->where('id', $proyecto->id_responsable)
        // ->get();

    // $visit = 'pedrocuasquer21095@gmail.com';

        $destinatario = [ $usuario];

        // Mail::to($destinatario)->send( new tareaupdate($tareas));
        Mail::to($destinatario )->send(new FormMail($solicitud));
        
        /**Guardar adjuntos */
        if ($request->hasFile('ruta_archivo')) {
            $max_size = (int)ini_get('upload_max_filesize')*10240;
            $files = $request->file('ruta_archivo');

            $i=0;
            foreach($files as $file){
                if ($request->hasFile('ruta_archivo')) {
                    $requestDataAdjunto['ruta_archivo'] = $file
                        ->store('uploads', 'public');
                }
                $requestDataAdjunto['id_solicitudes'] = $res_solicitud['id']; 
                $requestDataAdjunto['nro_solicitud'] = $respuesta_api->datos->nro_solicitud; 
                $requestDataAdjunto['cod_inmueble'] = $solicitud->cod_inmueble; 
                $requestDataAdjunto['nombre_archivo'] = $file->getClientOriginalName(); 
                $requestDataAdjunto['orden'] = $i;  
                $requestDataAdjunto['user_id'] = $user_id;  
        
                adjunto::create($requestDataAdjunto);
                $i++;
            }
        }
        /**Fin guardar adjuntos */

        return redirect('solicitudes')->with('flash_message', 'Se ha registrado su solicitud!');
    }
    
    public function store2(Request $request)
    {
        
        /* Guardar solicitud en sistema */
        $requestData = $request->all();        
        $res_solicitud= solicitude::create($requestData);
       
        /* Enviar Solicitud a Nuwwe */
        $objeto = new NuwweController();
        $respuesta = $objeto->solicitudEnviar($request);  
        $respuesta_api=$respuesta['respuesta'];
        $requestDataLog=(['peticion_api' => json_encode($respuesta['peticion_api']),
            'metodo_peticion' => $respuesta['metodo_peticion'],
            'fecha' => date('Y-m-d'), 
            'peticion' => json_encode($requestData), 
            'respuesta' => json_encode($respuesta['respuesta']), 
            'exito' => $respuesta['exito'],           
        ]);

        /**Guardar en log resultado de envio y respuesta de api solicitud nuwwe  */
        log::create($requestDataLog);
        
        /**Si la respuesta fue exitosa actualiza los datos de api nuwwe solicitud a sistema */
        if($respuesta['exito']){
            return $respuesta_api->datos->nro_solicitud;
            $msg = $respuesta_api->msg;

            $solicitud_update = solicitude::findOrFail($res_solicitud['id']);
            $requestData_update=([
                'nro_solicitud'=>$respuesta_api->datos->nro_solicitud,
                'nom_estado_solicitud'=>$respuesta_api->datos->nom_estado_solicitud,
                'nom_tipo_solicitud'=>$respuesta_api->datos->nom_tipo_solicitud,
                'fecha_solicitud'=>$respuesta_api->datos->fecha_solicitud,                
            ]);

            $solicitud_update->update($requestData_update);
        }

        return redirect('solicitudes')->with('flash_message', 'solicitude added!');
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
        $solicitudes = $solicitude;
        $perPage=25;
        $seguimiento = seguimiento::where('id_solicitudes', '=',$id )->latest()->paginate($perPage);

        /**Integración nuwwe etapa de solicitud */
        $objeto = new NuwweController();
        $etapas = $objeto->solicitudTramiteId($solicitude->nro_solicitud);
        $datos_etapas=$etapas['data'];

        return view('solicitudes.show', compact('solicitude','menu','solicitudes','seguimiento','datos_etapas'));
    }
    
    public function show_seguimiento($id)
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  
        
        $solicitude = solicitude::findOrFail($id);
        $solicitudes = $solicitude;
        $perPage=25;
        $seguimiento = seguimiento::where('id_solicitudes', '=',$id )->latest()->paginate($perPage);

        $user = User::findOrFail($solicitude->user_id);

        /**Integración nuwwe etapa de solicitud */
        $objeto = new NuwweController();
        $etapas = $objeto->solicitudTramiteId($solicitude->nro_solicitud);
        $datos_etapas=$etapas['data'];
        
        
        return view('solicitudes.show_seguimiento', compact('solicitude','menu','solicitudes','seguimiento','user','datos_etapas'));
    }
    
    public function show_seguimiento_admin($id)
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  
        
        $solicitude = solicitude::findOrFail($id);
        $solicitudes = $solicitude;
        $perPage=25;
        $seguimiento = seguimiento::where('id_solicitudes', '=',$id )->latest()->paginate($perPage);

        $user = User::findOrFail($solicitude->user_id);

        /**Integración nuwwe etapa de solicitud */
        $objeto = new NuwweController();
        $etapas = $objeto->solicitudTramiteId($solicitude->nro_solicitud);
        $datos_etapas=$etapas['data'];
        
        
        return view('solicitudes.show_seguimiento_admin', compact('solicitude','menu','solicitudes','seguimiento','user','datos_etapas'));
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
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles(); 
        
        $solicitude = solicitude::findOrFail($id);
        //dd($solicitude);
        $tipo_sol='QUE';
        $objeto = new NuwweController();
        $tipo_solicitudes_data = $objeto->tiposolicitud();    
        
        $cedula_user= Auth::user()->cedula;    
        $data_inmueble = $objeto->inmueblesPropietario($cedula_user);
        $motivos =DB::table('motivos')->select('cod_tipo_solicitud','nombre')->where('cod_tipo_solicitud', '=',$solicitude->cod_tipo_solicitud)->latest('nombre')->paginate(52);

        return view('solicitudes.edit', compact('solicitude','tipo_solicitudes_data','data_inmueble','tipo_sol','menu','motivos'));
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
        
        $user_id = Auth::id(); 
        


        $requestData = $request->all();
       // $requestData['user_id'] = $user_id;
        
        $solicitude = solicitude::findOrFail($id);
        $solicitude->update($requestData);

        /**Guardar adjuntos */
        if ($request->hasFile('ruta_archivo')) {
            $max_size = (int)ini_get('upload_max_filesize')*10240;
            $files = $request->file('ruta_archivo');

            $i=0;
            foreach($files as $file){
                if ($request->hasFile('ruta_archivo')) {
                    $requestDataAdjunto['ruta_archivo'] = $file
                        ->store('uploads', 'public');
                }
                $requestDataAdjunto['id_solicitudes'] = $id; 
                $requestDataAdjunto['nro_solicitud'] = $solicitude->nro_solicitud; 
                $requestDataAdjunto['cod_inmueble'] = $solicitude->cod_inmueble; 
                $requestDataAdjunto['nombre_archivo'] = $file->getClientOriginalName(); 
                $requestDataAdjunto['orden'] = $i;  
                $requestDataAdjunto['user_id'] = $user_id;  
        
                adjunto::create($requestDataAdjunto);
                $i++;
            }
        }
        /**Fin guardar adjuntos */

        

        return redirect('solicitudes_seguimiento_admin')->with('flash_message', 'solicitude actualizada!');
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
