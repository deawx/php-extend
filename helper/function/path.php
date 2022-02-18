<?php

if (!function_exists('path')) {

    /** Formata uma string como caminho de diretório */
    function path(string $path)
    {
        $path = str_replace('\\', '/', $path);
        $path = str_trim($path, '/');
        $path = str_replace_all('//', '/', $path);
        return $path;
    }
}
