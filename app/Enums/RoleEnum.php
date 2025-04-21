<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case SHIPPER = 'shipper';
    case CARRIER = 'carrier';
}
