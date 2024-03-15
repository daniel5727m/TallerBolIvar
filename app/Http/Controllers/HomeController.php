<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Menu;
use Illuminate\Http\Request;
use Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $objeto = new MenuController();
        $menu = $objeto->misPerfiles();

		$respuesta = Http::get('https://mindicador.cl/api');
		$dolar = $respuesta->json();
		
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
		$rt_inmueble = Http::accept('application/json')
			->withToken($token)
				->withHeaders($header)->get('https://api.nuwwe.com/api/inmueble/32813');
		$inmueble = $rt_inmueble->json();
		
		$rt_tipo_solicitud = Http::accept('application/json')
			->withToken($token)
				->withHeaders($header)->get('https://api.nuwwe.com/api/tipo_solicitud/MAN');
		$tipo_solicitud = $rt_tipo_solicitud->json();
		
		
		
        return view('home',compact('inmueble','tipo_solicitud','menu'));
    }
}
