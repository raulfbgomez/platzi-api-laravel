<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Como estamos usando asignacion masiva se agrega la propiedad guarded para que se puedan crear productos con cualquier atributo
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function createdBy() {
        return $this->belongsTo(User::class);
    }
}
