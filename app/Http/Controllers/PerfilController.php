<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Controllers\PerfilController;
use App\Http\Controllers\Menu;
use App\Http\Requests;

use App\Models\user;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use Illuminate\Support\Facades\Route;



class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */


    
  
      public function indexx(){
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();
        return view('profile.index',compact('menu'));
   
      }
    public function index(Request $request)
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $logs = log::where('peticion_api', 'LIKE', "%$keyword%")
                ->orWhere('metodo_peticion', 'LIKE', "%$keyword%")
                ->orWhere('fecha', 'LIKE', "%$keyword%")
                ->orWhere('peticion', 'LIKE', "%$keyword%")
                ->orWhere('peticion', 'LIKE', "%$keyword%")
                ->orWhere('respuesta', 'LIKE', "%$keyword%")
                ->orWhere('exito', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $logs = log::latest()->paginate($perPage);
        }

        return view('logs.index', compact('logs','menu'));
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
        return view('logs.create', compact('menu'));
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
        
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();
        $requestData = $request->all();
        
        log::create($requestData);

        return redirect('logs', compact('menu'))->with('flash_message', 'log added!');
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
        $log = log::findOrFail($id);

        return view('logs.show', compact('log','menu'));
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
        $log = log::findOrFail($id);

        return view('logs.edit', compact('log','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    /*public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $log = log::findOrFail($id);
        $log->update($requestData);

        return redirect('logs')->with('flash_message', 'log updated!');
    }*/
    public function update(Request $request)
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();
        $id= Auth::user()->id;
        $requestData = $request->all();
        
        $user = user::findOrFail($id);           
        $user->name=$requestData['name'];
       // $user->email=$requestData['email'];
        $user->telefono=$requestData['telefono'];              
        $user->save();

        return redirect ('perfil')->with('message', 'Perfil actualizado !');
    }

   /* public function updatePassword(Request $request)
    {
        $email= Auth::user()->email;
        $requestData = $request->all();
        
        $user = user::findOrFail($email);           
        $user->password=Hash::make($requestData['password']);            
        $user->save();

        return view('profile.index')->with('flash_message', 'Perfil actualizado !');
    }*/

    public function updatePassword(Request $request){
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18|regex:`^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$`',
        ];
        
        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.regex' => 'Se debe usar por lo menos una letra mayúscula, una letra minúscula y un número',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('perfil')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' =>bcrypt($request->password)]);
                return redirect('perfil')->with('message', 'Contraseña cambiada con éxito');
            }
            else
            {
                return redirect('perfil')->with('message_error', 'La contraseña actual no es correcta');
            }
        }
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
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();
        log::destroy($id);

        return redirect('logs',compact('menu'))->with('flash_message', 'log deleted!');
    }
}
