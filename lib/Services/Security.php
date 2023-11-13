<?php

namespace Plugo\Services;

class SecurityXSS
{
    // Échapper les données pour éviter les attaques XSS
    public static function dataEscape($donnees)
    {
        if (is_array($donnees)) {
            return array_map('self::dataEscape', $donnees);
        } else {
            return htmlspecialchars($donnees, ENT_QUOTES, 'UTF-8');
        }
    }
}
