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
