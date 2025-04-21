<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'truck_plate',
        'trucker_number',
        'service_category',
        'carrier_id',
    ];

    public function carrier()
    {
        return $this->belongsTo(Carrier::class, 'carrier_id');
    }

    public function driver()
    {
        return $this->hasMany(Driver::class);
    }

}
