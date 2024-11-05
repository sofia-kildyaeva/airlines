<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    public function from_city(){
        return $this->belongsTo(City::class, 'fromCity_id');
    }

    public function to_city(){
        return $this->belongsTo(City::class, 'toCity_id');
    }

    public function from_airport(){
        return $this->belongsTo(Airport::class, 'fromAirport_id');
    }

    public function to_airport(){
        return $this->belongsTo(Airport::class, 'toAirport_id');
    }

    public function air() {
        return $this->belongsTo(Air::class);
    }

    public function tikets() {
        return $this->hasMany(Tiket::class);
    }
}
