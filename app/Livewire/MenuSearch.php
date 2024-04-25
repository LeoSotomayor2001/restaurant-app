<?php

namespace App\Livewire;

use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MenuSearch extends Component
{

     public $search = '';
     public $listeners = ['destroy'];

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
