<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['nombre', 'descripcion', 'precio','categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
    public function deleteWithoutPedidos()
    {
        // Desasociar los pedidos del menú
        $this->pedidos()->detach();

        // Eliminar el menú
        $this->delete();
    }
}
