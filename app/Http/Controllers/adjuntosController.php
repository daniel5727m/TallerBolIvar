<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Http\Controllers\Menu;
use App\Models\adjunto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adjuntosController extends Controller
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
            $adjuntos = adjunto::where('id_solicitudes', 'LIKE', "%$keyword%")
                ->orWhere('nro_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('cod_inmueble', 'LIKE', "%$keyword%")
                ->orWhere('nombre_archivo', 'LIKE', "%$keyword%")
                ->orWhere('ruta_archivo', 'LIKE', "%$keyword%")
                ->orWhere('orden', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $adjuntos = adjunto::latest()->paginate($perPage);
        }

        return view('adjuntos.index', compact('adjuntos','menu'));
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
        return view('adjuntos.create',compact('menu'));
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
        $max_size = (int)ini_get('upload_max_filesize')*10240;
        $files = $request->file('ruta_archivo');
       // dd($max_size);
        $user_id = Auth::id();
        $i=0;
         foreach($files as $file){
            /* adjunto::create([
                 'adjunto' => $file->getClientOriginalName(),
             ]);*/
             $requestData = $request->all();
             if ($request->hasFile('ruta_archivo')) {
                 $requestData['ruta_archivo'] = $file
                     ->store('uploads', 'public');
             }
             
            $requestData['orden'] = $i;        
     
             adjunto::create($requestData);
             $i++;
         }
         return "ok";
        
        $requestData = $request->all();
                if ($request->hasFile('ruta_archivo')) {
                    $requestData['ruta_archivo'] = $request->file('ruta_archivo')
                    ->store('uploads', 'public');
                 }

        adjunto::create($requestData);

        return redirect('adjuntos',compact('menu'))->with('flash_message', 'adjunto added!');
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
        $adjunto = adjunto::findOrFail($id);

        return view('adjuntos.show', compact('adjunto','menu'));
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
        $adjunto = adjunto::findOrFail($id);

        return view('adjuntos.edit', compact('adjunto','menu'));
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
                if ($request->hasFile('ruta_archivo')) {
            $requestData['ruta_archivo'] = $request->file('ruta_archivo')
                ->store('uploads', 'public');
        }

        $adjunto = adjunto::findOrFail($id);
        $adjunto->update($requestData);

        return redirect('adjuntos',compact('menu'))->with('flash_message', 'adjunto updated!');
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
        adjunto::destroy($id);

        return redirect('adjuntos',compact('menu'))->with('flash_message', 'adjunto deleted!');
    }
}
