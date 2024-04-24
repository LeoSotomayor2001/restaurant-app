<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre'];

    // Relación con la tabla de menús
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
