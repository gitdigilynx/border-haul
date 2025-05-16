<?php

function formatPhone($number)
{
    $number = preg_replace('/[^\d]/', '', $number);
    if (strlen($number) === 10) {
        return '(' . substr($number, 0, 3) . ') '
            . substr($number, 3, 3) . '-' . substr($number, 6);
    } elseif (strlen($number) === 13 && str_starts_with($number, '52')) {
        return '+52-' . substr($number, 2, 3) . '-' . substr($number, 5, 3) . '-' . substr($number, 8);
    }
    return $number;
}