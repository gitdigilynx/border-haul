<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use App\Models\ShipperSubUser;
class Shipper extends Authenticatable
{
    use Notifiable, HasRoles;
    protected $fillable = [
        'user_id',
        'company_name',
        'street_address',
        'service_category',
        'phone',
        'city',
        'company_state',
        'company_zip_code',
        'company_country',
        'office_phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subUsers()
    {
        return $this->hasMany(ShipperSubUser::class);
    }
    public function addressBooks()
    {
        return $this->hasMany(AddressBook::class, 'shipper_id');
    }

    public function shipperSubUsers()
    {
        return $this->hasMany(ShipperSubUser::class);
    }

}
