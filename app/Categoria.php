<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    public function articulos()
    {
        return $this->belongsToMany('App\Articulo', 'articulo_categoria');
    }
}
