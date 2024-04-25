<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Component;

class MenuSearch extends Component
{

     public $search = '';

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
}
