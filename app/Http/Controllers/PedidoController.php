<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(User $user){

        $pedidos=Pedido::where('user_id',auth()->user()->id)->get();
        return view('pedidos.index',
        [
            'pedidos' => $pedidos
        ]);

    }
}
