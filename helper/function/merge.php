<?php

if (!function_exists('merge')) {

    /**
     * Combina os valores de duas variaveis
     * @param string|array $var1 Variavel que contem o valor incial
     * @param string|array $var2 Variavel que contem o valor que deve ser fundido
     * @param int $typeMerge Tipo de merge que deve ser executado
     * (-1) Adiciona $var2 antes da $var1
     * (0) Adiciona $var2 removendo $var1
     * (1) Adiciona $var2 após da $var1
     */
    function merge($var1, $var2, $typeMerge = 1)
    {
        if (is_array($var1)) {
            ensure_array($var2);
            $var2 = $var2 ?? [];
        } else {
            ensure_string($var1);
            ensure_string($var2);
        }
        switch ($typeMerge) {
            case -1:
                return is_array($var1) ? array_merge($var2, $var1) : $var2 . $var1;
            case 0:
                return $var2;
            case 1:
                return is_array($var1) ? array_merge($var1, $var2) : $var1 . $var2;
            default:
                return $var1;
        }
    }
}
