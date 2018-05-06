<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    //
    public function articulos()
    {
        return $this->hasMany('App\Articulo');
    }
}
