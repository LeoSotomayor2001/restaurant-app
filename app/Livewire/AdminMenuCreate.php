<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminMenuCreate extends Component
{
    public $nombre;
    public $descripcion;
    public $precio;
    public $categoria_id;
    public $categorias;
    public $imagen;

    use WithFileUploads;

    public function mount()
    {
        $this->categorias = Categoria::all();
        // Seleccionar la primera categoría
        $this->categoria_id = ($this->categorias->count() > 0) ? $this->categorias->first()->id : null;
    }
    public function crearMenu()
{
    $this->validate([
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required|numeric',
        'categoria_id' => 'required',
        'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    ], [
        'nombre.required' => 'El Nombre es obligatorio.',
        'descripcion.required' => 'La Descripción es obligatoria.',
        'precio.required' => 'El Precio es obligatorio.',
        'precio.numeric' => 'El Precio debe ser un valor numérico.',
        'categoria_id.required' => 'Debe seleccionar una Categoría.',
        'imagen.required' => 'La Imagen es obligatoria.',
        'imagen.image' => 'El archivo debe ser una imagen.',
        'imagen.mimes' => 'El archivo debe ser una imagen de tipo jpeg, png o jpg.',
        'imagen.max' => 'El archivo debe pesar menos de 2MB.',
    ]);

    $menu = new Menu;
    $menu->nombre = $this->nombre;
    $menu->descripcion = $this->descripcion;
    $menu->precio = $this->precio;
    $menu->categoria_id = $this->categoria_id;

    if ($this->imagen) {
        Storage::makeDirectory('public/menus');
        $rutaImagen = $this->imagen->store('public/menus');
        $nombreImagen = basename($rutaImagen);
        $menu->image = $nombreImagen;
    }

    $menu->save();

    // Restablecer los valores de los campos después de guardar el menú
    $this->nombre = '';
    $this->descripcion = '';
    $this->precio = '';
    $this->categoria_id = '';
    $this->imagen = null;

    // Redireccionar o mostrar un mensaje de éxito si es necesario

    return redirect()->route('menus.index')->with('success', 'El menú se ha creado correctamente.');
}
    public function render()
    { 
        return view('livewire.admin-menu-create', [
            'categorias' => $this->categorias
        ]);
    }
}
