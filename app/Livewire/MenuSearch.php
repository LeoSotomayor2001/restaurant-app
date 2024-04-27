<?php

namespace App\Livewire;

use App\Models\Menu;
use App\Models\Pedido;
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

        // Crear un nuevo pedido
        $pedido = new Pedido();
        $pedido->description = $menuPedido->nombre; 
        $pedido->monto_total = $menuPedido->precio;  
        
        // Asociar el pedido al menú y al usuario actual
        $pedido->menu_id=$menuPedido->id;
        $pedido->user_id=auth()->user()->id;

        // Guardar el pedido en la base de datos
        $pedido->save();

        return redirect()->to('/inicio');
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
