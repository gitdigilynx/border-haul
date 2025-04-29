<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Truck;
class Driver extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'phone_number',
        'carrier_id',
    ];

    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function trucks()
    {
        return $this->hasMany(Truck::class);
    }

}
