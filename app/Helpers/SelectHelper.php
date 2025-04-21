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
