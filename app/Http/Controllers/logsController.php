<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Menu;
use App\Http\Requests;

use App\Models\log;

use Illuminate\Http\Request;

class logsController extends Controller
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
        return view('logs.create', compact('logs','menu'));
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
    public function update(Request $request, $id)
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles(); 
        
        $requestData = $request->all();
        
        $log = log::findOrFail($id);
        $log->update($requestData);

        return redirect('logs', compact('menu'))->with('flash_message', 'log updated!');
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

        return redirect('logs', compact('menu'))->with('flash_message', 'log deleted!');
    }
}
