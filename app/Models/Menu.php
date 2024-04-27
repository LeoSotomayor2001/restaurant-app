<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'precio','categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
