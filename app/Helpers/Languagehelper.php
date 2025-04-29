<?php

use App\Helpers\TranslationHelper;

if (!function_exists('t')) {
    function translater($key)
    {
        return TranslationHelper::translate($key)['message'];
    }
}
