<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Owner extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    protected function cars() {
        return $this->hasMany(Car::class);
    }
}
