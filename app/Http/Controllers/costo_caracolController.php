<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\Models\costo_caracol;
use Illuminate\Http\Request;

class costo_caracolController extends Controller
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
            $costo_caracol = costo_caracol::where('diametro_Tubo', 'LIKE', "%$keyword%")
                ->orWhere('precio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $costo_caracol = costo_caracol::latest()->paginate($perPage);
        }

        return view('costo_caracol.index', compact('costo_caracol','menu'));
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

        return view('costo_caracol.create', compact('menu'));
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
        
        costo_caracol::create($requestData);

        return redirect('costo_caracol')->with('flash_message', 'Costo caracol adicionado!');
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
        $costo_caracol = costo_caracol::findOrFail($id);

        return view('costo_caracol.show', compact('costo_caracol'));
    }

    public function diametoTubo($diametro_Tubo)
    {
      
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles(); 


        $costo_doblez = DB::select("SELECT * FROM costo_caracols
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

        $costo_caracol = costo_caracol::findOrFail($id);

        return view('costo_caracol.edit', compact('costo_caracol','menu'));
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
        
        $costo_caracol = costo_caracol::findOrFail($id);
        $costo_caracol->update($requestData);

        return redirect('costo_caracol')->with('flash_message', 'Costo caracol actualizado!');
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
        costo_caracol::destroy($id);

        return redirect('costo_caracol')->with('flash_message', 'Costo caracol eliminado!');
    }
}
