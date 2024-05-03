<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Resena;
use Illuminate\Http\Request;

class ResenaController extends Controller
{
    public function store(Request $request, Menu $menu){

        $request->validate([
            'review' => 'required'
        ],[
            'review.required' => 'Debe escribir una reseña'
        ]);

        Resena::create([
            'resena' => $request->review,
            'menu_id' => $menu->id, 
            'user_id' => auth()->user()->id
        ]);
        return back()->with('success', 'Reseña guardada');
    }
}
