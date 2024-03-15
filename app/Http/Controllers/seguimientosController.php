<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\seguimiento;
use App\Models\solicitude;
use App\Http\Controllers\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Estados;
use App\Models\User;
class seguimientosController extends Controller
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
            $seguimientos = seguimiento::where('id_solicitudes', 'LIKE', "%$keyword%")
                ->orWhere('nro_solicitud', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->orWhere('novedad', 'LIKE', "%$keyword%")
                ->orWhere('comentario', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $seguimientos = seguimiento::latest()->paginate($perPage);
        }

        return view('seguimientos.index', compact('seguimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('seguimientos.create');
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
              
        seguimiento::create($requestData);

        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();  
        $solicitude = solicitude::findOrFail($requestData['id_solicitudes']);
        $solicitudes = $solicitude;

        $perPage=25;
        $seguimiento = seguimiento::where('id_solicitudes', '=',$requestData['id_solicitudes'] )->latest()->paginate($perPage);
        $usuario=auth()->user()->email;
        // $responsable = DB::table('usuarios')
        // ->select('email')
        // ->where('id', $proyecto->id_responsable)
        // ->get();

         $visit = 'pedrocuasquer21095@gmail.com';

        $destinatario = [ $usuario, $visit];

        // Mail::to($destinatario)->send( new tareaupdate($tareas));
        Mail::to($destinatario )->send(new Estados( $requestData));
        
        return view('solicitudes.show_seguimiento', compact('solicitude','menu','solicitudes','seguimiento'));

        /*return redirect('solicitudes.show_seguimiento')->with('flash_message', 'seguimiento added!');*/
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
        $seguimiento = seguimiento::findOrFail($id);
        
        return view('seguimientos.show', compact('seguimiento'));
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
        $seguimiento = seguimiento::findOrFail($id);

        return view('seguimientos.edit', compact('seguimiento'));
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
                if ($request->hasFile('comentario')) {
            $requestData['comentario'] = $request->file('comentario')
                ->store('uploads', 'public');
        }

        $seguimiento = seguimiento::findOrFail($id);
        $seguimiento->update($requestData);

        return redirect('seguimientos')->with('flash_message', 'seguimiento updated!');
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
        seguimiento::destroy($id);

        return redirect('seguimientos')->with('flash_message', 'seguimiento deleted!');
    }
}
