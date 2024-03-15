<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\token;
use Http;

class NuwweController extends Controller
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

     

    //  TIPO DE SOLICITUDES -------------------------------------------------------------------------------------
    public function tiposolicitud2(){
		$respuesta = Http::get('https://mindicador.cl/api');
		$dolar = $respuesta->json();
		
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
		$request = Http::accept('application/json')
			->withToken($token)
				->withHeaders($header)->get('https://api.nuwwe.com/api/tipo_solicitud');
		$tipo_solicitud = $request->json();
		
		return $tipo_solicitud;
       // return view('home',compact('tiposolicitud2'));
    }

    //  TIPO DE SOLICITUDES -------------------------------------------------------------------------------------
    public function tiposolicitud(){
			
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
		$request = Http::accept('application/json')
			->withToken($token)
				->withHeaders($header)->get('https://api.nuwwe.com/api/tipo_solicitud');
		//$tipo_solicitudes = $request->json();

        
        if($request->ok()){
            $tipo_solicitudes = json_decode($request->getBody()->getContents());
        } 
        //return $tipo_solicitudes->data;
		$tipo_solicitudes_data=$tipo_solicitudes->data;
		return $tipo_solicitudes->data;
      //  return view('solicitudes.create',compact('tipo_solicitudes_data'));
       // return view('home',compact('tiposolicitud2'));
    }

    public function estadosolicitud(){
		
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
		$request = Http::accept('application/json')
			->withToken($token)
				->withHeaders($header)->get('https://api.nuwwe.com/api/estado_solicitud');
		//$tipo_solicitudes = $request->json();

        
        if($request->ok()){
            $estado_solicitud
             = json_decode($request->getBody()->getContents());
        } 
        return $estado_solicitud;
		$tipo_solicitudes_data=$tipo_solicitudes->data;
		//return $tipo_solicitudes->data;
        return view('solicitudes.create',compact('tipo_solicitudes_data'));
       // return view('home',compact('tiposolicitud2'));
    }

   

    public function tiposolicitudId($id){
        		
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/tipo_solicitud/'.$id);
            $tiposolicitud_id = $request->json();
		
		return $tiposolicitud_id;
       // return view('home',compact('solicitudid'));
    }

    /* Listado de inmuebles por Cliente */
    public function inmueblesCliente(){
        $cedula_user= Auth::user()->cedula;
        //return $cedula_user;
       // $ced_clie=60397228;		
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/inmueble?filter[cod_cliente_promotor]='.$cedula_user);
       // $inmueble = $request->json();
		
        if($request->ok()){
            $inmueble = json_decode($request->getBody()->getContents());
        } 
       
		$inmueble_data=$inmueble->data;
        return $inmueble_data;
        return view('solicitudes.create',compact('inmueble_data'));
       // return view('home',compact('tiposolicitud2'));

    }

    /* Indica si el cliente registrado es propietario del inmueble */
    public function inmueblesPropietario($cedula_user){
        /*$cedula_user= Auth::user()->cedula;*/
       	
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/inmueble_propietario?filter[cod_cliente_propietario]='.$cedula_user);
       // $inmueble = $request->json();
		
        if($request->ok()){
            $inmueble = json_decode($request->getBody()->getContents());
        } 
       
		$inmueble_data=$inmueble->data;
        return $inmueble_data;
       

    }

    
    // SOLICITUDES-----------------------------------------------------------------------------------------------

    public function solicitud(){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/solicitud');
            $solicitud = $request->json();
		
		return $solicitud;
        //return view('home',compact('solicitud'));
    }

    public function solicitudEnviar(Request $request){
        $requestData = $request->all();

       
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$url='https://api.nuwwe.com/api/solicitud/store';
        $header = ([
            'empresa' => 'ier'
				]);//date('Y-m-d H:i:s')
        $data = [
                "cod_tipo_solicitud" => $requestData['cod_tipo_solicitud'],
                "fecha_solicitud" => date('Y-m-d H:i:s'),
                "des_solicitud" => $requestData['des_solicitud'],
                "cod_estado_solicitud" => $requestData['cod_estado_solicitud'],
                "cod_inmueble" => $requestData['cod_inmueble']
                ];
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->put($url,$data);
        //if($request->ok()){
            $solicitud_enviada = json_decode($request->getBody()->getContents());
        //}

        $setData=(['peticion_api' => $url,
                'metodo_peticion' => $requestData['_method'],
                'fecha' => date('Y-m-d'), 
                'peticion' => $request, 
                'respuesta' => $solicitud_enviada, 
                'exito' => $solicitud_enviada->success,            
            ]);
        
		return $setData;
        //return view('home',compact('solicitud'));
    }
    /**SEGUIMIENTO - ETAPAS DE SOLICITUD */
    public function solicitudTramiteId($id){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/solicitud_tramite/nro_solicitud/'.$id);
        $solicitud_tramite_id = $request->json();
		
		return $solicitud_tramite_id;
        //return view('home',compact('solicitud_tramite_id'));
    }

    public function etapa_tramite($id){
        $id = json_decode($id);
        //return 'https://api.nuwwe.com/api/etapa_tramite?filter[cod_etapa]='.$id;
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/etapa_tramite/'.$id);
        $etapa = $request->json();
		
		return $etapa;
        //return view('home',compact('solicitud_tramite_id'));
    }

    /** *************************************************************************************************** */
    public function solicitudId($id){
      
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/solicitud/'.$id);
            $solicitud_id = $request->json();
		
		return $solicitud_id;
		//return view('home',compact('solicitudid'));
    }

    public function solicitudupdate() { //revisar
		
        $respuesta = Http::get('https://mindicador.cl/api');
		$dolar = $respuesta->json();
		
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $rt_solicitud_update = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/solicitud/update');
            $solicitud_update = $rt_solicitudid_update->json();
		
		
        return view('home',compact('solicitudupdate'));
    }


    public function solicitudstore(){
        
		
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/solicitud/store');
        $solicitud_store = $request->json();
		return $solicitud_store;
		
       // return view('home',compact('solicitudstore'));
    }

    // HISTORICO SOLICITUD---------------------------------------------------------------------------

	/*error al conectarse a la api*/
    public function historicoSolicitud(){
        		
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.pp/api/solicitud/historico_solicitud');
            $historico_solicitud = $request->json();
		
		return $historico_solicitud;
        //return view('home',compact('historico_solicitud'));
    }


    // INMUEBLE-------------------------------------------------------------

    public function inmueble(){
        		
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/inmueble');
        $inmueble = $request->json();
		
		return $inmueble;
        return view('home',compact('inmueble'));
    }



    public function inmuebleId($id){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/inmueble/'.$id);
        $inmueble_id = $request->json();
		
		return $inmueble_id;
        //return view('home',compact('inmueble_id'));
    }
    
   
    

    // TIPO DE INMUEBLE----------------------------------------------------------------------------------
    /*Usted no esta autorizado para ejecutar esta acción*/
    public function tipoInmueble() {
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/tipo_inmueble');
        $tipo_inmueble = $request->json();
		
		return $tipo_inmueble;
        //return view('home',compact('tipo_inmueble'));
    }



    public function tipoinmuebleId ($id){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/tipo_inmueble/'.$id);
        $tipo_inmueble_id = $request->json();
		
		return $tipo_inmueble_id;
        //return view('home',compact('tipo_inmueble_id'));
    }



    // SEGUIMIENTO – TRAMITE A SOLICITUD----------------------------------------------------------------------
    public function solicitudTramite(){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/solicitud_tramite');
        $solicitud_tramite = $request->json();
		
		return $solicitud_tramite;
        //return view('home',compact('solicitud_tramite'));
    }


    

    
    
    // RESPONSABLE SOLICITUD------------------------------------------------------------------------------------
    
    public function responsableSolicitud(){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/responsable_solicitud');
        $responsable_solicitud = $request->json();
		
		return $responsable_solicitud;
        //return view('home',compact('responsable_solicitud'));
    }


    public function responsableSolicitudId ($id){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/responsable_solicitud/'.$id);
        $responsable_solicitud_id = $request->json();
		
		return $responsable_solicitud_id;
        //return view('home',compact('responsable_solicitud_id'));
    }




    // CLIENTE----------------------------------------------------------------------------------------
    public function cliente(){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/cliente');
        $cliente = $request->json();
		
		return $cliente;
        //return view('home',compact('cliente'));
    }



    public function clienteId($id){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/cliente/{id}');
        $cliente_id = $request->json();
		
		return $cliente_id;
        //return view('home',compact('cliente_id'));
    }

    // TIPO DE CLIENTE-----------------------------------------------------------------
    public function tipoCliente(){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/tipo_cliente');
        $tipo_cliente = $request->json();
		
		return $tipo_cliente;
        //return view('home',compact('tipo_cliente'));
    }



    public function tipoClienteId($id){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/tipo_cliente/'.$id);
        $tipo_cliente_id = $request->json();
		
		return $tipo_cliente_id;
        //return view('home',compact('tipo_cliente_id'));
    }


    // CARGA DE VIDEOS-----------------------------------------------------------------------------------------
    
	public function inmuebleVideoId($id){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/inmueble_video/'.$id);
        $inmueble_video_id = $request->json();
		
		return $inmueble_video_id;
        //return view('home',compact('inmueble_video_id'));
    }


    public function inmuebleVideoUpLoad(){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/inmueble_video/upLoad');
        $inmueble_video_upLoad = $request->json();
		
		return $inmueble_video_upLoad;
        //return view('home',compact('inmueble_video_upLoad'));
    }

    // CARGA DE FOTOS-------------------------------------------------------------------------------------------

    public function inmuebleFoto(){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/inmueble_foto');
        $inmueble_foto = $request->json();
		
		return $inmueble_foto;
        //return view('home',compact('inmueble_foto'));
    }

    public function storeImageUrl(){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/inmueble_foto/storeImageUrl');
        $storeImageUrl = $request->json();
		
		return $storeImageUrl;
        //return view('home',compact('storeImageUrl'));
    }



    public function destroy(){
        
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZThkNGFkZTY5NzFhYWYxOWIzMTdlYWY2ZmE5ZGExM2FmOWM3YjUwMGE5NDdjOWFlYzQ2OTEyOGVlNDM0YzE5MDdjMWRkOGMyMmQ5NGE2OTAiLCJpYXQiOjE2MjM3NzY2MjMsIm5iZiI6MTYyMzc3NjYyMywiZXhwIjoxNjU1MzEyNjIyLCJzdWIiOiI0MSIsInNjb3BlcyI6W119.u6BT7PxwLtV70RqOX8d7JKNru0wmA9lLR65qrxBrEu28xunQhOIzfzEFTScIgvEmEnXxXODZKRplw1qZ34jx_ODLo1wzJSKkbkdx_e09CxV3c9Pprpl28ESEwgsEPTaSpjabj9ssQoVjGsaqWWaIeBcwhcM6dyIjRDc5hpVjXN_mxWAtaQPhYXyyPbzP9LqHBcj_FeshDkcWgzPCxzF1bz7uxLNER8leDZvkmPxW_-8QsUbVIYj-YdJJJnHk60pt5swORuyRC6A7bLp_fH8HDfde3T3z5cWWRD3RINVRBs_7aLAoxbZJ8q_wj067xDX1Igs6VWzIed2xKY81bMS4T7_0cGkemthQac6vkLQ3u4OhG1iLYffXKGqZveFBK0cTtBLZJVSyFQVNdoW-_C2Oh2i7FhoVVf8EMgNi2ynHUyaHDH2gh0bDZ5EgaPT64mqJIM0IWC1biWHs7p3RLFx-QbqUITOs-tJVBcjVFO_XoPnnUHiGq1WH0yNMFtfF6VPkpS7c2k6oxNmoi_H9kcUXBW_tJ72lZJisaHFol8AnM8yMw2c6JMI-oiTkvAt7Mk9bPFHOYdkKL_s2NnbaKOXxGgU2F3b0hwOgGJqiwaShDFSqXUzDmQE3yWPdSlQ5PBKHAsHq9YwBFf0DEtioa-emJZ7ZFNyMphbB8KlwJYR8k4U';
		$header = ([
					'empresa' => 'ier'
				]);
                $request = Http::accept('application/json')
                ->withToken($token)
                    ->withHeaders($header)->get('https://api.nuwwe.com/api/inmueble_foto/destroy/{id}');
        $destroy = $request->json();
		
		return $destroy;
        //return view('home',compact('destroy'));
    }


}


// public function index()
//     {

//         $data = [
//             'entrada'=>'dpto'
//         ];

//         $url = "https://api.nuwwe.com/api/solicitud/update";

//         $response = Http::withHeaders([
//             'x-api-key' => 'DucwnW9R1K2B38JDOD5EB2OpAqhkvU873JVknUE3',
//             'Content-Type' => 'application/json'
//         ])->post($url,$data);

//         if($response->ok()){

//             $array = json_decode($response->getBody()->getContents());
//             /* dd($array); */
//         }
