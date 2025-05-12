<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use App\Models\CarrierSubUser;
use App\Models\CarrierDocument;
use App\Models\Truck;
use App\Models\Driver;

class Carrier extends Model
{
    use HasFactory,HasRoles;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_address',
        'authority',
        'dot',
        'mc',
        'scac_code',
        'caat_code',
        'service_category',
        'phone',
        'country',
        'transfer_approval_documents',
        'insurance_certificate',
    ];

   public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carrierUsers()
    {
        return $this->hasMany(CarrierSubUser::class);
    }

    public function carrierDocuments()
    {
        return $this->hasMany(CarrierDocument::class);
    }

    public function trucks()
    {
        return $this->hasMany(Truck::class);
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }

    public function carrierSubUsers()
    {
        return $this->hasMany(CarrierSubUser::class);
    }
}
