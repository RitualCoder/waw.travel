<?php

namespace Plugo\Services\Security;

class Security
{
    public static function dataEscape($data)
    {
        if (is_array($data)) {
            foreach ($data as &$value) {
                $value = self::dataEscape($value);
            }
        } elseif (is_object($data)) {
            $reflection = new \ReflectionObject($data);
            $classMethods = get_class_methods(get_class($data));

            foreach ($reflection->getProperties() as $property) {
                $propertyName = $property->getName();
                $getterMethod = 'get' . ucfirst($propertyName);
                $setterMethod = 'set' . ucfirst($propertyName);

                if (in_array($getterMethod, $classMethods) && in_array($setterMethod, $classMethods)) {
                    $propertyValue = $property->getValue($data);
                    $property->setValue($data, self::dataEscape($propertyValue));
                }
            }
        } elseif (is_string($data)) {
            $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }

        return $data;
    }



    public static function decodeDataEscape($value): string
    {
        return htmlspecialchars_decode($value, ENT_QUOTES);
    }
}
