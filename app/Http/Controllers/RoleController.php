<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Controllers\Menu;
use App\Http\Controllers\User;
use App\Models\perfil;
use App\Models\perfil_menu;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  
        $titulo_perfil="";
        $id_perfil="";
        $opciones= DB::table('menus')->select('nombre','icono','menu_id','orden','id')->oldest('id')->paginate(25);
      
        $perfil= DB::table('perfil')->select('nombre_perfil','id')->latest()->paginate(25);
      $perfil_opciones=array();
        return view('roles', compact('opciones','menu','perfil','perfil_opciones','id_perfil','id_perfil','titulo_perfil'));
    }
   
    
        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();
       
        $opciones= DB::table('menus')->select('nombre','icono','menu_id','orden','id')->oldest('id')->paginate(25);
        $perfilselect = perfil::findOrFail($id);
        $perfil= DB::table('perfil')->select('nombre_perfil','id')->latest()->paginate(25);
        $titulo_perfil=$perfilselect['nombre_perfil'];
       
        $id_perfil=$id;
        $perfil_opciones= DB::table('perfil_menu')->select('id_perfil','id_menu')->where('id_perfil', '=',$id)->latest('id_menu')->paginate(25);
      
         return view('roles',compact('perfil','opciones','perfil_opciones','menu','id_perfil','titulo_perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  
        $requestData = $request->all();
      
 
      
        DB::table('perfil_menu')->where('id_perfil','=',$requestData['id_perfil'])->delete();
        
         $id_perfil=$requestData['id_perfil'];
        foreach($requestData as $data=>$d){
          


                if($data != '_method' &&  $data != '_token'  &&  $data != 'id_perfil'){

                 $datosGuardar=([
                    'id_perfil' =>  $id_perfil,
                    'id_menu'  => $data,
                ]);  
                perfil_menu::create($datosGuardar);
                }
        }
        return redirect('/roles/'.$id_perfil)->with('flash_message','Perfil actualizado!!');
    }
    
    public function destroy($id)
    {
        $requestData::destroy($id);
       
        dd($requestData);
        return redirect('/roles');
    }
}
