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
