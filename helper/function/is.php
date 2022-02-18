<?php

if (!function_exists('is_blank')) {

    /** Verifica se uma variavel é nula, vazia ou composta de espaços em branco */
    function is_blank($var)
    {
        return empty(trim($var)) && !is_numeric($var);
    }
}

if (!function_exists('is_closure')) {

    /** Verifica se uma variavel é uma função anonima */
    function is_closure($var)
    {
        return ($var instanceof Closure);
    }
}

if (!function_exists('is_md5')) {

    /** Verifica se uma string é um MD5 */
    function is_md5($string)
    {
        return is_string($string) ? boolval(preg_match('/^[a-fA-F0-9]{32}$/', $string)) : false;
    }
}

if (!function_exists('is_class')) {

    /**
     * Verifiaca se um objeto é ou extende uma classe
     * @param type $obj Objeto que deve ser verificado.
     * @param string $string Nome da classe que deve ser verificada.
     */
    function is_class($obj, $class)
    {
        try {
            if (!empty($obj)) {
                $obj = is_object($obj) ? get_class($obj) : strval($obj);
                $class = is_object($class) ? get_class($class) : strval($class);
                $obj = trim($obj, '\\');
                $class = trim($class, '\\');

                return $obj == $class || isset(class_parents("\\$obj")[$class]);
            }
        } catch (\Exception | \Error $e) {
            return false;
        }
        return false;
    }
}

if (!function_exists('is_extend')) {

    /**
     * Verifiaca se um objeto extende uma classe
     * @param type $obj Objeto que deve ser verificado.
     * @param string $string Nome da classe que deve ser verificada.
     */
    function is_extend($obj, $class)
    {
        try {
            if (!empty($obj)) {
                $obj = is_object($obj) ? get_class($obj) : strval($obj);
                $class = is_object($class) ? get_class($class) : strval($class);
                $obj = trim($obj, '\\');
                $class = trim($class, '\\');
                return isset(class_parents("\\$obj")[$class]);
            }
        } catch (\Exception | \Error $e) {
            return false;
        }
        return false;
    }
}

if (!function_exists('is_serialized')) {

    /** Verifica se uma string é um objeto serializado */
    function is_serialized($string)
    {
        return (@unserialize($string) !== false);
    }
}

if (!function_exists('is_json')) {

    /** Verifica se uma string é um objeto JSON */
    function is_json($string)
    {
        if (is_string($string)) {
            json_decode($string);
            return json_last_error() === JSON_ERROR_NONE;
        }
        return false;
    }
}
