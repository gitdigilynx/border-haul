<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
    'trucker_number',
    'plate_number',
    'service_category',
    'location',
    'carrier_id',
    'in_service',
    'driver_id',
    ];


    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

}
