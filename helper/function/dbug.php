<?php

if (!function_exists('dbug')) {

    /** Realiza o debug de variaveis */
    function dbug()
    {
        ini_set('xdebug.var_display_max_depth', '10');
        ini_set('xdebug.var_display_max_children', '256');
        ini_set('xdebug.var_display_max_data', '1024');
        foreach (func_get_args() as $arg) {
            var_dump($arg);
        }
    }
}

if (!function_exists('dbugpre')) {

    /** Realiza o debug de variaveis formatando o resultado com uma tag <pre> */
    function dbugpre()
    {
        echo '<pre>';
        dbug(...func_get_args());
        echo '</pre>';
    }
}

if (!function_exists('dd')) {

    /** Realiza o debug de variaveis e finaliza o sistema */
    function dd()
    {
        dbug(...func_get_args());
        die();
    }
}

if (!function_exists('ddpre')) {

    /** Realiza o debug de variaveis e finaliza o sistema formatando o resultado com uma tag <pre> */
    function ddpre()
    {
        dbugpre(...func_get_args());
        die();
    }
}
