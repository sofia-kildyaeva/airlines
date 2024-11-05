<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function airports() {
        return $this->hasMany(Airport::class);
    }

    public function fromCity() {
        return $this->hasMany(Flight::class, 'fromCity_id');
    }

    public function toCity() {
        return $this->hasMany(Flight::class, 'toCity_id');
    }
}
