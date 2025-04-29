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
        'company_address',
        'phone',
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
