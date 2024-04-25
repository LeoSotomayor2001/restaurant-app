<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus=Menu::all();
        return view('admin.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        if (Gate::authorize('admin', auth()->user())) {
            // Acción permitida solo para usuarios administradores
            return view('admin.menu.create');
        }
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

}
