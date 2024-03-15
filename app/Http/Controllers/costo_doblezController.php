<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\costo_doblez;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class costo_doblezController extends Controller
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
            $costo_doblez = costo_doblez::where('diametro_Tubo', 'LIKE', "%$keyword%")
                ->orWhere('precio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $costo_doblez = costo_doblez::latest()->paginate($perPage);
        }

        return view('costo_doblez.index', compact('costo_doblez','menu'));
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
        return view('costo_doblez.create',compact('menu'));
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
        
        costo_doblez::create($requestData);

        return redirect('costo_doblez')->with('flash_message', 'Costo doblez adicionado!');
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

        $costo_doblez = costo_doblez::findOrFail($id);

        return view('costo_doblez.show', compact('costo_doblez','menu'));
    }
    public function diametoTubo($diametro_Tubo)
    {
      
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles(); 


        $costo_doblez = DB::select("SELECT * FROM costo_doblezs
        WHERE diametro_Tubo='$diametro_Tubo'");
        return $costo_doblez;
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

        $costo_doblez = costo_doblez::findOrFail($id);

        return view('costo_doblez.edit', compact('costo_doblez','menu'));
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
        
        $costo_doblez = costo_doblez::findOrFail($id);
        $costo_doblez->update($requestData);

        return redirect('costo_doblez')->with('flash_message', 'Costo doblez actualizado!');
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
        costo_doblez::destroy($id);

        return redirect('costo_doblez')->with('flash_message', 'Costo doblez Eliminado!');
    }
}
