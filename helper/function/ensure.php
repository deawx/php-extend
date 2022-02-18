<?php

if (!function_exists('ensure_array')) {

    /** Garante que uma variavel seja um array */
    function ensure_array(&$var)
    {
        $var = is_array($var) ? $var : [$var];
    }
}

if (!function_exists('ensure_char_array')) {

    /** Garante que uma variavel seja um array de caracteres */
    function ensure_char_array(&$var)
    {
        ensure_string($var);
        $var = mb_str_split($var);
    }
}

if (!function_exists('ensure_string')) {

    /** Garante que uma varaivel seja uma string */
    function ensure_string(&$var)
    {
        $var = is_array($var) ? implode('', $var) : $var;
    }
}
