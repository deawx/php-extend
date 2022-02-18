<?php

if (!function_exists('char_replace')) {

    /**
     * Realiza o replace de caracteres de uma string
     * @param string $string Valor que deve ser utilizado na ação
     * @param string $charSearch Caracteres que devem ser buscados na string
     * @param string $charReplace Caracteres que devem ser utilizados para o replace
     */
    function char_replace(string $string, $charSearch, $charReplace)
    {
        ensure_char_array($charSearch);
        ensure_char_array($charReplace);
        $string = str_replace($charSearch, $charReplace, $string);
        return $string;
    }
}

if (!function_exists('char_deny')) {

    /**
     * Remove caracteres de uma string
     * @param string $string Valor que deve ser utilizado na ação
     * @param string $charDeny Caracteres que devem ser removidos da string
     * @param string $charAllow Caracteres que devem ser removidos do deny
     */
    function char_deny(string $string, $charDeny, $charAllow = '')
    {
        ensure_string($charDeny);
        ensure_string($charAllow);
        $charDeny = mb_strtolower($charDeny) . mb_strtoupper($charDeny);
        $charAllow = mb_strtolower($charAllow) . mb_strtoupper($charAllow);
        $string = char_deny_case($string, $charDeny, $charAllow);
        return $string;
    }
}

if (!function_exists('char_deny_case')) {

    /**
     * Remove caracteres de uma string diferenciando maiusculas e minusculas
     * @param string $string Valor que deve ser utilizado na ação
     * @param string $charDeny Caracteres que devem ser removidos da string
     * @param string $charAllow Caracteres que devem ser removidos do deny
     */
    function char_deny_case(string $string, $charDeny, $charAllow = '')
    {
        ensure_char_array($charDeny);
        ensure_string($charAllow);
        $charDeny = str_replace($charAllow, '', $charDeny);
        ensure_char_array($charAllow);
        $string = str_replace($charDeny, $charAllow, $string);
        return $string;
    }
}

if (!function_exists('char_only')) {

    /**
     * Mantem apenas alguns caracteres de uma string
     * @param string $string Valor que deve ser utilizado na ação
     * @param string $charOnly Caracteres que devem ser mantidos na string
     */
    function char_only(string $string, $charOnly)
    {
        ensure_string($charOnly);
        $charOnly = mb_strtolower($charOnly) . mb_strtoupper($charOnly);
        $string = char_only_case($string, $charOnly);
        return $string;
    }
}

if (!function_exists('char_only_case')) {

    /**
     * Mantem apenas alguns caracteres de uma string diferenciando maiusculas e minusculas
     * @param string $string Valor que deve ser utilizado na ação
     * @param string $charOnly Caracteres que devem ser mantidos na string
     */
    function char_only_case(string $string, $charOnly)
    {
        ensure_char_array($charOnly);
        $charDeny = str_replace($charOnly, '', $string);
        $string = char_deny($string, $charDeny);
        return $string;
    }
}
