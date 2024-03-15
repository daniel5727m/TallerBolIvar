<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\losg;
use Illuminate\Http\Request;

class losgsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $losgs = losg::where('peticion_api', 'LIKE', "%$keyword%")
                ->orWhere('metodo_peticion', 'LIKE', "%$keyword%")
                ->orWhere('fecha', 'LIKE', "%$keyword%")
                ->orWhere('peticion', 'LIKE', "%$keyword%")
                ->orWhere('peticion', 'LIKE', "%$keyword%")
                ->orWhere('respuesta', 'LIKE', "%$keyword%")
                ->orWhere('exito', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $losgs = losg::latest()->paginate($perPage);
        }

        return view('losgs.index', compact('losgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('losgs.create');
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
        
        losg::create($requestData);

        return redirect('losgs')->with('flash_message', 'losg added!');
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
        $losg = losg::findOrFail($id);

        return view('losgs.show', compact('losg'));
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
        $losg = losg::findOrFail($id);

        return view('losgs.edit', compact('losg'));
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
        
        $losg = losg::findOrFail($id);
        $losg->update($requestData);

        return redirect('losgs')->with('flash_message', 'losg updated!');
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
        losg::destroy($id);

        return redirect('losgs')->with('flash_message', 'losg deleted!');
    }
}
