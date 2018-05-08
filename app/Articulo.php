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
    public function tipo()
    {
        return $this->belongsTo('App\Tipo');
    }
    public function detalles()
    {
        return $this->hasMany('App\Detalle');
    }
}
