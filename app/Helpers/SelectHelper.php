<?php

function documentStatus()
{
    return [
        'pending' => 'Pending',
        'approved' => 'Approved',
        'rejected' => 'Rejectd'
    ];
}

function serviceCategory()
{
    return [
        'trucking_companies' => 'Trucking Companies',
        'logistics_companies' => 'Logistics Companies',
        'warehouses' => 'Warehouses',
        'customs_brokers' => 'Customs Brokers'
    ];
}
function statusBadge(string $status): string
{
    return match ($status) {
        'approved' => 'badge bg-success',
        'rejected' => 'badge bg-danger',
        'pending'  => 'badge bg-warning text-dark',
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
