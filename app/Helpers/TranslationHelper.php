<?php

namespace App\Helpers;

class TranslationHelper
{
    public static function translate($key, $locale = null)
    {
        $currentLocale = $locale ?? app()->getLocale(); // Use current locale
        $locales = ['en', 'es']; // Add more locales if needed

        $result = ['key' => $key, 'message' => ''];

        foreach ($locales as $lang) {
            app()->setLocale($lang);

            $langFilePath = base_path("resources/lang/{$lang}/messages.php");
            $langArray = file_exists($langFilePath) ? include($langFilePath) : [];

            if (!array_key_exists($key, $langArray)) {
                $processedKey = ucfirst(str_replace('_', ' ', self::remove_invalid_characters($key)));
                $langArray[$key] = $processedKey;

                if (app()->environment('local')) {
                    $str = "<?php return " . var_export($langArray, true) . ";";
                    file_put_contents($langFilePath, $str);
                }
            }

            // Store the message for current active locale
            if ($lang === $currentLocale) {
                $result['message'] = $langArray[$key];
            }
        }

        // Restore original locale
        app()->setLocale($currentLocale);

        return $result;
    }

    public static function remove_invalid_characters($str)
    {
        return preg_replace('/\s+/', ' ', trim(str_ireplace(['\'', '"', ',', ';', '<', '>', '?'], ' ', $str)));
    }
}
