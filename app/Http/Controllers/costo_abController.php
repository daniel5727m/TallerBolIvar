<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\Models\costo_ab;
use Illuminate\Http\Request;

class costo_abController extends Controller
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
            $costo_ab = costo_ab::where('diametro_Tubo', 'LIKE', "%$keyword%")
                ->orWhere('precio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $costo_ab = costo_ab::latest()->paginate($perPage);
        }

        return view('costo_ab.index', compact('costo_ab','menu'));
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

        return view('costo_ab.create', compact('menu'));
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
        
        costo_ab::create($requestData);

        return redirect('costo_ab')->with('flash_message', 'Costo ab adicionado!');
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

        $costo_ab = costo_ab::findOrFail($id);

        return view('costo_ab.show', compact('costo_ab','menu'));
    }

    public function diametoTubo($diametro_Tubo)
    {
      
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles(); 


        $costo_doblez = DB::select("SELECT * FROM costo_abs
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

        $costo_ab = costo_ab::findOrFail($id);

        return view('costo_ab.edit', compact('costo_ab','menu'));
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
        
        $costo_ab = costo_ab::findOrFail($id);
        $costo_ab->update($requestData);

        return redirect('costo_ab')->with('flash_message', 'Costo ab actualizar!');
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
        costo_ab::destroy($id);

        return redirect('costo_ab')->with('flash_message', 'Costo ab Eliminar!');
    }
}
