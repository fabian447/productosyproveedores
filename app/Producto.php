<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['user_id', 'nombre', 'precio','cantidad','proveedor_id'];

    public function proveedor(){
        return $this->belongsTo('App\Proveedor', 'proveedor_id', 'id');
    }
}

