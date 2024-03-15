<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NuwweController;
use App\Http\Controllers\Menu;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\FormMail;



class usuariosController extends Controller
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
        

        
        $perPage = 25;
       
        $usuarios = DB::table('users as u')
                ->leftjoin('perfil as p', 'u.id_perfil', '=', 'p.id')
                ->select('u.id','u.name','u.cedula','u.telefono','u.email','p.nombre_perfil')
                ->latest('u.created_at')->paginate($perPage);
       
        return view('usuarios.index', compact('usuarios','menu'));    
    }

    public function edit($id)
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles(); 

        $usuario = User::findOrFail($id);
        $perfiles =DB::table('perfil')->select('id','nombre_perfil')->latest()->paginate(5);
        return view('usuarios.edit', compact('usuario','menu','perfiles'));
    }

    
    public function update(Request $request, $id)
    {
        
       
        $requestData = $request->all();
        $usuario = User::findOrFail($id);
       
        if ($request->email== $usuario->email){
            $usuario->update($requestData);

            return redirect('usuarios')->with('flash_message', 'Usuario actualizado!');
        }
        else
        {
            $rules = [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
               ];
            
            $messages = [
                'email.unique' => 'El correo: ya ha sido tomado',
                'email.required' => 'El campo es requerido',
                'password.max' => 'El máximo permitido son 255 caracteres',
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()){
                return redirect('usuarios/'.$id.'/edit')->withErrors($validator);
            }
            else{
                $requestData = $request->all();
                $usuario = User::findOrFail($id);
                $usuario->update($requestData);
    
                return redirect('usuarios')->with('flash_message', 'Usuario actualizado!');
            }
        }
    
    }

    public function create()
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  

        $perfiles =DB::table('perfil')->select('id','nombre_perfil')->latest()->paginate(5);

        return view('usuarios.create',compact('menu','perfiles'));
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
        
        User::create($requestData);
        

        return redirect('usuarios')->with('flash_message', 'Usuario adicionado!');
    }

        
       
   

    
   }
