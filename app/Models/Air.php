<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Air extends Model
{
    use HasFactory;

    public function seats() {
        return $this->hasMany(Air::class);
    }

    public function flights() {
        return $this->hasMany(Flight::class);
    }
}