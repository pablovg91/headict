<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    //
    public function checkout()
    {
        return $this->belongsTo('App\Checkout');
    }
    public function articulo()
    {
        return $this->belongsTo('App\Articulo');
    }
}
