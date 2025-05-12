<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Shipper;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'role',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',

    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function hasRole($role)
    {
        return $this->role === $role;
    }
    public function shipper()
    {
        return $this->hasOne(Shipper::class);
    }

    public function subUsers()
    {
        return $this->hasMany(User::class, 'shipper_id');
    }

    public function parentShipper()
    {
        return $this->belongsTo(User::class, 'shipper_id');
    }

    public function carrier()
    {
        return $this->hasOne(Carrier::class);
    }


    public function carrierUsers()
    {
        return $this->hasMany(User::class, 'carrier_id');
    }

    public function parentCarrier()
    {
        return $this->belongsTo(User::class, 'carrier_id');
    }

}
