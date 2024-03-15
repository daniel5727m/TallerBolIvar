<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\variable;
use Illuminate\Http\Request;

class variablesController extends Controller
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
            $variables = variable::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('valor', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $variables = variable::latest()->paginate($perPage);
        }

        return view('variables.index', compact('variables','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('variables.create');
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

        variable::create($requestData);

        return redirect('variables')->with('flash_message', 'variable added!');
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
        $variable = variable::findOrFail($id);

        return view('variables.show', compact('variable'));
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

        $variable = variable::findOrFail($id);

        return view('variables.edit', compact('variable','menu'));
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

        $variable = variable::findOrFail($id);
        $variable->update($requestData);

        return redirect('variables')->with('flash_message', 'variable actualizada!');
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
        variable::destroy($id);

        return redirect('variables')->with('flash_message', 'variable deleted!');
    }
}
