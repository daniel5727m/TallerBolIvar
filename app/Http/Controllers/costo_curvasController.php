<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\Models\costo_curva;
use Illuminate\Http\Request;

class costo_curvasController extends Controller
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
            $costo_curvas = costo_curva::where('tipo', 'LIKE', "%$keyword%")
                ->orWhere('diametro_Tubo', 'LIKE', "%$keyword%")
                ->orWhere('radio_Curvatura', 'LIKE', "%$keyword%")
                ->orWhere('precio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $costo_curvas = costo_curva::latest()->paginate($perPage);
        }

        return view('costo_curvas.index', compact('costo_curvas','menu'));
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

        return view('costo_curvas.create', compact('menu'));
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
        
        costo_curva::create($requestData);

        return redirect('costo_curvas')->with('flash_message', 'Costo curva adicionado!');
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
        
        $costo_curva = costo_curva::findOrFail($id);

        return view('costo_curvas.show', compact('costo_curva','menu'));
    }

    public function diametoTubo($diametro_Tubo)
    {
      
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles(); 


        $costo_doblez = DB::select("SELECT * FROM costo_curvas
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

        $costo_curva = costo_curva::findOrFail($id);

        return view('costo_curvas.edit', compact('costo_curva','menu'));
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
        
        $costo_curva = costo_curva::findOrFail($id);
        $costo_curva->update($requestData);

        return redirect('costo_curvas')->with('flash_message', 'Costo curva Actualizado!');
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
        costo_curva::destroy($id);

        return redirect('costo_curvas')->with('flash_message', 'Costo curva Eliminado!');
    }
}
