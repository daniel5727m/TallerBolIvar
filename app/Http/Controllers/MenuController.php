<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user_id = Auth::id();
        $menu = DB::select('SELECT m.* FROM menus m
        JOIN perfil_menu pm ON m.id=pm.id_menu
        JOIN users u ON pm.id_perfil=u.id_perfil
        WHERE u.id=20 order by m.id asc');
        return $menu;
       /* $menu= Menu::orderBy('id', 'ASC')->get();*/
        // return $menu;
        // return view('lte.menu',compact('menu'));
        return view('home',compact('menu'));

    }

    public function misPerfiles(){
        $user_id = Auth::id();
        $menu = DB::select('SELECT m.* FROM menus m
        JOIN perfil_menu pm ON m.id=pm.id_menu
        JOIN users u ON pm.id_perfil=u.id_perfil
        WHERE u.id='.$user_id.' order by m.id asc');
        return $menu;
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function createDos()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
