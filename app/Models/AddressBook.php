<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipper_id',
        'name',
        'phone',
        'street_address',
        'city',
        'state',
        'postal_code',
        'country',
        'type',
        'contact_person_name'
    ];

    public function shipper()
    {
        return $this->belongsTo(Shipper::class,'shipper_id');
    }

}
