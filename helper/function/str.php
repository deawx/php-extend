<?php

if (!function_exists('mb_str_replace')) {

    /**
     * Substitui todas as ocorrências da string de procura com a string de substituição
     * @param string $search String ou array de busca
     * @param string $replace String ou array de substituição
     * @param string $subject String que deve ser substituida
     * @return string
     */
    function mb_str_replace($search, $replace, $subject, &$count = 0)
    {
        if (!is_array($subject)) {
            $searches = is_array($search) ? array_values($search) : array($search);
            $replacements = is_array($replace) ? array_values($replace) : array($replace);
            $replacements = array_pad($replacements, count($searches), '');
            foreach ($searches as $key => $search) {
                $parts = mb_split(preg_quote($search), $subject);
                $count += count($parts) - 1;
                $subject = implode($replacements[$key], $parts);
            }
        } else {
            foreach ($subject as $key => $value) {
                $subject[$key] = mb_str_replace($search, $replace, $value, $count);
            }
        }
        return $subject;
    }
}

if (!function_exists('mb_str_replace_all')) {

    /**
     * Substitui todas as ocorrências da string de procura com a string de substituição
     * @param string $search String ou array de busca
     * @param string $replace String ou array de substituição
     * @param string $subject String que deve ser substituida
     * @param int $loop Numero maximo de vezes que o replace pode acotecer
     * @return string
     */
    function mb_str_replace_all($search, $replace, $subject, $loop = 10)
    {
        $pre = $subject;
        $subject = mb_str_replace($search, $replace, $subject);
        while ($loop && $pre != $subject) {
            $pre = $subject;
            $subject = mb_str_replace($search, $replace, $subject);
            $loop--;
        }
        return $subject;
    }
}

if (!function_exists('mb_str_split')) {

    /**
     * Corta uma string em um array
     * @param string $string A string de entrada.
     * @param int $string_length Tamanho máximo do pedaço.
     * @return string
     */
    function mb_str_split($string, $string_length = 1)
    {
        if (mb_strlen($string) > $string_length || !$string_length) {
            do {
                $parts[] = mb_substr($string, 0, $string_length);
                $string = mb_substr($string, $string_length);
            } while (!empty($string));
        } else {
            $parts = array($string);
        }
        return $parts;
    }
}


if (!function_exists('str_replace_all')) {

    /**
     * Substitui todas as ocorrências da string de procura com a string de substituição
     * @param string $search String ou array de busca
     * @param string $replace String ou array de substituição
     * @param string $subject String que deve ser substituida
     * @param int $loop Numero maximo de vezes que o replace pode acotecer
     * @return string
     */
    function str_replace_all($search, $replace, $subject, $loop = 10)
    {
        $count = 0;
        $subject = str_replace($search, $replace, $subject, $count);
        while ($loop && $count) {
            $subject = str_replace($search, $replace, $subject, $count);
            $loop--;
        }
        return $subject;
    }
}

if (!function_exists('str_replace_first')) {

    /**
     * Substitui a primeira ocorrência da string
     * @param string $search String ou array de busca
     * @param string $replace String ou array de substituição
     * @param string $subject String que deve ser substituida
     * @return string
     */
    function str_replace_first($search, $replace, $subject)
    {
        $pos = strpos($subject, $search);
        if ($pos !== false) {
            return substr_replace($subject, $replace, $pos, strlen($search));
        }
        return $subject;
    }
}

if (!function_exists('str_replace_last')) {

    /**
     * Substitui a ultima ocorrência da string
     * @param string $search String ou array de busca
     * @param string $replace String ou array de substituição
     * @param string $subject String que deve ser substituida
     * @return string
     */
    function str_replace_last($search, $replace, $subject)
    {
        $pos = strrpos($subject, $search);
        if ($pos !== false) {
            return substr_replace($subject, $replace, $pos, strlen($search));
        }
        return $subject;
    }
}

if (!function_exists('str_trim')) {

    /**
     * Aplica o efeito TRIM em um grupo de caracteres dentro de uma string, removendo um ou mais caracteres a seu redor
     * @param string $string String que deve receber o tratamento
     * @param string|array $search String na qual o efeito TRIM deve ser aplicado
     * @param string|array $trim Grupo de strings que deve ser removido antes e depois de cada string encontrada
     * @return string String tratada
     */
    function str_trim($string, $search, $trim = ' ')
    {
        $trimArray = [];
        $searchArray = [];
        ensure_array($trim);
        ensure_array($search);
        foreach ($search as $vs) {
            foreach ($trim as $vt) {
                $trimArray[] = "$vs$vt";
                $trimArray[] = "$vt$vs";
                $searchArray[] = $vs;
                $searchArray[] = $vs;
            }
        }
        $string = mb_str_replace_all($trimArray, $searchArray, $string);
        return $string;
    }
}
