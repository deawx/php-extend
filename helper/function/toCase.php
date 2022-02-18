<?php

if (!function_exists('toCase_upper')) {

    /** Transforma uma string em maiuscula */
    function toCase_upper(string $string)
    {
        return mb_strtoupper($string);
    }
}

if (!function_exists('toCase_lower')) {

    /** Transforma uma string em minuscula */
    function toCase_lower(string $string)
    {
        return mb_strtolower($string);
    }
}

if (!function_exists('toCase_simple')) {

    /**
     * Formata uma string separando as palavas por espaços
     * - Letras maiusculas, espeços, traços e underlines são tratados como separador de palavras
     * - Acentos e pontoação serão removidos
     * @param string $string String que deve ser tratada
     * @param char $separator Char que deve ser utilizado como separador de palavras
     */
    function toCase_simple(string $string, $separator = ' ')
    {
        $separator = substr($separator, 0, 1);

        $string = remove_accents($string);
        $string = char_only($string, "ABCDEFGHIJKLMNOPQRSTUVXZWY0123456789- _$separator");

        $string = str_replace(
            str_split('ABCDEFGHIJKLMNOPQRSTUVXZWY'),
            str_split('-a-b-c-d-e-f-g-h-i-j-k-l-m-n-o-p-q-r-s-t-u-v-x-z-w-y', 2),
            $string
        );
        $string = mb_str_replace(
            ['-', '_', ' '],
            [$separator, $separator, $separator],
            $string
        );
        $string = mb_str_replace_all(
            "$separator$separator",
            $separator,
            $string
        );
        $string = trim($string, $separator);
        $string = toCase_lower($string);

        return $string;
    }
}

if (!function_exists('toCase_pascal')) {

    /**
     * Formata uma string como PascalCase
     * - Acentos e pontoação serão removidos
     * - Palavras separadas por letra maiuscula
     * - Primeira letra da string em maiuscula
     */
    function toCase_pascal(string $string)
    {
        $string = toCase_simple($string);
        $string = ucwords($string);
        $string = str_replace(' ', '', $string);
        return $string;
    }
}

if (!function_exists('toCase_camel')) {

    /**
     * Formata uma string como CamelCase
     * - Acentos e pontoação serão removidos
     * - Palavras separadas por letra maiuscula
     */
    function toCase_camel(string $string)
    {
        $string = toCase_pascal($string);
        $string = lcfirst($string);
        return $string;
    }
}

if (!function_exists('toCase_snake')) {

    /**
     * Formata uma string como SnakeCase
     * - Acentos e pontoação serão removidos
     * - Palavras sseparadas por _
     */
    function toCase_snake(string $string)
    {
        return toCase_simple($string, '_');
    }
}

if (!function_exists('toCase_kebab')) {

    /**
     * Formata uma string como KebabCase
     * - Acentos e pontoação serão removidos
     * - Palavras sseparadas por -
     */
    function toCase_kebab(string $string)
    {
        return toCase_simple($string, '-');
    }
}
