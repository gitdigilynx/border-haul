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
        'General Cargo' => 'General Cargo',
        'Reefer' => 'Reefer',
        'Hazmat' => 'Flatbed',
        'Low Boy' => 'Low Boy'
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

function statusDocument($status)
{
    switch ($status) {
        case 'Verified':
            return 'badge bg-success'; // green
        case 'Submitted':
        case 'Under Review':
            return 'badge bg-danger'; // red
        default:
            return 'badge bg-secondary'; // default gray
    }
}


function statusInService($in_service): string
{
    return match ((string) $in_service) {
        '1', 'ON' => 'badge bg-success',
        '0', 'OFF' => 'badge bg-danger',
        default => 'badge bg-secondary',
    };
}


function getStateOptions()
    {
        return [
            'United States' => [
                'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN',
                'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV',
                'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN',
                'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY', 'DC',
            ],
            'Mexico' => [
                'AG', 'BC', 'BS', 'CM', 'CS', 'CH', 'CO', 'CL', 'DF', 'DG', 'GT', 'GR', 'HG', 'JA',
                'MX', 'MI', 'MO', 'NA', 'NL', 'OA', 'PU', 'QE', 'QR', 'SL', 'SI', 'SO', 'TB', 'TM',
                'TL', 'VE', 'YU', 'ZA',
            ],
        ];
    }
