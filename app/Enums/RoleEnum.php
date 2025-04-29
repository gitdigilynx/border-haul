<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = 'Admin';
    case SHIPPER = 'Shipper';
    case CARRIER = 'Carrier';
    case subAdmin = 'subAdmin';
}
