<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    public function categorias()
    {
        return $this->belongsToMany('App\Categoria', 'articulo_categoria');
    }
}
