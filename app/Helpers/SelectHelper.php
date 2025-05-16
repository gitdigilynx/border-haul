<?php

function documentStatus()
{
    return [
        'Completed' => 'Completed',
        'Pending' => 'Pending'
    ];
}

function isStatus()
{
    return [
        'Active' => 'Active',
        'Inactive' => 'Inactive',
    ];
}

function serviceCategory()
{
    return [
        'Trucking Company' => 'Trucking Company',
        'Logistics Company' => 'Logistics Companies',
        'Warehouses' => 'Warehouses',
        'Customs Brokers' => 'Customs Brokers'
    ];
}
function statusBadge(string $status): string
{
    return match ($status) {
        'Approved' => 'badge bg-success',
        'Rejected' => 'badge bg-danger',
        'Pending'  => 'badge bg-warning text-dark',
    };
}


function statusDocument(string $statusDocument): string
{
    return match ($statusDocument) {
        'Completed' => 'badge bg-success',
        'Pending'   => 'badge bg-danger',
    };
}



function statusInService($in_service): string
{
    return match ((string) $in_service) {
        '1', 'ON' => 'badge bg-success',
        '0', 'OFF' => 'badge bg-danger',
        default => 'badge bg-secondary',
    };
}

if (!function_exists('formatPhone')) {
    function formatPhone($number)
    {
        $number = preg_replace('/[^\d]/', '', $number);

        // Format as (XXX) XXX-XXXX
        if (strlen($number) === 10) {
            return '(' . substr($number, 0, 3) . ') '
                . substr($number, 3, 3) . '-'
                . substr($number, 6);
        }

        // Format as +52-XXX-XXX-XXXX
        if (strlen($number) === 12 && str_starts_with($number, '52')) {
            return '+52-' . substr($number, 2, 3) . '-'
                . substr($number, 5, 3) . '-'
                . substr($number, 8);
        }

        // Default: return as-is
        return $number;
    }
}
// function serviceDirverCategory()
// {
//     return [
//         'general_cargo' => 'General Cargo',
//         'reefer' => 'Reefer',
//         'hazmat' => 'Hazmat',
//         'flatbed' => 'Flatbed',
//         'RGN' => 'rgn',
//     ];
// }