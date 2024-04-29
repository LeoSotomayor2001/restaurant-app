<?php

namespace App\Livewire;

use App\Models\Menu;
use App\Models\Pedido;
use App\Models\User;
use App\Notifications\NuevoPedidoNotification;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MenuSearch extends Component
{

     public $search = '';
     public $listeners = ['destroy'];
     public $menuId;

    public function render()
    {
        $menus = Menu::where('nombre', 'like', '%' . $this->search . '%')->get();

        return view('livewire.menu-search', [
            'menus' => $menus
        ]);
    }

    public function buscar()
    {
        $this->render();
    }
    public function ordenarPedido(Menu $menu)
    {
        // Obtener el menú seleccionado
        $menuPedido = Menu::find($menu->id);
    
        // Verificar si se ha encontrado el menú
        if (!$menuPedido) {
            return redirect()->route('inicio')->with('error', 'El menú seleccionado no existe.');
        }
        
    
        // Crear un nuevo pedido
        $pedido = new Pedido();
        $pedido->description = $menuPedido->nombre; 
        $pedido->monto_total = $menuPedido->precio;  
        $admin = User::where('admin', 1)->first();
        

        // Asociar el pedido al menú y al usuario actual
        $pedido->menu()->associate($menuPedido);
        $pedido->user()->associate(auth()->user());
        
        // Crear una notificación
        $admin->notify(new NuevoPedidoNotification($pedido));
        // Guardar el pedido en la base de datos
        $pedido->save();
    
        return redirect()->route('pedidos', ['user' => auth()->user()->name]);
    }

    public function destroy(Menu $menu)
    {
        // Eliminar la imagen del menú si existe
        if ($menu->imagen) {
            Storage::delete('menus/' . $menu->imagen);
        }

        // Eliminar el menú de la base de datos
        $menu->delete();

        // Redireccionar o enviar una respuesta de éxito
        session()->flash('message', 'El menú ha sido eliminado correctamente.');

        return redirect()->to('/admin/menus');
    }
}
