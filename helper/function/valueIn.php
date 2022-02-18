<?php

if (!function_exists('valueIn')) {

    /** Retorna o valor representado dentro de uma string */
    function valueIn(string $string)
    {
        $string = trim($string, " \"'");

        if (strtolower($string) === 'true') {
            $string = true;
        } else if (strtolower($string) === 'false') {
            $string = false;
        } else if (strtolower($string) === "null") {
            $string = null;
        } elseif (is_numeric($string)) {
            if (strpos($string, '.')) {
                $string = floatval($string);
            } else {
                $string = intval($string);
            }
        }

        return $string;
    }
}
