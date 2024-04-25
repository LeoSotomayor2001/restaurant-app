<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class MenuEdit extends Component
{
    public $menu_id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $categoria_id;
    public $categorias;
    public $imagen;
    public $menu;

    use WithFileUploads;

    public function mount(Menu $menu)
    {   
        $this->menu_id = $menu->id;
        $this->nombre = $menu->nombre;
        $this->descripcion = $menu->descripcion;
        $this->precio = $menu->precio;
        $this->categoria_id =$menu->categoria_id;
        $this->categorias = Categoria::all();
    }

    public function actualizarMenu()
    {
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'categoria_id' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nombre.required' => 'El Nombre es obligatorio.',
            'descripcion.required' => 'La Descripción es obligatoria.',
            'precio.required' => 'El Precio es obligatorio.',
            'precio.numeric' => 'El Precio debe ser un valor numérico.',
            'categoria_id.required' => 'Debe seleccionar una Categoría.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'El archivo debe ser una imagen de tipo jpeg, png o jpg.',
            'imagen.max' => 'El archivo debe pesar menos de 2MB.',
        ]);

        $this->menu->nombre = $this->nombre;
        $this->menu->descripcion = $this->descripcion;
        $this->menu->precio = $this->precio;
        $this->menu->categoria_id = $this->categoria_id;

        if ($this->imagen) {
            Storage::makeDirectory('public/menus');
        
            // Eliminar la imagen anterior
            if ($this->menu->image) {
                Storage::delete('public/menus/' . $this->menu->image);
            }
        
            // Guardar la nueva imagen
            $rutaImagen = $this->imagen->store('public/menus');
            $nombreImagen = basename($rutaImagen);
            $this->menu->image = $nombreImagen;
        }

        $this->menu->save();

        // Restablecer los valores de los campos después de guardar el menú
        $this->nombre = '';
        $this->descripcion = '';
        $this->precio = '';
        $this->categoria_id = '';
        $this->imagen = null;

        // Redireccionar o mostrar un mensaje de éxito si es necesario

        return redirect()->route('menus.index')->with('success', 'El menú se ha actualizado correctamente.');
    }

    public function render()
    {
        return view('livewire.menu-edit');
    }
}
