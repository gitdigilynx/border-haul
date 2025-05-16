<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carrier;

class CarrierDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrier_id', 'document_type', 'file_path', 'expires_at', 'status',
    ];

    public function carrier()
    {
        return $this->belongsTo(Carrier::class, 'carrier_id');
    }
}
