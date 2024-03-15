<?php

namespace App\Http\Controllers;

use App\Models\Plataforma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MenuControllers;
use App\Http\Controllers\Menu;
class PlataformaController extends Controller
{
    public function index()
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  
        $plataforma= Plataforma::orderBy('id', 'ASC')->get();
        return view('plataforma.index',compact('plataforma','menu'));

    }

// funcion actualizar
    public function modificar(Request $request,$id)
    { 
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  
        $user_id= Auth::user()->id;
        $plataforma = Plataforma::findOrFail($id);
        $valor = $request->valor;

        if(isset($request->valorF))
        {
            $file = $request->file('valorF');
            $valor=$file->getClientOriginalName();
            PlataformaController::cargarArchivo($file,$valor,$plataforma->valor);
        }
        $user_id= Auth::user()->id;
        $plataforma = Plataforma::findOrFail($id);
        $plataforma->valor =  $valor; 
        $plataforma->user_id = $user_id;
        $plataforma->save();

        return redirect ('plataforma')->with('message', 'Configuración plataforma actualizada!');
    }

    public static function cargarArchivo($file,$nombre,$valorAnt)
    {
        
        \Storage::delete($valorAnt);
        \Storage::disk('local')->put($nombre,  \File::get($file));
    }
}
