<?php

namespace core;

class Validator {

    public static function string($value, $min = 1, $max = INF): bool
    {
        $value = $value == null ? "" :trim($value);

        return self::isValidLength($value, $min, $max);
    }

    private static function isValidLength($value, $min, $max): bool
    {
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}