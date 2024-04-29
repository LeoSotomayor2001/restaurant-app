<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use App\Notifications\NuevoPedidoNotification;
use App\Notifications\PedidoCompletadoNotification;
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
    public function pedidosAdmin(){

        $pedidos=Pedido::all();
        return view('admin.pedidos.index',
        [
            'pedidos' => $pedidos
        ]);
    }
    public function update(Pedido $pedido){

        $pedido->update([
            'estado' => 'Completado'
        ]);
        //Crear una notificación
        $user=User::find($pedido->user_id);
        $user->notify(new PedidoCompletadoNotification($pedido));

        return redirect()->route('pedidos.admin');
    }
}
