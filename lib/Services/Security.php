<?php

namespace Plugo\Services;

class SecurityXSS
{
    // Échapper les données pour éviter les attaques XSS
    public static function dataEscape($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
    }

    public static function decodeDataEscape($value)
    {
        return htmlspecialchars_decode($value, ENT_QUOTES);
    }
}
