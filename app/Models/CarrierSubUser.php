<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrierSubUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'carrier_id',
        'phone',
    ];

    public function users()
    {
        return  $this->belongsTo(User::class,'user_id');
    }

     public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }
}
