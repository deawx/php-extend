<?php

if (!function_exists('num_format')) {

    /**
     * Formata um numero em float
     * @param int|flot $number Valor que deve ser utilizado na ação
     * @param int $decimals Casas decimais
     * @param int|null $roundType Metodo de arredondamenteo
     * NULL: Remove as casas decimais
     * -1: Arredonda para baixo
     * 0: Arredonda automáticamente
     * 1: Arredonda para cima
     */
    function num_format($number, $decimals = 2, $roundType = -1)
    {
        $decimals = intval($decimals < 0 ? 0 : $decimals);

        if (!$decimals) {
            return num_round($number, $roundType);
        }

        $number = str_replace(',', '.', $number);

        $tmp = explode('.', $number);
        $n_int = array_shift($tmp);
        $n_decimal = substr(array_shift($tmp) ?? '0', 0, $decimals + 1);

        if (strlen($n_decimal) > $decimals) {
            $n_decimal = num_round(($n_decimal / 10), $roundType);
        }

        return floatval("$n_int.$n_decimal");
    }
}

if (!function_exists('num_round')) {

    /**
     * Arredonda um numero
     * @param int|flot $number Valor que deve ser utilizado na ação
     * @param int|null $roundType Metodo de arredondamenteo
     * NULL: Remove as casas decimais
     * -1: Arredonda para baixo
     * 0: Arredonda automáticamente
     * 1: Arredonda para cima
     */
    function num_round($number, $roundType = 0)
    {
        $number = str_replace(',', '.', $number);

        if (!is_null($roundType)) {
            switch ($roundType) {
                case -1:
                    $number = floor($number);
                    break;
                case 0:
                    $number = round($number);
                    break;
                case 1:
                    $number = ceil($number);
                    break;
            }
        } else {
            $number = explode('.', $number)[0];
        }
        return $number;
    }
}

if (!function_exists('num_interval')) {

    /**
     * Garante que um numero esteja dentro de um intervalo
     * @param int|flot $number Valor que deve ser utilizado na ação
     * @param int|float|null $min Valor Minimo
     * @param int|float|null $max Valor Maximo
     */
    function num_interval($number, $min = 0, $max = 0)
    {
        $number = $number ?? 0;
        if (!is_null($min)) {
            $number = max($min, $number);
        }

        if (!is_null($max)) {
            $number = min($max, $number);
        }

        return $number;
    }
}

if (!function_exists('num_positive')) {

    /** Retorna o representativo positivo de um numero */
    function num_positive($number)
    {
        return max($number, ($number * -1));
    }
}

if (!function_exists('num_negative')) {

    /** Retorna o representativo negativo de um numero */
    function num_negative($number)
    {
        return max($number, ($number * -1));
    }
}
