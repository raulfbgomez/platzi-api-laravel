<?php

namespace App;

use Illuminate\Database\Eloquent\Pivot;

class Rating extends Pivot
{
    public $incrementing = true;
    protected $table = 'ratings';

    public function rateable() {
        return $this->morphTo();
    }

    public function qualifier() {
        return $this->morphTo();
    }
}
